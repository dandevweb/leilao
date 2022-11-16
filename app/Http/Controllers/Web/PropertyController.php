<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $url = url('/api/properties');
        $request = Request::create($url, 'GET');
        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');
        $response = app()->handle($request)->getData();
        $properties = $response->data;

        return view('web.pages.property.index', compact('properties'));
    }

    public function show(int $id)
    {
        $url = url("/api/properties/$id");
        $request = Request::create($url, 'GET');
        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');
        $response = app()->handle($request)->getData();
        $product = $response->data;

        return view('web.pages.product.index', compact('product'));
    }
}