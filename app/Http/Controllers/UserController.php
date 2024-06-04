<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create', [
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nohp' => ['string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        return User::create([
            'name' => $request->name,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function extend($id)
    {
        // dd(Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['room_id', $id]])->get()[0]);

        return view('extend', [
            'booking' => Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['room_id', $id]])->latest()->get()[0],
            'bookingApprove' => Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['status', 'Approve']])->latest()->get()[0],

            // 'rooms' => Room::with('dorms.locations', 'roomImages', 'facilities')->find($id)->get()
        ]);
    }

    public function extendStore(Request $request)
    {
        // dd(Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['room_id', $id]])->get()[0]);

        // dd($request);


        // dd(Room::where([['user_id', auth()->user()->id], ['id', $request->kamar]])->get());

        $roomExists = Room::where([
            ['user_id', auth()->user()->id],
            ['id', $request->kamar]
        ])->exists();

        if ($roomExists) {

            $booking = Booking::with('rooms.dorms')->where([['user_id', auth()->user()->id], ['room_id', $request->kamar], ['status', 'Approve']])->latest()->get()[0];


            $time = new DateTime($booking->akhir);
            $today = clone $time;

            $tomorrow = $time->modify('+' . $request->time . ' months');

            // Format tanggal yang baru dan tampilkan
            // dd($tomorrow->format('Y-m-d'));

            $request->validate([
                'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
            ]);

            $imageName = $today->format('Y-m-d') . '-' . auth()->user()->name . '-' . $request->kamar . '-' . 'Extend' . '.' . $request->bukti->extension();
            $request->bukti->move(public_path('storage/booking'), $imageName);

            $time = $request->time;
            $harga = $request->harga;
            $roomId = $request->kamar;
            $userId = auth()->user()->id;
            $mulai = $today->format('Y-m-d');
            $akhir = $tomorrow->format('Y-m-d');

            Booking::create([
                'mulai' => $mulai,
                'akhir' => $akhir,
                'harga' => $harga,
                'bukti' => $imageName,
                'jenis' => 'Extend',
                'status' => 'waiting',
                'user_id' => $userId,
                'room_id' => $roomId,
            ]);

            $room = Room::find($request->kamar);
            $room->status = 'waiting';
            $room->save();

            return redirect("/home")->with("status", 'Location has been created!');
        }
    }
}
