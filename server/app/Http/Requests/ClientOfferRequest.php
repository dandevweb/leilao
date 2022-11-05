<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ClientOfferRequest extends FormRequest
{
    public function authorize():  bool
    {
        return Auth::check();
    }

    public function rules():  array
    {
        return [
            'property_id' => 'integer',
            'vehicle_id' => 'integer',
            'client_id' => 'required|integer',
            'price' => 'required|numeric',
        ];
    }
}
