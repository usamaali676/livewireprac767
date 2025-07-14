@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Sale
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('sales.store')}}" method="POST">
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
                <div class="intro-y box p-5">

                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="crud-form-1" class="form-label">Client Business Name</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Client Business Name" name="business_name" ">
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="crud-form-1" class="form-label">Client Business Name (Advertisement)</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Client Business Name (Adv)" name="business_name_adv" ">
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="crud-form-1" class="form-label">Client Business Number</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Client Business Number" name="business_number" ">
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="crud-form-1" class="form-label">Client Business Number (Advertisement)</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Client Business Number (Adv)" name="business_number_adv" ">
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="crud-form-1" class="form-label">Cell Phone</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Cell Phone" name="cell_phone" ">
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="crud-form-1" class="form-label">Email</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Email" name="email" ">
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="crud-form-1" class="form-label">Website</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Website"name="website" ">
                        </div>
                        <div class="intro-y col-span-12 lg:col-span-6">
                            <label for="crud-form-1" class="form-label">Payment Method</label>
                            <input id="crud-form-1" type="text"  name="payment_methods" class="form-control w-full" placeholder="Payment Method" >
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="col-span-12 lg:col-span-6">
                            <div class="mt-3">
                                <label>Closer</label>
                                <div class="mt-2">
                                    <select data-placeholder="Select Closer" class="tom-select w-full" name="closer_id" required>
                                        <option value="">Please Select Closer</option>
                                        @foreach ($closer as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label>Additional Links</label>
                            <div class="mt-3">
                                <textarea name="add_links" class="editor" id="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label>Areas</label>
                            <div class="mt-3">
                                <textarea name="areas" class="editor" id="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label>Services</label>
                            <div class="mt-3">
                                <textarea name="services" class="editor" id="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label>Keywords</label>
                            <div class="mt-3">
                                <textarea name="Keywords" class="editor" id="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label>LandingPages</label>
                            <div class="mt-3">
                                <textarea name="landing_pages" class="editor" id="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label>Comments</label>
                            <div class="mt-3">
                                <textarea name="comments" class="editor" id="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <div class="mt-3">
                                <label>Active Status</label>
                                <div class="form-switch mt-2">
                                    <input type="checkbox" class="form-check-input" name="status" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ url()->previous() }}" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>

    <!-- END: Content -->
@endsection
{{-- @section('js')
    <script src="{{ asset('js/ckeditor-classic.js') }}"></script>

@endsection --}}
