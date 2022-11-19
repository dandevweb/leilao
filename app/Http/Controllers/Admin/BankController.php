<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BankController extends Controller
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
        $response = api(url("/api/banks"), "GET", $this->token);

        $banks = isset($response->data) ? $response->data : '';

        return view('admin.pages.bank.index', compact('banks'));
    }


    public function create()
    {
        return view('admin.pages.bank.create');
    }

    public function edit($id)
    {
        $response = api(url("/api/banks/$id"), "GET", $this->token);
        $bank = isset($response->data) ? $response->data : '';

        return view('admin.pages.bank.edit', compact('bank'));
    }
}