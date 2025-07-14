@php
    $total_task = $client->tasks->count(); // Total count

    $complete_task = $client->tasks()->where('status', "Complete")->count();
    if(isset($complete_task) && $complete_task != 0){ // Current amount
        // dd($complete_task);
    $complete_task_percent = ($complete_task / $total_task) * 100;
    }
    else{
        $complete_task_percent = 0;
    }
    $pending_task = $client->tasks()->where('status', "Not Started")->count();
    // dd($pending_task);
    if(isset($pending_task) && $pending_task != 0){ // Current amount
        // dd($pending_task);
    $pending_task_percent = ($pending_task / $total_task) * 100;
    // dd($pending_task_percent);
    }
    else{
        $pending_task_percent = 0;
    }
    $progress_task = $client->tasks()->where('status', "In progress")->count();
    if(isset($progress_task) && $progress_task != 0){ // Current amount
    $progress_task_percent = ($progress_task / $total_task) * 100;
    }
    else{
        $progress_task_percent = 0;
    }
@endphp

@extends('layouts.app')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Client Details
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$sale->business_name}}</div>
                    <div class="text-slate-500">{{$sale->business_name}}</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> {{$sale->email}} </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="phone" class="w-4 h-4 mr-2"></i> {{$sale->business_number}}</div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="globe" class="w-4 h-4 mr-2"></i> {{$sale->website	}}</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-5">Project Duration</div>
                <div class="flex items-center justify-center lg:justify-start mt-2">
                    <div class="mr-2 w-50 flex"> Start Date: <span class="ml-3 font-medium text-success">{{$client->start_date}}</span> </div>
                    {{-- <div class="mr-2 w-50 flex"> Start Date: <span class="ml-3 font-medium text-success">{{$client->reporting_date}}</span> </div> --}}
                    {{-- <div class="w-3/4">
                        <div class="h-[55px]">
                            <canvas class="simple-line-chart-1 -mr-5"></canvas>
                        </div>
                    </div> --}}
                </div>
                <div class="flex items-center justify-center lg:justify-start pt-3">
                    <div class="mr-2 w-50 flex"> Reporting Date: <span class="ml-3 font-medium text-danger">{{ date('d ', strtotime($client->reporting_date)) }}{{ date('F') }}</span> </div>
                    {{-- <div class="w-3/4">
                        <div class="h-[55px]">
                            <canvas class="simple-line-chart-2 -mr-5"></canvas>
                        </div>
                    </div> --}}
                </div>
            </div>
            {{-- @if (auth()->user()->role == 'admin' || auth()->user()->role == 'Creator') --}}

         {{-- @endif --}}

    </div>
    <!-- END: Profile Info -->
    <div class="intro-y tab-content mt-5">
        <div id="dashboard" class="tab-pane active" role="tabpanel" aria-labelledby="dashboard-tab">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Top Categories -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Services Providing
                        </h2>
                        <div class="dropdown ml-auto">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        <a href="{{route('service.create')}}" class="dropdown-item"> <i data-lucide="plus" class="w-4 h-4 mr-2"></i> Add Services </a>
                                    </li>
                                    <li>
                                        <a href="{{route('clients.edit', $client->id)}}" class="dropdown-item"> <i data-lucide="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="p-5">
                        @foreach ($client->services as $service)
                        <div class="flex flex-col sm:flex-row @if($service->loop == $loop->first) mt-4 @endif">
                            <div class="mr-auto">
                                <a href="" class="font-medium">{{$service->name}}</a>
                                <div class="text-slate-500 mt-1">Service</div>
                            </div>
                            <div class="flex">

                                <div class="text-center">

                                    <div class="bg-success/20 text-success rounded px-2 mt-1.5">Active</div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- END: Top Categories -->
                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Task Report <span style="font-size: 13px">(Total Tasks {{$total_task}}</span>)
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                            <div class="nav nav-tabs dropdown-menu w-40" role="tablist">
                                <ul class="dropdown-content">
                                    <li> <a id="work-in-progress-mobile-new-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#work-in-progress-new" class="dropdown-item" role="tab" aria-controls="work-in-progress-new" aria-selected="true">New</a> </li>
                                    <li> <a id="work-in-progress-mobile-last-week-tab" href="javascript:;" data-tw-toggle="tab" data-tw-target="#work-in-progress-last-week" class="dropdown-item" role="tab" aria-selected="false">Last Week</a> </li>
                                </ul>
                            </div>
                        </div>
                        <ul class="nav nav-link-tabs w-auto ml-auto hidden sm:flex" role="tablist" >
                            <li id="work-in-progress-new-tab" class="nav-item" role="presentation"> <a href="" class="nav-link py-5 active" style="display: flex" data-tw-target="#work-in-progress-new" aria-controls="work-in-progress-new" aria-selected="true" role="tab" ><i data-lucide="refresh-ccw" class="w-4 h-4 mr-3"></i>  Refresh</a> </li>
                            {{-- <li id="work-in-progress-last-week-tab" class="nav-item" role="presentation"> <a href="javascript:;" class="nav-link py-5" data-tw-target="#work-in-progress-last-week" aria-selected="false" role="tab" > Last Week </a> </li> --}}
                        </ul>
                    </div>
                    <div class="p-5">
                        <div class="tab-content">
                            <div id="work-in-progress-new" class="tab-pane active" role="tabpanel" aria-labelledby="work-in-progress-new-tab">
                                <div>
                                    <div class="flex">
                                        <div class="mr-auto">Pending Tasks</div>
                                        <div>{{$pending_task_percent}}%</div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-1/2 bg-primary" style="width: {{$pending_task_percent}}%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="mr-auto">Completed Tasks</div>
                                        <div>{{$complete_task}} / {{$total_task }}</div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-0/4  bg-primary  " style=" width: {{$complete_task_percent}}%"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <div class="flex">
                                        <div class="mr-auto">Tasks In Progress</div>
                                        <div>{{$progress_task}}</div>
                                    </div>
                                    <div class="progress h-1 mt-2">
                                        <div class="progress-bar w-3/4 bg-primary" style="width:{{$progress_task_percent}}%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                {{-- <a href="" class="btn btn-secondary block w-40 mx-auto mt-5">View More Details</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Work In Progress -->
                <!-- BEGIN: Daily Sales -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Users In Project
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                            <div class="dropdown-menu w-40">
                                <ul class="dropdown-content">
                                    <li>
                                        {{-- <a href="javascript:;" class="dropdown-item"> <i data-lucide="file" class="w-4 h-4 mr-2"></i> Download Excel </a> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                         <a href="{{route('clients.edit', $client)}}" class="btn btn-outline-secondary hidden sm:flex">Add Users</a>
                    </div>
                    <div class="p-5">
                        @foreach ($client->users as $user)
                        <div class="relative flex items-center @if($service->loop == $loop->first) mt-5 @endif ">
                            <div class="w-12 h-12 flex-none image-fit">
                                <img  class="rounded-full" src="{{asset('images/profile-1.jpg')}}">
                            </div>
                            <div class="ml-4 mr-auto">
                                <a href="" class="font-medium">{{$user->name}}</a>
                                <div class="text-slate-500 mr-5 sm:mr-5">{{$user->role}}</div>
                            </div>
                            <div class="font-medium text-slate-600 dark:text-slate-500">{{$user->designation->name}}</div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- END: Daily Sales -->
                <!-- BEGIN: Latest Tasks -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center px-5 py-5 sm:py-0 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Latest Tasks
                        </h2>
                        <div class="dropdown ml-auto sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i> </a>
                            <div class="nav nav-tabs dropdown-menu w-40" role="tablist">

                            </div>
                        </div>
                        <ul class="nav nav-link-tabs w-auto ml-auto hidden sm:flex" role="tablist" >
                            <li id="latest-tasks-last-week-tab" class="nav-item" role="presentation"> <a href="{{route('task.create', $client->id)}}" class="nav-link py-5 active" data-tw-target="#latest-tasks-last-week" aria-selected="true" role="tab" > New Task </a> </li>
                        </ul>
                    </div>
                    <div class="p-5">
                        <div class="tab-content">
                            <div id="latest-tasks-new" class="tab-pane active" role="tabpanel" aria-labelledby="latest-tasks-new-tab">
                                @foreach ($client->tasks as $task)
                                    <div class="flex items-center @if($task->loop == $loop->first) mt-4 @endif">
                                        <div class="border-l-2 border-primary dark:border-primary pl-4">
                                            <a href="" class="font-medium">{{$task->name}}</a>
                                            <div class="text-slate-500">{{$task->due_date}}</div>
                                        </div>
                                        <div class="form-check form-switch ml-auto">
                                            @foreach ($task->users as $user)
                                                <div class="bg-success/20 text-success rounded px-2 mt-1.5" style="margin: 0px 10px">{{$user->name}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Latest Tasks -->
            </div>
        </div>
    </div>
@endsection
