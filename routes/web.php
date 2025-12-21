<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/', function () {
    return view('front-page.home', ["title" => "Home"]);
});

Route::get('/about', function () {
    return view('front-page.about', ["title" => "About"]);
})->name('about');

Route::get('/profile', function () {
    return view('front-page.profile', ["title" => "Profile"]);
})->name('profile');

// Rute untuk Index (event.index)
Route::get('event', [EventController::class, 'index'])->name('event.index');
// Rute untuk Show (event.show), menggunakan parameter dinamis {id}
Route::get('event/{slug}', [EventController::class, 'show'])->name('event.show');

Route::get('/dashboard', function () {
    return view('dashboard.home', ["title" => "Dashboard"]);
});

Route::get('/events', function () {
    return view('dashboard.events', ["title" => "Management Events"]);
});

Route::get('/categories', function () {
    return view('dashboard.categories', ["title" => "Management Categories"]);
});

Route::get('/users', function () {
    return view('dashboard.users', ["title" => "Management Users"]);
});


Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');
