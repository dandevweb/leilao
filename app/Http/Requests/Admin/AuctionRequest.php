<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class AuctionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'date' => 'required|date|after:today',

            'name' => !empty($this->request->all()['id']) ?
                        'required|string|unique:auctions,name,' . $this->request->all()['id'] :
                        'required|string|unique:auctions,name',

            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'bank_id' => 'required|integer'
        ];
    }
}
