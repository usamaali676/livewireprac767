@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                User Security
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{route('security.store')}}" method="POST">
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
                                <div class="col-span-12 lg:col-span-6">
                                    <label for="tomselect-1">Select User </label>
                                    <div class="mt-2">
                                        <select name="user_id"  data-placeholder="Select User" class="tom-select w-full " >
                                            <option >Please Select</option>
                                            @foreach ($user as $item)
                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="regular-form-3" class="form-label">Total Security</label>
                                    <input id="regular-form-3" name="total_security" type="text" class="form-control" placeholder="Total Security">
                                </div>
                            </div>
                            <div class="grid grid-cols-12 gap-6 mt-5">
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="regular-form-3" class="form-label">Total Months</label>
                                    <input id="regular-form-3" name="total_month" type="text" class="form-control" placeholder="Total Months">
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="regular-form-3" class="form-label">Return Month</label>
                                    <input id="regular-form-3" name="return_month" type="text" class="form-control" placeholder="Return Month">
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="intro-y col-span-12 lg:col-span-12">
                                <label for="regular-form-3" class="form-label">Paid</label>
                                <input id="regular-form-3" name="paid" type="text" class="form-control" placeholder="Paid">
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
