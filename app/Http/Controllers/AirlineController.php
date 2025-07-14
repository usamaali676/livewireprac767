<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $airline = Airline::all();
        return view('airlines.index', compact('airline'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('airlines.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:airlines,code',
            'name' => 'required|max:255',
        ]);
        Airline::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);
        Alert::success('Success', "Airline Updated successfully");
           return redirect()->route('airline.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Airline $airline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $airline = Airline::find($id);
        return view('airlines.edit', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|unique:airlines,code,' . $id,
            'name' => 'required|max:255',
        ]);
        $airline = Airline::find($id);
        $airline->update([
            'code' => $request->code,
            'name' => $request->name,
        ]);
        Alert::success('Success', "Airline Updated successfully");
        return redirect()->route('airline.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Airline $airline)
    {
        //
    }
}
