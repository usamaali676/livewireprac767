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
                Create Salary
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">
            <div class="grid grid-cols-12 gap-6 mt-3">
                <div class="col-span-12 lg:col-span-12">
                    <div id="input" class="p-5">
                        <div class="preview">
                            <form action="{{ route('salary.store') }}" method="POST">
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
                                                placeholder="2024" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Select Salary Month</label>
                                            <div class="mt-2">
                                                <select data-placeholder="Select Month" class="tom-select w-full" name="month">
                                                    <option >Please Select</option>
                                                    <option  value="jan">January</option>
                                                    <option  value="feb">February</option>
                                                    <option  value="mar">March</option>
                                                    <option  value="apr">April</option>
                                                      <option  value="may">May</option>
                                                    <option  value="jun">June</option>
                                                    <option  value="jul">July</option>
                                                    <option value="aug">August</option>
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
                                                <select id="user_select"data-placeholder="Select User" class="tom-select w-full" name="user_id">
                                                    @foreach ($user as $item)
                                                    <option>Please Select</option>
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                                placeholder="Basic Salary" value="" readonly>
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
                                                placeholder="Marketing Comission in USD" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label>Marketing Comission in PKR</label>
                                            <div class="mt-2">
                                                <input id="regular-form-3" name="m_commission_pkr" type="text" class="form-control"
                                                placeholder="Marketing Comission in PKR" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Development Comission in USD</label>
                                            <input id="regular-form-3" name="dev_commission_usd" type="text" class="form-control"
                                                placeholder="Development Comission in USD">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Development Comission in PKR</label>
                                            <input id="regular-form-3" name="dev_commission_pkr" type="text" class="form-control"
                                                placeholder="Development Comission in PKR">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Total Commission</label>
                                            <input id="regular-form-3" name="total_commission" type="text" class="form-control"
                                                placeholder="Total Commission">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Bonus</label>
                                            <input id="regular-form-3" name="bonus" type="text" class="form-control"
                                                placeholder="Bonus">
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Working Days</label>
                                            <input id="regular-form-3" name="working_days" type="text" class="form-control"
                                                placeholder="Working Days">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Holiday Deduction (In Days)</label>
                                            <input id="regular-form-3" name="holiday_deduct" type="text" class="form-control"
                                                placeholder="Holiday Deduction">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Hlaf Day Deduction (In Days)</label>
                                            <input id="regular-form-3" name="half_day_deduct" type="text" class="form-control"
                                                placeholder="Half Day Deduction">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label" >Fine Deduction <span id="fine_label" style="color: red"></span></label>
                                            <input id="regular-form-3" name="fine_deduct" type="text" class="form-control"
                                                placeholder="Fine Deduction">
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Security Clearance <span id="total_security_label" style="color: red"></span></label>
                                            <input id="regular-form-3" name="security_clearance" type="number" class="form-control"
                                                placeholder="Security Clearance">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Total Months Cleared <span id="total_security_months" style="color: red"></span></label>
                                            <input id="security_month_cleared" name="cleared_months" type="number" class="form-control"
                                                placeholder="Security Clearance">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Paid Holiday Compensation<span id="p_holiday_label" style="color: red"></span></label>
                                            <input id="regular-form-3" name="holiday_compen" type="number" class="form-control"
                                                placeholder="Paid Holiday Compensation">
                                        </div>
                                    </div>
                                    {{-- <div class="col-span-12 lg:col-span-6">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Food Deduction</label>
                                            <input id="regular-form-3" name="food_deduct" type="text" class="form-control"
                                                placeholder="Food Deduction">
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="grid grid-cols-12 gap-4 mt-3">
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Security Deduction</label>
                                            <input id="regular-form-3" name="security_deduct" type="text" class="form-control"
                                                placeholder="Security Deduction">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Lates</label>
                                            <input id="regular-form-3" name="lates" type="text" class="form-control"
                                                placeholder="Lates This Month">
                                        </div>
                                    </div>
                                    <div class="col-span-12 lg:col-span-4">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Advance Deduction <span id="advance_label" style="color: red"></span></label>
                                            <input id="regular-form-3" name="advance_deduct" type="number" class="form-control"
                                                placeholder="Advance deduction">
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-12 gap-6 mt-3">
                                    <div class="col-span-12 lg:col-span-12">
                                        <div class="mt-2">
                                            <label for="regular-form-3" class="form-label">Comments</label>
                                            <textarea name="comments"  class="form-control" ></textarea>
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
                // console.log(data);
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
                $("input[name='holiday_compen']").attr("max", data.holiday.remaining);
                $("input[name='security_deduct']").val(user.Security);
                if (data.advance != null && data.advance){
                advance = '(Total Advance: ' + data.advance.amount +')';
                }
                else
                {
                    advance = 0;
                }
                $('#advance_label').html(advance);
                if (data.advance != null && data.advance){
                    $("input[name='advance_deduct']").attr("max", data.advance.amount);
                }
                if(data.security.total === 0 || data.security.total === null){
                    $("input[name='security_clearance']").attr("readonly", "readonly");
                }
                else {
                    $("input[name='security_clearance']").removeAttr("readonly");
                }
                total_security = '(Total Security: ' + data.security.total +')';
                $('#total_security_label').html(total_security);
                $("input[name='security_clearance']").attr("max", data.security.total);
                if(data.security.total_months === 0 || data.security.total_months === null){
                    $("input[name='cleared_months']").attr("readonly", "readonly");
                }
                else {
                    $("input[name='cleared_months']").removeAttr("readonly");
                }
                security_month = '(Total Months: ' + data.security.total_months + ')';
                $('#total_security_months').html(security_month);
                $("input[name='cleared_months']").attr("max", data.security.total_months);

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
                            // console.log(data);
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
