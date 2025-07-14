<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $desig = Designation::all();
        return view('designation.index', compact('desig','srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('designation.create');
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
        'name' => 'required | unique:designations,name',
       ]);
       Designation::create([
        'name' => $request->name
       ]);
       Alert::success('Success', "Designation created successfully");
       return redirect()->route('desig.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desig = Designation::find($id);
        return view('designation.detail', compact('desig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $desig = Designation::find($id);
        return view('designation.edit', compact('desig'));
    }
    public function delete($id)
    {
        $desig = Designation::find($id);
        return view('designation.delete', compact('desig'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required | unique:designations,name,'.$id,
        ]);
        $desig = Designation::find($id);
        $desig->update([
            'name' => $request->name
        ]);
        Alert::success('Success',"Designations updated successfully");
        return redirect()->route('desig.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userdesig = User::where('desig_id', $id)->get();
        if($userdesig->count() > 0)
        {
            Alert::error('oops', "Please delete the Child Object First");
            return redirect()->route('desig.index');
        }
        else{
            Designation::find($id)->delete();
            Alert::success('Success', "Designation deleted successfully");
            return redirect()->route('desig.index');
        }

    }
}
