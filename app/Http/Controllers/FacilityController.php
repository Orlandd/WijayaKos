<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use Illuminate\Support\Facades\File;

class FacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.facilities.index', [
            'facilities' => Facility::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacilityRequest $request)
    {
        // Melakukan validasi terhadap request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        // Menentukan nama file dan tempat file
        $imageName = $request->nama . '.' . $request->image->extension();
        $request->image->move(public_path('storage/facilities'), $imageName);

        // inisialisasi variabel
        $nama = $request->nama;

        // menambahkan data ke database pada table facilities
        Facility::create([
            "nama" => $nama,
            "image" => $imageName,
        ]);

        // kembali ke halaman /dashboard/facilities
        return redirect("/dashboard/facilities")->with("status", 'Facility has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $facility)
    {
        return view('dashboard.facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacilityRequest $request, Facility $facility)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->nama . '.' . $request->image->extension();
            $request->image->move(public_path('storage/facilities'), $imageName);
            $facility->image = $imageName;
        }

        $facility->nama = $request->nama;
        $facility->save();

        return redirect("/dashboard/facilities")->with("status", 'Facility has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $facility)
    {
        // Check if the image file exists in the storage
        $imagePath = public_path('storage/facilities/' . $facility->image);
        if (File::exists($imagePath)) {
            // Delete the image file
            File::delete($imagePath);
        }

        // Delete the facility record from the database
        $facility->delete();

        // Redirect back to the facilities index page with a success message
        return redirect("/dashboard/facilities")->with("status", 'Facility has been deleted!');
    }
}
