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
            'category' => $this->category,
            'type' => $this->type,
            'description' => $this->description,
            'area_total' => $this->area_total,
            'area_util' => $this->area_util,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'auctions' => new AuctionResource($this->auction)
        ];
    }
}