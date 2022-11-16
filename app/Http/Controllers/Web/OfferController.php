<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class OfferController extends Controller
{
    public function __construct()
    {
        if (!Cookie::has('cookie_name')) {
            return redirect()->route('web.login')->send();
        }
    }

    public function create(Request $request)
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2NsaWVudC9sb2dpbiIsImlhdCI6MTY2NzY3OTcyMywiZXhwIjoxNjcxMjc5NzIzLCJuYmYiOjE2Njc2Nzk3MjMsImp0aSI6IlUzWTF5aWZHMGQ0RGNuNkUiLCJzdWIiOiIyIiwicHJ2IjoiNDFlZmI3YmFkN2Y2ZjYzMmUyNDA1YmQzYTc5M2I4YTZiZGVjNjc3NyJ9.UU1j41KSLQ_4hUlNEgtIKNegSNwtJQsmyb-EXs63pL8';

        $url = url('/api/properties');
        $request = Request::create($url, 'POST', $request->all());
        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');
        $request->headers->set('Authorization', 'Bearer ' . $token);
        $response = app()->handle($request)->getData();
        $properties = $response;

        // dd($properties);
    }
}