@extends('layouts.app')
@section('content')
@if(Auth::check())
<?php
// $mperm = App\Models\perm;
$users = Auth::user();
// $perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "Roles")->first();
// $permleave = App\Models\perm::where('role_id', $users->role_id)->where('name', "leave")->first();
// $permsheet = App\Models\perm::where('role_id', $user->role_id)->where('name', "Sales")->first();
?>
@endif
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Paid Holidays Cycle
                </h2>
                {{-- <a href="{{route('holiday.create')}}" class="btn btn-primary shadow-md mr-2">Add Holiday Cycle</a> --}}
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
                                                            <th class="whitespace-nowrap">Year</th>
                                                            <th class="whitespace-nowrap">Total</th>
                                                            <th class="whitespace-nowrap">Remaining</th>
                                                            <th class="whitespace-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($holiday as $item)
                                                        <tr>
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$item->user->name}}</td>
                                                            <td>{{$item->year}}</td>
                                                            <td>{{$item->total}}</td>
                                                            <td>{{$item->remaining}}</td>
                                                            <td><a class="btn btn-warning mr-1 mb-2" href="{{ route('holiday.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a><a href="{{route('holiday.detail', $item->id)}}" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a><a href="{{route('holiday.delete', $item->id)}}" class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a> </td>
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
