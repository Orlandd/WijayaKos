<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use App\Models\Room;
use App\Http\Controllers\Auth;
use App\Models\Finance;
use App\Models\FinancialRelation;
use App\Models\FinancialType;
use DateTime;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Booking::with('rooms.dorms', 'users')->get());
        return view('dashboard.booking.index', [
            'bookings' => Booking::with('rooms.dorms', 'users')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // dd(auth()->user());

        $user = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'telepon' => auth()->user()->nohp,
        ];
        // dd($user);
        return view('booking', [
            'room' => Room::with('dorms.locations', 'roomImages', 'facilities')->find($id),
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd(Room::find($request->kamar));
        $time = new DateTime();
        $today = clone $time;

        // Tambahkan bulan ke tanggal hari ini
        $tomorrow = $time->modify('+' . $request->time . ' months');

        // Format tanggal yang baru dan tampilkan
        // dd($tomorrow->format('Y-m-d'));

        // Validasi
        $request->validate([
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        // Menentukan nama file dan tempat file
        $imageName = $today->format('Y-m-d') . '-' . auth()->user()->name . '-' . $request->kamar . '.' . $request->bukti->extension();
        $request->bukti->move(public_path('storage/booking'), $imageName);

        // inisialisasi variabel
        $time = $request->time;
        $harga = $request->harga;
        $roomId = $request->kamar;
        $userId = auth()->user()->id;
        $mulai = $today->format('Y-m-d');
        $akhir = $tomorrow->format('Y-m-d');

        // input ke database table bookings
        Booking::create([
            'mulai' => $mulai,
            'akhir' => $akhir,
            'harga' => $harga,
            'bukti' => $imageName,
            'jenis' => 'Booking',
            'status' => 'waiting',
            'user_id' => $userId,
            'room_id' => $roomId,
        ]);

        // mendapatkan data table rooms yang sesuai id room
        $room = Room::find($request->kamar);

        // merubah status pada room
        $room->status = 'waiting';
        $room->save();

        // kembali ke halaman /profile dengan session
        return redirect("/profile")->with("status", 'Location has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        // Memuat relasi 'rooms.dorms' dan 'users'
        $booking->load(['rooms.dorms', 'users']);
        return view('dashboard.booking.detail', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        // dd(FinancialType::where('name', 'Payment')->get()[0]);

        // merubah status menjadi approve
        $time = new DateTime();
        $booking->status = 'Approve';
        $booking->save();

        // Mendapatkan data tabel rooms sesuai dengan id
        $room = Room::find($booking->room_id);

        // Melakukan update data
        $room->status = 'Booked';
        $room->user_id = auth()->user()->id;
        $room->save();

        // Membuat data baru di table finances
        Finance::create([
            'nama' => 'Pembayaran|' . $room->name,
            'nominal' => $booking->harga,
            'deskripsi' => 'Pembayaran kamar kost',
            'tanggal' => $time->format('Y-m-d'),
            'user_id' => $booking->user_id,
            'booking_id' => $booking->id
        ]);

        // mendapatkan data table finances yang terakhir
        $finance = Finance::latest()->get()[0];


        // cek jika data di table financial_types
        if (FinancialType::where('name', 'Payment')->get()) {
            $type = FinancialType::where('name', 'Payment')->get()[0];

            FinancialRelation::create([
                'finance_id' => $finance->id,
                'financial_type_id' => $type->id,
            ]);

            return redirect("/dashboard/bookings")->with("status", 'Payment has been aproved!');
        }

        // Jika tidak ada data yang dicari

        // Membuat data di table financial_types
        FinancialType::create([
            "name" => 'Payment',
        ]);

        // Mendapatkan data
        $type = FinancialType::where('name', 'Payment')->get()[0];

        // menambahkan data di table fiancial_relations
        FinancialRelation::create([
            'finance_id' => $finance->id,
            'financial_type_id' => $type->id,
        ]);

        //direct ke halaman /dashboard/bookings
        return redirect("/dashboard/bookings")->with("status", 'Payment has been aproved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function reject($id)
    {
        // dd(Booking::find($id));

        $booking = Booking::find($id);

        $booking->status = 'Reject';
        $booking->save();

        return redirect("/dashboard/bookings")->with("status", 'Payment has been rejected!');
    }
}
