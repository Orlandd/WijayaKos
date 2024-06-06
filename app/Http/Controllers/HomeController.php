<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'facilities' => Facility::all(),
            'rooms' => Room::with('dorms.locations', 'roomImages')->where('status', 'Available')->limit(4)->get(),
            'locations' => Location::all()
        ]);
    }
}
