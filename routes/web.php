<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hero');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/rooms', function () {
    return view('rooms');
});

Route::get('/room', function () {
    return view('room');
});

Route::get('/booking', function () {
    return view('booking');
});

Route::get('/location', function () {
    return view('location');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile/edit', function () {
    return view('editProfile');
});
