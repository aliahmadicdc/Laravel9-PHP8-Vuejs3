<?php

namespace App\Http\Traits\Api\Auth;

use App\Models\Back\Auth\VerifyCode;

trait GenerateVerifyCodeTrait
{
    public function generateCode($user): string
    {
        $code = $this->generateVerificationCode();
        $this->saveVerificationCode($user, $code);

        return $code;
    }

    private function generateVerificationCode(): int
    {
        return mt_rand(111111, 999999);
    }

    private function saveVerificationCode($user, $code): void
    {
        VerifyCode::create([
            'code' => $code,
            'user_id' => $user->id
        ]);
    }
}
