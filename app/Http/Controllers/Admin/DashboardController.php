<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (!$userCookie = getCookie(env('DEFAULT_ADMIN_COOKIE_NAME'))) {
            return redirect()->route('admin.login')->send();
        }

        $userCookie = json_decode($userCookie);

        $user = $userCookie->data;
        $token = $userCookie->token_type . ' ' . $userCookie->access_token;

        return view('admin.pages.dashboard.index', compact('user', 'token'));
    }
}