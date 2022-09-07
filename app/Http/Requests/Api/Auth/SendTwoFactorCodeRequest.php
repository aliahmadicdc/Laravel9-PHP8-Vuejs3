<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\ArrayShape;

class SendTwoFactorCodeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['phone_number' => "array", 'password' => "array"])]
    public function rules(): array
    {
        return [
            'phone_number' => ['required', 'string', 'regex:/(09)[0-9]{9}/', 'size:11', Rule::exists('users', 'phone_number')->where('status', 1)],
            'password' => ['required', 'string', Password::min(8)->numbers()->letters()],
        ];
    }
}
