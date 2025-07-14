<?php

namespace App\Http\Controllers;

use App\Models\Salry;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\HolidayCycle;
use App\Models\Fine;
use App\Models\Advance;
use App\Models\Year;
use App\Models\Security;
use App\Models\MonthlySecurity;
use App\Models\Monthlyholiday;

class SalryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srno = 1;
        $salary = Salry::all();
        return view('salary.index', compact('salary', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = User::all();
        return view('salary.create', compact('user'));
    }
    public function getuser(Request $request)
    {
        if($request->ajax()){
            $user = User::where('id', $request->user_id)->first();
            $remainingholiday = HolidayCycle::where('user_id', $user->id)->first();
            $currentDate = Carbon::now();
            $firstDayOfLastMonth = $currentDate->subMonth()->startOfMonth();
            $lastDayOfLastMonth = $currentDate->endOfMonth();
            $userFines = Fine::where('user_id', $user->id)
            ->whereMonth('date', $currentDate->subMonth())
            ->whereYear('date', $currentDate->year)
            ->sum('amount');
            $advance = Advance::where('user_id', $user->id)->first();
            $security = Security::where('user_id', $user->id)->first();
           return response()->json(['user' => $user , 'holiday' => $remainingholiday ,'userFines' => $userFines, 'advance' => $advance, 'security' => $security]);
        }

    }
    public function getsecurity(Request $request)
    {
        if($request->ajax()){
            $user = User::where('id', $request->user)->first();
            $security = Security::where('user_id', $user->id)->first();
            $totalmonthsecurity = MonthlySecurity::where('security_id', $security->id)->where('cleared', '==' , false)->limit($request->month)
            ->get()
            ->sum('amount');
            return response()->json(['totalmonthsecurity' => $totalmonthsecurity]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $total_late = intval($request->lates/3);
        // dd($total_late);

        $request->validate([
            'year' => 'required',
            'month' => 'required',
            'basic_salary' => 'required',
            'user_id' => 'required',
            // 'security_deduct' => 'required',
            'working_days' => 'required',
        ]);
        // Salary::firstOrcreate([
        //     'user_id' => $request->user_id,

        // ]);
        // dd($request->all());
        $pin = mt_rand(1000000, 9999999)
            .date('Y');
        $invoicestring = str_shuffle($pin);
        $user = User::find($request->user_id);
        $lastsalary = Salry::where('year', $request->year)->where('salary_month', $request->month)->first();
        // dd($lastsalary);

        // dd($lastsalary);
        // if(isset($lastsalary))
        // {
        //     $lastsalarydate = Carbon::parse($lastsalary->date);
        // }
        // else
        // {
        //     $datenow = Carbon::now();
        //     $lastsalarydate = $datenow->subMonth();
        // }
        // $currentMonth = Carbon::now()->month;
        // $halfdaydeduct = ($user->basic_salary/($request->working_days * 2)) * $request->half_day_deduct;
        // dd($halfdaydeduct);
        if($lastsalary == NULL){
        // dd($lastsalary);
        $salary = new Salry();
        $salary->user_id = $request->user_id;
        $salary->date = Carbon::now();
        $salary->tracker_id = $invoicestring;
        $salary->basic_salary = $user->basic_salary;
        $salary->m_commission_usd = $request->m_commission_usd;
        $salary->m_commission_pkr = $request->m_commission_pkr;
        // $salary->dev_commission_usd	 = $request->dev_commission_usd;
        // $salary->dev_commission_pkr = $request->dev_commission_pkr;
        $salary->total_commission = $request->total_commission;
        $salary->bonus = $request->bonus;
        $salary->advance_deduct = $request->advance_deduct;
        $salary->unpaid_days = $request->holiday_deduct;
        $salary->half_days = $request->half_day_deduct;
        $holidaydeduct = ($user->basic_salary/$request->working_days) * $request->holiday_deduct;
        $salary->holiday_deduct = $holidaydeduct;
        $halfdaydeduct = ($user->basic_salary/($request->working_days * 2)) * $request->half_day_deduct;
        $salary->half_day_deduct = $halfdaydeduct;
        $salary->fine_deduct = $request->fine_deduct;
        // $salary->food_deduct = $request->food_deduct;
        $salary->comments = $request->comments;
        $salary->security_deduct = $request->security_deduct;
        $salary->working_days = $request->working_days;
        $total_late = intval($request->lates/3);
        $late_deduct = ($user->basic_salary/$request->working_days) * $total_late;
        $salary->lates_deduct = $late_deduct;
        $total = ($user->basic_salary + $request->total_commission + $request->bonus + $request->security_clearance) - $request->advance_deduct - $holidaydeduct - $halfdaydeduct - $request->fine_deduct  - $request->security_deduct - $request->advance_deduct - $late_deduct;
        $salary->total_salary = $total;
        $salary->year = $request->year;
        $salary->salary_month = $request->month;
        $salary->lates = $request->lates;
        $salary->cleared_months = $request->cleared_months;
        // dd($total);

        $year = Year::firstOrcreate([
            'year' => $request->year,
        ]);
        $user_security = Security::where('user_id', $user->id)->first();
        $user_total_security = $user_security->total + $request->security_deduct;
        if($request->security_clearance == NULL)
        {
            $user_security->update([
                'total' => $user_total_security,
                'total_months' => $user_security->total_months + 1,
            ]);
        }
        else{
            $paid_security = $user_security->paid + $request->security_clearance;
            $remainningsecurity = $user_total_security - $paid_security;
            $user_security->update([
                'total' => $remainningsecurity,
                'total_months' => $user_security->total_months + 1,
                'paid' => $paid_security,
            ]);
        }
        $security = MonthlySecurity::create([
            'security_id' => $user_security->id,
            'year_id' => $year->id,
            'month' => $request->month,
            'amount' => $request->security_deduct,
        ]);
        $monthlysecurity = MonthlySecurity::where('security_id', $user_security->id)->where('cleared' , '!='  , true)->limit($request->cleared_months)->get();
        foreach($monthlysecurity as $item)
        {
            $item->update([
                'cleared' => true,
            ]);
        }
        $salary->security_clearance = $request->security_clearance;
        $advance = Advance::where('user_id', $user->id)->first();
        if(isset($advance)){
            $deduted_advance =  $advance->amount - $request->advance_deduct;
            $advance->update([
                'amount' => $deduted_advance,
            ]);
        }
        if($request->holiday_compen > 0){
        $salary->holiday_compen = $request->holiday_compen;
        $holidaycycle = HolidayCycle::where('user_id', $user->id)->first();
        $remainholiday = $holidaycycle->remaining - $request->holiday_compen;
        $holidaycycle->update([
            'remaining' => $remainholiday,
        ]);
        MonthlyHoliday::firstorcreate([
            'holiday_cycle_id' => $holidaycycle->id,
            'year_id' => $year->id,
            'month' => $request->month,
            'holidays' => $request->holiday_compen,
        ]);
    }

        $salary->save();

        Alert::success('success', "Salary Genrated successfully");
        return redirect()->route('salary.index');

    }
    else{
    Alert::error('oops', "Salary of this user Already Genrated");
    return redirect()->route('salary.index');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Salry  $salry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd("nfnf");
        $salary = Salry::find($id);
        return view('salary.show', compact('salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Salry  $salry
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salary = Salry::find($id);
        $user = User::all();
        $selecteduser = User::where('id', $salary->user_id)->first();
        return view('salary.edit', compact('salary','user','selecteduser'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Salry  $salry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'year' => 'required',
            'month' => 'required',
            'user_id' => 'required',
            'security_deduct' => 'required',

        ]);
        $pin = mt_rand(1000000, 9999999)
            .date('Y');
        $invoicestring = str_shuffle($pin);
        $existingRecord = Salry::where('id', '!=', $id)
        ->where('year', $request->year)
        ->where('salary_month', $request->month)
        ->first();
        // dd($existingRecord);
        if($existingRecord == NULL){
        $user = User::find($request->user_id);
        $salary = Salry::find($id);
        $salary['user_id'] = $request->user_id;
        $salary['date'] = Carbon::now();
        $salary['tracker_id'] = $invoicestring;
        $salary['basic_salary'] = $user->basic_salary;
        $salary['m_commission_usd'] = $request->m_commission_usd;
        $salary['m_commission_pkr'] = $request->m_commission_pkr;
        // $salary['dev_commission_usd']	 = $request->dev_commission_usd;
        // $salary['dev_commission_pkr'] = $request->dev_commission_pkr;
        $salary['total_commission'] = $request->total_commission;
        $salary['bonus'] = $request->bonus;
        $salary['advance_deduct'] = $request->advance_deduct;
        $salary['unpaid_days'] = $request->holiday_deduct;
        $salary['half_days'] = $request->half_day_deduct;
        $holidaydeduct = ($user->basic_salary/$request->working_days) * $request->holiday_deduct;
        $salary['holiday_deduct'] = $holidaydeduct;
        $halfdaydeduct = ($user->basic_salary/($request->working_days * 2)) * $request->half_day_deduct;
        $salary['half_day_deduct'] = $halfdaydeduct;
        $salary['fine_deduct'] = $request->fine_deduct;
        // $salary['food_deduct'] = $request->food_deduct;
        $salary['comments'] = $request->comments;
        $salary['security_deduct'] = $request->security_deduct;
        $salary['working_days'] = $request->working_days;
        $salary['lates'] = $request->lates;
        $total_late = intval($request->lates/3);
        $late_deduct = ($user->basic_salary/$request->working_days) * $total_late;
        $salary['lates_deduct'] = $late_deduct;
        $total = ($user->basic_salary + $request->total_commission + $request->bonus + $request->security_clearance) - $request->advance_deduct - $holidaydeduct - $halfdaydeduct - $request->fine_deduct - $request->security_deduct - $request->advance_deduct - $late_deduct;
        $salary['total_salary'] = $total;
        $salary['year'] = $request->year;
        $salary['salary_month'] = $request->month;
        $salary['cleared_months'] = $request->cleared_months;
        $year = Year::updateOrCreate([
            'year' => $request->year,
        ]);
        $user_security = Security::where('user_id', $user->id)->first();
        // dd($user_security->total);


        if($request->security_clearance == NULL)
        {
            if($request->security_deduct != $salary->security_deduct){
                $user_total_security = $user_security->total + $request->security_deduct - $salary->security_deduct;
                $user_security->update([
                    'total' => $user_total_security,
                    // 'total_months' => $user_security->total_months + 1,
                ]);
            }
        }
        else{
            if($request->security_clearance != $salary->security_clearance){
                $paid_security = $user_security->paid + $request->security_clearance - $salary->security_clearance;
                $remainningsecurity = $user_total_security + $salary->security_clearance - $request->security_clearance ;
                $remainingmonth = $request->security_clearance / $user->Security;
                $user_security->update([
                    'total' => $remainningsecurity,
                    // 'total_months' => $user_security->total_months + 1,
                    'paid' => $paid_security,
                ]);
            }
        }
        $montlysecurity = MonthlySecurity::where('security_id', $user_security->id)->where('year_id', $year->id)->where('month', $request->month)->first();
        if(isset($montlysecurity)){
            $montlysecurity->update([
                'year_id' => $year->id,
                'month' => $request->month,
                'amount' => $request->security_deduct,
            ]);
        }
        else
        {
            $montlysecurity = MonthlySecurity::create([
                'security_id' => $user_security->id,
                'year_id' => $year->id,
                'month' => $request->month,
                'amount' => $request->security_deduct,
            ]);
        }

        $salary['security_clearance'] = $request->security_clearance;
        $advance = Advance::where('user_id', $user->id)->first();
        if(isset($advance)){
            $deduted_advance =  $advance->amount - $request->advance_deduct;
            $advance->update([
                'amount' => $deduted_advance,
            ]);
        }

        $holidaycycle = HolidayCycle::where('user_id', $user->id)->first();
        $remainholiday = $holidaycycle->remaining + intval($salary->holiday_compen) - intval($request->holiday_compen);
        // dd(intval($remainholiday));
        $holidaycycle->update([
            'remaining' => $remainholiday,
        ]);
        $monthly_holiday = MonthlyHoliday::where('holiday_cycle_id', $holidaycycle->id)->first();
        if(isset($monthly_holiday)){
            $monthly_holiday->update([
                'holiday_cycle_id' => $holidaycycle->id,
                'year_id' => $year->id,
                'month' => $request->month,
                'holidays' => $request->holiday_compen
            ]);
        }
        $salary['holiday_compen'] = $request->holiday_compen;

        $salary->update();

        Alert::success('success', "Salary Updated successfully");
        return redirect()->route('salary.index');

        }
        else
        {
            Alert::error('Oops', "Dplicated Month Salary");
            return redirect()->route('salary.index');
        }

        // dd($salary);


    }

    public function delete($id)
    {
        $salary = Salry::find($id);
        return view('salary.delete', compact('salary'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Salry  $salry
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salary = Salry::find($id);
        $salary->delete();
        Alert::success('Success', "Salary Deleted Successfully");
        return redirect()->route('salary.index');
    }
}
