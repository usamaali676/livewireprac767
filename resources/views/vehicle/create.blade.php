@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Add Vehicle
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{route('vehicle.store')}}" method="POST">
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
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="regular-form-3" class="form-label">Vehicle Number</label>
                                    <input id="regular-form-3" name="vehicle_number" type="text" class="form-control" placeholder="Vehicle Number">
                                </div>
                                <div class="intro-y col-span-12 lg:col-span-6">
                                    <label for="vehicle-type">Select Vehicle Type </label>
                                    <select name="vehicle_type" id="" data-placeholder="Select Vehicle Type" class="tom-select w-full mt-2" style="z-index: 100">
                                        <option value="Car">Car</option>
                                        <option value="Bike">Bike</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                                    <label for="regular-form-3" class="form-label">Description</label>
                                    <textarea name="description" id="" class="form-control" ></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
