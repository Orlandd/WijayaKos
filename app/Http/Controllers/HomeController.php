<?php

namespace App\Http\Controllers;

use App\Models\Dorm;
use App\Models\Facility;
use App\Models\Finance;
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

        if (auth()->guest()) {
            return view('home', [
                'facilities' => Facility::all(),
                'rooms' => Room::with('dorms.locations', 'roomImages')->where('status', 'Available')->limit(4)->get(),
                'locations' => Location::all()
            ]);
        }

        if (auth()->user()->role == 1) {
            return redirect('/dashboard');
        }

        return view('home', [
            'facilities' => Facility::all(),
            'rooms' => Room::with('dorms.locations', 'roomImages')->where('status', 'Available')->limit(4)->get(),
            'locations' => Location::all()
        ]);
    }

    public function dashboard()
    {
        // dd(Room::where('status', 'Available')->count());
        // dd(
        //     Finance::with('types', 'users')
        //         ->whereHas('types', function ($query) {
        //             $query->where('name', '!=', 'payment');
        //         })
        //         ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(nominal) as total_nominal')
        //         ->groupBy('year', 'month')
        //         ->orderBy('year', 'asc')
        //         ->orderBy('month', 'asc')
        //         ->get()
        // );

        return view('dashboard.index', [
            'available' => Room::where('status', 'Available')->count(),
            'waiting' => Room::where('status', 'waiting')->count(),
            'booked' => Room::where('status', 'Booked')->count(),
        ]);
    }


    public function filterJenis($gender)
    {
        $rooms = Room::with('dorms.locations', 'roomImages', 'facilities')
            ->whereHas('dorms', function ($query) use ($gender) {
                $query->where('jenis', $gender);
            })
            ->where('status', 'Available')
            ->get();

        return response()->json($rooms);
    }


    public function filterLokasi($locationId)
    {
        if ($locationId == 'all') {
            $dorms = Dorm::with('locations', 'images')->get();
        } else {
            $dorms = Dorm::with('locations', 'images')
                ->whereHas('locations', function ($query) use ($locationId) {
                    $query->where('nama', $locationId);
                })
                ->get();
        }

        return response()->json($dorms);
    }

    public function getDorm()
    {
        $dorms = Dorm::withCount(['rooms' => function ($query) {
            $query->where('status', 'Booked');
        }])->get();

        return response()->json($dorms);
    }


    public function getExpense()
    {
        $expense = Finance::with('types', 'users')
            ->whereHas('types', function ($query) {
                $query->where('name', '!=', 'payment');
            })
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(nominal) as total_nominal')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        return response()->json($expense);
    }
}
