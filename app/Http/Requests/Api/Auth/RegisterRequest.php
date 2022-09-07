<?php

namespace App\Http\Requests\Api\Auth;

use App\Rules\Back\Google\RecaptchaRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\ArrayShape;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['phone_number' => "string[]", 'password' => "array", 'agree' => "string", recaptchaResponse => "array"])]
    public function rules(): array
    {
        return [
            'phone_number' => ['required', 'string', 'regex:/(09)[0-9]{9}/', 'size:11', 'unique:users'],
            'password' => ['required', 'string', Password::min(8)->numbers()->letters(), 'confirmed'],
            'agree' => 'required',
            //recaptchaResponse => ['required', new RecaptchaRule()]
        ];
    }
}
