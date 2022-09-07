<?php

namespace App\Http\Resources\Back\User;

use App\Http\Resources\Back\Global\Image\ImageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'user_id' => $this->user_id,
            'username' => $this->username,
            'image' => $this->image ? ImageResource::make($this->image) : null,
            'phone_number' => $this->phone_number,
            'phone_number_verified_at' => $this->phone_number_verified_at,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'roles' => $this->roles ? RolesResource::collection($this->roles) : null,
            'options' => $this->options ? OptionResource::collection($this->options) : null,
            'notifications' => $this->notifications ?? null,
            'firebase_token' => $this->firebase_token
        ];
    }
}
