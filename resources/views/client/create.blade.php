@extends('layouts.app')
@section('css')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <style>
        .hiddenCB div {
  display: inline;
  margin: 0;
  padding: 0;
  list-style: none;
}
.hiddenCB input[type="checkbox"]+label {
    padding: 10px 20px;
    display: block;
    background: #e9e9e9;
    width: fit-content;
    margin: 10px 0;
}

.hiddenCB input[type="checkbox"],
.hiddenCB input[type="radio"] {
  display: none;

}

.hiddenCB label {

  cursor: pointer;
}

.hiddenCB input[type="checkbox"]+label:hover{
  background: #0d9488;
  color: #ffffff;
}

.hiddenCB input[type="checkbox"]:checked+label {
  background: #0c5bcb;
  color: #ffffff;
}

.hiddenCB input[type="checkbox"]:checked+label:hover{
  background: #0c5bcb;
  color: #ffffff;
}
.dnone{
    display: none;
}
    </style>
@endsection
@section('content')
<!-- BEGIN: Content -->
<div class="content content--top-nav">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Client
        </h2>
    </div>
    <!-- BEGIN: Input -->
    <div class="intro-y box mt-4">

        <div id="input" class="p-5">
            <div class="preview">
                <form action="{{ route('clients.store') }}" method="POST">
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
                        <div class="col-span-12 lg:col-span-6">
                            <div class="mt-2">
                                <input type="hidden" name="sale_id" value="{{$sale->id}}">
                                <label for="regular-form-3" class="form-label">Start Date</label>
                                <div class="relative w-100 ">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" name="start_date" class="datepicker form-control pl-12"
                                        data-single-mode="true">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-span-12 lg:col-span-6">
                            <div class="mt-2">

                                <label for="regular-form-3" class="form-label">End Date</label>
                                <div class="relative w-100 ">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" name="end_date" class="datepicker form-control pl-12"
                                        data-single-mode="true">
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-span-12 lg:col-span-6">
                            <div class="mt-2">

                                <label for="regular-form-3" class="form-label">Repoting Date</label>
                                <div class="relative w-100 ">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" name="reporting_date" class="datepicker form-control pl-12"
                                        data-single-mode="true">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 lg:col-span-6 dnone" id="landinpagedate">
                            <div class="mt-2">
                                <label for="regular-form-3" class="form-label">Landing Page Submission date</label>
                                <div class="relative w-100 ">
                                    <div
                                        class="absolute rounded-l w-10 h-full flex items-center justify-center bg-slate-100 border text-slate-500 dark:bg-darkmode-700 dark:border-darkmode-800 dark:text-slate-400">
                                        <i data-lucide="calendar" class="w-4 h-4"></i>
                                    </div>
                                    <input type="text" name="landingpage_date" class="datepicker form-control pl-12"
                                        data-single-mode="true" value="NULL">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <div class="mt-5">
                            <label for="regular-form-3" class="form-label">Assign Project to Users</label>
                            <div class="mt-2">
                                <select id="user_select"data-placeholder="Select User" class="tom-select w-full " multiple name="users[]">
                                    @foreach ($user as $item)
                                    <option>Please Select</option>
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-3">
                        <div class="col-span-12 lg:col-span-6">
                            <div class="mt-2">
                                <div class="hiddenCB">
                                    <h3>Select Services</h3>
                                    <div style="display: flex;   flex-wrap: wrap; gap: 10px">
                                        @foreach($services as $service)
                                            <input type="checkbox" name="services[]" value="{{ $service->id }}" id="{{ $service->id}}"> <label for="{{ $service->id}}">{{ $service->name }} </label>
                                        @endforeach

                                    </div>
                                  </div>

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

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Business Details
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
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$sale->business_name}}</div>
                    <div class="text-slate-500">{{$sale->business_name_adv}}</div>
                </div>
            </div>
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Client Contact Details</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                    <div class="truncate sm:whitespace-normal flex items-center"> <i data-lucide="mail" class="w-4 h-4 mr-2"></i> {{$sale->email}} </div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="phone" class="w-4 h-4 mr-2"></i> {{$sale->business_number}}</div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="phone-call" class="w-4 h-4 mr-2"></i> {{$sale->business_number_adv}}</div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="smartphone" class="w-4 h-4 mr-2"></i> {{$sale->cellphone	}}</div>
                    <div class="truncate sm:whitespace-normal flex items-center mt-3"> <i data-lucide="globe" class="w-4 h-4 mr-2"></i> {{$sale->website	}}</div>
                </div>
            </div>
            {{-- <div class="mt-6 lg:mt-0 flex-6  items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0" style="margin: auto">
                <div class="text-center rounded-md w-100 py-3">
                    <div class="font-medium text-primary text-xl">{{$sale->agent->name}}</div>
                    <div class="text-slate-500">Agent</div>
                </div>
                <div class="text-center rounded-md w-100 py-3">
                    <div class="font-medium text-primary text-xl"> {{$sale->closer->name}}</div>
                    <div class="text-slate-500">Closer</div>
                </div>

            </div> --}}
        </div>

    </div>
    <!-- END: Profile Info -->
    <div class="tab-content mt-5">
        <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-12 gap-6">

                <div class="intro-y box col-span-6 lg:col-span-12">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Areas
                        </h2>
                    </div>
                    <div class="p-5">
                        <ul class="">
                            <li>{!! $sale->area !!}</li>
                        </ul>
                    </div>
                </div>
                <div class="intro-y box col-span-6 lg:col-span-12">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Services
                        </h2>
                    </div>
                    <div class="p-5">
                        <ul class="">
                            <li>{!! $sale->services !!}</li>
                        </ul>

                    </div>
                </div>

            </div>



        </div>


    </div>

    <div class="tab-content mt-5">
        <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-12 gap-6">

                <div class="intro-y box col-span-6 lg:col-span-12">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Additional Links
                        </h2>
                    </div>
                    <div class="p-5">
                        <ul class="">
                            <li>{!! $sale->additional_links !!}</li>
                        </ul>
                    </div>
                </div>
                <div class="intro-y box col-span-6 lg:col-span-12">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Keywords
                        </h2>
                    </div>
                    <div class="p-5">
                        <ul class="">
                            <li>{!! $sale->keywords !!}</li>
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="tab-content mt-5">
        <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
            <div class="grid grid-cols-12 gap-6">

                <div class="intro-y box col-span-6 lg:col-span-12">
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                        <h2 class="font-medium text-base mr-auto">
                            Landing Pages
                        </h2>
                    </div>
                    <div class="p-5">
                            {!! $sale->landing_pages !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endsection
    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <script>
  $(document).ready(function() {
    if ($('#4').is(':checked')) {
      $('#landinpagedate').removeClass('dnone');
    }
  });

  // Toggle div visibility on checkbox change
  $('#4').change(function() {
    if ($(this).is(':checked')) {
      $('#landinpagedate').removeClass('dnone');
    } else {
      $('#landinpagedate').addClass('dnone');
    }
  });
    </script>
    @endsection
