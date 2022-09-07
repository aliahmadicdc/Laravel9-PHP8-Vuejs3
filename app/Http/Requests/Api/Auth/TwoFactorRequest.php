<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\ArrayShape;

class TwoFactorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['code' => "array", 'phone_number' => "array", 'password' => "array"])]
    public function rules(): array
    {
        return [
            'code' => ['required', 'numeric', Rule::exists('two_factor_authentication_codes', 'code')],
            'phone_number' => ['required', 'string', 'regex:/(09)[0-9]{9}/', 'size:11', Rule::exists('users', 'phone_number')->where('status',1)],
            'password' => ['required', 'string', Password::min(8)->numbers()->letters()],
        ];
    }
}
