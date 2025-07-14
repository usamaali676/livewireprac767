<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $vehicle = Vehicle::all();
        return view('vehicle.index', compact('vehicle','srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'vehicle_type' => 'required',
            'vehicle_number' => 'required | unique:vehicles,vehicle_number',
        ]);
        Vehicle::create([
            'vehicle_type' => $request->vehicle_type,
            'vehicle_number' => $request->vehicle_number,
            'description' => $request->description,
        ]);
        Alert::success('Success', "Vehicle Added Successfully");
        return redirect()->route('vehicle.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicle.detail', compact('vehicle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        $veh_type = $vehicle->vehicle_type;
        return view('vehicle.edit', compact('vehicle','veh_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $request->validate([
        'vehicle_type' => 'required',
        'vehicle_number' => 'required | unique:vehicles,vehicle_number,'.$id,
       ]);
       $vehicle = Vehicle::find($id);
       $vehicle->update([
        'vehicle_number' => $request->vehicle_number,
        'vehicle_type' => $request->vehicle_type,
        'description' => $request->description
       ]);
       Alert::success('Success', "Vehicle updated successfully");
       return redirect()->route('vehicle.index');
    }




public function delete($id)
{
    $vehicle = Vehicle::find($id);
    return view('vehicle.delete', compact('vehicle'));
}





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uservehicle = User::where('vehicle_id', $id)->get();
        if($uservehicle->count() > 0)
        {
            Alert::error('oops', "Please delete the child Object First");
            return redirect()->route('vehicle.index');
        }
        else
        {
            Vehicle::find($id)->delete();
            Alert::success('Success', "Vehicle deleted successfully");
            return redirect()->route('vehicle.index');
        }

    }
}
