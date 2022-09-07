<?php

namespace App\Actions\Api\Auth;

use App\Events\Back\Auth\UserPasswordReset;
use App\Models\Back\Auth\PasswordReset;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ResetPasswordAction
{
    public function updatePassword($phone_number, $password): void
    {
        $user = User::where('phone_number', $phone_number)->update([
            'password' => Hash::make($password),
            'remember_token' => Str::random(60)
        ]);

        event(new UserPasswordReset($user));
    }

    public function checkTokenTime($token, $phone_number)
    {
        return PasswordReset::where([
            'phone_number' => $phone_number,
            'token' => $token,
            ['created_at', '>=', Carbon::now()->subMinutes(5)->toDateTimeString()]
        ])->exists();
    }
}
