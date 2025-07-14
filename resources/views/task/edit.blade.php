@extends('layouts.app')
@section('css')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endsection
@section('content')
<!-- BEGIN: Content -->
<div class="content content--top-nav">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Task
        </h2>
    </div>
    <!-- BEGIN: Input -->
    <div class="intro-y box mt-4">

        <div id="input" class="p-5">
            <div class="preview">
                <form action="{{ route('task.update', $task->id) }}" method="POST">
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
                    <div class="grid grid-cols-12 gap-6 mt-3">
                        <div class="col-span-12 lg:col-span-12">
                            <div class="mt-2">
                                <input type="hidden" name="client_id" value="{{$task->client_id}}">
                                <label for="regular-form-3" class="form-label">Title</label>
                                <div class="relative w-100 ">
                                    <input type="text" name="name" value="{{$task->name}}" class="form-control ">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6">
                            <div class="mt-2">
                                <label for="regular-form-3" class="form-label">Start Date</label>
                                <div class="relative w-100 ">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" name="start_date" class="datepicker form-control pl-12"
                                        data-single-mode="true" value="{{$task->start_date}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6">
                            <div class="mt-2">

                                <label for="regular-form-3" class="form-label">End Date</label>
                                <div class="relative w-100 ">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" name="due_date" class="datepicker form-control pl-12"
                                        data-single-mode="true" value="{{$task->due_date}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <div class="mt-5">
                            <label for="regular-form-3" class="form-label">Assign Project to Users</label>
                            <div class="mt-2">
                                <select id="user_select"data-placeholder="Select User" class="tom-select w-full " multiple name="users[]">
                                    @if (isset($task->users))
                                    @foreach ($task->users as $user)
                                    <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                                    @endforeach
                                @else
                                <option>Please Select</option>
                                @endif
                                @foreach ($all_user as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-12">
                        <div class="mt-4">
                            <label for="regular-form-3" class="form-label">Description</label>
                            <div class="relative w-100 ">
                                <textarea name="description" rows="3" class="form-control">{!! $task->description !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <div class="mt-2">
                            <label for="regular-form-3" class="form-label">Status</label>
                            <div class="mt-2">
                                <select id="user_select" data-placeholder="Select Status" class="tom-select w-full " name="status" >
                                    @if (isset($task->status))
                                        <option value="{{$task->status}}" selected >{{$task->status}}</option>
                                    @else
                                        <option value="" selected>Please Select Status</option>
                                    @endif
                                    
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>

                    </div>
                </form>
            </div>
        </div>
        <!-- END: Input -->
    </div>
    <!-- END: Content -->


    @endsection
    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    @endsection
