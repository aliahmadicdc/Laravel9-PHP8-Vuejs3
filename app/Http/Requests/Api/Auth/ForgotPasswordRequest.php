<?php

namespace App\Http\Requests\Api\Auth;

use App\Rules\Back\Google\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class ForgotPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['phone_number' => "array", recaptchaResponse => "array"])]
    public function rules(): array
    {
        return [
            'phone_number' => ['required', 'string', 'regex:/(09)[0-9]{9}/', 'size:11', Rule::exists('users', 'phone_number')],
            recaptchaResponse => ['required', new RecaptchaRule()]
        ];
    }
}
