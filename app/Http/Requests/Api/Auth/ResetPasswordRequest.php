<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\ArrayShape;

class ResetPasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['token' => "array", 'phone_number' => "array", 'password' => "array"])]
    public function rules(): array
    {
        return [
            'token' => ['required', Rule::exists('password_resets', 'token')],
            'phone_number' => ['required', 'string', 'regex:/(09)[0-9]{9}/', 'size:11', Rule::exists('password_resets', 'phone_number')],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],

        ];
    }
}
