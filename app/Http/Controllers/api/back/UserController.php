<?php

namespace App\Http\Controllers\api\back;

use App\Actions\api\back\UserAction;
use App\Http\Controllers\api\BaseApiController;
use App\Http\Resources\back\UserResource;
use Illuminate\Http\JsonResponse;

class UserController extends BaseApiController
{
    public function index(UserAction $userAction): JsonResponse
    {
        return $this->apiSuccessResponse(UserResource::make($userAction->getAuthUser()));
    }
}
