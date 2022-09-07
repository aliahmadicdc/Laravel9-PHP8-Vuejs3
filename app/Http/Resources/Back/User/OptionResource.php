<?php

namespace App\Http\Resources\Back\User;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class OptionResource extends JsonResource
{
    #[ArrayShape(['option_key' => "mixed", 'option_value' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'option_key' => $this->option_key,
            'option_value' => $this->option_value,
        ];
    }
}
