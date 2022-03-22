<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class BaseApiController extends Controller
{
    public function apiSuccessResponse($data = null, $message = null, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'result' => true,
            'message' => $message != null ? $message : trans('messages.success'),
            'data' => $data,
        ], $statusCode);
    }

    public function apiErrorResponse($message = null, $errorCode = 403, $data = null): JsonResponse
    {
        return response()->json([
            'result' => false,
            'message' => $message != null ? $message : trans('messages.errorConnection'),
            'data' => $data,
        ], $errorCode);
    }
}
