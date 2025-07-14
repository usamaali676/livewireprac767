@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Delete Vehicle
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4 p-5">

            <div id="input" >
                <div class="preview">
                    <b>User:</b> &nbsp;{{$leave->user->name}}
                    <br>
                    <br>
                    <b>Date:</b> &nbsp;{{$leave->date}}
                    <br>
                    <br>
                    <b>Leave Duration:</b> &nbsp;{{$leave->duration}}
                    <br>
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
        <div class="text-right mt-5">
            <a href="{{ url()->previous() }}"  class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
            <a href="{{route('leave.delete', $leave->id)}}" onclick="return confirm('Are you sure you want to delete this item')"  type="submit" class="btn btn-primary w-24">Delete</a>
        </div>
        <!-- END: Content -->
    @endsection
