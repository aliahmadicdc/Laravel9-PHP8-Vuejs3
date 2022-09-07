<?php

namespace App\Http\Resources\Back\Global\Image;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class ImageResource extends JsonResource
{
    #[ArrayShape(['id' => "mixed", 'name' => "mixed", 'alt' => "mixed", 'directory' => "mixed", 'thumbnail_sub_directory' => "mixed", 'upload_type' => "mixed", 'image_full_path' => "mixed", 'thumbnail_full_path' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'alt' => $this->alt,
            'directory' => $this->directory,
            'thumbnail_sub_directory' => $this->thumbnail_sub_directory,
            'upload_type' => $this->upload_type,
            'image_full_path' => $this->image_full_path,
            'thumbnail_full_path' => $this->thumbnail_full_path
        ];
    }
}
