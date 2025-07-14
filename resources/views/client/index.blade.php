@extends('layouts.app')
@section('content')
@if(Auth::check())
<?php
// $perm = App\Models\perm;
$user = Auth::user();
$perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "clients")->first();
$permuser = App\Models\perm::where('role_id', $user->role_id)->where('name', "Users")->first();
$permreports = App\Models\perm::where('role_id', $user->role_id)->where('name', "reports")->first();
?>
@endif
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Clients
                </h2>
               {{-- @if ($perm->create == 1) --}}
               {{-- <a href="{{route('desig.create')}}" class="btn btn-primary shadow-md mr-2">Add New Designation</a> --}}
               {{-- @endif --}}
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
                                                            <th class="whitespace-nowrap">Name</th>
                                                            <th class="whitespace-nowrap">Start Date</th>
                                                            {{-- <th class="whitespace-nowrap">End Date</th> --}}
                                                            <th class="whitespace-nowrap">Services</th>
                                                            <th class="whitespace-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($client as $item)
                                                        <tr>
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$item->sale->business_name}}</td>
                                                            <td>{{$item->start_date}}</td>
                                                            {{-- <td>{{$item->last_date}}</td> --}}
                                                            <td>
                                                            @foreach($item->services as $service)
                                                                <span style="background: #0C5BCB; padding: 10px; color: #fff; border-radius: 5px ">{{$service->name}}</span>
                                                            @endforeach</td>

                                                             <td>
                                                                @if($perm->edit == 1 )
                                                                <a class="btn btn-warning mr-1 mb-2" href="{{ route('clients.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a>
                                                                @endif
                                                                @if($perm->view == 1)
                                                                <a href="{{route('clients.detail', $item->id)}}" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a>
                                                                @endif
                                                                @if($perm->delete == 1  )
                                                                <a  href="{{route('clients.conf-delete', $item->id)}}"  class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>
                                                                @endif
                                                                @if ($permreports->view == 1)
                                                                    <a  href="{{route('reports.index', $item->id)}}"  class="btn btn-primary mr-1 mb-2"> <i data-lucide="clipboard" class="w-5 h-5"></i> </a>
                                                                @endif
                                                            </td>
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
