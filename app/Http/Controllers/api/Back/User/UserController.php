<?php

namespace App\Http\Controllers\Api\Back\User;

use App\Actions\Api\Back\Admin\General\GeneralAction;
use App\Actions\Api\Back\User\UserAction;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Back\User\Profile\AccountInformationRequest;
use App\Http\Requests\Api\Back\User\Profile\PasswordRequest;
use App\Http\Requests\Api\Back\User\Profile\PersonalInformationRequest;
use App\Http\Requests\Api\Back\User\Profile\SettingsRequest;
use App\Http\Requests\Api\Back\User\Profile\UpdateImageRequest;
use App\Http\Resources\Back\User\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class UserController extends BaseApiController
{
    public function index(UserAction $userAction, GeneralAction $generalAction): JsonResponse
    {
        return $this->apiSuccessResponse([
            'user' => UserResource::make($userAction->getAuthUser()),
            'options' => $generalAction->getMainOptions()
        ]);
    }

    public function notifications(UserAction $userAction): JsonResponse
    {
        return $this->apiSuccessResponse($userAction->getAuthUserNotifications());
    }

    public function updatePersonalInformation(PersonalInformationRequest $request, UserAction $userAction): JsonResponse
    {
        try {
            return $this->apiSuccessResponse(UserResource::make($userAction->updatePersonalInformation($request)), trans('messages.successUpdate'));
        } catch (\Exception $exception) {
            return $this->apiErrorResponse(trans('messages.errorConnection'), 503);
        }
    }

    public function updateProfileImage(UpdateImageRequest $request, UserAction $userAction): JsonResponse
    {
        try {
            return $this->apiSuccessResponse(UserResource::make($userAction->updateProfileImage($request)), trans('messages.successUpdate'));
        } catch (\Exception $exception) {
            if ($exception->getCode() === 0)
                return $this->apiErrorResponse($exception->getMessage());
            else
                return $this->apiErrorResponse(trans('messages.errorConnection'), 503);
        }
    }

    public function deleteProfileImage(UserAction $userAction): JsonResponse
    {
        try {
            return $this->apiSuccessResponse(UserResource::make($userAction->deleteProfileImage()), trans('messages.successUpdate'));
        } catch (\Exception $exception) {
            return $this->apiErrorResponse(trans('messages.errorConnection'), 503);
        }
    }

    public function updateAccountInformation(AccountInformationRequest $request, UserAction $userAction): JsonResponse
    {
        try {
            return $this->apiSuccessResponse(UserResource::make($userAction->updateAccountInformation($request)), trans('messages.successUpdate'));
        } catch (\Exception $exception) {
            return $this->apiErrorResponse(trans('messages.errorConnection'), 503);
        }
    }

    public function updatePassword(PasswordRequest $request, UserAction $userAction): JsonResponse
    {
        try {
            return $this->apiSuccessResponse(UserResource::make($userAction->updatePassword($request)), trans('messages.successUpdate'));
        } catch (\Exception $exception) {
            if ($exception->getCode() === 0)
                return $this->apiErrorResponse($exception->getMessage());
            else
                return $this->apiErrorResponse(trans('messages.errorConnection'), 503);
        }
    }

    public function updateSettings(SettingsRequest $request, UserAction $userAction): JsonResponse
    {
        try {
            return $this->apiSuccessResponse(UserResource::make($userAction->updateSettings($request)), trans('messages.successUpdate'));
        } catch (\Exception $exception) {
            return $this->apiErrorResponse(trans('messages.errorConnection'), 503);
        }
    }

    public function disableAccount(UserAction $userAction): JsonResponse
    {
        try {
            return $this->apiSuccessResponse(UserResource::make($userAction->disableAccount()), trans('messages.successUpdate'));
        } catch (\Exception $exception) {
            return $this->apiErrorResponse(trans('messages.errorConnection'), 503);
        }
    }
}
