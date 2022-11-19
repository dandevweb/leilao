<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class AuctionController extends Controller
{
    private $token;

    public function __construct()
    {
        if (!$userCookie = getCookie(env('DEFAULT_ADMIN_COOKIE_NAME'))) {
            return redirect()->route('admin.login')->send();
        }

        $userCookie = json_decode($userCookie);

        $this->token = $userCookie->token_type . ' ' . $userCookie->access_token;
    }

    public function index()
    {
        $response = api(url("/api/auctions"), "GET", $this->token);

        $auctions = isset($response->data) ? $response->data : '';

        return view('admin.pages.auction.index', compact('auctions'));
    }


    public function create()
    {
        $response = api(url("/api/banks"), "GET", $this->token);

        $banks = isset($response->data) ? $response->data : '';

        return view('admin.pages.auction.create', compact('banks'));
    }

    public function edit($id)
    {
        $auctionResponse = api(url("/api/auctions/$id"), "GET", $this->token);
        $auction = isset($auctionResponse->data) ? $auctionResponse->data : '';

        $banksResponse = api(url("/api/banks"), "GET", $this->token);
        $banks = isset($banksResponse->data) ? $banksResponse->data : '';

        return view('admin.pages.auction.edit', compact('auction', 'banks'));
    }
}