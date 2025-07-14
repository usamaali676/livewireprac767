@extends('layouts.app')
@section('css')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<style>
    div#cke_notifications_area_editor1, div#cke_notifications_area_editor2 {
    display: none;
}
</style>
@endsection
@section('content')
    <!-- BEGIN: Content -->
    <div class="content content--top-nav">
        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Client Report
            </h2>
        </div>
        <!-- BEGIN: Input -->
        <div class="intro-y box mt-4">

            <div id="input" class="p-5">
                <div class="preview">
                    <form action="{{route('reports.store')}}" method="POST" enctype="multipart/form-data">
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
                        <input type="hidden" name="client_id" value="{{ $client->id }}">
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-3">
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mt-2">
                                        <label class="form-label">Client</label>
                                        <div class="mt-2">
                                            <input id="regular-form-3" name="" type="text" class="form-control" value="{{ $client->sale->business_name }}"
                                            placeholder="{{ $client->sale->business_name }}" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mt-2">
                                        <label for="regular-form-3" class="form-label">Select  Month</label>
                                        <div class="mt-2">
                                            <select data-placeholder="Select Month" class="tom-select w-full" name="month">
                                                <option >Please Select</option>
                                                <option  value="January">January</option>
                                                <option  value="February">February</option>
                                                <option  value="March">March</option>
                                                <option  value="April">April</option>
                                                <option  value="May">May</option>
                                                <option  value="June">June</option>
                                                <option  value="July">July</option>
                                                <option  value="August">August</option>
                                                <option  value="September">September</option>
                                                <option  value="October">October</option>
                                                <option  value="November">November</option>
                                                <option  value="December">December</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-3">
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mt-2">
                                        <label for="regular-form-3" class="form-label">Report Title</label>
                                        <div class="mt-2">
                                            <input id="regular-form-3" name="title" type="text" class="form-control" value=""
                                            placeholder="Title" >
                                            {{-- <label class="btn btn-primary" >
                                                Upload Report <input  name="social_file" type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required style="display: none"/>
                                            </label> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <div class="mt-2">
                                        <label for="regular-form-3" class="form-label">Report Type</label>
                                        <div class="mt-2">
                                            <select data-placeholder="Select Month" class="tom-select w-full" name="type">
                                                <option >Please Select</option>
                                                <option  value="SMM">SMM</option>
                                                <option  value="GMB">GMB</option>
                                                <option  value="LandingPage">LandingPage</option>
                                                <option  value="Website">Website</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-3">
                                <div class="col-span-12 lg:col-span-6">
                                    <label for="status">Report Status</label>
                                    <div class="mt-2">
                                        <select data-placeholder="Select Month" class="tom-select w-full" name="status">
                                            <option >Please Select</option>
                                            <option  value="Pending">Pending</option>
                                            <option  value="Sent">Sent</option>
                                            <option  value="Approved">Approved</option>
                                            <option  value="Reject">Reject</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-span-12 lg:col-span-6">
                                    <label for="status">File Upload</label>
                                    <div class="mt-2">
                                        <label class="btn btn-primary" >
                                                Upload Report <input  name="report_file" type="file" name="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel, .pdf" required style="display: none"/>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-3">
                                <div class="col-span-12 lg:col-span-12">
                                    <label for="status">Description</label>
                                    <div class="mt-2">
                                        <textarea name="description" id="editor1" ></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- <div class="mt-3">
                            <div class="grid grid-cols-12 gap-6 mt-3">
                                <div class="col-span-12 lg:col-span-12">
                                    <form data-file-types="image/jpeg|image/png|image/jpg" action="/file-upload" class="dropzone"> <div class="fallback"> <input name="file" type="file" /> </div> <div class="dz-message" data-dz-message> <div class="text-lg font-medium">Drop files here or click to upload.</div> <div class="text-slate-500"> This is just a demo dropzone. Selected files are <span class="font-medium">not</span> actually uploaded. </div> </div> </form>
                                </div>

                            </div>
                        </div> --}}


                        <button type="submit" class="btn btn-primary mt-5">Submit</button>
                    </form>
                </div>
            </div>
            <!-- END: Input -->
        </div>
        <!-- END: Content -->
    @endsection
@section('js')
<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endsection
