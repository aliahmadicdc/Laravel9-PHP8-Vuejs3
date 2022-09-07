<?php

namespace App\Rules\Back\Google;

use App\Http\Traits\Back\Google\RecaptchaTrait;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Application;
use Illuminate\Translation\Translator;

class RecaptchaRule implements Rule
{
    use RecaptchaTrait;

    public function __construct()
    {
        //
    }

    public function passes($attribute, $value): bool
    {
        return $this->check($value);
    }

    public function message(): array|string|Translator|Application|null
    {
        return trans('messages.recaptchaError');
    }
}
