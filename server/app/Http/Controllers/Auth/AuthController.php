<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Services\Auth\AuthService;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $authService,
    ) {}

    public function register(RegisterRequest $authRegisterRequest): UserResource
    {
        $inputs = $authRegisterRequest->validated();

        return new UserResource($this->authService->register($inputs));
    }

    public function login(LoginRequest $authLoginRequest): UserResource
    {
        $inputs = $authLoginRequest->validated();
        $token = $this->authService->login($inputs);

        return (new UserResource(Auth::guard('api')->user()))->additional($token);
    }

}