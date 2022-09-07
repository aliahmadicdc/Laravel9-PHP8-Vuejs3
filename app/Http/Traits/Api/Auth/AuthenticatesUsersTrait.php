<?php

namespace App\Http\Traits\Api\Auth;

use App\Actions\Api\Auth\LoginAction;
use App\Events\Back\Auth\TwoFactorAuthentication;
use App\Http\Enums\Api\Back\User\OptionKeys;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Resources\Back\User\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use function cookie;
use function trans;

trait AuthenticatesUsersTrait
{
    public function login(LoginRequest $request): JsonResponse
    {
        $loginAction = new LoginAction();

        $user = $loginAction->getUser($request);

        if ($user->hasOption(OptionKeys::TWO_FACTOR_AUTHENTICATION)) {
            if ($loginAction->checkPassword($request->validated('password'), $user->password)) {

                event(new TwoFactorAuthentication($request->validated('phone_number')));

                return $this->apiSuccessResponse(null, null, 204);
            } else {
                return $this->sendFailedLoginResponse();
            }
        } else {

            if ($loginAction->login($request->validated('phone_number'), $request->validated('password')))
                return $this->sendLoginResponse();
            else
                return $this->sendFailedLoginResponse();
        }
    }

    protected function sendLoginResponse(): JsonResponse
    {
        $loginAction = new LoginAction();

        $user = $loginAction->handleLogin();

        $cookie = cookie('access-token', $user->api_token, 20);

        $res = $this->apiSuccessResponse(UserResource::make($user), trans('messages.successLogin'));
        $res->withCookie($cookie);

        return $res;
    }

    protected function sendFailedLoginResponse(): JsonResponse
    {
        return $this->apiErrorResponse(trans('messages.wrongUserAndPassword'));
    }

    public function logout(Request $request): JsonResponse
    {
        $cookie = Cookie::forget('access-token');

        if (Auth::check()) {
            $tokens = Auth::user()->tokens;
            foreach ($tokens as $token) {
                $token->revoke();
            }
        }

        return ($this->apiErrorResponse(null, 204))->withCookie($cookie);
    }
}
