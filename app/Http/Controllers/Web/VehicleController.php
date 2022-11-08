<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $url = url('/api/vehicles');
        $request = Request::create($url, 'GET');
        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');
        $response = app()->handle($request)->getData();
        $vehicles = $response->data;

        return view('web.pages.vehicle.index', compact('vehicles'));
    }
}