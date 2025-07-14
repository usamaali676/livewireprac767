@extends('layouts.app')
@section('content')
@if(Auth::check())
<?php
// $mperm = App\Models\perm;
$user = Auth::user();
$perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "role")->first();
// $permuser = App\Models\perm::where('role_id', $user->role_id)->where('name', "Users")->first();
// $permsheet = App\Models\perm::where('role_id', $user->role_id)->where('name', "Sales")->first();
?>
@endif
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Roles
                </h2>
               @if ($perm->create == 1)
               <a href="{{route('role.create')}}" class="btn btn-primary shadow-md mr-2">Add New Role</a>
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
                                                            <th class="whitespace-nowrap">Name</th>
                                                            {{-- <th class="whitespace-nowrap">Last Name</th> --}}
                                                            <th class="whitespace-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($role as $item)
                                                        <tr>
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$item->name}}</td>
                                                             <td> @if($perm->edit == 1 && $item->id != 1)<a class="btn btn-warning mr-1 mb-2" href="{{ route('role.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a>@endif @if($perm->view == 1)<a href="{{route('role.detail', $item->id)}}" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a>@endif @if($perm->delete == 1  && $item->id != 1)<a href="{{route('role.conf-delete', $item->id)}}" class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>@endif </td>
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
