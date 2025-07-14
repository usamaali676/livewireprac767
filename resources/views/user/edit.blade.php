@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit User
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{ route('user.update',$user->id) }}" method="POST">
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
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-3">
                                    <label for="regular-form-3" class="form-label">Name</label>
                                    <input id="regular-form-3" name="name" type="text" class="form-control"
                                        placeholder="User Name" value="{{$user->name}}">
                                </div>
                            </div>
                            @if ($user->role_id == 1)
                            <input type="hidden" name="role_id" value="{{$user->role_id}}">
                            @else
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-3">
                                    <label>Role</label>
                                    <div class="mt-2">
                                        <select class="tom-select w-full" name=role_id >
                                            @if ($selectedRole!=null)
                                            <option value="{{ $selectedRole->id }}">{{ $selectedRole->name }}</option>
                                            @else
                                            <option value="">Please Select</option>
                                            @endif
                                            @foreach ($role as $list)
                                            @if ($list->id != 1)
                                                <option value="{{ $list->id }}">{{ $list->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label>Designation</label>
                                    <div class="mt-2">
                                        <select data-placeholder="Select Designation" class="tom-select w-full" name="desig_id">
                                            @if ($selectedDesig != null)
                                            <option value="{{$selectedDesig->id}}" selected>{{$selectedDesig->name}}</option>
                                            @else
                                            <option >Please Select</option>
                                            @endif
                                            @foreach ($designation as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label>Department</label>
                                    <div class="mt-2">
                                        <select data-placeholder="Select Department" class="tom-select w-full" name="dept_id" id="dept_id">
                                            @if ($selectedDept != null)
                                            <option value="{{$selectedDept->id}}" selected>{{$selectedDept->name}}</option>
                                            @else
                                            <option >Please Select</option>
                                            @endif
                                            @foreach ($department as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5" id="agent_closer"  @if($selectedDept->id  != 2) style="display: none" @endif>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-3">
                                    <label for="regular-form-3" class="form-label">User is Agent</label>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="hidden" value="0" name="is_agent">
                                        <input id="checkbox-switch-16" class="form-check-input" type="checkbox" value="1" name="is_agent" @if($user->is_agent == 1) checked @endif>
                                        <label class="form-check-label" for="checkbox-switch-16">Agent</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-3">
                                    <label for="regular-form-3" class="form-label">User is Closer</label>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input" type="hidden" value="0" name="is_closer">
                                        <input id="checkbox-switch-17" class="form-check-input" type="checkbox" value="1" name="is_closer" @if($user->is_closer == 1) checked @endif>
                                        <label class="form-check-label" for="checkbox-switch-17">Closer</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Father Name</label>
                                    <input id="regular-form-3" name="fatherName" value="{{$user->fatherName}}" type="text" class="form-control"
                                        placeholder="Father Name">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">CNIC Number</label>
                                    <input id="regular-form-3" name="cnic" value="{{$user->cnic}}" type="text" class="form-control"
                                        placeholder="CNIC Number">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Phone</label>
                                    <input id="regular-form-3" name="phone" value="{{$user->phone}}" type="text" class="form-control"
                                        placeholder="Phone Number">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Officle Email</label>
                                    <input id="regular-form-3" name="offEmail" value="{{$user->offEmail}}" type="text" class="form-control"
                                        placeholder="Officle Email">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Personal Email</label>
                                    <input id="regular-form-3" name="perEmail" value="{{$user->perEmail}}" type="text" class="form-control"
                                        placeholder="Personal Email">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Current Address</label>
                                    <input id="regular-form-3" name="currAddress" value="{{$user->currAddress}}" type="text" class="form-control"
                                        placeholder="Current Address">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Permenent Address</label>
                                    <input id="regular-form-3" name="perAddress" value="{{$user->perAddress}}" type="text" class="form-control"
                                        placeholder="Permenent Address">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Vehicle</label>
                                    <select data-placeholder="Select Vehicle" class="tom-select w-full" name="vehicle_id">
                                        @if ($selectedVehicle != null)
                                        <option value="{{$selectedVehicle->id}}" selected>{{$selectedVehicle->vehicle_number}}</option>
                                        @else
                                        <option >Please Select</option>
                                        @endif
                                        @foreach ($vehicle as $item)
                                        <option value="{{ $item->id }}">{{ $item->vehicle_number }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Joining Date</label>
                                    <div class="relative w-100 ">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" name="joindate" value="{{$user->joindate}}" class="datepicker form-control pl-12" data-single-mode="true">
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Date of Birth</label>
                                    <div class="relative w-100 ">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" name="dob" value="{{$user->dob}}" class="datepicker form-control pl-12" data-single-mode="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Last Degree</label>
                                    <input id="regular-form-3" name="lastDegree" value="{{$user->lastDegree}}" type="text" class="form-control"
                                        placeholder="Last Degree">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Running Degree</label>
                                    <input id="regular-form-3" name="currDegree" value="{{$user->currDegree}}" type="text" class="form-control"
                                        placeholder="Running Degree">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Emergency Contact Name</label>
                                    <input id="regular-form-3" name="emgContactName" value="{{$user->emgContactName}}" type="text" class="form-control"
                                        placeholder="Emergency Contact Name">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Emergency Contact Number</label>
                                    <input id="regular-form-3" name="emgContactNumber" value="{{$user->emgContactNumber}}" type="text" class="form-control"
                                        placeholder="Emergency Contact Number">
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Emergency Contact Relation</label>
                                    <input id="regular-form-3" name="emgContactRelation" value="{{$user->emgContactRelation}}" type="text" class="form-control"
                                        placeholder="Emergency Contact Relation">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Gender</label>
                                    <select data-placeholder="Select Gender" class="tom-select w-full" name="gender">
                                        <option >Please Select</option>
                                        <option value="Male" @if($user->gender == "Male") selected @endif>Male</option>
                                        <option value="Female"  @if($user->gender == "Female") selected @endif>Female</option>
                                        <option value="Others"  @if($user->gender == "Others") selected @endif>Others</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Marital Status</label>
                                    <select data-placeholder="Select Marital Status" class="tom-select w-full" name="marital_status">
                                        <option >Please Select</option>
                                        <option value="0" @if($user->marital_status == 0) selected @endif>Unmarried</option>
                                        <option value="1" @if($user->marital_status == 1) selected @endif>Married</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Employment Type</label>
                                    <select data-placeholder="Select Employment Type" class="tom-select w-full" name="employment_type">
                                        <option >Please Select</option>
                                        <option value="0" @if($user->employment_type == 0) selected @endif>Part Time</option>
                                        <option value="1" @if($user->employment_type == 1) selected @endif>Full Time</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Blood Group</label>
                                    <input id="regular-form-3" name="blood_group" value="{{$user->blood_group}}" type="text" class="form-control" placeholder="Blood Group">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Document(s) Description</label>
                                    <input id="regular-form-3" name="doc_desc" value="{{$user->documents_desc}}" type="text" class="form-control"
                                        placeholder="Description" >
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Basic Salary</label>
                                    <input id="regular-form-3" name="basic_salary" type="text" value="{{$user->basic_salary}}"  class="form-control" placeholder="Basic Salary" required>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Security</label>
                                    <input id="regular-form-3" name="security" type="text" value="{{$user->Security}}"  class="form-control"
                                        placeholder="Security" required>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-3">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Paid Holidays Cycle (Year)</label>
                                    <input id="ph_from"  name="ph_cycle" type="text" class="form-control" value="{{$user->ph_cycle}}"  placeholder="2024">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-2">
                                    <label for="regular-form-3" class="form-label">Total Paid Holidays</label>
                                    <input id="ph_cycle" name="total_holiday" type="text" class="form-control" value="{{$user->total_holiday}}"   placeholder="12" required>
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-12 gap-6 mt-5">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-3">
                                    <label for="regular-form-3" class="form-label">Email</label>
                                    <input id="regular-form-3" name="email" value="{{$user->email}}" type="email"  class="form-control"
                                        placeholder="Email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-6">
                                <div class="mt-3">
                                    <label for="regular-form-3" class="form-label">Password</label>
                                    <input id="regular-form-3" name="password" type="Password" class="form-control"
                                        placeholder="Password">
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
@section('js')
<script>
    $(document).ready(function(){
        $('#dept_id').change(function(){
            dept = $(this).val();
            // console.log(dept);
            if(dept == 2){
                $('#agent_closer').removeAttr("style");
            }
            else{
                $('#agent_closer').attr("style","display:none;");
            }


            // alert('work');
        });
    });
</script>
@endsection
