<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $dept = Department::all();
        return view('department.index', compact('dept','srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
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
            'name' => 'required | unique:departments,name',
        ]);
        Department::create([
            'name' => $request->name,
        ]);
        Alert::success('Success', "Department created successfully");
        return redirect()->route('dept.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dept = Department::find($id);
        return view('department.detail', compact('dept'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dept = Department::find($id);
        return view('department.edit', compact('dept'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required | unique:departments,name,'.$id
        ]);
        $updept = Department::find($id);
        $updept->update([
            'name' => $request->name,
        ]);
        Alert::success('Success', "Successfully updated department");
        return redirect()->route('dept.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $dept = Department::find($id);
        return view('department.delete', compact('dept'));
    }
    public function destroy($id)
    {
        $userdept = User::where('dept_id', $id)->get();
        if($userdept->count() > 0)
        {
            Alert::error('oops', "Please delete the Child Object First");
            return redirect()->route('dept.index');
        }
        else
        {
            Department::find($id)->delete();
            Alert::success('Success', 'Department deleted successfully');
            return redirect()->route('dept.index');
        }

    }
}
