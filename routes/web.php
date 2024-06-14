<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DormController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FinancialTypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyUser;
use App\Models\Booking;
use App\Models\Dorm;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Auth::routes(['verify' => true]);

// User
Route::get('/', function () {
    return view('hero');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/rooms', function () {
    return view('rooms', [
        'rooms' => Room::with('dorms.locations', 'roomImages', 'facilities')->where('status', 'Available')->get()
    ]);
});
Route::get('/rooms/search/{query}', function ($query) {

    $rooms = Room::with('dorms.locations', 'roomImages', 'facilities')->where([['status', 'Available'], ['name', 'LIKE', "%{$query}%"]])->get();

    return response()->json($rooms);
});
Route::get('/room/{id}', [RoomController::class, 'detail']);

// user booking --- start ---
Route::get('/booking/{id}', [BookingController::class, 'create'])->middleware('auth');
Route::post('/booking', [BookingController::class, 'store']);
// user booking --- end ---


Route::get('/location', function () {

    return view('location', [
        "locations" => Location::all(),
        "dorms" => Dorm::with('images')->get(),
    ]);
});



Route::get('/profile', function () {
    // dd(Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['status', 'Approve']])->latest()->get()[0]);
    return view('profile', [
        'bookings' => Booking::with('rooms.dorms')->where('user_id', auth()->user()->id)->get(),
        'bookingApprove' => Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['status', 'Approve']])->latest()->get()[0],
        'rooms' => Room::with('dorms.locations', 'roomImages', 'facilities')->where('user_id', auth()->user()->id)->get()
    ]);
});


// user extend -- start --
Route::get('/profile/extend/{id}', [UserController::class, 'extend']);
Route::post('/profile/extend', [UserController::class, 'extendStore']);
// user extend -- end --

Route::get('/profile/edit', function () {
    return view('editProfile');
});


// Dashboard Admin
Route::middleware([OnlyAdmin::class])->group(function () {
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
});
