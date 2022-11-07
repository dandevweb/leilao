<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Models\Auction;
use App\Http\Controllers\Controller;
use App\Http\Resources\AuctionResource;
use App\Http\Requests\Admin\AuctionRequest;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AuctionController extends Controller
{

    public function index(): ResourceCollection
    {
        return AuctionResource::collection(Auction::all());
    }

    public function store(AuctionRequest $auctionRequest): AuctionResource
    {
        $auctionCreated = Auction::create($auctionRequest->validated());

        return new AuctionResource($auctionCreated);
    }

    public function show(Auction $auction):  AuctionResource
    {
        return new AuctionResource($auction);
    }

    public function update(AuctionRequest $auctionRequest, Auction $auction): AuctionResource
    {
        $auction->fill($auctionRequest->validated());
        $auction->save();

        return new AuctionResource($auction->fresh());
    }

    public function destroy(Auction $auction): void
    {
        $auction->deleteOrFail();
    }
}