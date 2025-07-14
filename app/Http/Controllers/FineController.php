<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class FineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $fine = Fine::all();
        return view('fine.index', compact('fine', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('fine.create', compact('user'));
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
            'amount' => 'required',
            'date' => 'required',
            'reason' => 'required',
        ]);
        Fine::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'date' => Carbon::parse($request->date),
            'reason' => $request->reason,
        ]);
        Alert::success('Success', "Fine Generated Successfully");
        return redirect()->route('fine.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fine = Fine::find($id);
        return view('fine.show', compact('fine'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fine = Fine::find($id);
        $selectuser = User::find($fine->user_id);
        $user = User::all();
        return view('fine.edit', compact('fine', 'user', 'selectuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fine  $fine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'reason' => 'required',
        ]);
        $fine = Fine::find($id);
        $fine->update([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'date' => Carbon::parse($request->date),
            'reason' => $request->reason,
        ]);
        Alert::success('Sucess', "Fine Update Successfully");
        return redirect()->route('fine.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fine  $fine
     * @return \Illuminate\Http\Response
     */

     public function delete($id)
     {
         $fine = Fine::find($id);
         return view('fine.delete', compact('fine'));
     }
    public function destroy($id)
    {
        $fine = Fine::find($id);
        $fine->delete();
        Alert::success('Success', "Successfully deleted");
        return redirect()->route('fine.index');
    }
}
