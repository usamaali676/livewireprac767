@php
    $total_task = $task->count(); // Total count

    $complete_task = $task->where('status', "Complete")->count();
    if(isset($complete_task_percent)){ // Current amount
    $complete_task_percent = ($complete_task / $total_task) * 100;
    }
    else{
        $complete_task_percent = 0;
    }
    $pending_task = $task->where('status', "Not Started")->count();
    if(isset($pending_task_percent)){ // Current amount
    $pending_task_percent = ($pending_task / $total_task) * 100;
    }
    else{
        $pending_task_percent = 0;
    }
    $progress_task = $task->where('status', "In progress")->count();
    if(isset($progress_task_percent)){ // Current amount
    $progress_task_percent = ($progress_task / $total_task) * 100;
    }
    else{
        $progress_task_percent = 0;
    }
@endphp
@extends('layouts.app')
@section('content')

        <!-- BEGIN: Content -->
        <div class="content content--top-nav">
            <div class="intro-y flex items-center mt-8">
                <h2 class="text-lg font-medium mr-auto">
                    Tasks
                </h2>
               {{-- @if ($perm->create == 1) --}}
               {{-- <a href="{{route('task.create')}}" class="btn btn-primary shadow-md mr-2">Add New task</a> --}}
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
                                                            <th class="whitespace-nowrap">Client</th>
                                                            <th class="whitespace-nowrap">Start Date</th>
                                                            <th class="whitespace-nowrap">End Date</th>
                                                            <th class="whitespace-nowrap">Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($task as $item)
                                                        <tr>
                                                            <input type="hidden" name="id" id="id" value="{{$item->id}}">
                                                            <td>{{$srno++}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->client->sale->business_name}}</td>
                                                            <td>{{$item->start_date}}</td>
                                                            <td>{{$item->due_date}}</td>
                                                            <td>
                                                                <select name="status" id="status_{{$item->id}}" data-id="{{$item->id}}">
                                                                    <option value="Not Started" {{ $item->status == 'Not Started' ? 'selected' : '' }}>Not Started</option>
                                                                    <option value="In progress" {{ $item->status == 'In progress' ? 'selected' : '' }}>In progress</option>
                                                                    <option value="Complete" {{ $item->status == 'Complete' ? 'selected' : '' }}>Complete</option>
                                                                    <option value="Deferred" {{ $item->status == 'Deferred' ? 'selected' : '' }}>Deferred</option>
                                                                    <option value="Waiting For Somenone" {{ $item->status == 'Waiting For Somenone' ? 'selected' : '' }}>Waiting For Somenone</option>
                                                                </select>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('select[name="status"]').on('change', function() {
            var status = $(this).val();
            var id = $(this).data('id');
            // alert(id);
            $.ajax({
                url: "{{ route('task.status_update') }}",
                type: "GET",
                data: {
                    id: id,
                    status: status
                },
                success: function(response) {
                    swal({
                        title: "Success",
                        text: "Status updated successfully!",
                        icon: "success"
                    });
                },
                error: function(xhr, status, error) {
                    swal({
                        title: "Error",
                        text: "An error occurred while updating the status.",
                        icon: "error"
                    });
                }
            });
        });
    });
    </script>

@endsection
