<?php

declare(strict_types=1);

namespace App\Services\Api;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ClientResource;
use App\Exceptions\LoginInvalidException;
use App\Exceptions\OfferInvalidException;
use App\Models\Offer;
use App\Models\Property;
use App\Models\Vehicle;

class ClientService
{

    public function register(array $inputs): Client
    {
        return Client::create([
            'name' => $inputs['name'],
            'document' => $inputs['document'],
            'email' => $inputs['email'],
            'phone' => $inputs['phone'],
            'password' => bcrypt($inputs['password'])
        ]);
    }

    public function login(string $email, string $password): ClientResource
    {

        $client = Client::where('email', $email)->first();
        if (!Hash::check($password, $client->password)) {
            throw new LoginInvalidException();
        }

        $token = Auth::guard('client')->fromUser($client);

        return (new ClientResource($client))->additional([
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ]);
    }

    public function makeOffer(array $inputs): Offer
    {
        $vehicleId = null;
        $propertyId = isset($inputs['property_id']) ? $inputs['property_id'] : null;
        $price = $inputs['price'];

        if (!$propertyId) {
            $vehicleId = isset($inputs['vehicle_id']) ? $inputs['vehicle_id'] : null;

            $vehicle = Vehicle::whereId($vehicleId)->select('price', 'increment')->first();

            $lastOffer = $this->lastOffer($vehicleId, 'vehicle_id');

            if (!$this->validateOffer($vehicle, $price, $lastOffer)) {
                throw new OfferInvalidException();
            }
        } else {
            $property = Property::whereId($propertyId)->select('price', 'increment')->first();

            $lastOffer = $this->lastOffer($propertyId, 'property_id');

            if (!$this->validateOffer($property, $price, $lastOffer)) {
                throw new OfferInvalidException();
            }
        }

        $data = [
            'property_id' => $propertyId,
            'vehicle_id' => $vehicleId,
            'client_id' => $inputs['client_id'],
            'price' => $price,
        ];

        return Offer::create($data);
    }

    private function lastOffer(int $productId, string $column): float|null
    {
        $lastOfferPrice = Offer::where($column, $productId)
                ->select('price')
                ->latest()
                ->first();

        return $lastOfferPrice ? (float)$lastOfferPrice->price : null;
    }

    private function validateOffer(Vehicle|Property $product, float $offer, ?float $lastOffer): bool
    {
        $referencePrice = $lastOffer ?? $product->price;

        $isIncrementable = ($offer - $referencePrice) % $product->increment === 0;

        return $offer > $referencePrice && $isIncrementable;
    }


}