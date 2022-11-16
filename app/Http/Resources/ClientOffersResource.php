<?php

namespace App\Http\Resources;

use App\Models\Property;
use App\Models\Vehicle;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientOffersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $propertyId = $this->property_id ?? null;

        $data = [
            'id' => $this->id,
            'price' => $this->price,
            'date' => $this->created_at,
        ];

        if ($propertyId) {
            $property = Property::find($propertyId);
            $propertyDescription =
                ucfirst($property->type) . ' ' . $property->category .
                ' em ' . $property->city . ' - ' .  $property->state;

            $auctionEnd = date('Y-m-d', strtotime($property->auction->date . '+ 10 days'));

            $data['property_id'] = $propertyId;
            $data['property'] = $propertyDescription;
            $data['auctionEndDate'] = $auctionEnd;
        }

        if ($this->vehicle_id) {
            $vehicle = Vehicle::find($this->vehicle_id);
            $auctionEnd = date('Y-m-d', strtotime($vehicle->auction->date . '+ 10 days'));
            $data['vehicle_id'] = $this->vehicle_id;
            $data['vehicle'] = $this->vehicle_id ? $vehicle->description : null;
            $data['auctionEndDate'] = $auctionEnd;
        }

        return $data;
    }
}