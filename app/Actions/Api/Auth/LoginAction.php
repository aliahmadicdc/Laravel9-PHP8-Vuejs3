<?php

namespace App\Actions\Api\Auth;

use App\Events\Back\Auth\AdminLogin;
use App\Events\Back\Auth\ResendSmsVerification;
use App\Http\Resources\Back\User\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginAction
{
    public function login($phone_number, $password): bool
    {
        return Auth::attempt([
            'phone_number' => $phone_number,
            'password' => $password
        ]);
    }

    public function getUser($request)
    {
        return User::where('phone_number', $request->validated('phone_number'))->first();
    }

    public function handleLogin(): UserResource
    {
        $user = auth()->user();

        $user = $this->createToken($user);

        if ($user->isAdmin())
            event(new AdminLogin($user));

        if ($user->phone_number_verified_at == null)
            event(new ResendSmsVerification($user));

        return UserResource::make($user);
    }

    protected function createToken($user)
    {
        $user->api_token = $user->createToken('Dideban Client')->accessToken;
        $user->notifications = $user->unreadNotifications()->get();

        return $user;
    }

    public function checkUserPassword($request): bool
    {
        return Hash::check(
            $request->validated('password'),
            User::where('phone_number', $request->validated('phone_number'))->first()->password
        );
    }

    public function checkPassword($password, $userPassword): bool
    {
        return Hash::check($password, $userPassword);
    }
}
