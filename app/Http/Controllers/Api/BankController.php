<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Bank;
use App\Http\Controllers\Controller;
use App\Http\Resources\BankResource;
use App\Http\Requests\Admin\BankRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BankController extends Controller
{

    public function index(): ResourceCollection
    {
        return BankResource::collection(Bank::all());
    }

    public function store(BankRequest $bankRequest): BankResource
    {
        $bankCreated = Bank::create($bankRequest->validated());

        return new BankResource($bankCreated);
    }

    public function show(Bank $bank):  BankResource
    {
        return new BankResource($bank);
    }

    public function update(BankRequest $bankRequest, Bank $bank): BankResource
    {
        $bank->fill($bankRequest->validated());
        $bank->save();

        return new BankResource($bank->fresh());
    }

    public function destroy(Bank $bank): void
    {
        $bank->deleteOrFail();
    }
}
