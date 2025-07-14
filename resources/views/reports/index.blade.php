@extends('layouts.app')
@section('css')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/2.1.5/css/dataTables.dataTables.css"> --}}
@endsection
@section('content')
@if(Auth::check())
<?php
// $mperm = App\Models\perm;
$user = Auth::user();
$perm = App\Models\perm::where('role_id', $user->role_id)->where('name', "reports")->first();
// $permuser = App\Models\perm::where('role_id', $user->role_id)->where('name', "Users")->first();
// $permsheet = App\Models\perm::where('role_id', $user->role_id)->where('name', "Sales")->first();
if (!isset($client))
{
    $client = App\Models\Client::where('id', $reports->client_id)->first();
}
?>
@endif
        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Reports
                </h2>
               @if ($perm->create == 1)
               <a href="{{route('reports.create', $client->id)}}" class="btn btn-primary shadow-md mr-2">Add New Report</a>
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
                                                            <th class="whitespace-nowrap">Client Name</th>
                                                            <th class="whitespace-nowrap">Month</th>
                                                            <th class="whitespace-nowrap">Type</th>
                                                            <th class="whitespace-nowrap">Status</th>
                                                            {{-- <th class="whitespace-nowrap">Last Name</th> --}}
                                                            <th class="whitespace-nowrap">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
                                                    <tbody>
                                                        @foreach ($reports as $item)
                                                        <tr>
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$client->sale->business_name}}</td>
                                                            <td>{{ $item->month }}</td>
                                                            <td>{{ $item->type }}</td>
                                                            <td>{{ $item->status }}</td>
                                                             <td>
                                                                {{-- @if($perm->edit == 1 && $item->id != 1) --}}
                                                                {{-- <a class="btn btn-warning mr-1 mb-2" href="{{ route('role.edit',$item->id) }}" > <i data-lucide="edit" style="color: #fff" class="w-5 h-5"></i> </a> --}}
                                                                {{-- @endif --}}
                                                                @if($perm->view == 1)
                                                                <a href="{{ asset('reports/' . $item->month . '/' . $item->file_path) }}" target="_blank" class="btn btn-success mr-1 mb-2"> <i data-lucide="eye" class="w-5 h-5" style="color: #fff"></i> </a>
                                                                @endif
                                                                @if($perm->edit == 1  )
                                                                <a href="{{ route('reports.edit', $item->id)}}" class="btn btn-warning mr-1 mb-2"> <i data-lucide="repeat" class="w-5 h-5" style="color: #fff"></i> </a>
                                                                @endif
                                                                @if($perm->delete == 1)
                                                                <a href="{{ route('reports.delete',  $item->id)}}" onclick="return confirm('Are you sure you want to delete this item')"  class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5" style="color: #fff"></i> </a>
                                                                @endif
                                                                {{-- @if($perm->delete == 1  && $item->id != 1) --}}
                                                                {{-- <a href="{{route('role.conf-delete', $item->id)}}" class="btn btn-danger mr-1 mb-2"> <i data-lucide="trash" class="w-5 h-5"></i> </a> --}}
                                                                {{-- @endif --}}
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
@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/2.1.5/js/dataTables.js"></script> --}}
<script>
$('#example').DataTable({
    initComplete: function () {
        this.api()
            .columns([2,3,4])
            .every(function () {
                var column = this;

                // Create select element and listener
                var select = $('<select><option value="">Please Select</option></select>')
                    .appendTo($(column.footer()).empty())
                    .on('change', function () {
                        column
                            .search($(this).val(), {exact: true})
                            .draw();
                    });

                // Add list of options
                column
                    .data()
                    .unique()
                    .sort()
                    .each(function (d, j) {
                        select.append(
                            '<option value="' + d + '">' + d + '</option>'
                        );
                    });
            });
    }
});
</script>
@endsection
