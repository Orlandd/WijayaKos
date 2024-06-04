<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use App\Http\Requests\StoreFinanceRequest;
use App\Http\Requests\UpdateFinanceRequest;
use App\Models\FinancialRelation;
use App\Models\FinancialType;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Finance::with('types', 'bookings', 'users')->get());

        return view('dashboard.finance.index', [
            'finances' => Finance::with('types', 'users')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.finance.create', [
            'types' => FinancialType::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinanceRequest $request)
    {
        Finance::create([
            'nama' => $request->nama,
            'nominal' => $request->nominal,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'user_id' => null,
            'booking_id' => null
        ]);

        $finance = Finance::latest()->get()[0];


        FinancialRelation::create([
            'finance_id' => $finance->id,
            'financial_type_id' => $request->jenis,
        ]);

        return redirect("/dashboard/finances")->with("status", 'Report has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinanceRequest $request, Finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finance $finance)
    {
        //
    }
}
