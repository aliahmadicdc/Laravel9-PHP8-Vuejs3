<?php

namespace App\Http\Requests\Back\Global\Image;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use JetBrains\PhpStorm\ArrayShape;

class DownloadImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    #[ArrayShape(['url' => "string[]", 'privateToken' => "array"])]
    public function rules(): array
    {
        return [
            'url' => ['required', 'string'],
            'privateToken' => [
                'required',
                'string',
                Rule::exists('private_tokens', 'token')->where('seen')
            ],
        ];
    }
}
