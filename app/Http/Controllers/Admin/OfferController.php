<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class OfferController extends Controller
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

    public function vehicles($id)
    {
        $response = api(url("/api/offers/$id/vehicles"), "GET", $this->token);

        $result = isset($response->data) ? $response->data : '';

        $offers = collect($result)->sortBy('offer_id');

        return view('admin.pages.offers.vehicles', compact('offers'));
    }

    public function properties($id)
    {
        $response = api(url("/api/offers/$id/properties"), "GET", $this->token);

        $result = isset($response->data) ? $response->data : '';

        $offers = collect($result)->sortBy('offer_id');

        return view('admin.pages.offers.properties', compact('offers'));
    }
}