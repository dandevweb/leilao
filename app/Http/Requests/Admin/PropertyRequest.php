<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PropertyRequest extends FormRequest
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
            'category' => 'required|string|in:residencial,comercial,rural',
            'type' => 'required|string',
            'description' => 'required|string',
            'area_total' => 'required|integer',
            'area_util' => 'required|integer',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'auction_id' => 'required|integer'
        ];
    }
}