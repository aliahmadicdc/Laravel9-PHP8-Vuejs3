<?php

namespace App\Http\Requests\Api\Back\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class PersonalInformationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['name' => "string[]"])]
    public function rules(): array
    {
        return [
            'name' => ['required', 'string']
        ];
    }
}
