<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferPropertyResource extends JsonResource
{
    public function toArray($request): array
    {

        return [
            'property_id' => $this->property->id,
            'property_description' => "{$this->property->type} em {$this->property->city}-{$this->property->state}",
            'client_name' => $this->client->name,
            'client_document' => $this->client->document,
            'offer_id' => $this->id,
            'offer' => $this->price,
            'created_at' =>$this->created_at
        ];
    }
}