<?php

namespace App\Http\Controllers;

use App\Models\FinancialType;
use App\Http\Requests\StoreFinancialTypeRequest;
use App\Http\Requests\UpdateFinancialTypeRequest;

class FinancialTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.FinancialType.index', [
            'types' => FinancialType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.FinancialType.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinancialTypeRequest $request)
    {
        $nama = $request->nama;
        FinancialType::create([
            "name" => $nama,
        ]);

        return redirect("/dashboard/financial-types")->with("status", 'Event has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FinancialType $financialType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinancialType $financialType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinancialTypeRequest $request, FinancialType $financialType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinancialType $financialType)
    {
        //
    }
}
