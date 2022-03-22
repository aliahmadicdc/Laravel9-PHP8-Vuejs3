<?php

namespace App\Http\Traits\back;

use App\Models\back\VerifyCode;

trait GenerateVerifyCodeTrait
{
    public function generateCode($user): string
    {
        $code = $this->generateVerificationCode();
        $this->saveVerificationCode($user, $code);

        return trans('messages.yourVerificationCodeIs') . ' ' . $code;
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
