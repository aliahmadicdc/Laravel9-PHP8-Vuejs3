<?php

namespace App\Http\Requests\Api\Back\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class AccountInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['username' => "string", 'email' => "array", 'language' => "array", 'timezone' => "array"])]
    public function rules(): array
    {
        return [
            'username' => 'required|string|unique:users,username,' . $this->username . ',username',
            'email' => 'nullable|email|unique:users,email,' . $this->email . ',email',
            'language' => ['required', 'string', Rule::exists('languages', 'value')],
            'timezone' => ['required', 'numeric', Rule::exists('timezones', 'id')],
        ];
    }
}
