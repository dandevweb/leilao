<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferVehicleResource extends JsonResource
{
    public function toArray($request): array
    {

        return [
            'vehicle_id' => $this->vehicle->id,
            'vehicle_description' => $this->vehicle->description,
            'client_name' => $this->client->name,
            'client_document' => $this->client->document,
            'offer_id' => $this->id,
            'offer' => $this->price,
            'created_at' =>$this->created_at
        ];
    }
}
