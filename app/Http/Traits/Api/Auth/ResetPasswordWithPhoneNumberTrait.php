<?php

namespace App\Http\Traits\Api\Auth;

use App\Actions\Api\Auth\ForgotPasswordAction;
use App\Events\Back\Auth\RequestResetPassword;
use App\Http\Requests\Api\Auth\ForgotPasswordRequest;
use Illuminate\Http\JsonResponse;
use function event;

trait ResetPasswordWithPhoneNumberTrait
{
    public function sendResetLinkPhoneNumber(ForgotPasswordRequest $request): JsonResponse
    {
        event(new RequestResetPassword((new ForgotPasswordAction())->getUser($request)));

        return $this->apiSuccessResponse();
    }
}
