@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Confirm Delete
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <b>User Name:</b> &nbsp;{{$advance->user->name}}
                    <br>
                    <br>
                    <b>Amoutn:</b> &nbsp;{{$advance->amount}}
                    <br>
                    <br>
                    <b>Date:</b> &nbsp;{{$advance->date}}
                    <br>
                    <br>
                    <b>Description:</b> &nbsp;{{$advance->description}}
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->


<div class="">
    <div class="text-right mt-5">
        <a href="{{ url()->previous() }}"  class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
        <a href="{{route('advance.delete', $advance->id)}}" onclick="return confirm('Are you sure you want to delete this item')"  type="submit" class="btn btn-primary w-24">Delete</a>
    </div>
</div>
    @endsection
