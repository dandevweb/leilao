<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('web.pages.home.index');
    }
}
