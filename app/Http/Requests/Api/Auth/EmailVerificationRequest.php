<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class EmailVerificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['email' => "array", 'token' => "array"])]
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', Rule::exists('users', 'email')->where('status', 1)],
            'token' => ['required', 'string', Rule::exists('email_verifies', 'token')->where('status', 1)],
        ];
    }
}
