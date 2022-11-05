<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'property' => new PropertyResource($this->property),
            'vehicle' => new VehicleResource($this->vehicle),
            'client' => new ClientResource($this->client),
            'created_at' => $this->created_at,
        ];
    }
}