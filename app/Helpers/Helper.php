<?php


if (!function_exists('set_active')) {
    function set_active($route)
    {
        return \Illuminate\Support\Facades\Route::is($route) ? 'active' : '';
    }
}
