<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\UpdateLocationRequest;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.locations.index', [
            'locations' => Location::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.locations.create', [
            'locations' => Location::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        $imageName = $request->nama . '.' . $request->image->extension();
        $request->image->move(public_path('storage/locations'), $imageName);

        $nama = $request->nama;
        $lokasi = $request->address;
        Location::create([
            "nama" => $nama,
            "image" => $imageName,
        ]);

        return redirect("/dashboard/locations")->with("status", 'Location has been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('dashboard.locations.edit', [
            'location' => $location,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLocationRequest $request, Location $location)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->nama . '.' . $request->image->extension();
            $request->image->move(public_path('storage/locations'), $imageName);
            $location->image = $imageName;
        }

        $location->nama = $request->nama;
        $location->save();

        return redirect("/dashboard/locations")->with("status", 'Location has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect("/dashboard/locations")->with("status", 'Location has been deleted!');
    }
}
