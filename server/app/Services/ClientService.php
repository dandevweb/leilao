<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\ClientResource;
use App\Exceptions\LoginInvalidException;

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
        if (Hash::check($password, $client->password) && !$token = Auth::guard('client')->fromUser($client)) {
            throw new LoginInvalidException();
        }

        return (new ClientResource($client))->additional([
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ]);
    }


}
