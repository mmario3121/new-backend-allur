<?php

if (!function_exists('phoneFormat')) {
    function phoneFormat(string $phone): string
    {
        return rtrim(mb_substr($phone, 2));
    }
}

if (!function_exists('priceFormat')) {
    function priceFormat(string $price): string
    {
        return number_format($price, 0, '', ' ') . '₸';
    }
}

if (!function_exists('miniText')) {
    function miniText(string $text, int $length = 100): string
    {
        return mb_strimwidth(strip_tags($text), 0, $length, "...");
    }
}

if (!function_exists('dateFormat')) {
    function dateFormat(string $date = null): string|null
    {
        return $date ? date('Y-m-d', strtotime($date)) : null;
    }
}
