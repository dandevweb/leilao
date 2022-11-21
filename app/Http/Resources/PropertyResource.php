<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'price' => $this->price,
            'increment' => $this->increment,
            'last_offer' => $this->lastOffer->first()->price ?? $this->price,
            'category' => $this->category,
            'type' => $this->type,
            'description' => $this->description,
            'area_total' => $this->area_total,
            'area_util' => $this->area_util,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'images' => ImagesResource::collection($this->images),
            'auctions' => new AuctionResource($this->auction)
        ];
    }
}