@extends('layouts.app')
@section('content')
@if(Auth::check())
<?php
// $mperm = App\Models\perm;
$user = Auth::user();
// $perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "Roles")->first();
// $permuser = App\Models\perm::where('role_id', $users->role_id)->where('name', "Users")->first();
// $permsheet = App\Models\perm::where('role_id', $user->role_id)->where('name', "Sales")->first();
$permcmnt = App\Models\perm::where('role_id', $user->role_id)->where('name', "cmnt")->first();
?>
@endif
    <!-- BEGIN: Content -->

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Comment
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('cmnt.store')}}" method="POST">
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
                <div class="intro-y box p-5">
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label for="crud-form-1" class="form-label">Client Business Name</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Client Business Name" value="{{$sale->business_name}}" readonly>
                                <input id="crud-form-1" type="hidden" class="form-control w-full"
                                placeholder="Client Business Name" name="sales_id" value="{{$sale->id}}" >
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label>Additional Links</label>
                            <div class="mt-3">
                                <textarea name="text" class="editor" id="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ url()->previous() }}"  class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
    @if($permcmnt->view == 1)
    <div class="intro-y box mt-5">
        <div class="p-5" >
                <div class="overflow-x-auto">

                    <table id="example" class="table table-report">
                                        <thead>
                                            <tr>
                                                <th class="whitespace-nowrap">Sr.</th>
                                                <th class="whitespace-nowrap">Comment</th>
                                                <th class="whitespace-nowrap">Date</th>

                                                @if($permcmnt->edit == 1 || $permcmnt->delete == 1) <th class="whitespace-nowrap">Action</th>@endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sale->comment as $item)
                                            <tr>
                                                <td>{{$srno++}}</td>
                                                <td>{!! $item->text !!}</td>
                                                <td>{{$item->date}}</td>

                                                <td>@if($permcmnt->edit == 1)<a class="btn btn-warning mr-1 mb-2" href="{{ route('cmnt.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a>@endif @if($permcmnt->delete == 1)<a href="{{route('cmnt.delete', $item->id)}}" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>@endif </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                </table>
            </div>

        </div>
    </div>
    @endif
    <!-- END: Content -->
@endsection
@section('js')
    <script src="{{ asset('js/ckeditor-classic.js') }}"></script>

@endsection
