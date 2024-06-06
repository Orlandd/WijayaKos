<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DormController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FinancialTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('hero');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/rooms', function () {
    return view('rooms', [
        'rooms' => Room::with('dorms.locations', 'roomImages', 'facilities')->get()
    ]);
});


Route::get('/room/{id}', [RoomController::class, 'detail']);

Route::get('/booking/{id}', [BookingController::class, 'create']);
Route::post('/booking', [BookingController::class, 'store']);

Route::get('/location', function () {

    return view('location');
});

Route::get('/profile', function () {
    // dd(Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['status', 'Approve']])->latest()->get()[0]);
    return view('profile', [
        'bookings' => Booking::with('rooms.dorms')->where('user_id', auth()->user()->id)->get(),
        'bookingApprove' => Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['status', 'Approve']])->latest()->get()[0],
        'rooms' => Room::with('dorms.locations', 'roomImages', 'facilities')->where('user_id', auth()->user()->id)->get()
    ]);
});

Route::get('/profile/extend/{id}', [UserController::class, 'extend']);
Route::post('/profile/extend', [UserController::class, 'extendStore']);

Route::get('/profile/edit', function () {
    return view('editProfile');
});


Route::get('/dashboard', function () {
    return view('dashboard.index');
});


Route::put('/dashboard/bookings/{id}/reject', [BookingController::class, 'reject']);


Route::resource('/dashboard/dorms', DormController::class);
Route::resource('/dashboard/locations', LocationController::class);
Route::resource('/dashboard/rooms', RoomController::class);
Route::resource('/dashboard/facilities', FacilityController::class);
Route::resource('/dashboard/financial-types', FinancialTypeController::class);
Route::resource('/dashboard/finances', FinanceController::class);
Route::resource('/dashboard/bookings', BookingController::class);

