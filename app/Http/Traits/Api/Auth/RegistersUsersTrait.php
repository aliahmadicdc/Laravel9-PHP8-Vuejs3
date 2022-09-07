<?php

namespace App\Http\Traits\Api\Auth;

use App\Actions\Api\Auth\LoginAction;
use App\Actions\Api\Auth\RegisterAction;
use App\Events\Back\Auth\NewRegistered;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Resources\Back\User\UserResource;
use Illuminate\Http\JsonResponse;
use function auth;
use function cookie;
use function trans;

trait RegistersUsersTrait
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $registerAction = new RegisterAction();
        $loginAction = new LoginAction();

        $user = $registerAction->createUser($request->validated());

        event(new NewRegistered($user));

        if ($loginAction->login($request->validated('phone_number'), $request->validated('password'))) {
            $user = auth()->user();
            $user = $loginAction->createToken($user);

            $cookie = cookie('access-token', $user->api_token, 20);

            $res = $this->apiSuccessResponse(UserResource::make($user), trans('messages.successRegister'));
            $res->withCookie($cookie);

            return $res;
        }

        return $this->apiErrorResponse(trans('messages.errorConnection'));
    }
}
