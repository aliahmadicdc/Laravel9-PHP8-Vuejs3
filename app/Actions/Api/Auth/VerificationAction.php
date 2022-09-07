<?php

namespace App\Actions\Api\Auth;

use App\Models\Back\Auth\TwoFactorAuthenticationCode;
use Carbon\Carbon;

class VerificationAction
{
    public function checkCodeTime($code, $user)
    {
        return $user->verifyCodes()->where([
            'code' => $code,
            ['created_at', '>=', Carbon::now()->subMinutes(3)->toDateTimeString()]
        ])->exists();
    }

    public function checkTwoFactorCodeTime($code, $phone_number)
    {
        return TwoFactorAuthenticationCode::where([
            'code' => $code,
            'phone_number' => $phone_number,
            ['created_at', '>=', Carbon::now()->subMinutes(3)->toDateTimeString()]
        ])->exists();
    }

    public function checkEmailTokenTime($token, $user)
    {
        return $user->emailVerifies()->where([
            'email' => $user->email,
            'token' => $token,
            ['created_at', '>=', Carbon::now()->subMinutes(3)->toDateTimeString()]
        ])->exists();
    }

    public function checkEmailToken($user, $token): bool
    {
        return $user->emailVerifies->last()->token == urldecode($token);
    }

    public function hasEmailToken($user): bool
    {
        return $user->emailVerifies()->where([
            'user_id' => $user->id,
            'email' => $user->email,
            ['created_at', '>=', Carbon::now()->subMinutes(3)->toDateTimeString()]
        ])->exists();
    }

    public function checkPhoneNumberCode($user, $code): bool
    {
        return $user->verifyCodes()->get()->last()->code == $code;
    }

    public function checkTwoFactorCode($phone_number, $code): bool
    {
        return (TwoFactorAuthenticationCode::where([
            'code' => $code,
            'phone_number' => $phone_number,
            ['created_at', '>=', Carbon::now()->subMinutes(3)->toDateTimeString()]
        ])->first())->code = $code;
    }

    public function updateUserEmailVerification($user): bool
    {
        try {
            $user->update([
                'email_verified_at' => Carbon::parse(time())->format('Y-m-d H:i:s'),
            ]);
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }

    public function updateUserPhoneNumberVerification($user): bool
    {
        try {
            $user->update([
                'phone_number_verified_at' => Carbon::parse(time())->format('Y-m-d H:i:s'),
            ]);
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }
}
