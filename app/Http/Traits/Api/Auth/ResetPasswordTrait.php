<?php

namespace App\Http\Traits\Api\Auth;

use App\Actions\Api\Auth\ResetPasswordAction;
use App\Http\Requests\Api\Auth\ConfirmResetPasswordRequest;
use App\Http\Requests\Api\Auth\ResetPasswordRequest;
use Illuminate\Http\JsonResponse;

trait ResetPasswordTrait
{
    public function reset(ResetPasswordRequest $request): JsonResponse
    {
        $resetPasswordAction = new ResetPasswordAction();

        if (!$resetPasswordAction->checkTokenTime($request->validated('token'), $request->validated('phone_number')))
            return $this->apiErrorResponse();

        $resetPasswordAction->updatePassword($request->validated('phone_number'), $request->validated('password'));

        return $this->apiSuccessResponse(null, null, 201);
    }

    public function confirm(ConfirmResetPasswordRequest $request): JsonResponse
    {
        $resetPasswordAction = new ResetPasswordAction();

        if (!$resetPasswordAction->checkTokenTime($request->validated('token'), $request->validated('phone_number')))
            return $this->apiErrorResponse();

        return $this->apiSuccessResponse();
    }
}
