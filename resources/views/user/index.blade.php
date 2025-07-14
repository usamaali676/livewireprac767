@extends('layouts.app')
@section('content')
@if(Auth::check())
<?php
// $mperm = App\Models\perm;
$users = Auth::user();
// $perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "Roles")->first();
$permuser = App\Models\perm::where('role_id', $users->role_id)->where('name', "user")->first();
// $permsheet = App\Models\perm::where('role_id', $user->role_id)->where('name', "Sales")->first();
?>
@endif
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Users
                </h2>
                @if ($permuser->create == 1)
                <a href="{{route('user.create')}}" class="btn btn-primary shadow-md mr-2">Add New User</a>
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
                                                            <th class="whitespace-nowrap">Email</th>
                                                            <th class="whitespace-nowrap">Role</th>
                                                            <th class="whitespace-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($user as $item)
                                                        <tr>
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->roles->name}}</td>
                                                            <td>@if($permuser->edit == 1)<a class="btn btn-warning mr-1 mb-2" href="{{ route('user.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a>@endif @if($permuser->view == 1)<a href="{{route('user.detail', $item->id)}}" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a>@endif @if($permuser->delete == 1)<a href="{{route('user.conf-delete', $item->id)}}" class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>@endif </td>
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
