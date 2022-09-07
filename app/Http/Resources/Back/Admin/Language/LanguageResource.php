<?php

namespace App\Http\Resources\Back\Admin\Language;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class LanguageResource extends JsonResource
{
    #[ArrayShape(['title' => "mixed", 'value' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'title' => $this->title,
            'value' => $this->value,
        ];
    }
}
