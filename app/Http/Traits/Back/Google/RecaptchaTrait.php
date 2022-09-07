<?php

namespace App\Http\Traits\Back\Google;

use Illuminate\Support\Facades\Http;

trait RecaptchaTrait
{
    public string $recaptchaResponse = 'recaptchaResponse';
    public string $recaptchaVerifyUrl = 'https://www.google.com/recaptcha/api/siteverify';

    public function check($token): bool
    {
        return $this->checkToken($token);
    }

    protected function checkToken($token): bool
    {
        try {
            $response = Http::post($this->recaptchaVerifyUrl, [
                'secret' => env('RECAPTCHA_SECRET_KEY'),
                'response' => $token
            ]);

            if (!$response->success)
                return false;
        } catch (\Exception $exception) {
            return false;
        }

        return true;
    }
}
