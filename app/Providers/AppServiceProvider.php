<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($userCookie = getCookie(env('DEFAULT_ADMIN_COOKIE_NAME'))) {
            $userCookie = json_decode($userCookie);

            $user = $userCookie->data;
            $token = $userCookie->token_type . ' ' . $userCookie->access_token;

            View::share('user', $user);
            View::share('token', $token);

        }

    }
}