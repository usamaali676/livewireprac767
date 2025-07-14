@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit Department
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{route('leave.update',$leave->id)}}" method="POST">
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
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class=" col-span-12 lg:col-span-6">
                                    <label for="vehicle-type">Select User</label>
                                    <select name="user_id" id="userselect" data-placeholder="Select User" class="tom-select w-full mt-2" >
                                        @if ($selecteduser != null)
                                        <option value="{{$selecteduser->id}}" selected>{{$selecteduser->name}}</option>
                                        @else
                                        <option>Please Select</option>
                                        @endif
                                        @foreach ($user as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label class="form-label">Date</label>
                                    <div class="relative w-100 ">
                                        <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                            <i data-lucide="calendar" class="w-4 h-4"></i>
                                        </div>
                                        <input type="text" name="date" value="{{$leave->date}}" class="datepicker form-control pl-12" data-single-mode="true">
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Reason</label>
                            <textarea name="reason" id="" class="form-control" >{{$leave->reason}}</textarea>
                        </div>
                        <div class="mt-3" id="ifYes" @if ($leave->duration != "Multiple") style="display: none;" @endif>
                            <label for="regular-form-3" class="form-label">You can select multiple dates.</label>
                            <div class="relative w-100 ">
                                <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                    <i data-lucide="calendar" class="w-4 h-4"></i>
                                </div>
                                <input type="text" name="leave_range" {{$leave->date}} data-daterange="true" class="datepicker form-control w-56 block ">
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="intro-y col-span-12 lg:col-span-6">
                                        <div class="form-group my-3">
                                            <label class="f-14 text-dark-grey mb-12 w-100" for="usr">Select Duration</label>
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="form-check-inline custom-control custom-radio mt-2 mr-3" onclick="javascript:yesnoCheck();">
                                                    <input type="radio" value="Full Day" class="custom-control-input" id="duration_single" name="duration"
                                                        checked="" autocomplete="off" @if ($leave->duration == "Full Day") checked @endif>
                                                    <label class="custom-control-label pt-1 cursor-pointer" for="duration_single" >Full Day</label>
                                                </div>
                                                <div class="form-check-inline custom-control custom-radio mt-2 mr-3" onclick="javascript:yesnoCheck();">
                                                    <input type="radio" value="Multiple" class="custom-control-input"  id="duration_multiple" name="duration"
                                                        autocomplete="off" @if ($leave->duration == "Multiple") checked @endif>
                                                    <label class="custom-control-label pt-1 cursor-pointer" for="duration_multiple">Multiple</label>
                                                </div>

                                                <div class="form-check-inline custom-control custom-radio mt-2 mr-3" onclick="javascript:yesnoCheck();">
                                                    <input type="radio" value="First Half" class="custom-control-input" id="half_day_first" name="duration"
                                                        autocomplete="off" @if ($leave->duration == "First Half") checked @endif>
                                                    <label class="custom-control-label pt-1 cursor-pointer" for="half_day_first">First Half</label>
                                                </div>
                                                <div class="form-check-inline custom-control custom-radio mt-2 mr-3" onclick="javascript:yesnoCheck();">
                                                    <input type="radio" value="Second Half" class="custom-control-input" id="half_day_second"
                                                        name="duration" autocomplete="off" @if ($leave->duration == "Second Half") checked @endif>
                                                    <label class="custom-control-label pt-1 cursor-pointer" for="half_day_second">Second Half</label>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="vehicle-type">Leave Status</label>
                                    <select name="status" id="" data-placeholder="Leave Status" class="tom-select w-full mt-2" style="z-index: 100">
                                        <option>Please Select</option>
                                        <option value="0" @if ($leave->status == 0) selected @endif >Pending</option>
                                        <option value="1" @if ($leave->status == 1) selected @endif>Approve</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="intro-y col-span-12 lg:col-span-6">
                                        <div class="form-group my-3">
                                            <label for="vehicle-type">Pre-Plan Leaves</label>
                                            <input type="text" class="form-control" name="" value="{{$paid_leaves->preplan}}" id="preplan" disabled>
                                        </div>
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="vehicle-type">Emergency Leaves</label>
                                    <input type="text" class="form-control" name="" value="{{$paid_leaves->emergency}}" id="emergency" disabled>
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

    <script>
        function yesnoCheck() {
            // alert("working");
    if (document.getElementById('duration_multiple').checked) {
        // alert("working");
        document.getElementById('ifYes').style.display = 'block';
    }
    else{
        // alert("working");
     document.getElementById('ifYes').style.display = 'none';
    }

    }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $(document).ready(function() {
        $("#userselect").on('change', function(){
            // alert("work");
            var user = $(this).val();

            $.ajax({
                url: "{{route('paidleaves')}}",
                type: "GET",
                data: {'user' : user},
                success: function(data) {
                    console.log(data);
                    var leave = data.user_leaves;
                    $('#preplan').val(leave['preplan']);
                    $('#emergency').val(leave['emergency']);
                }
            })
    });
});

    </script>
