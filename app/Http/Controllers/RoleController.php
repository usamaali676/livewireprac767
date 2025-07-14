<?php

namespace App\Http\Controllers;

// use App\Models\Permission;
// use App\Models\Role;

use App\Models\perm;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::all();
        $srno = 1;
        return view('role.index', compact('role', 'srno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('role.create');
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
            'role_name' => 'required|unique:roles,name,'
        ]);
       $role = Role::create(['name' => $request->role_name,]);
       perm::create([
            'name' =>  "role",
            'role_id' => $role->id,
            'create' => $request->role_create,
            'view' => $request->role_view,
            'edit' => $request->role_edit,
            'update' => $request->role_update,
            'delete' => $request->role_delete,
       ]);
       perm::create([
            'name' => "user",
            'role_id' => $role->id,
            'create' => $request->user_create,
            'view' => $request->user_view,
            'edit' => $request->user_edit,
            'update' => $request->user_update,
            'delete' => $request->user_delete,
       ]);
       perm::create([
            'name' => "dept",
            'role_id' => $role->id,
            'create' => $request->dept_create,
            'view' => $request->dept_view,
            'edit' => $request->dept_edit,
            'update' => $request->dept_update,
            'delete' => $request->dept_delete,
       ]);
       perm::create([
            'name' => "desig",
            'role_id' => $role->id,
            'create' => $request->desig_create,
            'view' => $request->desig_view,
            'edit' => $request->desig_edit,
            'update' => $request->desig_update,
            'delete' => $request->desig_delete,
       ]);
       perm::create([
            'name' => "vehicle",
            'role_id' => $role->id,
            'create' => $request->veh_create,
            'view' => $request->veh_view,
            'edit' => $request->veh_edit,
            'update' => $request->veh_update,
            'delete' => $request->veh_delete,
       ]);
    //    perm::create([
    //         'name' => "leave",
    //         'role_id' => $role->id,
    //         'create' => $request->leave_create,
    //         'view' => $request->leave_view,
    //         'edit' => $request->leave_edit,
    //         'update' => $request->leave_update,
    //         'delete' => $request->leave_delete,
    //    ]);
       perm::create([
        'name' => "sales",
        'role_id' => $role->id,
        'create' => $request->sheet_create,
        'view' => $request->sheet_view,
        'edit' => $request->sheet_edit,
        'update' => $request->sheet_update,
        'delete' => $request->sheet_delete,
        ]);
        perm::create([
                'name' => "cmnt",
                'role_id' => $role->id,
                'create' => $request->cmnt_create,
                'view' => $request->cmnt_view,
                'edit' => $request->cmnt_edit,
                'update' => $request->cmnt_update,
                'delete' => $request->cmnt_delete,
        ]);
        perm::create([
                'name' => "holiday",
                'role_id' => $role->id,
                'create' => $request->holiday_create,
                'view' => $request->holiday_view,
                'edit' => $request->holiday_edit,
                'update' => $request->holiday_update,
                'delete' => $request->holiday_delete,
        ]);
        perm::create([
                'name' => "finance",
                'role_id' => $role->id,
                'create' => $request->finance_create,
                'view' => $request->finance_view,
                'edit' => $request->finance_edit,
                'update' => $request->finance_update,
                'delete' => $request->finance_delete,
        ]);
        perm::create([
                'name' => "clients",
                'role_id' => $role->id,
                'create' => $request->clients_create,
                'view' => $request->clients_view,
                'edit' => $request->clients_edit,
                'update' => $request->clients_update,
                'delete' => $request->clients_delete,
        ]);
        perm::create([
                'name' => "service",
                'role_id' => $role->id,
                'create' => $request->service_create,
                'view' => $request->service_view,
                'edit' => $request->service_edit,
                'update' => $request->service_update,
                'delete' => $request->service_delete,
        ]);
        perm::create([
                'name' => "task",
                'role_id' => $role->id,
                'create' => $request->task_create,
                'view' => $request->task_view,
                'edit' => $request->task_edit,
                'update' => $request->task_update,
                'delete' => $request->task_delete,
        ]);
        perm::create([
                'name' => "reports",
                'role_id' => $role->id,
                'create' => $request->reports_create,
                'view' => $request->reports_view,
                'edit' => $request->reports_edit,
                'update' => $request->reports_update,
                'delete' => $request->reports_delete,
        ]);

        Alert::Success('Success' , "Role Added Successfully");
        return redirect()->route('role.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        // $permission =  $role->permissions;
        $perm = perm::all();
        return view('role.detail', compact('role',  'perm'));
    }
    public function delete($id)
    {
        $role = Role::find($id);
        // $permission =  $role->permissions;
        return view('role.delete', compact('role', ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $role = Role::find($id);
        if($role->id == 1){
            Alert::error('Error',"Role Can't be Edit");
            return redirect()->route('role.index');
        }
        $perm_role = perm::where('role_id', $role->id)->where('name', "role")->first();
        $perm_user = perm::where('role_id', $role->id)->where('name', "user")->first();
        $perm_dept = perm::where('role_id', $role->id)->where('name', "dept")->first();
        $perm_desig = perm::where('role_id', $role->id)->where('name', "desig")->first();
        $perm_veh = perm::where('role_id', $role->id)->where('name', "vehicle")->first();
        $perm_leave = perm::where('role_id', $role->id)->where('name', "leave")->first();
        $perm_holiday = perm::where('role_id', $role->id)->where('name', "holiday")->first();
        $perm_sheet = perm::where('role_id', $role->id)->where('name', "sales")->first();
        $perm_finance = perm::where('role_id', $role->id)->where('name', "finance")->first();
        // dd($perm_sheet);
        $perm_cmnt = perm::where('role_id', $role->id)->where('name', "cmnt")->first();
        $perm_service = perm::where('role_id', $role->id)->where('name', "service")->first();
        $perm_clients = perm::where('role_id', $role->id)->where('name', "clients")->first();
        $perm_task = perm::where('role_id', $role->id)->where('name', "task")->first();
        $perm_reports = perm::where('role_id', $role->id)->where('name', "reports")->first();
        return view('role.edit', compact('role','perm_role','perm_user','perm_dept','perm_desig','perm_veh','perm_leave','perm_holiday','perm_sheet', 'perm_cmnt', 'perm_finance', 'perm_service', 'perm_clients','perm_task', 'perm_reports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'role_name' => 'unique:roles,name,'.$id,
        ]);

        $role = Role::where('id',$request->id)->first();
        $role->update([
            'name'=>$request->role_name,
        ]);
        $perm_role = perm::where('role_id', $role->id)->where('name', "role")->first();
        if($perm_role != null) {
            $perm_role->update([
                'create' => $request->role_create,
                'view' => $request->role_view,
                'edit' => $request->role_edit,
                'update' => $request->role_update,
                'delete' => $request->role_delete
            ]);
        }
        else
        {
            perm::create([
                'name' => "role",
                'role_id' => $role->id,
                'create' => $request->role_create,
                'view' => $request->role_view,
                'edit' => $request->role_edit,
                'update' => $request->role_update,
                'delete' => $request->role_delete
            ]);
        }
        $perm_user = perm::where('role_id', $role->id)->where('name', "user")->first();
        if($perm_user != null) {
            $perm_user->update([
                'create' => $request->user_create,
                'view' => $request->user_view,
                'edit' => $request->user_edit,
                'update' => $request->user_update,
                'delete' => $request->user_delete
            ]);
        }
        else
        {
            perm::create([
                'name' => "user",
                'role_id' => $role->id,
                'create' => $request->user_create,
                'view' => $request->user_view,
                'edit' => $request->user_edit,
                'update' => $request->user_update,
                'delete' => $request->user_delete
            ]);
        }


        $perm_dept = perm::where('role_id', $role->id)->where('name', "dept")->first();
        if($perm_dept != null) {
        $perm_dept->update([
            'create' => $request->dept_create,
            'view' => $request->dept_view,
            'edit' => $request->dept_edit,
            'update' => $request->dept_update,
            'delete' => $request->dept_delete
        ]);
    }
    else
    {
        perm::create([
            'name' => "dept",
            'role_id' => $role->id,
            'create' => $request->dept_create,
            'view' => $request->dept_view,
            'edit' => $request->dept_edit,
            'update' => $request->dept_update,
            'delete' => $request->dept_delete
        ]);
    }
        $perm_desig = perm::where('role_id', $role->id)->where('name', "desig")->first();
        if($perm_desig != null){
        $perm_desig->update([
            'create' => $request->desig_create,
            'view' => $request->desig_view,
            'edit' => $request->desig_edit,
            'update' => $request->desig_update,
            'delete' => $request->desig_delete,
        ]);
    }
    else
    {
        perm::create([
            'name' => "desig",
            'role_id' => $role->id,
            'create' => $request->desig_create,
            'view' => $request->desig_view,
            'edit' => $request->desig_edit,
            'update' => $request->desig_update,
            'delete' => $request->desig_delete,
        ]);
    }
        $perm_veh = perm::where('role_id', $role->id)->where('name', "vehicle")->first();
        if($perm_veh != null){
        $perm_veh->update([
            'create' => $request->veh_create,
            'view' => $request->veh_view,
            'edit' => $request->veh_edit,
            'update' => $request->veh_update,
            'delete' => $request->veh_delete,
        ]);
    }
    else
    {
        perm::create([
            'name' => "vehicle",
            'role_id' => $role->id,
            'create' => $request->veh_create,
            'view' => $request->veh_view,
            'edit' => $request->veh_edit,
            'update' => $request->veh_update,
            'delete' => $request->veh_delete,
        ]);
    }
    //     $perm_leave = perm::where('role_id', $role->id)->where('name', "leave")->first();
    //     if($perm_leave != null){
    //     $perm_leave->update([
    //         'create' => $request->leave_create,
    //         'view' => $request->leave_view,
    //         'edit' => $request->leave_edit,
    //         'update' => $request->leave_update,
    //         'delete' => $request->leave_delete,
    //     ]);
    // }
    // else
    // {
    //     perm::create([
    //         'name' => "leave",
    //         'role_id' => $role->id,
    //         'create' => $request->leave_create,
    //         'view' => $request->leave_view,
    //         'edit' => $request->leave_edit,
    //         'update' => $request->leave_update,
    //         'delete' => $request->leave_delete,
    //     ]);
    // }
    $perm_sales = perm::where('role_id', $role->id)->where('name', "sales")->first();
    if(isset($perm_sales)) {
    $perm_sales->update([
        'create' => $request->sheet_create,
        'view' => $request->sheet_view,
        'edit' => $request->sheet_edit,
        'update' => $request->sheet_update,
        'delete' => $request->sheet_delete
    ]);
    }
    else
    {
        perm::create([
            'sales' => "sales",
            'create' => $request->sheet_create,
            'view' => $request->sheet_view,
            'edit' => $request->sheet_edit,
            'update' => $request->sheet_update,
            'delete' => $request->sheet_delete
        ]);
    }
    $perm_cmnt = perm::where('role_id', $role->id)->where('name', "cmnt")->first();
    if(isset($perm_cmnt)){
    $perm_cmnt->update([
        'create' => $request->cmnt_create,
        'view' => $request->cmnt_view,
        'edit' => $request->cmnt_edit,
        'update' => $request->cmnt_update,
        'delete' => $request->cmnt_delete,
    ]);
    }
    else
    {
        perm::create([
            'name' => "cmnt",
            'create' => $request->cmnt_create,
            'view' => $request->cmnt_view,
            'edit' => $request->cmnt_edit,
            'update' => $request->cmnt_update,
            'delete' => $request->cmnt_delete,
        ]);
    }
    $perm_holiday = perm::where('role_id', $role->id)->where('name', "holiday")->first();
    if(isset($perm_holiday)){
    $perm_holiday->update([
        'create' => $request->holiday_create,
        'view' => $request->holiday_view,
        'edit' => $request->holiday_edit,
        'update' => $request->holiday_update,
        'delete' => $request->holiday_delete,
    ]);
    }
    else
    {
        perm::create([
            'name' => "holiday",
            'create' => $request->holiday_create,
            'view' => $request->holiday_view,
            'edit' => $request->holiday_edit,
            'update' => $request->holiday_update,
            'delete' => $request->holiday_delete,
        ]);
    }
    $perm_finance = perm::where('role_id', $role->id)->where('name', "finance")->first();
    if(isset($perm_finance)){
    $perm_finance->update([
        'create' => $request->finance_create,
        'view' => $request->finance_view,
        'edit' => $request->finance_edit,
        'update' => $request->finance_update,
        'delete' => $request->finance_delete,
    ]);
    }
    else
    {
        perm::create([
            'name' => "finance",
            'create' => $request->finance_create,
            'view' => $request->finance_view,
            'edit' => $request->finance_edit,
            'update' => $request->finance_update,
            'delete' => $request->finance_delete,
        ]);
    }

    $perm_clients = perm::where('role_id', $role->id)->where('name', "clients")->first();
    if(isset($perm_clients)){
    $perm_clients->update([
        'create' => $request->clients_create,
        'view' => $request->clients_view,
        'edit' => $request->clients_edit,
        'update' => $request->clients_update,
        'delete' => $request->clients_delete,
    ]);
    }
    else
    {
        perm::create([
            'name' => "clients",
            'create' => $request->finance_create,
            'view' => $request->finance_view,
            'edit' => $request->finance_edit,
            'update' => $request->finance_update,
            'delete' => $request->finance_delete,
        ]);
    }

    $perm_service = perm::where('role_id', $role->id)->where('name', "service")->first();
    if(isset($perm_service)){
    $perm_service->update([
        'create' => $request->service_create,
        'view' => $request->service_view,
        'edit' => $request->service_edit,
        'update' => $request->service_update,
        'delete' => $request->service_delete,
    ]);
    }
    else
    {
        perm::create([
            'name' => "service",
            'create' => $request->service_create,
            'view' => $request->service_view,
            'edit' => $request->service_edit,
            'update' => $request->service_update,
            'delete' => $request->service_delete,
        ]);
    }

    $perm_task = perm::where('role_id', $role->id)->where('name', "task")->first();
    if(isset($perm_task)){
    $perm_task->update([
        'create' => $request->task_create,
        'view' => $request->task_view,
        'edit' => $request->task_edit,
        'update' => $request->task_update,
        'delete' => $request->task_delete,
    ]);
    }
    else
    {
        perm::create([
            'name' => "task",
            'create' => $request->task_create,
            'view' => $request->task_view,
            'edit' => $request->task_edit,
            'update' => $request->task_update,
            'delete' => $request->task_delete,
        ]);
    }

    $perm_reports = perm::where('role_id', $role->id)->where('name', "reports")->first();
    if(isset($perm_reports)){
    $perm_reports->update([
        'create' => $request->reports_create,
        'view' => $request->reports_view,
        'edit' => $request->reports_edit,
        'update' => $request->reports_update,
        'delete' => $request->reports_delete,
    ]);
    }
    else
    {
        perm::create([
            'name' => "reports",
            'create' => $request->reports_create,
            'view' => $request->reports_view,
            'edit' => $request->reports_edit,
            'update' => $request->reports_update,
            'delete' => $request->reports_delete,
        ]);
    }

        Alert::success('Success', 'Role Updated Successfully');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $deleteRole = Role::find($id);
        // $deleteRole->delete();
        // return redirect()->route('role.index');
        $userData = User::where('role_id',$deleteRole->id)->get();
        // dd($userData);
        if($userData->count()>0)
        {
            // dd(true);
            Alert::error('opps!', 'Please Delete child Object First ');
            return redirect()->route('role.index');
        }
        //dd($deleteRole);

        else {
            $role = Role::all();
            if ($role->count()==1) {
                Alert::error('Opps!','This Action Can not Perform! Minimun 1 Role Required');
                return redirect()->back();
            }
            else{
                    if($id == 1){
                        Alert::error('Opps', "You Can't Delete this Role");
                        return redirect()->route('role.index');
                    }
                    else {
                        $perm = perm::where('role_id', $id)->get();
                        foreach ($perm as $value) {
                            $value->delete();
                        }
                        Role::where('id',$id)->delete();
                        Alert::success('Success', 'Role Deleted Successfully');
                        return  redirect()->route('role.index');
                    }
                }
            }
    }
}
