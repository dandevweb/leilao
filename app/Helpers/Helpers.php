<?php

if (!function_exists('money_brl')) {
    function moneyBrl(float $value)
    {
        return number_format($value, 2, ',', '.');
    }
}
