<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Services\Api\ClientService;
use App\Http\Controllers\Controller;
use App\Http\Resources\OfferResource;
use App\Http\Resources\ClientResource;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\ClientOfferRequest;
use App\Http\Requests\ClientRegisterRequest;
use App\Http\Resources\ClientOffersResource;

class ClientController extends Controller
{
    public function __construct(
        private ClientService $clientService,
    ) {}

    public function register(ClientRegisterRequest $clientRegisterRequest): ClientResource
    {
        $inputs = $clientRegisterRequest->validated();

        return new ClientResource($this->clientService->register($inputs));
    }

    public function login(LoginRequest $loginRequest): ClientResource
    {
        $inputs = $loginRequest->validated();

        return $this->clientService->login($inputs['email'], $inputs['password']);

    }

    public function makeOffer(ClientOfferRequest $clientOfferRequest): OfferResource
    {
        $inputs = $clientOfferRequest->validated();

        return new OfferResource($this->clientService->makeOffer($inputs));
    }

    public function show(Client $client): ClientResource
    {
        return new ClientResource($client);
    }

    public function offers(Client $client)
    {
        return ClientOffersResource::collection($client->offers);
    }

}