<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'increment' => $this->increment,
            'last_offer' => $this->lastOffer->first()->price ?? $this->price,
            'stored_in' => $this->stored_in,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'images' => ImagesResource::collection($this->images),
            'auctions' => new AuctionResource($this->auction)
        ];
    }
}