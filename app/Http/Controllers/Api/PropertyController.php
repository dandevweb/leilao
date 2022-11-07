<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PropertyRequest;
use App\Http\Resources\PropertyResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyController extends Controller
{
    public function index(): ResourceCollection
    {
        return PropertyResource::collection(Property::all());
    }

    public function store(PropertyRequest $propertyRequest): PropertyResource
    {
        $propertyCreated = Property::create($propertyRequest->validated());

        return new PropertyResource($propertyCreated);
    }

    public function show(Property $property):  PropertyResource
    {
        return new PropertyResource($property);
    }

    public function update(PropertyRequest $propertyRequest, Property $property): PropertyResource
    {
        $property->fill($propertyRequest->validated());
        $property->save();

        return new PropertyResource($property->fresh());
    }

    public function destroy(Property $property): void
    {
        $property->deleteOrFail();
    }
}
