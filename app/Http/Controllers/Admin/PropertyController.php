<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
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
        $response = api(url("/api/properties"), "GET", $this->token);

        $properties = isset($response->data) ? $response->data : '';

        return view('admin.pages.property.index', compact('properties'));
    }


    public function create()
    {
        $response = api(url("/api/auctions"), "GET", $this->token);

        $auctions = isset($response->data) ? $response->data : '';

        return view('admin.pages.property.create', compact('auctions'));
    }

    public function edit($id)
    {
        $propertyResponse = api(url("/api/properties/$id"), "GET", $this->token);
        $property = isset($propertyResponse->data) ? $propertyResponse->data : '';

        $auctionsResponse = api(url("/api/auctions"), "GET", $this->token);

        $auctions = isset($auctionsResponse->data) ? $auctionsResponse->data : '';

        return view('admin.pages.property.edit', compact('property', 'auctions'));
    }
}