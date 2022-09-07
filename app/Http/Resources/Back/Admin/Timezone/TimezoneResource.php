<?php

namespace App\Http\Resources\Back\Admin\Timezone;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class TimezoneResource extends JsonResource
{
    #[ArrayShape(['id' => "mixed", 'zone_name' => "mixed", 'country_code' => "mixed", 'abbreviation' => "mixed", 'time_start' => "mixed", 'gmt_offset' => "mixed", 'dst' => "mixed"])]
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'zone_name' => $this->zone_name,
            'country_code' => $this->country_code,
            'abbreviation' => $this->abbreviation,
            'time_start' => $this->time_start,
            'gmt_offset' => $this->gmt_offset,
            'dst' => $this->dst,
        ];
    }
}
