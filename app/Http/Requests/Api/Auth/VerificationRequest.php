<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\ArrayShape;

class VerificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['code' => "array"])]
    public function rules(): array
    {
        return [
            'code' => ['required', 'numeric', Rule::exists('verify_codes', 'code')],
        ];
    }
}
