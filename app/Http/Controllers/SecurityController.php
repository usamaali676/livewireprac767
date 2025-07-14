<?php

namespace App\Http\Controllers;

use App\Models\Security;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\MonthlySecurity;

class SecurityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $security = Security::all();
        return view('security.index' , compact('security', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('security.create' , compact('user'));
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
            'total_security' => 'required',
            'total_month' => 'required',
            'return_month' => 'required',
            'paid' => 'required',
        ]);
        Security::firstorcreate([
            'user_id' => $request->user_id,
            'total' => $request->total_security,
            'total_months' => $request->total_month,
            'return_months' => $request->return_month,
            'paid' => $request->paid
        ]);
        Alert::success('Success', "Security Created Successfully");
        return redirect()->route('security.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $security = Security::find($id);
        // dd($security);
        $monthly_security = MonthlySecurity::where('security_id', $security->id)->get();
        $user = User::find($security->user_id);
        return view('security.show', compact('security', 'user','monthly_security'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $security = Security::find($id);
        $selectuser = User::find($security->user_id);
        $user = User::all();
        return view('security.edit', compact('security', 'user', 'selectuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'total_security' => 'required',
            'total_month' => 'required',
            'return_month' => 'required',
            'paid' => 'required',
        ]);
        $security = Security::find($id);
        $security->update([
            'user_id' => $request->user_id,
            'total' => $request->total_security,
            'total_months' => $request->total_month,
            'return_months' => $request->return_month,
            'paid' => $request->paid
        ]);
        Alert::success('Success', "Security Updated Successfully");
        return redirect()->route('security.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Security  $security
     * @return \Illuminate\Http\Response
     */


     public function delete($id)
     {
         $security = Security::find($id);
         $user = User::find($security->user_id);
         return view('security.delete', compact('security', 'user'));
     }


    public function destroy($id)
    {
        $security = Security::find($id);
        $security->delete();
        Alert::success('Success', "Security Deleted Successfully");
        return redirect()->route('security.index');
    }
}
