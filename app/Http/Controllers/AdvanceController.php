<?php

namespace App\Http\Controllers;

use App\Models\Advance;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class AdvanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $advance = Advance::all();
        return view('advance.index', compact('advance', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('advance.create', compact('user'));
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
            'description' => 'required',
        ]);
        $existrecode = Advance::where('user_id', '=', $request->user_id)->first();
        if(!$existrecode){
        Advance::create([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'date' => Carbon::parse($request->date),
            'description' => $request->description,
        ]);
        Alert::success('Sucess', "Advance Created Successfully");
        return redirect()->route('advance.index');
    }
        Alert::error('Opps', "Please Update the Previous Recode");
        return redirect()->route('advance.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advance  $advance
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $advance = Advance::find($id);
        return view('advance.show', compact('advance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advance  $advance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advance = Advance::find($id);
        $user = User::all();
        $selectuser = User::find($advance->user_id);
        return view('advance.edit', compact('advance','user', 'selectuser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advance  $advance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'amount' => 'required',
            'date' => 'required',
            'description' => 'required',
        ]);
        $advance = Advance::find($id);
        $advance->update([
            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'date' => Carbon::parse($request->date),
            'description' => $request->description,
        ]);
        Alert::success('Sucess', "Advance Update Successfully");
        return redirect()->route('advance.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advance  $advance
     * @return \Illuminate\Http\Response
     */

     public function delete($id)
     {
         $advance = Advance::find($id);
         return view('advance.delete', compact('advance'));
     }


    public function destroy($id)
    {
        $advance = Advance::find($id);
        $advance->delete();
        Alert::success('Success', "Advance Delete Successfully");
        return redirect()->route('advance.index');

    }
}
