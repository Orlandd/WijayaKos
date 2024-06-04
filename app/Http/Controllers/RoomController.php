<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Dorm;
use App\Models\Facility;
use App\Models\RoomFacility;
use App\Models\RoomImage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Room::with('dorms.locations', 'roomImages')->get());

        return view('dashboard.rooms.index', [
            'rooms' => Room::with('dorms.locations', 'roomImages')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.rooms.create', [
            'dorms' => Dorm::all(),
            'facilities' => Facility::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        // dd($request);

        $request->validate([
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $imageName1 = $request->nama . '1.' . $request->image1->extension();
        $imageName2 = $request->nama . '2.' . $request->image2->extension();
        $imageName3 = $request->nama . '3.' . $request->image3->extension();
        $request->image1->move(public_path('storage/rooms'), $imageName1);
        $request->image2->move(public_path('storage/rooms'), $imageName2);
        $request->image3->move(public_path('storage/rooms'), $imageName3);

        $nama = $request->nama;
        $tipe = $request->jenis;
        $harga = $request->harga;
        $deskripsi = $request->deskripsi;
        $status = 'Available';
        $dorm = $request->kost;

        Room::create([
            "name" => $nama,
            "harga" => $harga,
            "tipe" => $tipe,
            "deskripsi" => $deskripsi,
            "status" => $status,
            "dorm_id" => $dorm,
        ]);

        $room = Room::latest()->get()[0];

        RoomImage::create([
            "image" => $imageName1,
            "room_id" => $room->id,
        ]);

        RoomImage::create([
            "image" => $imageName2,
            "room_id" => $room->id,
        ]);

        RoomImage::create([
            "image" => $imageName3,
            "room_id" => $room->id,
        ]);

        foreach ($request->facility as $key => $value) {
            RoomFacility::create([
                "room_id" => $room->id,
                "facility_id" => $value,
            ]);
        }



        return redirect("/dashboard/rooms")->with("status", 'Room has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        // dd(Room::with('dorms.locations', 'roomImages', 'facilities')->find($room->id));
        return view('dashboard.rooms.show', [
            'room' => Room::with('dorms.locations', 'roomImages', 'facilities')->find($room->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        //
    }

    public function detail($id)
    {

        // dd(Room::with('dorms.locations', 'roomImages', 'facilities')->find($room->id));
        return view('room', [
            'room' => Room::with('dorms.locations', 'roomImages', 'facilities')->find($id),
        ]);
    }
}
