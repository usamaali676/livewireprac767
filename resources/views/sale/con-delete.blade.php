@extends('layouts.app')
@section('content')

<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
        Profile Layout
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
        <div class="mt-6 lg:mt-0 flex-6  items-center justify-center px-5 border-t lg:border-0 border-slate-200/60 dark:border-darkmode-400 pt-5 lg:pt-0" style="margin: auto">
            <div class="text-center rounded-md w-100 py-3">
                <div class="font-medium text-primary text-xl">{{$sale->agent_name}}</div>
                <div class="text-slate-500">Agent</div>
            </div>
            <div class="text-center rounded-md w-100 py-3">
                <div class="font-medium text-primary text-xl"> {{$sale->closer_name}}</div>
                <div class="text-slate-500">Closer</div>
            </div>
            {{-- <div class="text-center rounded-md w-20 py-3">
                <div class="font-medium text-primary text-xl">492</div>
                <div class="text-slate-500">Reviews</div>
            </div> --}}
        </div>
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

<div class="tab-content mt-5">
    <div id="profile" class="tab-pane active" role="tabpanel" aria-labelledby="profile-tab">
        <div class="grid grid-cols-12 gap-12">
            <!-- BEGIN: Daily Sales -->
            <div class="intro-y box col-span-12 lg:col-span-12">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Comments
                    </h2>

                </div>
                <div class="p-5">
                    <div class=" grid grid-cols-12 gap-12 relative flex items-center">
                        <div class="intro-y box col-span-12 lg:col-span-8  ml-4 mr-auto">
                            <div class="text-slate-500 mr-5 sm:mr-5">{!! $sale->comments !!}</div>
                        </div>
                        <div class=" intro-y box col-span-4 lg:col-span-12 font-medium text-slate-600 dark:text-slate-500" style="text-align: right">{{$sale->date}}</div>
                    </div>
                    @foreach ($sale->comment as $item)
                    <div class="grid grid-cols-12 gap-12 relative flex items-center relative flex items-center mt-3">
                        <div class="intro-y box col-span-12 lg:col-span-9  ml-4 mr-aut">
                            <div class="text-slate-500 mr-5 sm:mr-5">{!! $item->text !!}</div>
                        </div>
                        <div class="intro-y box col-span-3 lg:col-span-12 font-medium text-slate-600 dark:text-slate-500" style="text-align: right">{{$item->date}}</div>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- END: Daily Sales -->

        </div>
    </div>
</div>
@endsection
