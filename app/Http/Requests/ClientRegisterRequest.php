<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRegisterRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'document' => 'required|string|min:14|max:14|unique:clients',
            'email' => 'required|email|unique:clients',
            'phone' => 'required|string',
            'password' => 'required|string|min:8|max:30'
        ];
    }
}