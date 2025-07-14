@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit Role
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{route('role.update',$role->id)}}" method="POST">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Name</label>
                            <input id="regular-form-3" name="role_name" type="text" class="form-control" placeholder="Role Name" value="{{$role->name}}">
                            <div class="form-help">Role Name Must be Unique</div>
                        </div>
                        <div class="mt-3">
                            <P>Permissions</P>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Role</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="role_create">
                                    <input id="checkbox-switch-1" class="form-check-input" type="checkbox" value="1" name="role_create" @if (isset($perm_role) && $perm_role->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-1">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="role_view">
                                    <input id="checkbox-switch-2" class="form-check-input" type="checkbox" value="1" name="role_view" @if (isset($perm_role) && $perm_role->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-2">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_edit">
                                    <input id="checkbox-switch-3" class="form-check-input" type="checkbox" value="1" name="role_edit" @if (isset($perm_role) && $perm_role->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-3">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_update">
                                    <input id="checkbox-switch-4" class="form-check-input" type="checkbox" value="1" name="role_update" @if (isset($perm_role) && $perm_role->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-4">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_delete">
                                    <input id="checkbox-switch-5" class="form-check-input" type="checkbox" value="1" name="role_delete" @if (isset($perm_role) && $perm_role->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-5">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">User</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="user_create">
                                    <input id="checkbox-switch-6" class="form-check-input" type="checkbox" value="1" name="user_create" @if (isset($perm_user) && $perm_user->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-6">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="user_view">
                                    <input id="checkbox-switch-7" class="form-check-input" type="checkbox" value="1" name="user_view" @if ( isset($perm_user) && $perm_user->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-7">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_edit">
                                    <input id="checkbox-switch-8" class="form-check-input" type="checkbox" value="1" name="user_edit" @if ( isset($perm_user) && $perm_user->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-8">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_update">
                                    <input id="checkbox-switch-9" class="form-check-input" type="checkbox" value="1" name="user_update" @if (isset($perm_user) && $perm_user->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-9">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_delete">
                                    <input id="checkbox-switch-10" class="form-check-input" type="checkbox" value="1" name="user_delete" @if (isset($perm_user) && $perm_user->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-10">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Department</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_create">
                                    <input id="checkbox-switch-11" class="form-check-input" type="checkbox" value="1" name="dept_create" @if (isset($perm_dept) && $perm_dept->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-11">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_view">
                                    <input id="checkbox-switch-12" class="form-check-input" type="checkbox" value="1" name="dept_view" @if (isset($perm_dept) && $perm_dept->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-12">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_edit">
                                    <input id="checkbox-switch-13" class="form-check-input" type="checkbox" value="1" name="dept_edit" @if (isset($perm_dept) && $perm_dept->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-13">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_update">
                                    <input id="checkbox-switch-14" class="form-check-input" type="checkbox" value="1" name="dept_update" @if (isset($perm_dept) && $perm_dept->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-14">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_delete">
                                    <input id="checkbox-switch-15" class="form-check-input" type="checkbox" value="1" name="dept_delete" @if (isset($perm_dept) && $perm_dept->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-15">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Designation</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_create">
                                    <input id="checkbox-switch-16" class="form-check-input" type="checkbox" value="1" name="desig_create" @if (isset($perm_desig) && $perm_desig->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-16">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_view">
                                    <input id="checkbox-switch-17" class="form-check-input" type="checkbox" value="1" name="desig_view" @if (isset($perm_desig) && $perm_desig->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-17">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_edit">
                                    <input id="checkbox-switch-18" class="form-check-input" type="checkbox" value="1" name="desig_edit" @if (isset($perm_desig) && $perm_desig->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-18">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_update">
                                    <input id="checkbox-switch-19" class="form-check-input" type="checkbox" value="1" name="desig_update" @if (isset($perm_desig) && $perm_desig->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-19">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_delete">
                                    <input id="checkbox-switch-20" class="form-check-input" type="checkbox" value="1" name="desig_delete" @if (isset($perm_desig) && $perm_desig->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-20">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Vehicle</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_create">
                                    <input id="checkbox-switch-21" class="form-check-input" type="checkbox" value="1" name="veh_create" @if (isset($perm_veh) && $perm_veh->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-21">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_view">
                                    <input id="checkbox-switch-22" class="form-check-input" type="checkbox" value="1" name="veh_view" @if (isset($perm_veh) && $perm_veh->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-22">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_edit">
                                    <input id="checkbox-switch-23" class="form-check-input" type="checkbox" value="1" name="veh_edit" @if (isset($perm_veh) && $perm_veh->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-23">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_update">
                                    <input id="checkbox-switch-24" class="form-check-input" type="checkbox" value="1" name="veh_update" @if (isset($perm_veh) && $perm_veh->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-24">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_delete">
                                    <input id="checkbox-switch-25" class="form-check-input" type="checkbox" value="1" name="veh_delete" @if (isset($perm_veh) && $perm_veh->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-25">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Paid Holidays</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_create">
                                    <input id="checkbox-switch-26" class="form-check-input" type="checkbox" value="1" name="holiday_create" @if (isset($perm_holiday) && $perm_holiday->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-26">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_view">
                                    <input id="checkbox-switch-27" class="form-check-input" type="checkbox" value="1" name="holiday_view" @if (isset($perm_holiday) && $perm_holiday->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-27">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_edit">
                                    <input id="checkbox-switch-28" class="form-check-input" type="checkbox" value="1" name="holiday_edit" @if (isset($perm_holiday) && $perm_holiday->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-28">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_update">
                                    <input id="checkbox-switch-29" class="form-check-input" type="checkbox" value="1" name="holiday_update" @if (isset($perm_holiday) && $perm_holiday->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-29">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_delete">
                                    <input id="checkbox-switch-30" class="form-check-input" type="checkbox" value="1" name="holiday_delete" @if (isset($perm_holiday) && $perm_holiday->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-30">Delete</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Leaves</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_create">
                                    <input id="checkbox-switch-31" class="form-check-input" type="checkbox" value="1" name="leave_create" @if (isset($perm_leave) && $perm_leave->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-31">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_view">
                                    <input id="checkbox-switch-32" class="form-check-input" type="checkbox" value="1" name="leave_view" @if (isset($perm_leave) && $perm_leave->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-32">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_edit">
                                    <input id="checkbox-switch-33" class="form-check-input" type="checkbox" value="1" name="leave_edit" @if (isset($perm_leave) && $perm_leave->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-33">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_update">
                                    <input id="checkbox-switch-34" class="form-check-input" type="checkbox" value="1" name="leave_update" @if (isset($perm_leave) && $perm_leave->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-34">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_delete">
                                    <input id="checkbox-switch-35" class="form-check-input" type="checkbox" value="1" name="leave_delete" @if (isset($perm_leave) && $perm_leave->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-35">Delete</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Sheet</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_create">
                                    <input id="checkbox-switch-36" class="form-check-input" type="checkbox" value="1" name="sheet_create" @if ($perm_sheet->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-36">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_view">
                                    <input id="checkbox-switch-37" class="form-check-input" type="checkbox" value="1" name="sheet_view" @if ($perm_sheet->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-37">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_edit">
                                    <input id="checkbox-switch-38" class="form-check-input" type="checkbox" value="1" name="sheet_edit" @if ($perm_sheet->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-38">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_update">
                                    <input id="checkbox-switch-39" class="form-check-input" type="checkbox" value="1" name="sheet_update" @if ($perm_sheet->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-39">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_delete">
                                    <input id="checkbox-switch-40" class="form-check-input" type="checkbox" value="1" name="sheet_delete" @if ($perm_sheet->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-40">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Comments</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_create">
                                    <input id="checkbox-switch-41" class="form-check-input" type="checkbox" value="1" name="cmnt_create" @if ($perm_cmnt->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-41">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_view">
                                    <input id="checkbox-switch-42" class="form-check-input" type="checkbox" value="1" name="cmnt_view" @if ($perm_cmnt->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-42">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_edit">
                                    <input id="checkbox-switch-43" class="form-check-input" type="checkbox" value="1" name="cmnt_edit" @if ($perm_cmnt->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-43">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_update">
                                    <input id="checkbox-switch-44" class="form-check-input" type="checkbox" value="1" name="cmnt_update" @if ($perm_cmnt->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-44">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_delete">
                                    <input id="checkbox-switch-45" class="form-check-input" type="checkbox" value="1" name="cmnt_delete" @if ($perm_cmnt->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-45">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Finance</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_create">
                                    <input id="checkbox-switch-46" class="form-check-input" type="checkbox" value="1" name="finance_create" @if ($perm_finance->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-46">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_view">
                                    <input id="checkbox-switch-47" class="form-check-input" type="checkbox" value="1" name="finance_view" @if ($perm_finance->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-47">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_edit">
                                    <input id="checkbox-switch-48" class="form-check-input" type="checkbox" value="1" name="finance_edit" @if ($perm_finance->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-48">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_update">
                                    <input id="checkbox-switch-49" class="form-check-input" type="checkbox" value="1" name="finance_update" @if ($perm_finance->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-49">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_delete">
                                    <input id="checkbox-switch-50" class="form-check-input" type="checkbox" value="1" name="finance_delete" @if ($perm_finance->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-50">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Projects</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_create">
                                    <input id="checkbox-switch-46" class="form-check-input" type="checkbox" value="1" name="clients_create" @if ($perm_clients->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-46">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_view">
                                    <input id="checkbox-switch-47" class="form-check-input" type="checkbox" value="1" name="clients_view" @if ($perm_clients->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-47">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_edit">
                                    <input id="checkbox-switch-48" class="form-check-input" type="checkbox" value="1" name="clients_edit" @if ($perm_clients->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-48">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_update">
                                    <input id="checkbox-switch-49" class="form-check-input" type="checkbox" value="1" name="clients_update" @if ($perm_clients->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-49">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_delete">
                                    <input id="checkbox-switch-50" class="form-check-input" type="checkbox" value="1" name="clients_delete" @if ($perm_clients->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-50">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Services</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="service_create">
                                    <input id="checkbox-switch-51" class="form-check-input" type="checkbox" value="1" name="service_create" @if ($perm_service->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-51">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="service_view">
                                    <input id="checkbox-switch-52" class="form-check-input" type="checkbox" value="1" name="service_view" @if ($perm_service->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-52">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="service_edit">
                                    <input id="checkbox-switch-53" class="form-check-input" type="checkbox" value="1" name="service_edit" @if ($perm_service->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-53">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="service_update">
                                    <input id="checkbox-switch-54" class="form-check-input" type="checkbox" value="1" name="service_update" @if ($perm_service->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-54">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="service_delete">
                                    <input id="checkbox-switch-55" class="form-check-input" type="checkbox" value="1" name="service_delete" @if ($perm_service->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-55">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Task</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="task_create">
                                    <input id="checkbox-switch-56" class="form-check-input" type="checkbox" value="1" name="task_create" @if ($perm_task->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-56">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="task_view">
                                    <input id="checkbox-switch-57" class="form-check-input" type="checkbox" value="1" name="task_view" @if ($perm_task->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-57">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="task_edit">
                                    <input id="checkbox-switch-58" class="form-check-input" type="checkbox" value="1" name="task_edit" @if ($perm_task->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-58">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="task_update">
                                    <input id="checkbox-switch-59" class="form-check-input" type="checkbox" value="1" name="task_update" @if ($perm_task->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-59">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="task_delete">
                                    <input id="checkbox-switch-60" class="form-check-input" type="checkbox" value="1" name="task_delete" @if ($perm_task->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-60">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Reports</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_create">
                                    <input id="checkbox-switch-61" class="form-check-input" type="checkbox" value="1" name="reports_create" @if ($perm_reports->create == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-61">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_view">
                                    <input id="checkbox-switch-62" class="form-check-input" type="checkbox" value="1" name="reports_view" @if ($perm_reports->view == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-62">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_edit">
                                    <input id="checkbox-switch-63" class="form-check-input" type="checkbox" value="1" name="reports_edit" @if ($perm_reports->edit == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-63">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_update">
                                    <input id="checkbox-switch-64" class="form-check-input" type="checkbox" value="1" name="reports_update" @if ($perm_reports->update == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-64">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_delete">
                                    <input id="checkbox-switch-65" class="form-check-input" type="checkbox" value="1" name="reports_delete" @if ($perm_reports->delete == 1) checked @endif>
                                    <label class="form-check-label" for="checkbox-switch-65">Delete</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
