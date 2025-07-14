@extends('layouts.app')
@section('content')
@if(Auth::check())
<?php
// $mperm = App\Models\perm;
$user = Auth::user();
$perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "vehicle")->first();

?>
@endif
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Vehicles
                </h2>
               @if ($perm->create == 1)
               <a href="{{route('vehicle.create')}}" class="btn btn-primary shadow-md mr-2">Add New Vehicle</a>
               @endif
            </div>
                                <!-- BEGIN: Striped Rows -->
                                <div class="intro-y box mt-5">
                                    <div class="p-5" id="striped-rows-table">
                                        <div class="preview">
                                            <div class="overflow-x-auto">
                                                <table id="example" class="table table-report">
                                                    <thead>
                                                        <tr>
                                                            <th class="whitespace-nowrap">Sr.</th>
                                                            <th class="whitespace-nowrap">Vehicle Type</th>
                                                            <th class="whitespace-nowrap">Vehicle Number</th>
                                                            <th class="whitespace-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($vehicle as $item)
                                                        <tr>
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$item->vehicle_type}}</td>
                                                            <td>{{$item->vehicle_number}}</td>
                                                             <td> @if($perm->edit == 1 )<a class="btn btn-warning mr-1 mb-2" href="{{ route('vehicle.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a>@endif @if($perm->view == 1)<a href="{{route('vehicle.detail', $item->id)}}" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a>@endif @if($perm->delete == 1  )<a  href="{{route('vehicle.conf-delete', $item->id)}}"  class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>@endif </td>
                                                        </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END: Striped Rows -->
        </div>
        <!-- END: Content -->
@endsection
