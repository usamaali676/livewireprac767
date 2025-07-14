@extends('layouts.app')
@section('content')
@if(Auth::check())
<?php
// $mperm = App\Models\perm;
$users = Auth::user();
// $perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "Roles")->first();
// $permsheet = App\Models\perm::where('role_id', $user->role_id)->where('name', "Sales")->first();
?>
@endif
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Salary
                </h2>
                <a href="{{route('salary.create')}}" class="btn btn-primary shadow-md mr-2">Generate Salary</a>
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
                                                            <th class="whitespace-nowrap">Dept</th>
                                                            <th class="whitespace-nowrap">Basic Salary</th>
                                                            <th class="whitespace-nowrap">Salary Mont</th>
                                                            <th class="whitespace-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($salary as $item)
                                                        <tr>
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$item->user->name}}</td>
                                                            <td>{{$item->user->department->name}}</td>
                                                            <td>{{$item->basic_salary}}</td>
                                                            <td>{{$item->salary_month}}</td>
                                                            <td><a class="btn btn-warning mr-1 mb-2" href="{{ route('salary.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a> <a href="{{route('salary.detail', $item->id)}}" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a><a href="{{route('salary.conf-delete', $item->id)}}" class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a> </td>
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
