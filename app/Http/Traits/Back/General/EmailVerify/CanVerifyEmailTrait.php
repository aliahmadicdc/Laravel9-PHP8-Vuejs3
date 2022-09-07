<?php

namespace App\Http\Traits\Back\General\EmailVerify;

use Illuminate\Support\Str;

trait CanVerifyEmailTrait
{
    public function createEmailVerificationToken($user): string
    {
        return env('APP_URL') . '/profile/' . $user->phone_number
            . '/accountInformation?email=' . urlencode($user->email)
            . '&token=' . urlencode(($this->createToken($user))->token);
    }

    protected function createToken($user)
    {
        return $user->emailVerifies()->create([
            'email' => $user->email,
            'token' => Str::random(50)
        ]);
    }
}
