@extends('layouts.app')
@section('content')

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Delete User
    </h2>
</div>
<!-- BEGIN: Profile Info -->
<div class="intro-y box px-5 pt-5 mt-5">
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
            <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                <img alt="Midone - HTML Admin Template" class="rounded-full" src="{{asset('images/profile-1.jpg')}}">
            </div>
            <div class="ml-5">
                <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$user->name}}</div>
                <div class="text-slate-500">{{$user->roles->name}}</div>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> {{$user->perEmail}} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-2"> <i data-lucide="phone" class="w-4 h-4 mr-2"></i> {{$user->phone}} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-2"> <i data-lucide="map-pin" class="w-4 h-4 mr-2"></i> {{$user->currAddress}} </div>
                <div class="truncate sm:whitespace-normal flex items-center mt-2"> <i data-lucide="credit-card" class="w-4 h-4 mr-2"></i> {{$user->cnic}} </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Department</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->department->name}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Designation</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->designation->name}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Father/Guardian's Name</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->fatherName}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Office Email</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->offEmail}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Joining Date</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->joindate}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Date of Birth</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->dob}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Current Address</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->currAddress}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Permenent Address</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->perAddress}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Last Degree</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->lastDegree}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Running Degree</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->currDegree}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Emergency Contact Name</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->emgContactName}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Emergency Contact Relation</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->emgContactRelation}}</p>
            </div>
        </div>
    </div>
    <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Emergency Contact Number</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
            <p>{{$user->emgContactNumber}}</p>
            </div>
        </div>
        <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="font-medium text-center lg:text-left lg:mt-3">Vehicle</div>
            <div class="flex flex-col justify-center items-center lg:items-start mt-2">
                <p>{{$user->vehicle->vehicle_type}}</p>
                <p>{{$user->vehicle->vehicle_number}}</p>

            </div>
        </div>
    </div>
</div>
<!-- END: Profile Info -->
<div class="">
    <div class="text-right mt-5">
        <a href="{{ url()->previous() }}"  class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
        <a href="{{route('user.delete', $user->id)}}" onclick="return confirm('Are you sure you want to delete this item')"  type="submit" class="btn btn-primary w-24">Delete</a>
    </div>
</div>
@endsection
