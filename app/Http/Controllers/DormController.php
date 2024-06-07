<?php

namespace App\Http\Controllers;

use App\Models\Dorm;
use App\Http\Requests\StoreDormRequest;
use App\Http\Requests\UpdateDormRequest;
use App\Models\DormImage;
use App\Models\DormLocation;
use App\Models\Location;

class DormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Dorm::with('locations', 'images')->get());
        return view('dashboard.dorms.index', [
            'dorms' => Dorm::with('locations', 'images')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dorms.create', [
            'locations' => Location::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDormRequest $request)
    {
        // dd($request);

        // Melakukan validasi terhadap request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        // Menentukan nama file dan tempat file
        $imageName = $request->nama . '.' . $request->image->extension();
        $request->image->move(public_path('storage/dorms'), $imageName);


        // inisialisasi variabel
        $nama = $request->nama;
        $location = $request->location;
        $lokasi = $request->address;
        $jenis = $request->jenis;
        $deskripsi = $request->deskripsi;

        // input ke database table dorms
        Dorm::create([
            "nama" => $nama,
            "lokasi" => $lokasi,
            "deskripsi" => $deskripsi,
            "jenis" => $jenis,
        ]);

        // mendapatkan data table dorm yang terakhir (yang diinputkan barusan)
        $dorm = Dorm::latest()->get()[0];

        // Menambahkan data ke table dorm_images
        DormImage::create([
            "image" => $imageName,
            "dorm_id" => $dorm->id,
        ]);

        // Menambahkan data ke table dorm_locations
        DormLocation::create([
            "dorm_id" => $dorm->id,
            "location_id" => $location,
        ]);

        // kembali ke halaman /dashboard/dorms dengan session
        return redirect("/dashboard/dorms")->with("status", 'Dorms has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dorm $dorm)
    {
        // dd();

        // menuju ke file view dengan membawa variabel dorm yang berisikan datatabase dorms yang berhubungan dengan table locations, dan image yang id nya sama dengan yang ada di request
        return view('dashboard.dorms.show', [
            'dorm' => Dorm::with('locations', 'images')->find($dorm->id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dorm $dorm)
    {
        return view('dashboard.dorms.edit', [ 'dorm' => $dorm, 'locations' => Location::all(),]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDormRequest $request, Dorm $dorm)
    {
        // Meminta Request
        $request->validate(['image' => 'image|mimes:jpeg,png,jpg,gif|max:5048']);

        //Update data dorm
        $dorm->update(['nama' => $request->nama, 'location' => $request->location, 'lokasi' => $request->address, 'jenis' => $request->jenis, 'deskripsi' => $request->deskripsi,]);

        //update image dorm
        if ($request->hasFile('image'))
        {
            $imageName = $request->nama . '.' . $request->image->extension();
            $request->image->move(public_path('storage/dorms'), $imageName);

            $dorm->image()->update(['image' => $imageName]);
        }

        //Update lokasi dorm
        $dorm->locations()->sync([$request->location]);
        return redirect("/dashboard/dorms")->with("status", 'Dorm has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dorm $dorm)
    {
        $dorm->images()->delete();
        $dorm->locations()->detach();
        $dorm->delete();
        return redirect("/dashboard/dorms")->with("status", 'Dorm has been deleted!');
    }
}
