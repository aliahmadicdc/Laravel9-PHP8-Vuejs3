<?php

namespace App\Http\Requests\Api\Back\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
use JetBrains\PhpStorm\ArrayShape;

class PasswordRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['old_password' => "array", 'new_password' => "array"])]
    public function rules(): array
    {
        return [
            'old_password' => ['required', 'string', Password::min(8)->numbers()->letters()],
            'new_password' => ['required', 'string', Password::min(8)->numbers()->letters(), 'confirmed'],
        ];
    }
}
