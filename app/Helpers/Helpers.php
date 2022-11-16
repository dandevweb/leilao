<?php

declare(strict_types=1);

if (!function_exists('moneyBrl')) {
    function moneyBrl(float $value)
    {
        return number_format($value, 2, ',', '.');
    }
}

if (!function_exists('dateBrl')) {
    function dateBrl(string $value)
    {
        return date('d/m/Y', strtotime($value));
    }
}