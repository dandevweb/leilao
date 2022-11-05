<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class BankRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            'name' => !empty($this->request->all()['id']) ?
                        'required|string|unique:banks,name,' . $this->request->all()['id'] :
                        'required|string|unique:banks,name',

            'document' => !empty($this->request->all()['id']) ?
                            'required|string|min:18|max:18|unique:banks,document,' . $this->request->all()['id'] :
                            'required|string|min:18|max:18|unique:banks,document',
        ];
    }
}