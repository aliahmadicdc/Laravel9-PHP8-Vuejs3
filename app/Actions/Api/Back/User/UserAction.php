<?php

namespace App\Actions\Api\Back\User;

use App\Http\Enums\Api\Back\User\OptionKeys;
use App\Http\Resources\Back\Global\Image\ImageResource;
use App\Http\Resources\Back\User\NotificationResource;
use App\Http\Resources\Back\User\OptionResource;
use App\Http\Traits\Back\General\Image\ImageUploadTrait;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Hash;
use function auth;

class UserAction
{
    use ImageUploadTrait;

    public function getAuthUser(): ?Authenticatable
    {
        $user = auth()->user();
        $user->notifications = NotificationResource::collection($user->unreadNotifications);

        return $user;
    }

    public function getAuthUserNotifications(): AnonymousResourceCollection
    {
        $notifications = auth()->user()->unreadNotifications;

        foreach ($notifications as $notification) {
            $notification->markasRead();
        }

        return NotificationResource::collection($notifications);
    }

    public function updatePersonalInformation($request): ?Authenticatable
    {
        $user = auth()->user();

        $user->update($request->validated());

        $user->notifications = NotificationResource::collection($user->unreadNotifications);

        return $user;
    }

    /**
     * @throws \Exception
     */
    public function updateProfileImage($request): ?Authenticatable
    {
        $user = auth()->user();

        $user->notifications = NotificationResource::collection($user->unreadNotifications);

        if ($request->file('image')) {
            $user->image()->forcedelete();

            $response = $this->uploadPrivateImage($request->file('image'), $user);

            if (!$response) throw new \Exception(trans('messages.imageNotUpload'), 0);
        } else {
            $user->image()->forcedelete();
        }

        $user->image = ImageResource::make($user->image()->first());

        return $user;
    }

    public function deleteProfileImage(): ?Authenticatable
    {
        $user = auth()->user();

        $user->notifications = NotificationResource::collection($user->unreadNotifications);

        $user->image()->forcedelete();

        $user->image = null;

        return $user;
    }

    public function updateAccountInformation($request): ?Authenticatable
    {
        $user = auth()->user();

        $data = $request->validated();

        if ($request->has('email') && $user->email != null && $request->validated('email') != $user->email)
            $data['email_verified_at'] =  null;

        $user->update($data);

        $user->options()->whereIn('option_key', [
            OptionKeys::LANGUAGE,
            OptionKeys::TIMEZONE
        ])->forcedelete();

        if (isset($request->language))
            $user->options()->create([
                'option_key' => OptionKeys::LANGUAGE,
                'option_value' => $request->validated()[OptionKeys::LANGUAGE]
            ]);

        if (isset($request->timezone))
            $user->options()->create([
                'option_key' => OptionKeys::TIMEZONE,
                'option_value' => $request->validated()[OptionKeys::TIMEZONE]
            ]);

        $user->notifications = NotificationResource::collection($user->unreadNotifications);
        $user->options = OptionResource::collection($user->options()->get());

        return $user;
    }

    /**
     * @throws \Exception
     */
    public function updatePassword($request): ?Authenticatable
    {
        $user = auth()->user();
        if (Hash::check($request->validated()['old_password'], $user->password)) {
            $user->update([
                'password' => Hash::make($request->validated()['new_password'])
            ]);

            $user->notifications = NotificationResource::collection($user->unreadNotifications);
            $user->options = OptionResource::collection($user->options()->get());

            return $user;
        } else {
            throw new \Exception(trans('messages.notOldPassword'), 0);
        }
    }

    public function updateSettings($request): ?Authenticatable
    {
        $user = auth()->user();

        $user->options()->whereIn('option_key', [
            OptionKeys::EMAIL_NOTIFICATION,
            OptionKeys::SMS_NOTIFICATION,
            OptionKeys::MESSAGE_NOTIFICATION,
            OptionKeys::TWO_FACTOR_AUTHENTICATION
        ])->forcedelete();

        $user->options()->createMany([
            [
                'option_key' => OptionKeys::EMAIL_NOTIFICATION,
                'option_value' => $request->validated()[OptionKeys::EMAIL_NOTIFICATION]
            ],
            [
                'option_key' => OptionKeys::SMS_NOTIFICATION,
                'option_value' => $request->validated()[OptionKeys::SMS_NOTIFICATION]
            ],
            [
                'option_key' => OptionKeys::MESSAGE_NOTIFICATION,
                'option_value' => $request->validated()[OptionKeys::MESSAGE_NOTIFICATION]
            ],
            [
                'option_key' => OptionKeys::TWO_FACTOR_AUTHENTICATION,
                'option_value' => $request->validated()[OptionKeys::TWO_FACTOR_AUTHENTICATION]
            ],
        ]);

        $user->notifications = NotificationResource::collection($user->unreadNotifications);
        $user->options = OptionResource::collection($user->options()->get());

        return $user;
    }

    public function disableAccount(): array
    {
        $user = auth()->user();

        $user->update([
            'status' => 0
        ]);

        return [];
    }
}
