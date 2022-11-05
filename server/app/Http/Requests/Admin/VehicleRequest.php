<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class VehicleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'price' => 'required|numeric',
            'increment' => 'required|numeric',
            'stored_in' => 'required|string',
            'quantity' => 'required|integer',
            'description' => 'required|string',
            'auction_id' => 'required|integer'
        ];
    }
}