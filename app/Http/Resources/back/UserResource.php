<?php

namespace App\Http\Resources\back;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class UserResource extends JsonResource
{
    #[ArrayShape(['name' => "mixed", 'phone_number' => "mixed", 'email' => "mixed", 'roles' => "mixed", 'skill' => "mixed", 'web_site' => "mixed", 'firebase_token' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'roles' => RolesResource::make($this->roles),
            'skill' => $this->skill,
            'web_site' => $this->web_site,
            'firebase_token' => $this->firebase_token,
        ];
    }
}
