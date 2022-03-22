<?php

namespace App\Http\Traits\back;

use App\Events\back\RequestResetPassword;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

trait                                                                                       ResetPasswordWithPhoneNumberTrait
{
    public function showLinkRequestForm(): View
    {
        return view('auth.forgetPassword');
    }

    public function sendResetLinkEmail(Request $request): JsonResponse
    {
        $this->validatePhoneNumber($request);

        $user = User::where('phone_number', $request->phone_number)->first();

        event(new RequestResetPassword($user));

        return response()->json([]);
    }

    protected function validatePhoneNumber(Request $request): void
    {
        $request->validate([
            'phone_number' => [
                'required',
                'string',
                'regex:/(09)[0-9]{9}/',
                'size:11',
                Rule::exists('users', 'phone_number')
            ]
        ]);
    }
}
