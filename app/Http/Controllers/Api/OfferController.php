<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Vehicle;
use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfferVehicleResource;
use App\Http\Resources\OfferPropertyResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OfferController extends Controller
{

    public function vehicleOffer(Vehicle $vehicle):  ResourceCollection
    {

        return OfferVehicleResource::collection($vehicle->offers);
    }

    public function propertyOffer(Property $property):  ResourceCollection
    {
        return OfferPropertyResource::collection($property->offers);
    }
}
