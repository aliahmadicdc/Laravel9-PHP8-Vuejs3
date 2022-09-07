<?php

namespace App\Actions\Api\Auth;

use App\Models\User;

class ForgotPasswordAction
{
    public function getUser($request)
    {
        return User::where('phone_number', $request->validated('phone_number'))->first();
    }
}
