<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ClientService;
use App\Http\Resources\ClientResource;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Requests\ClientOfferRequest;
use App\Http\Requests\ClientRegisterRequest;
use App\Http\Resources\OfferResource;

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

    public function makeOffer(ClientOfferRequest $clientOfferRequest)
    {
        $inputs = $clientOfferRequest->validated();

        return new OfferResource($this->clientService->makeOffer($inputs));
    }

}
