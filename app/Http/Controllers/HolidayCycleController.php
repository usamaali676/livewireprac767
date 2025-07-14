<?php

namespace App\Http\Controllers;

use App\Models\HolidayCycle;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Helpers\GlobalHelper;
use App\Rules\RemainingHoliday;
use App\Models\User;

class HolidayCycleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holiday = HolidayCycle::all();
        $srno = 1;
        return view('holiday.index', compact('holiday', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('holiday.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'year' => 'required',
            'total' => 'required',
            'remaining' => 'required',
        ]);
        $oldrecode = HolidayCycle::where('user_id', $request->user_id)->first();
        // dd($oldrecode);
        if($oldrecode  == NULL){
            HolidayCycle::firstorcreate([
                'user_id' => $request->user_id,
                'year' => $request->year,
                'total' => $request->total,
                'remaining' => $request->remaining,
            ]);
        Alert::success('Success', "Holiday Created Successfully");
        return redirect()->route('holiday.index');
        }
        else{
            Alert::error('Error', "Recode Already Exist");
            return redirect()->route('holiday.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HolidayCycle  $holidayCycle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holiday = HolidayCycle::find($id);

        return view('holiday.detail', compact('holiday'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HolidayCycle  $holidayCycle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = HolidayCycle::find($id);
        $user = User::all();
        $selecteduser = User::find($holiday->user_id);
        return view('holiday.edit', compact('holiday','user','selecteduser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HolidayCycle  $holidayCycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $holiday = HolidayCycle::find($id);
        // GlobalHelper::holidays_count($holiday);

        $request->validate([
            'user_id' => 'required',
            'total' => 'required',
            'year' => 'required',
            'remaining' => 'required',
        ]);

        // $fieldNames = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep',  'oct', 'nov', 'dec'];
        // // $sum = $value->jan + $value->feb + $value->Mar + $value->apr + $value->may + $value->jun + $value->jul + $value->Aug +  $value->sep +  $value->oct + $value->nov + $value->dec;
        // $sum = 0;
        // foreach ($fieldNames as $fieldName) {
        //     $sum += $request->input($fieldName, 0);
        // }

        // $total = $request->total - $sum;

        // dd($sum);

        $holiday = HolidayCycle::find($id);
        // $remaing = $holiday->total - $sum;
        // dd($holiday->total);
        // if($holiday->total >= $sum){
        $holiday->update([
            'user_id' => $request->user_id,
            'total' => $request->total,
            'year' => $request->year,
            'remaining' => $request->remaining,
        ]);
        Alert::success('succes', "Updated Added successfully");
        return redirect()->route('holiday.index');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HolidayCycle  $holidayCycle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $holiday = HolidayCycle::find($id);
        $holiday->delete();
        Alert('success', "Deleted successfully");
        return redirect()->route('holiday.index');
    }
}
