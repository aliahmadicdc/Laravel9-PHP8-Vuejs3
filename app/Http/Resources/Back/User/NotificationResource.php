<?php

namespace App\Http\Resources\Back\User;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class NotificationResource extends JsonResource
{

    #[ArrayShape(['data' => "mixed", 'read_at' => "mixed", 'updated_at' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'data' => $this->data,
            'read_at' => $this->read_at,
            'updated_at' => jdate($this->updated_at)->format('H:m:s Y-m-d')
        ];
    }
}
