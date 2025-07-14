<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Designation;
use App\Models\PaidLeaves;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Sales;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Traits\hasRoles;
use Carbon\Carbon;
use App\Models\HolidayCycle;
use App\Helpers\GlobalHelper;
use App\Models\Security;
use App\Traits\OptimisticLockingTrait;

class UserController extends Controller
{
    use OptimisticLockingTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = User::where('id', 3)->get();
        // dd($user->HasRole('User'));
        $srno = 1;
        $user = User::all();
        return view('user.index', compact('user', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::all();
        $designation = Designation::all();
        $department = Department::all();
        $vehicle = Vehicle::all();
        return view('user.create', compact('role','designation','department','vehicle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $date = Carbon::parse($request->ph_cycle_from)->format('M');
        // dd($date);
        // dd($request->all());

        $request->validate([
            'email' => 'required|unique:users,email',
            'name' => 'required|unique:users,name',
            'password' => 'required',
            'dept_id' => 'required',
            'desig_id' => 'required',
            'fatherName' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'joindate' => 'required',
            'currAddress' => 'required',
            'lastDegree' => 'required',
        ]);
    	$add_user = new User();
    	$add_user->name = $request->name;
        $add_user->dept_id = $request->dept_id;
        $add_user->is_agent = $request->is_agent ? 1 : 0 ?? 0;
        $add_user->is_closer = $request->is_closer ? 1 : 0 ?? 0;
        $add_user->desig_id = $request->desig_id;
        $add_user->role_id = $request->role_id;
        $add_user->vehicle_id = $request->vehicle_id;
        $add_user->fatherName = $request->fatherName;
        $add_user->cnic = $request->cnic;
        $add_user->phone = $request->phone;
        $add_user->offEmail = $request->offEmail;
        $add_user->perEmail = $request->perEmail;
        $add_user->joindate = $request->joindate;
        $add_user->dob = $request->dob;
        $add_user->currAddress = $request->currAddress;
        $add_user->perAddress = $request->perAddress;
        $add_user->lastDegree = $request->lastDegree;
        $add_user->currDegree = $request->currDegree;
        $add_user->emgContactName = $request->emgContactName;
        $add_user->emgContactRelation = $request->emgContactRelation;
        $add_user->emgContactNumber = $request->emgContactNumber;
        $add_user->gender = $request->gender;
        $add_user->marital_status = $request->marital_status ? 1 : 0 ?? 0;
        $add_user->employment_type = $request->employment_type ? 1 : 0 ?? 0;
        $add_user->blood_group = $request->blood_group;
        $add_user->documents_desc = $request->doc_desc;
        $add_user->basic_salary = $request->basic_salary;
        $add_user->security = $request->security;
        $add_user->ph_cycle = $request->ph_cycle;
        $add_user->total_holiday = $request->total_holiday;
    	$add_user->email = $request->email;
    	$add_user->password = Hash::make($request->password);
        $add_user->save();

        $month = Carbon::now()->format('M');
        Security::firstOrcreate([
            'user_id' => $add_user->id,
            'total' => '0',
            'total_months' => '0',
            'return_months' => $month,
            'paid' => '0',
        ]);

        HolidayCycle::firstOrcreate([
            'user_id' => $add_user->id,
            'year' => Carbon::now()->format('Y'),
            'total' => $request->total_holiday,
            'remaining' => $request->total_holiday,
            'created_at' => Carbon::now()
        ]);


        // PaidLeaves::insert([
        //     'user_id' => $add_user->id,
        //     'preplan' => $request->preplan,
        //     'emergency' => $request->emergency
        // ]);
        Alert::success('Success','User Added Successfully');
    	return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $holiday = HolidayCycle::where('user_id', $user->id)->first();
        // $holiday = HolidayCycle::find($id);
        GlobalHelper::holidays_count($holiday);
        // dd($holiday);
        // $client = Sales::where('agent_name', $user->name)->count();
        // $closed = Sales::where('closer_name', $user->name)->count();
        return view('user.show', compact('user', 'holiday'));
    }
    public function delete($id)
    {
        $user = User::find($id);
        // $client = Sales::where('agent_name', $user->name)->count();
        // $closed = Sales::where('closer_name', $user->name)->count();
        return view('user.delete', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (session()->has('editing_record') && session('editing_record') !== $user->id) {
            Alert::error('Oops', "Another User is Already Editing");
            return redirect()->back();
        }
        else{
            session(['editing_record' => $user->id]);
            $selectedRole = Role::where('id',$user->role_id)->first();
            $role = Role::all();
            $selectedDesig = Designation::where('id',$user->desig_id)->first();
            $designation = Designation::all();
            $selectedDept = Department::where('id',$user->dept_id)->first();
            $department = Department::all();
            $selectedVehicle = Vehicle::where('id',$user->vehicle_id)->first();
            $vehicle = Vehicle::all();
            $paidleaves = PaidLeaves::where('user_id',$user->id)->first();
            return view('user.edit', compact('user', 'role','selectedRole','designation','department','vehicle','selectedDesig','selectedDept','selectedVehicle','paidleaves'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'unique:users,email,'.$id,
            'name' => 'required',
            'dept_id' => 'required',
            'desig_id' => 'required',
            'fatherName' => 'required',
            'cnic' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'joindate' => 'required',
            'currAddress' => 'required',
            'lastDegree' => 'required',
        ]);
        $newpassword = $request->password;
        $user['name'] = $request->name;
        $user['email'] = $request->email;
        $user['role_id'] = $request->role_id;
        if ($request->password != null) {
            $user['password'] = Hash::make($newpassword);
        }
        $user['dept_id'] = $request->dept_id;
        $user['is_agent'] = $request->is_agent ? 1 : 0 ?? 0;
        $user['is_closer'] = $request->is_closer ? 1 : 0 ?? 0;
        $user['desig_id'] = $request->desig_id;
        $user['vehicle_id'] = $request->vehicle_id;
        $user['fatherName'] = $request->fatherName;
        $user['cnic'] = $request->cnic;
        $user['phone'] = $request->phone;
        $user['offEmail'] = $request->offEmail;
        $user['perEmail'] = $request->perEmail;
        $user['dob'] = $request->dob;
        $user['joindate'] = $request->joindate;
        $user['currAddress'] = $request->currAddress;
        $user['perAddress'] = $request->perAddress;
        $user['lastDegree'] = $request->lastDegree;
        $user['currDegree'] = $request->currDegree;
        $user['emgContactName'] = $request->emgContactName;
        $user['emgContactNumber'] = $request->emgContactNumber;
        $user['emgContactRelation'] = $request->emgContactRelation;
        $user['gender'] = $request->gender;
        $user['marital_status'] = $request->marital_status ? 1 : 0 ?? 0;
        $user['employment_type'] = $request->employment_type ? 1 : 0 ?? 0;
        $user['blood_group'] = $request->blood_group;
        $user['documents_desc'] = $request->doc_desc;
        $user['basic_salary'] = $request->basic_salary;
        $user['security'] = $request->security;
        $user['ph_cycle'] = $request->ph_cycle;
        $user['total_holiday'] = $request->total_holiday;
        User::where('id', $id)->update($user);
        $holiday = HolidayCycle::where('user_id', $id)->first();
        $holiday->update([
            'cycle' => $request->ph_cycle,
        ]);
        // $user = User::where('id',$id)->first();

        // dd($user);
        // if ($request->password != null) {
        //     $user->update([
        //         'name'=>$request->name,
        //         'email'=>$request->email,
        //         'password'=>Hash::make($newpassword),
        //         'role_id'=>$request->role_id,
        //         'is_agent' => $request->is_agent ? 1 : 0 ?? 0,
        //         'is_closer' => $request->is_closer ? 1 : 0 ?? 0
        //     ]);
        // }
        // else{
        //     $user->update([
        //         'name'=>$request->name,
        //         'email'=>$request->email,
        //         'role_id'=>$request->role_id,
        //         'is_agent' => $request->is_agent ? 1 : 0 ?? 0,
        //         'is_closer' => $request->is_closer ? 1 : 0 ?? 0
        //     ]);



            Alert::success('Success','User Updated successfully');
    		return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::all();
        if ($user->count()==1) {
            Alert::error('Opps!','This Action Can not Perform! Minimun 1 User Required');
            return redirect()->route('user.index');
        }
        else{
          $user =  User::find($id);
          if($user->id == 1){
            Alert::error('Opps!','You can not Delete this User');
            return redirect()->route('user.index');
          }
          else{
            User::where('id', $id)->delete();
            Alert::success('Success','User Deleted successfully');
            return redirect()->route('user.index');
          }
        }
    }



}
