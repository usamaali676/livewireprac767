@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<style>
    .card{
        border: 1px solid #d7d7d7;
        padding: 30px 10px;
    }
    .salary-heading{
        font-size: 25px;
        font-weight: 600;
    }
    h2.name{
        font-size: 20px;
        font-weight: 500;
        margin-top: 10px;
    }
    table{
        width: 100%;
        margin-top: 20px;
    }
    tr{
        /* padding: 20px 0px; */
        border-bottom: 1px solid #d7d7d7;
    }
    th{
        text-align:  left;
        padding: 10px 0;
    }
    td{
        text-align: right;
        padding: 10px 0;
    }
</style>
@endsection
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Edit Salary
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">
            <div class="grid grid-cols-12 gap-6 mt-3">
                <div class="col-span-12 lg:col-span-12">
                    <div id="input" class="p-5">
                        <div class="preview">
                            <form action="{{ route('salary.update',$salary->id) }}" method="POST">
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
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label class="form-label">Year</label>
                                            <div class="mt-2">
                                                <input id="regular-form-3" name="year" type="text" class="form-control"
                                                placeholder="2024" value="{{$salary->year}}" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Select Salary Month</label>
                                            <div class="mt-2">
                                                <select data-placeholder="Select Month" class="tom-select w-full" name="month">
                                                    @if(isset($salary->salary_month))
                                                    <option value="{{$salary->salary_month}}">{{$salary->salary_month}}</option>
                                                    @else
                                                    <option >Please Select</option>
                                                    @endif
                                                    <option  value="jan">January</option>
                                                    <option  value="feb">February</option>
                                                    <option  value="mar">March</option>
                                                    <option  value="apr">April</option>
                                                    <option  value="may">May</option>
                                                    <option  value="jun">June</option>
                                                    <option  value="jul">July</option>
                                                    <option  value="aug">August</option>
                                                    <option  value="sep">September</option>
                                                    <option  value="oct">October</option>
                                                    <option  value="nov">November</option>
                                                    <option  value="dec">December</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Name</label>
                                            <div class="mt-2">
                                                <select id="user_select"data-placeholder="Select Designation" class="tom-select w-full" name="user_id" readonly>
                                                    @if(isset($selecteduser))
                                                     <option value="{{ $selecteduser->id }}">{{ $selecteduser->name }}</option>
                                                    @else
                                                    <option >Please Select</option>
                                                    @endif
                                                    @foreach ($user as $item)
                                                    <option value="{{ $item->id }}" disabled>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label class="form-label">Basic Salary</label>
                                            <div class="mt-2">
                                                <input id="regular-form-3" name="basic_salary" type="text" class="form-control"
                                                placeholder="Basic Salary" value="{{$salary->basic_salary}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label>Marketing Comission in USD</label>
                                            <div class="mt-2">
                                                <input id="regular-form-3" name="m_commission_usd" type="text" class="form-control"
                                                placeholder="Marketing Comission in USD" value="{{$salary->m_commission_usd}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label>Marketing Comission in PKR</label>
                                            <div class="mt-2">
                                                <input id="regular-form-3" name="m_commission_pkr" type="text" class="form-control"
                                                placeholder="Marketing Comission in PKR" value="{{$salary->m_commission_pkr }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Development Comission in USD</label>
                                            <input id="regular-form-3" name="dev_commission_usd" type="text" class="form-control"
                                                placeholder="Development Comission in USD" value="{{$salary->dev_commission_usd}}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Development Comission in PKR</label>
                                            <input id="regular-form-3" name="dev_commission_pkr" type="text" class="form-control"
                                                placeholder="Development Comission in PKR" value="{{$salary->dev_commission_pkr}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Total Commission</label>
                                            <input id="regular-form-3" name="total_commission" type="text" class="form-control"
                                                placeholder="Total Commission" value="{{$salary->total_commission}}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Bonus</label>
                                            <input id="regular-form-3" name="bonus" type="text" class="form-control"
                                                placeholder="Bonus" value="{{$salary->bonus}}">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Working Days</label>
                                            <input id="regular-form-3" name="working_days" type="text" class="form-control"
                                                placeholder="Working Days" value="{{$salary->working_days}}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Holiday Deduction (In Days)</label>
                                            <input id="regular-form-3" name="holiday_deduct" type="text" class="form-control"
                                                placeholder="Holiday Deduction" value="{{$salary->unpaid_days}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Hlaf Day Deduction (In Days)</label>
                                            <input id="regular-form-3" name="half_day_deduct" type="text" class="form-control"
                                                placeholder="Half Day Deduction" value="{{$salary->half_days}}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label" >Fine Deduction <span id="fine_label" style="color: red"></span></label>
                                            <input id="regular-form-3" name="fine_deduct" type="text" class="form-control"
                                                placeholder="Fine Deduction" value="{{$salary->fine_deduct}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-4 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Security Clearance</label>
                                            <input id="regular-form-3" name="security_clearance" type="text" class="form-control"
                                                placeholder="Security Clearance" value="{{$salary->security_clearance}}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Total Months Cleared <span id="total_security_months" style="color: red"></span></label>
                                            <input id="security_month_cleared" name="cleared_months" value="{{$salary->cleared_months}}" type="text" class="form-control"
                                                placeholder="Security Clearance">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Paid Holiday Compensation<span id="p_holiday_label" style="color: red"></span></label>
                                            <input id="regular-form-3" name="holiday_compen" type="text" class="form-control"
                                                placeholder="Paid Holiday Compensation" value="{{$salary->holiday_compen}}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Lates</label>
                                            <input id="regular-form-3" name="lates" type="text" value="{{$salary->lates}}" class="form-control"
                                                placeholder="Lates This Month">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    {{-- <div class="col-span-12 lg:col-span-4">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Food Deduction</label>
                                            <input id="regular-form-3" name="food_deduct" type="text" class="form-control"
                                                placeholder="Food Deduction" value="{{$salary->food_deduct}}">
                                        </div>
                                    </div> --}}
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Security Deduction</label>
                                            <input id="regular-form-3" name="security_deduct" type="text" class="form-control"
                                                placeholder="Security Deduction" value="{{$salary->security_deduct}}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Advance Deduction <span id="advance_label" style="color: red"></span></label>
                                            <input id="regular-form-3" name="advance_deduct" type="text" class="form-control"
                                                placeholder="Advance deduction" value="{{$salary->advance_deduct}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-12">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Comments</label>
                                            <textarea name="comments"  class="form-control" >{!! $salary->comments !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-span-12 lg:col-span-4">
                    <div id="input" class="p-5">
                        <div class="card">
                            <h1 class="salary-heading">Salary Slip</h1>
                            <h2  class="name">Name</h2>
                            <table id="info_table">

                            </table>
                            <div class="total">
                                <table id="total_table">

                                </table>

                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection

    @section('js')
    <script>
         $(document).ready(function() {
        $('#user_select').change(function() {
            var user_id = $(this).val();
            $.ajax({
                url: "{{route('salary.getuser')}}",
                type: "GET",
                data: {'user_id': user_id},

                success: function(data) {
                var user = data.user;
                console.log(data);
                $("input[name='basic_salary']").val(user.basic_salary);
                basic_salary = '<tr><th>Basic Salary</th> <td>' + user.basic_salary +'</td></tr>'
                // total = user.basic_salary;
                total_append = '<tr><th>Total</th><td id="total_value">' + user.basic_salary +'</td> <input type="hidden" id="total_input" name="total" value="'+ user.basic_salary +'"></tr>'
                $('#info_table').append(basic_salary);
                $('#total_table').append(total_append);
                $('.name').html(user.name);
                fine = '(Total Fines Last Month: ' + data.userFines + ')';
                $('#fine_label').html(fine);
                holiday = '(Paid Holidays Remain: ' + data.holiday.remaining + ')';
                $('#p_holiday_label').html(holiday);
                $("input[name='security_deduct']").val(user.Security);
                advance = '(Total Advance: ' + data.advance.amount + ')'
                $('#advance_label').html(advance);
                $('#advance_label').html(advance);
                total_security = '(Total Security: ' + data.security.total +')';
                $('#total_security_label').html(total_security);
                security_month = '(Total Months: ' + data.security.total_months + ')';
                $('#total_security_months').html(security_month);
                }
            });
        });
    });
    </script>
        <script>
            $(document).ready(function() {
                $('#security_month_cleared').change(function() {
                    var month = $(this).val();
                    var user = $('#user_select').val();
                    // alert(user);
                    if(user !== null && user !== undefined){
                        $.ajax({
                            url: "{{route('salary.getsecurity')}}",
                            type: "GET",
                            data: {'month': month , 'user': user},
                            success: function(data) {
                                $("input[name='security_clearance']").val(data.totalmonthsecurity);
                                console.log(data);
                            }
                        });
                    }
                    else{
                        alert('Please select User First');
                    }
                });
            });
        </script>
    @endsection
