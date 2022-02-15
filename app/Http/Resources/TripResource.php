<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mileage' => $this->mileage,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'recoreded_at' => $this->recoreded_at,
        ];
    }
}
