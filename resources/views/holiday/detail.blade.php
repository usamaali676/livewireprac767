<?php
use app\Helpers\GlobalHelper;
?>
@extends('layouts.app')
@section('content')
<!-- BEGIN: Content -->
<div class="content content--top-nav">
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Paid Holidays Detail
        </h2>
    </div>
    <!-- BEGIN: Input -->
    <div class="intro-y box mt-4">

        <div id="input" class="p-5">
            <div class="preview">
                <b>User Name:</b> &nbsp;{{$holiday->user->name}}
                <br>
                <br>
                <b>Year:</b> &nbsp;{{$holiday->year}}
                <br>
                <br>
                <b>Total:</b> &nbsp;{{$holiday->total}}
                <br>
                <br>
                <b>Total:</b> &nbsp;{{$holiday->remaining}}
            </div>
        </div>
        <!-- END: Input -->
    </div>
    <!-- END: Content -->

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Holidays Monthly Recode
        </h2>
    </div>


        <div class="intro-y box px-5 pt-5 mt-5">

            <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
                <div class="mt-12 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                    @php
                        $srno = 1;
                    @endphp

                    <table class="table table-report">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Sr.</th>
                                <th class="whitespace-nowrap">Year</th>
                                <th class="whitespace-nowrap">Month</th>
                                <th class="whitespace-nowrap">Holidays</th>


                            </tr>
                        </thead>

                        <tbody>
                            @foreach($holiday->monthly_holiday as $item)
                            <tr>
                                <td>{{$srno++}}</td>
                                <td>{{$item->year->year}}</td>
                                @php
                                    // use App\Helpers\GlobalHelper;

                                    $month = GlobalHelper::convertAbbreviatedMonth($item->month);
                                @endphp
                                <td>{{$month}}</td>
                                <td>{{$item->holidays}}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>



    @endsection
