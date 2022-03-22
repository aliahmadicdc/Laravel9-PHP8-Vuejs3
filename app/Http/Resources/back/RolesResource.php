<?php

namespace App\Http\Resources\back;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class RolesResource extends JsonResource
{
    #[ArrayShape(['title' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'title' => $this[0]->title
        ];
    }
}
