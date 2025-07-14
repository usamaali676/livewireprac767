<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\Leaves;
use App\Models\PaidLeaves;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public  function index()
    {
        $leaves = Leaves::with(['user'])->get();
        $srno = 1;
        return view('leave.index', compact('leaves', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('leave.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $range = $request->leave_range;
        // // $splittedString = explode(' ', $range);
        // $dates = explode('-', $range);
        // // dd($dates);
        // // $formatted = array_map(function ($date) {
        // //     return date('Y-m-d', strtotime($date));
        // // }, $dates);
        // // dd($formatted)
        // $startdate = Carbon::createFromDate($dates[0]);
        // $enddate = Carbon::createFromDate($dates[1]);
        // $test = $startdate->diffInDays($enddate);
        // dd($test);


        // dd($request->leave_range);
        // $request->validate([
        //     'date' => 'required',
        //     'duration' => 'required',
        // ]);
        // Leaves::create([
        //     'user_id' => $request->user_id,
        //     'date' => $request->date,
        //     'duration' => $request->duration,
        //     'reason' => $request->reason,
        //     'leave_type' => $request->leave_type
        // ]);
        $user = User::find($request->user_id);
        $paid_leaves = PaidLeaves::where('user_id', $user->id)->first();
        // dd($paid_leaves->preplan);
        $remain = $paid_leaves->preplan + $paid_leaves->emergency;
        // dd($remain);
        $leave = new Leaves();
        $leave->user_id = $request->user_id;
        if($request->duration == "Multiple"){
            $leave->date = $request->leave_range;
        }
        else
        {
            // dd($request->all());
            $leave->date = $request->date;
        }
        $leave->duration = $request->duration;
        $leave->reason = $request->reason;
        $leave->status = $request->status;
        if($remain > 0)
        {
        $leave->leave_type = 1;
        $paid_leaves->update([
            'preplan' => $paid_leaves->preplan - 1,
        ]);
        }
        else{
        $leave->leave_type = 0;
        }
        $leave->save();
        Alert::success('Success', "Leave Added successfully");
        return redirect()->route('leave.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = Leaves::find($id);
        if($leave->duration == "Multiple"){
            $range = GlobalHelper::daterange($leave->date);
        }
        else{
            $range = null;
        }
        return view('leave.detail', compact('leave', 'range'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leaves::find($id);
        $user_id = $leave->user_id;
        $paid_leaves = PaidLeaves::where('user_id', $user_id)->first();
        $user = User::all();
        $selecteduser = User::where('id', $leave->user_id)->first();
        return view('leave.edit', compact('leave', 'selecteduser', 'user','paid_leaves'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $paid_leaves = PaidLeaves::where('user_id', $request->user_id)->first();
        $remain = $paid_leaves->preplan + $paid_leaves->emergency;
        $request->validate([
            'date' => 'required',
            'duration' => 'required',
        ]);

        $leave['user_id'] = $request->user_id;
        if($request->duration == "Multiple"){
            $leave['date'] = $request->leave_range;
        }
        else
        {
            $leave['date'] = $request->date;
        }
        $leave['duration'] = $request->duration;
        $leave['reason'] = $request->reason;
        $leave['status'] = $request->status;
        if($remain > 0)
        {
            $leave['leave_type'] = 1;
        $paid_leaves->update([
            'preplan' => $paid_leaves->preplan - 1,
        ]);
        }
        else{
        $$leave['leave_type'] = 0;
        }

        Leaves::where('id', $id)->update($leave);
        // $leave->update([
        //     'user_id' => $request->user_id,
        //     'date' => $request->date,
        //     'duration' => $request->duration,
        //     'reason' => $request->reason,
        //     'leave_type' => $request->leave_type,
        //     'leave_status' => $request->leave_status
        // ]);
        Alert::success('Success', "Leave updated successfully");
        return redirect()->route('leave.index');
    }

    public function delete($id)
    {
        $leave = Leaves::find($id);
        return view('leave.delete', compact('leave'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leaves  $leaves
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $leave = Leaves::find($id);
        $leave->delete();
        Alert::success('Success', "Leave deleted successfully");
        return redirect()->route('leave.index');
    }
    public function paidleaves(Request $request)
    {
        if($request->ajax()){
            $user_leaves = PaidLeaves::where('user_id', $request->user)->first();
            return response()->json(['user_leaves' => $user_leaves]);
        }
    }
}
