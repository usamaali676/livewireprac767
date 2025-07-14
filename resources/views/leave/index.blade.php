@extends('layouts.app')
@section('content')
@if(Auth::check())
@php


// $mperm = App\Models\perm;
$user = Auth::user();
$perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "leave")->first();

@endphp
@endif
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Vehicles
                </h2>
               @if ($perm->create == 1)
               <a href="{{route('leave.create')}}" class="btn btn-primary shadow-md mr-2">Add New Leave</a>
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
                                                            <th class="whitespace-nowrap">User</th>
                                                            <th class="whitespace-nowrap">Date</th>
                                                            <th class="whitespace-nowrap">Duration</th>
                                                            <th class="whitespace-nowrap">Reason</th>
                                                            <th class="whitespace-nowrap">Status</th>
                                                            <th class="whitespace-nowrap">Type</th>
                                                            <th class="whitespace-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($leaves as $item)
                                                        <tr class="text-center">
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$item->user->name}}</td>
                                                            <td>{{$item->date}}</td>
                                                            <td>{{$item->duration}} @if ($item->duration == "Multiple")
                                                                @php
                                                                    $temp = App\Helpers\GlobalHelper::daterange($item->date);
                                                                @endphp
                                                                <div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium text-center" style="width: 70px; margin: auto; margin-top: 5px;"> {{$temp}} Days </div>
                                                            @endif</td>
                                                            <td>{{$item->reason}}</td>
                                                            <td>@if ($item->status == 1)<div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium text-center"> Approved </div>  @else <div class="py-1 px-2 rounded-full text-xs bg-warning  text-white cursor-pointer font-medium text-center"> Pending </div> @endif</td>
                                                            <td>@if ($item->leave_type == 1)<div class="py-1 px-2 rounded-full text-xs bg-success text-white cursor-pointer font-medium text-center"> Paid </div>  @else <div class="py-1 px-2 rounded-full text-xs bg-danger  text-white cursor-pointer font-medium text-center"> UnPaid </div> @endif</td>
                                                             <td> @if($perm->edit == 1 )<a class="btn btn-warning mr-1 mb-2" href="{{ route('leave.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a>@endif @if($perm->view == 1)<a href="{{route('leave.detail', $item->id)}}" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a>@endif @if($perm->delete == 1  )<a  href="{{route('leave.conf-delete', $item->id)}}"  class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>@endif </td>
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
