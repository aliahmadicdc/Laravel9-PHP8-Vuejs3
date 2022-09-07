<?php

namespace App\Http\Resources\Back\User;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class RolesResource extends JsonResource
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
