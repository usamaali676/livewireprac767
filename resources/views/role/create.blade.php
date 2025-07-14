@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Create Role
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{route('role.store')}}" method="POST">
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
                            <input id="regular-form-3" name="role_name" type="text" class="form-control" placeholder="Role Name">
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
                                    <input id="checkbox-switch-1" class="form-check-input" type="checkbox" value="1" name="role_create" >
                                    <label class="form-check-label" for="checkbox-switch-1">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="role_view">
                                    <input id="checkbox-switch-2" class="form-check-input" type="checkbox" value="1" name="role_view" >
                                    <label class="form-check-label" for="checkbox-switch-2">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_edit">
                                    <input id="checkbox-switch-3" class="form-check-input" type="checkbox" value="1" name="role_edit" >
                                    <label class="form-check-label" for="checkbox-switch-3">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_update">
                                    <input id="checkbox-switch-4" class="form-check-input" type="checkbox" value="1" name="role_update" >
                                    <label class="form-check-label" for="checkbox-switch-4">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="role_delete">
                                    <input id="checkbox-switch-5" class="form-check-input" type="checkbox" value="1" name="role_delete" >
                                    <label class="form-check-label" for="checkbox-switch-5">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">User</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="user_create">
                                    <input id="checkbox-switch-6" class="form-check-input" type="checkbox" value="1" name="user_create" >
                                    <label class="form-check-label" for="checkbox-switch-6">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="user_view">
                                    <input id="checkbox-switch-7" class="form-check-input" type="checkbox" value="1" name="user_view" >
                                    <label class="form-check-label" for="checkbox-switch-7">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_edit">
                                    <input id="checkbox-switch-8" class="form-check-input" type="checkbox" value="1" name="user_edit" >
                                    <label class="form-check-label" for="checkbox-switch-8">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_update">
                                    <input id="checkbox-switch-9" class="form-check-input" type="checkbox" value="1" name="user_update" >
                                    <label class="form-check-label" for="checkbox-switch-9">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="user_delete">
                                    <input id="checkbox-switch-10" class="form-check-input" type="checkbox" value="1" name="user_delete" >
                                    <label class="form-check-label" for="checkbox-switch-10">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Department</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_create">
                                    <input id="checkbox-switch-11" class="form-check-input" type="checkbox" value="1" name="dept_create" >
                                    <label class="form-check-label" for="checkbox-switch-11">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_view">
                                    <input id="checkbox-switch-12" class="form-check-input" type="checkbox" value="1" name="dept_view" >
                                    <label class="form-check-label" for="checkbox-switch-12">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_edit">
                                    <input id="checkbox-switch-13" class="form-check-input" type="checkbox" value="1" name="dept_edit" >
                                    <label class="form-check-label" for="checkbox-switch-13">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_update">
                                    <input id="checkbox-switch-14" class="form-check-input" type="checkbox" value="1" name="dept_update" >
                                    <label class="form-check-label" for="checkbox-switch-14">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="dept_delete">
                                    <input id="checkbox-switch-15" class="form-check-input" type="checkbox" value="1" name="dept_delete" >
                                    <label class="form-check-label" for="checkbox-switch-15">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Designation</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_create">
                                    <input id="checkbox-switch-16" class="form-check-input" type="checkbox" value="1" name="desig_create" >
                                    <label class="form-check-label" for="checkbox-switch-16">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_view">
                                    <input id="checkbox-switch-17" class="form-check-input" type="checkbox" value="1" name="desig_view" >
                                    <label class="form-check-label" for="checkbox-switch-17">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_edit">
                                    <input id="checkbox-switch-18" class="form-check-input" type="checkbox" value="1" name="desig_edit" >
                                    <label class="form-check-label" for="checkbox-switch-18">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_update">
                                    <input id="checkbox-switch-19" class="form-check-input" type="checkbox" value="1" name="desig_update" >
                                    <label class="form-check-label" for="checkbox-switch-19">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="desig_delete">
                                    <input id="checkbox-switch-20" class="form-check-input" type="checkbox" value="1" name="desig_delete" >
                                    <label class="form-check-label" for="checkbox-switch-20">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Vehicle</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_create">
                                    <input id="checkbox-switch-21" class="form-check-input" type="checkbox" value="1" name="veh_create" >
                                    <label class="form-check-label" for="checkbox-switch-21">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_view">
                                    <input id="checkbox-switch-22" class="form-check-input" type="checkbox" value="1" name="veh_view" >
                                    <label class="form-check-label" for="checkbox-switch-22">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_edit">
                                    <input id="checkbox-switch-23" class="form-check-input" type="checkbox" value="1" name="veh_edit" >
                                    <label class="form-check-label" for="checkbox-switch-23">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_update">
                                    <input id="checkbox-switch-24" class="form-check-input" type="checkbox" value="1" name="veh_update" >
                                    <label class="form-check-label" for="checkbox-switch-24">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="veh_delete">
                                    <input id="checkbox-switch-25" class="form-check-input" type="checkbox" value="1" name="veh_delete" >
                                    <label class="form-check-label" for="checkbox-switch-25">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Paid Holidays</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_create">
                                    <input id="checkbox-switch-26" class="form-check-input" type="checkbox" value="1" name="holiday_create" >
                                    <label class="form-check-label" for="checkbox-switch-26">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_view">
                                    <input id="checkbox-switch-27" class="form-check-input" type="checkbox" value="1" name="holiday_view" >
                                    <label class="form-check-label" for="checkbox-switch-27">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_edit">
                                    <input id="checkbox-switch-28" class="form-check-input" type="checkbox" value="1" name="holiday_edit" >
                                    <label class="form-check-label" for="checkbox-switch-28">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_update">
                                    <input id="checkbox-switch-29" class="form-check-input" type="checkbox" value="1" name="holiday_update" >
                                    <label class="form-check-label" for="checkbox-switch-29">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="holiday_delete">
                                    <input id="checkbox-switch-30" class="form-check-input" type="checkbox" value="1" name="holiday_delete" >
                                    <label class="form-check-label" for="checkbox-switch-30">Delete</label>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Leaves</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_create">
                                    <input id="checkbox-switch-11" class="form-check-input" type="checkbox" value="1" name="leave_create" >
                                    <label class="form-check-label" for="checkbox-switch-11">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_view">
                                    <input id="checkbox-switch-12" class="form-check-input" type="checkbox" value="1" name="leave_view" >
                                    <label class="form-check-label" for="checkbox-switch-12">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_edit">
                                    <input id="checkbox-switch-13" class="form-check-input" type="checkbox" value="1" name="leave_edit" >
                                    <label class="form-check-label" for="checkbox-switch-13">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_update">
                                    <input id="checkbox-switch-14" class="form-check-input" type="checkbox" value="1" name="leave_update" >
                                    <label class="form-check-label" for="checkbox-switch-14">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="leave_delete">
                                    <input id="checkbox-switch-15" class="form-check-input" type="checkbox" value="1" name="leave_delete" >
                                    <label class="form-check-label" for="checkbox-switch-15">Delete</label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Sheet</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_create">
                                    <input id="checkbox-switch-31" class="form-check-input" type="checkbox" value="1" name="sheet_create" >
                                    <label class="form-check-label" for="checkbox-switch-31">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_view">
                                    <input id="checkbox-switch-32" class="form-check-input" type="checkbox" value="1" name="sheet_view" >
                                    <label class="form-check-label" for="checkbox-switch-32">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_edit">
                                    <input id="checkbox-switch-33" class="form-check-input" type="checkbox" value="1" name="sheet_edit" >
                                    <label class="form-check-label" for="checkbox-switch-33">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_update">
                                    <input id="checkbox-switch-34" class="form-check-input" type="checkbox" value="1" name="sheet_update" >
                                    <label class="form-check-label" for="checkbox-switch-34">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="sheet_delete">
                                    <input id="checkbox-switch-35" class="form-check-input" type="checkbox" value="1" name="sheet_delete" >
                                    <label class="form-check-label" for="checkbox-switch-35">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Comments</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_create">
                                    <input id="checkbox-switch-36" class="form-check-input" type="checkbox" value="1" name="cmnt_create" >
                                    <label class="form-check-label" for="checkbox-switch-36">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_view">
                                    <input id="checkbox-switch-37" class="form-check-input" type="checkbox" value="1" name="cmnt_view" >
                                    <label class="form-check-label" for="checkbox-switch-37">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_edit">
                                    <input id="checkbox-switch-38" class="form-check-input" type="checkbox" value="1" name="cmnt_edit" >
                                    <label class="form-check-label" for="checkbox-switch-38">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_update">
                                    <input id="checkbox-switch-39" class="form-check-input" type="checkbox" value="1" name="cmnt_update" >
                                    <label class="form-check-label" for="checkbox-switch-39">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="cmnt_delete">
                                    <input id="checkbox-switch-40" class="form-check-input" type="checkbox" value="1" name="cmnt_delete" >
                                    <label class="form-check-label" for="checkbox-switch-40">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Finance</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_create">
                                    <input id="checkbox-switch-41" class="form-check-input" type="checkbox" value="1" name="finance_create" >
                                    <label class="form-check-label" for="checkbox-switch-41">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_view">
                                    <input id="checkbox-switch-42" class="form-check-input" type="checkbox" value="1" name="finance_view" >
                                    <label class="form-check-label" for="checkbox-switch-42">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_edit">
                                    <input id="checkbox-switch-43" class="form-check-input" type="checkbox" value="1" name="finance_edit" >
                                    <label class="form-check-label" for="checkbox-switch-43">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_update">
                                    <input id="checkbox-switch-44" class="form-check-input" type="checkbox" value="1" name="finance_update" >
                                    <label class="form-check-label" for="checkbox-switch-44">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="finance_delete">
                                    <input id="checkbox-switch-45" class="form-check-input" type="checkbox" value="1" name="finance_delete" >
                                    <label class="form-check-label" for="checkbox-switch-45">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Projects</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_create">
                                    <input id="checkbox-switch-46" class="form-check-input" type="checkbox" value="1" name="clients_create" >
                                    <label class="form-check-label" for="checkbox-switch-46">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_view">
                                    <input id="checkbox-switch-47" class="form-check-input" type="checkbox" value="1" name="clients_view" >
                                    <label class="form-check-label" for="checkbox-switch-47">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_edit">
                                    <input id="checkbox-switch-48" class="form-check-input" type="checkbox" value="1" name="clients_edit" >
                                    <label class="form-check-label" for="checkbox-switch-48">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_update">
                                    <input id="checkbox-switch-49" class="form-check-input" type="checkbox" value="1" name="clients_update" >
                                    <label class="form-check-label" for="checkbox-switch-49">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="clients_delete">
                                    <input id="checkbox-switch-50" class="form-check-input" type="checkbox" value="1" name="clients_delete" >
                                    <label class="form-check-label" for="checkbox-switch-50">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Services</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="service_create">
                                    <input id="checkbox-switch-51" class="form-check-input" type="checkbox" value="1" name="service_create" >
                                    <label class="form-check-label" for="checkbox-switch-51">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="service_view">
                                    <input id="checkbox-switch-52" class="form-check-input" type="checkbox" value="1" name="service_view" >
                                    <label class="form-check-label" for="checkbox-switch-52">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="service_edit">
                                    <input id="checkbox-switch-53" class="form-check-input" type="checkbox" value="1" name="service_edit" >
                                    <label class="form-check-label" for="checkbox-switch-53">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="service_update">
                                    <input id="checkbox-switch-54" class="form-check-input" type="checkbox" value="1" name="service_update" >
                                    <label class="form-check-label" for="checkbox-switch-54">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="service_delete">
                                    <input id="checkbox-switch-55" class="form-check-input" type="checkbox" value="1" name="service_delete" >
                                    <label class="form-check-label" for="checkbox-switch-55">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Tasks</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="task_create">
                                    <input id="checkbox-switch-56" class="form-check-input" type="checkbox" value="1" name="task_create" >
                                    <label class="form-check-label" for="checkbox-switch-56">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="task_view">
                                    <input id="checkbox-switch-57" class="form-check-input" type="checkbox" value="1" name="task_view" >
                                    <label class="form-check-label" for="checkbox-switch-57">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="task_edit">
                                    <input id="checkbox-switch-58" class="form-check-input" type="checkbox" value="1" name="task_edit" >
                                    <label class="form-check-label" for="checkbox-switch-58">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="task_update">
                                    <input id="checkbox-switch-59" class="form-check-input" type="checkbox" value="1" name="task_update" >
                                    <label class="form-check-label" for="checkbox-switch-59">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="task_delete">
                                    <input id="checkbox-switch-60" class="form-check-input" type="checkbox" value="1" name="task_delete" >
                                    <label class="form-check-label" for="checkbox-switch-60">Delete</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Reports</label>
                            <div class="flex flex-col sm:flex-row mt-2">
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_create">
                                    <input id="checkbox-switch-61" class="form-check-input" type="checkbox" value="1" name="reports_create" >
                                    <label class="form-check-label" for="checkbox-switch-61">Create</label>
                                </div>
                                <div class="form-check mr-2">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_view">
                                    <input id="checkbox-switch-62" class="form-check-input" type="checkbox" value="1" name="reports_view" >
                                    <label class="form-check-label" for="checkbox-switch-62">View</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_edit">
                                    <input id="checkbox-switch-63" class="form-check-input" type="checkbox" value="1" name="reports_edit" >
                                    <label class="form-check-label" for="checkbox-switch-63">Edit</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_update">
                                    <input id="checkbox-switch-64" class="form-check-input" type="checkbox" value="1" name="reports_update" >
                                    <label class="form-check-label" for="checkbox-switch-64">Update</label>
                                </div>
                                <div class="form-check mr-2 mt-2 sm:mt-0">
                                    <input class="form-check-input" type="hidden" value="0" name="reports_delete">
                                    <input id="checkbox-switch-65" class="form-check-input" type="checkbox" value="1" name="reports_delete" >
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
