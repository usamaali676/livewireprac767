@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Vehicle Detail
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <b>Vehicle Type:</b> &nbsp;{{$vehicle->vehicle_type}}
                    <br>
                    <br>
                    <b>Vehicle Number:</b> &nbsp;{{$vehicle->vehicle_number}}
                    <br>
                    <br>
                    <b>Description:</b> &nbsp;{{$vehicle->description}}
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
