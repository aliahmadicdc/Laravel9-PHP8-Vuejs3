<?php

namespace App\Http\Traits\back;

use App\Models\back\PasswordReset;
use Illuminate\Support\Str;

trait GeneratePasswordResetLinkTrait
{
    public function generateLink($phone_number): string
    {
        $token = $this->generateVerificationToken();
        $this->saveVerificationToken($token, $phone_number);

        return trans('messages.forResetPasswordClick') . ' ' . route('password.reset', $token) . '?phone_number=' . $phone_number;
    }

    private function generateVerificationToken(): string
    {
        return Str::random(50);
    }

    private function saveVerificationToken($token, $phone_number): void
    {
        PasswordReset::create([
            'phone_number' => $phone_number,
            'token' => $token
        ]);
    }
}
