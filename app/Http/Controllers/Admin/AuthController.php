<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        if (getCookie(env('DEFAULT_ADMIN_COOKIE_NAME '))) {
            return redirect()->route('admin.dashboard')->send();
        }

        return view('admin.auth.login');
    }

    public function register()
    {
        return view('admin.auth.register');
    }
}