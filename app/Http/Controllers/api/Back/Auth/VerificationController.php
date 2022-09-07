<?php

namespace App\Http\Controllers\Api\Back\Auth;

use App\Actions\Api\Auth\LoginAction;
use App\Actions\Api\Auth\VerificationAction;
use App\Events\Back\Auth\ResendEmailVerification;
use App\Events\Back\Auth\ResendSmsVerification;
use App\Events\Back\Auth\TwoFactorAuthentication;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Auth\EmailVerificationRequest;
use App\Http\Requests\Api\Auth\SendTwoFactorCodeRequest;
use App\Http\Requests\Api\Auth\TwoFactorRequest;
use App\Http\Requests\Api\Auth\VerificationRequest;
use App\Http\Resources\Back\User\NotificationResource;
use App\Http\Resources\Back\User\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function auth;
use function event;

class VerificationController extends BaseApiController
{
    public function resendTwoStepCode(SendTwoFactorCodeRequest $request, LoginAction $loginAction): JsonResponse
    {
        if ($loginAction->checkUserPassword($request))
            event(new TwoFactorAuthentication($request->validated('phone_number')));
        else
            return $this->apiErrorResponse(trans('messages.wrongUserAndPassword'));

        return $this->apiSuccessResponse(null, null, 202);
    }

    public function checkTwoStepCode(TwoFactorRequest $request, VerificationAction $verificationAction, LoginAction $loginAction): JsonResponse
    {
        if (!$verificationAction->checkTwoFactorCodeTime($request->validated('code'), $request->validated('phone_number')))
            return $this->apiErrorResponse(trans('messages.invalidCodeDate'));

        if ($verificationAction->checkTwoFactorCode($request->validated('phone_number'), $request->validated('code'))) {

            if ($loginAction->login($request->validated('phone_number'),$request->validated('password'))) {
                $user = $loginAction->handleLogin();

                $cookie = cookie('access-token', $user->api_token, 20);

                $res = $this->apiSuccessResponse(UserResource::make($user), trans('messages.successLogin'));
                $res->withCookie($cookie);

                return $res;
            } else {
                return $this->apiErrorResponse(trans('messages.wrongUserAndPassword'));
            }
        } else {
            return $this->apiErrorResponse(trans('messages.invalidCode'));
        }
    }

    public function resendCode(): JsonResponse
    {
        $user = auth()->user();

        if ($user->phone_number_verified_at != null)
            return $this->apiErrorResponse(trans('messages.alreadyVerify'));

        event(new ResendSmsVerification($user));

        return $this->apiSuccessResponse(null, null, 202);
    }

    public function checkCode(VerificationRequest $request, VerificationAction $verificationAction): JsonResponse
    {
        $user = auth()->user();

        if ($user->phone_number_verified_at != null)
            return $this->apiErrorResponse(trans('messages.alreadyVerify'));

        if (!$verificationAction->checkCodeTime($request->validated()['code'], $user))
            return $this->apiErrorResponse(trans('messages.invalidCodeDate'));

        if ($verificationAction->checkPhoneNumberCode($user, $request->validated()['code'])) {
            $result = $verificationAction->updateUserPhoneNumberVerification($user);

            if ($result) {
                $user->notifications = NotificationResource::collection($user->unreadNotifications);

                return $this->apiSuccessResponse(UserResource::make($user));
            } else
                return $this->apiErrorResponse(trans('messages.errorConnection'));
        } else {
            return $this->apiErrorResponse(trans('messages.invalidCode'));
        }
    }

    public function emailVerifySend(VerificationAction $verificationAction): JsonResponse
    {
        $user = auth()->user();

        if ($user->email_verified_at != null)
            return $this->apiErrorResponse(trans('messages.emailAlreadyVerify'));

        if ($verificationAction->hasEmailToken($user))
            return $this->apiErrorResponse(trans('messages.hasEmailVerify'));

        event(new ResendEmailVerification($user));

        return $this->apiSuccessResponse(null, null, 202);
    }

    public function emailVerifyCheck(EmailVerificationRequest $request, VerificationAction $verificationAction): JsonResponse
    {
        $user = auth()->user();

        if ($user->email_verified_at != null)
            return $this->apiErrorResponse(trans('messages.emailAlreadyVerify'));

        if (!$verificationAction->checkEmailTokenTime($request->validated()['token'], $user))
            return $this->apiErrorResponse(trans('messages.invalidEmailDate'));

        if ($verificationAction->checkEmailToken($user, $request->validated()['token'])) {
            $result = $verificationAction->updateUserEmailVerification($user);

            if ($result) {
                $user->notifications = NotificationResource::collection($user->unreadNotifications);

                return $this->apiSuccessResponse(UserResource::make($user));
            } else {
                return $this->apiErrorResponse(trans('messages.errorConnection'));
            }
        } else {
            return $this->apiErrorResponse(trans('messages.forbiddenEmailVerify'));
        }
    }
}
