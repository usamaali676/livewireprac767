@extends('layouts.app')
@section('content')
    <!-- BEGIN: Content -->

    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Edit Comment
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->
            <form action="{{route('cmnt.update',$comment->id)}}" method="POST">
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
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label for="crud-form-1" class="form-label">Client Business Name</label>
                            <input id="crud-form-1" type="text" class="form-control w-full"
                                placeholder="Client Business Name" value="{{$sale->business_name}}" readonly>
                                <input id="crud-form-1" type="hidden" class="form-control w-full"
                                placeholder="Client Business Name" name="sales_id" value="{{$sale->id}}" >
                        </div>
                    </div>
                    <div class="grid grid-cols-12 gap-6 mt-5">
                        <div class="intro-y col-span-12 lg:col-span-12">
                            <label>Additional Links</label>
                            <div class="mt-3">
                                <textarea name="text" class="editor" id="editor">{!! $comment->text !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <a href="{{ url()->previous() }}"  class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                        <button type="submit" class="btn btn-primary w-24">Save</button>
                    </div>
                </div>
            </form>
            <!-- END: Form Layout -->
        </div>
    </div>
    <!-- END: Content -->
@endsection
@section('js')
    <script src="{{ asset('js/ckeditor-classic.js') }}"></script>

@endsection
