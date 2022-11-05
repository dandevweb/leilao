<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\Vehicle;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleResource;
use App\Http\Requests\Admin\VehicleRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VehicleController extends Controller
{
    public function index(): ResourceCollection
    {
        return VehicleResource::collection(Vehicle::all());
    }

    public function store(VehicleRequest $vehicleRequest): VehicleResource
    {
        $vehicleCreated = Vehicle::create($vehicleRequest->validated());

        return new VehicleResource($vehicleCreated);
    }

    public function show(Vehicle $vehicle):  VehicleResource
    {
        return new VehicleResource($vehicle);
    }

    public function update(VehicleRequest $vehicleRequest, Vehicle $vehicle): VehicleResource
    {
        $vehicle->fill($vehicleRequest->validated());
        $vehicle->save();

        return new VehicleResource($vehicle->fresh());
    }

    public function destroy(Vehicle $vehicle): void
    {
        $vehicle->deleteOrFail();
    }
}
