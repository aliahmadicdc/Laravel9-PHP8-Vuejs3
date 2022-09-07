<?php

namespace App\Http\Traits\Api\Auth;

use App\Models\Back\Auth\TwoFactorAuthenticationCode;

trait GenerateTwoFactorAuthenticationCodeTrait
{
    public function generateCode($phone_number): string
    {
        $code = $this->generateAuthenticationCode();
        $this->saveAuthenticationCode($phone_number, $code);

        return $code;
    }

    private function generateAuthenticationCode(): int
    {
        return mt_rand(111111, 999999);
    }

    private function saveAuthenticationCode($phone_number, $code): void
    {
        TwoFactorAuthenticationCode::create([
            'code' => $code,
            'phone_number' => $phone_number
        ]);
    }
}
