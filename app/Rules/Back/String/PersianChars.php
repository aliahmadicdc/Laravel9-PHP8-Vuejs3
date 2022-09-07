<?php

namespace App\Rules\Back\String;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Application;
use Illuminate\Translation\Translator;

class PersianChars implements Rule
{
    public function __construct()
    {
        //
    }

    public function passes($attribute, $value): bool|int
    {
        return preg_match('/^[^\x{600}-\x{6FF}]+$/u', $value);
    }

    public function message(): array|string|Translator|Application|null
    {
        return trans('messages.notPersian');
    }
}
