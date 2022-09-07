<?php

namespace App\Http\Traits\Api\Auth;

use App\Models\Back\Auth\PasswordReset;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use function route;
use function trans;

trait GeneratePasswordResetLinkTrait
{
    public function generateLink($phone_number): string
    {
        $token = $this->generateVerificationToken();
        $this->saveVerificationToken($token, $phone_number);

        return trans('messages.forResetPasswordClick') .
            ' ' . url('/auth/passwordReset/') . $phone_number
            . '/' . $token;
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
