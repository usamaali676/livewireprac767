@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Leave Detail
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <b>User:</b> &nbsp;{{$leave->user->name}}
                    <br>
                    <br>
                    <b>Date:</b> &nbsp;{{$leave->date}}
                    <br>
                    <br>
                    <div class="d-flex" style="display: flex;">
                        <b>Leave Duration:</b> &nbsp;{{$leave->duration}} @if($range != null) &nbsp; &nbsp;<div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium"> ({{$range}} Days)</div>@endif
                    </div>
                    <br>
                    <b>Status:</b> &nbsp;@if ($leave->status == 0)
                    Pending
                    @else
                    Approve
                    @endif
                    <br>
                    <br>
                    <b>Reason:</b> &nbsp;{{$leave->reason}}
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
