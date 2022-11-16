<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index(Request $request)
    {
        $clientId = $request->client_id;
        $token = $request->client_token;

        $url = url("/api/client/$clientId/offers");
        $request = Request::create($url, 'GET');
        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', $token);
        $response = app()->handle($request)->getData();

        $offers = isset($response->data) ? $response->data : '';

        return view('web.pages.offers.index', compact('offers'));
    }

    public function create(Request $request)
    {
        $clientId = $request->client_id;
        $token = $request->client_token;
        $vehicleId = $request->vehicle_id == 0 ? null : (int)$request->vehicle_id;
        $propertyId = $request->property_id == 0 ? null : (int)$request->property_id;

        $url = url("/api/client/$clientId");
        $request = Request::create($url, 'GET');
        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', $token);
        $response = app()->handle($request)->getData();

        if (!isset($response->data)) {
            return response()->json(['redirect' => route('web.login')]);
        }

        $data = [
            'client_id' => (int)$clientId,
            'price' => (float)$request->price,
            'token' => $token
        ];
        if ($vehicleId) {
            $data['vehicle_id'] = $vehicleId;
        }
        if ($propertyId) {
            $data['property_id'] = $propertyId;
        }

        return response()->json(['message' => 'success', 'data' => $data]);
    }
}