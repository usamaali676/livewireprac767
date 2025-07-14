@extends('layouts.app')
@section('content')
@if(Auth::check())
<?php
$users = Auth::user();
// $perm_holiday = App\Models\perm::where('role_id', $users->role_id)->where('name', "holiday")->first();
?>
@endif

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        User Security
    </h2>
</div>
<!-- BEGIN: Profile Info -->
<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$user->name}}</div>
                <div class="text-slate-500">{{$user->roles->name}}</div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Department</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->department->name}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Total Month</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$security->total_months}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Total Security</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$security->total}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Return Month</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$security->return_months}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Paid</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$security->paid}}</p>
            </div>
        </div>
    </div>
</div>

<!-- END: Profile Info -->

<div class="">
    <div class="text-right mt-5">
        <a href="{{ url()->previous() }}"  class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
        <a href="{{route('security.delete', $security->id)}}" onclick="return confirm('Are you sure you want to delete this item')"  type="submit" class="btn btn-primary w-24">Delete</a>
    </div>
</div>

@endsection
