<?php

namespace App\Http\Requests\Api\Back\User\Profile;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class UpdateImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['image' => "string"])]
    public function rules(): array
    {
        return [
            'image'=>'nullable|image|mimes:jpeg,jpg|max:1024'
        ];
    }
}
