<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class VehicleController extends Controller
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
        $response = api(url("/api/vehicles"), "GET", $this->token);

        $vehicles = isset($response->data) ? $response->data : '';

        return view('admin.pages.vehicle.index', compact('vehicles'));
    }


    public function create()
    {
        $response = api(url("/api/auctions"), "GET", $this->token);

        $auctions = isset($response->data) ? $response->data : '';

        return view('admin.pages.vehicle.create', compact('auctions'));
    }

    public function edit($id)
    {
        $vehicleResponse = api(url("/api/vehicles/$id"), "GET", $this->token);
        $vehicle = isset($vehicleResponse->data) ? $vehicleResponse->data : '';

        $auctionsResponse = api(url("/api/auctions"), "GET", $this->token);

        $auctions = isset($auctionsResponse->data) ? $auctionsResponse->data : '';

        return view('admin.pages.vehicle.edit', compact('vehicle', 'auctions'));
    }
}