@extends('layouts.app')

@section('content')
@if(Auth::check())
<?php
// $mperm = App\Models\perm;
$user = Auth::user();
// $perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "Roles")->first();
// $permuser = App\Models\perm::where('role_id', $users->role_id)->where('name', "Users")->first();
$permsheet = App\Models\perm::where('role_id', $user->role_id)->where('name', "Sales")->first();
$permcmnt = App\Models\perm::where('role_id', $user->role_id)->where('name', "cmnt")->first();
?>
@endif
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Sales
            </h2>
            {{-- @if (auth()->user()->is_agent == 1)
            <div class="export-btn px-2">
                <a class="btn btn-primary" href="{{ route('sales') }}" role="button">
                    <i class="fas fa-upload"></i> Sales
                </a>
            </div>
            @endif --}}
            <div class="export-btn px-4">
                <a class="btn btn-outline-primary" href="{{ route('export') }}" role="button">
                    <i class="fas fa-upload"></i> Export
                </a>
            </div>
             @if($permsheet->create == 1)
            <div class="import-btn">
                <a class="btn btn-outline-primary" href="{{ route('sales.create') }}" role="button">
                    <i class="fas fa-upload"></i> Add Manually
                </a>


            </div>
            <div id="button-modal" class="p-5">
                <div class="preview">

                    <!-- BEGIN: Modal Toggle -->
                    <div class="text-center"> <a href="javascript:;" data-tw-toggle="modal"
                            data-tw-target="#button-modal-preview" class="btn btn-primary">Import Data</a> </div>
                    <!-- END: Modal Toggle -->
                    <!-- BEGIN: Modal Content -->
                    <div id="button-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <a data-tw-dismiss="modal" href="javascript:;"> <i data-lucide="x"
                                        class="w-8 h-8 text-slate-400"></i> </a>
                                <div class="modal-body p-5">
                                    <div class="p-5 text-center">
                                        <form action="{{ route('file-import') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group ">
                                                <div class="fallback">
                                                    <input name="file" type="file" name="file" required/>
                                                </div>
                                                {{-- <div class="dz-message" data-dz-message>
                                                <div class="text-lg font-medium">Drop files here or click to upload.</div>
                                                <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded. </div>
                                            </div> --}}

                                            </div>

                                            {{-- <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a> --}}

                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button class="btn btn-primary">Submit</button>

                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Modal Content -->
                </div>
            </div>
            @endif
        </div>
        <!-- BEGIN: Striped Rows -->
        <div class="intro-y box mt-5">
            <div class="p-5" >
                    <div class="overflow-x-auto">

                        <table id="example" class="table table-report">
                                            <thead>
                                                <tr>
                                                    <th class="whitespace-nowrap">Sr.</th>
                                                    <th class="whitespace-nowrap">Business Name</th>
                                                    <th class="whitespace-nowrap">Business Number</th>
                                                    <th class="whitespace-nowrap">Email</th>
                                                    <th class="whitespace-nowrap">Agent</th>
                                                    <th class="whitespace-nowrap">Closer</th>

                                                    {{-- <th class="whitespace-nowrap">Action</th> --}}

                                                    <th class="whitespace-nowrap">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sales as $item)
                                                @if(Auth::check())
                                                @if (auth()->user()->id == $item->closer_id  || auth()->user()->role_id == 1)
                                                <tr >
                                                    <td>{{$srno++}}</td>
                                                    <td>{{$item->business_name}}</td>
                                                    <td>{{$item->business_number}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>{{$item->agent->name}}</td>
                                                    <td>{{$item->closer->name}}</td>
                                                    {{-- <td>{{$item->date}}</td> --}}

                                                     <td>@if($permsheet->edit == 1)<a class="btn btn-warning mr-1 mb-2" href="{{ route('sales.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a>@endif @if($permsheet->view == 1)<a href="{{route('sale-datail', $item->id)}}" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a>@endif @if($permsheet->delete == 1)<a href="{{route('sales.conf-delete', $item->id)}}" class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a>@endif @if($permcmnt->create == 1)<a href="{{route('cmnt.create', $item->id)}}" class="btn btn-primary mr-1 mb-2"> <i data-lucide="message-circle" class="w-5 h-5"></i> </a>@endif </td>
                                                </tr>
                                                @endif
                                                @endif
                                                @endforeach

                                            </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- END: Striped Rows -->
    </div>
@endsection
{{-- @section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
@endsection --}}
