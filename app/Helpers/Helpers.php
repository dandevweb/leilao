<?php

declare(strict_types=1);

if (!function_exists('moneyBrl')) {
    function moneyBrl(float $value): string
    {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}

if (!function_exists('dateBrl')) {
    function dateBrl(string $value)
    {
        return date('d/m/Y', strtotime($value));
    }
}

if (!function_exists('getCookie')) {
    function getCookie(?string $name):  string | null
    {
        return $_COOKIE[$name] ?? null;
    }
}

if (!function_exists('removeCookie')) {
    function removeCookie(string $name):  void
    {
        unset($_COOKIE[$name]);
        setcookie($name, '', -1, '/');
    }
}



if (!function_exists('api')) {
    function api(string $url, string $method, string $token = null): array | stdClass
    {
        $request = \Illuminate\Http\Request::create($url, $method);
        $request->headers->set('Content-Type', 'application/json');
        $request->headers->set('Accept', 'application/json');
        if ($token) {
            $request->headers->set('Authorization', $token);
        }

        return app()->handle($request)->getData();
    }
}