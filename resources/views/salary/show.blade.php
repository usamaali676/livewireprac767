<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>Employee Salary Invoice</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    margin-top:20px;
    background:#eee;
}

.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}
span.currancy{
    font-size: 10px;
    padding: 0 5px;
}
    </style>
</head>
<body id="body">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="col-md-12">
<div class="invoice">

<div class="invoice-company text-inverse f-w-600">
<span class="pull-right hidden-print">
{{-- <a href="javascript:;" id="export-pdf" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-file t-plus-1 text-danger fa-fw fa-lg"></i> Export as PDF</a> --}}
<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
</span>
Firm Tech Services
</div>


<div class="invoice-header">
<div class="invoice-from">
<small>Employee</small>
<address class="m-t-5 m-b-5">
<strong class="text-inverse">{{$salary->user->name}}</strong><br>
Phone: {{$salary->user->phone}}<br>
Email: {{$salary->user->email}}<br>
Deptartment: {{$salary->user->department->name}}<br>
Address: {{$salary->user->currAddress}}
</address>
</div>
{{-- <div class="invoice-to">
<small>to</small>
<address class="m-t-5 m-b-5">
<strong class="text-inverse">Company Name</strong><br>
Street Address<br>
City, Zip Code<br>
Phone: (123) 456-7890<br>
Fax: (123) 456-7890
</address>
</div> --}}
<div class="invoice-date">
<small>Invoice / {{ Str::upper($salary->salary_month)}}  Period</small>
<div class="date text-inverse m-t-5">{{$salary->date}}</div>
<div class="invoice-detail">
#{{$salary->tracker_id}}<br>
Salary Slip
</div>
</div>
</div>


<div class="invoice-content">

<div class="table-responsive">
<table class="table table-invoice">
<thead>
<tr>
<th>DESCRIPTION</th>
{{-- <th class="text-center" width="10%">RATE</th>
<th class="text-center" width="10%">HOURS</th> --}}
<th class="text-right" width="20%">AMOUNT</th>
</tr>
</thead>
<tbody>
@if(isset($salary->basic_salary))
<tr>
<td>
<span class="text-inverse">Basic Salary </span><br>
</td>
<td class="text-right">{{ (int) $salary->basic_salary}}<span class="currancy">Rs</span></td>
</tr>
@endif
@if (isset($salary->m_commission_usd) && $salary->m_commission_usd != 0)
<tr>
<td>
<span class="text-inverse">Marketing Commission in USD</span><br>
</td>
<td class="text-right">${{ (int) $salary->m_commission_usd}}<span class="currancy">USD</span></td>
</tr>
@endif
@if (isset($salary->m_commission_pkr) && $salary->m_commission_pkr != 0)
<tr>
<td>
<span class="text-inverse">Marketing Commission in PKR</span><br>
</td>
<td class="text-right">{{ (int) $salary->m_commission_pkr}}<span class="currancy">Rs</span></td>
</tr>
@endif
{{-- @if (isset($salary->dev_commission_usd) && $salary->dev_commission_usd != 0)
<tr>
<td>
<span class="text-inverse">Development Commission in USD</span><br>
</td>
<td class="text-right">${{ (int) $salary->dev_commission_usd}}<span class="currancy">USD</span></td>
</tr>
@endif
@if (isset($salary->dev_commission_pkr) && $salary->dev_commission_pkr != 0)
<tr>
<td>
<span class="text-inverse">Development Commission in PKR</span><br>
</td>
<td class="text-right">{{ (int) $salary->dev_commission_pkr}}<span class="currancy">Rs</span></td>
</tr>
@endif --}}
@if (isset($salary->total_commission) && $salary->total_commission != 0)
<tr>
<td>
<span class="text-inverse">Total Commission</span><br>
</td>
<td class="text-right">{{ (int) $salary->total_commission}}<span class="currancy">Rs</span></td>
</tr>
@endif
@if (isset($salary->bonus) && $salary->bonus != 0)
<tr>
<td>
<span class="text-inverse">Total Bonus</span><br>
</td>
<td class="text-right">{{ (int) $salary->bonus}}<span class="currancy">Rs</span></td>
</tr>
@endif
@if (isset($salary->advance_deduct) && $salary->advance_deduct != 0)
<tr>
<td>
<span class="text-inverse">Advance Deduction</span><br>
</td>
<td class="text-right">{{ (int) $salary->advance_deduct}}<span class="currancy">Rs</span></td>
</tr>
@endif
@if (isset($salary->holiday_deduct) && $salary->holiday_deduct != 0)
<tr>
<td>
<span class="text-inverse">Holiday Deduction</span><br>
</td>
<td class="text-right">{{$salary->holiday_deduct}}<span class="currancy">Rs</span></td>
</tr>
@endif
@if (isset($salary->half_day_deduct) && $salary->half_day_deduct != 0)
<tr>
<td>
<span class="text-inverse">Half Day Deduction</span><br>
</td>
<td class="text-right">{{$salary->half_day_deduct}}<span class="currancy">Rs</span></td>
</tr>
@endif
@if (isset($salary->fine_deduct) && $salary->fine_deduct != 0)
<tr>
<td>
<span class="text-inverse">Fine Deduction</span><br>
</td>
<td class="text-right">{{ (int) $salary->fine_deduct}}<span class="currancy">Rs</span></td>
</tr>
@endif
{{-- @if (isset($salary->food_deduct) && $salary->food_deduct != 0)
<tr>
<td>
<span class="text-inverse">Food Deduction</span><br>
</td>
<td class="text-right">{{ (int) $salary->food_deduct}}<span class="currancy">Rs</span></td>
</tr>
@endif --}}
@if (isset($salary->security_deduct) && $salary->security_deduct != 0)
<tr>
<td>
<span class="text-inverse">Security Deduction</span><br>
</td>
<td class="text-right">{{ (int) $salary->security_deduct}}<span class="currancy">Rs</span></td>
</tr>
@endif
@if (isset($salary->security_clearance) && $salary->security_clearance != 0)
<tr>
<td>
<span class="text-inverse">Security Clearance</span><br>
</td>
<td class="text-right">{{ (int) $salary->security_clearance}}<span class="currancy">Rs</span></td>
</tr>
@endif
@if (isset($salary->lates_deduct) && $salary->lates_deduct != 0)
<tr>
<td>
<span class="text-inverse">Security Clearance</span><br>
</td>
<td class="text-right">{{ (int) $salary->lates_deduct}}<span class="currancy">Rs</span></td>
</tr>
@endif

</tbody>
</table>
</div>


<div class="invoice-price">
<div class="invoice-price-left">
<div class="invoice-price-row">
<div class="sub-price">
<small>Basic Salary</small>
<span class="text-inverse">{{ (int) $salary->basic_salary}}<span class="currancy">Rs</span></span>
</div>
<div class="sub-price">
<i class="fa fa-plus text-muted"></i>
</div>
<div class="sub-price">
<small>Bounas This Month</small>
<span class="text-inverse">{{ (int) $salary->bonus}}<span class="currancy">Rs</span></span>
</div>
</div>
</div>
<div class="invoice-price-right">
<small>Total Salary</small> <span class="f-w-600">{{$salary->total_salary}}<span class="currancy">Rs</span></span>
</div>
</div>

</div>


<div class="invoice-note">
    <p><b>Employee Comments For This Month: </b>&nbsp; {!! $salary->comments !!}</p>
</div>


<div class="invoice-footer">
<p class="text-center m-b-5 f-w-600">
Powerd By Firm Tech Services
</p>
<p class="text-center">
<a href="mailto:hr@firmtechservices.com"><span class="m-r-10"><i class="fa fa-fw fa-lg fa-globe"></i> hr@firmtechservices.com</span></a>
<a href="tel:+923000288871"><span class="m-r-10"><i class="fa fa-fw fa-lg fa-phone"></i> +92 300 0288871</span></a>
</p>
</div>

</div>
</div>
</div>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
