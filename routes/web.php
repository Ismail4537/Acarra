<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.event');
});

Route::get('/dashboard', function () {
    return view('dashboard.home');
});
