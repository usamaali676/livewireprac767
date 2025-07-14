<!DOCTYPE html>
<!--
Template Name: Enigma - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" class="light">
    <!-- BEGIN: Head -->
    <head>
        @include('layouts.Component.head')
        @yield('css')
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="py-5 md:py-0" >
        {{-- Header --}}
        @include('layouts.Component.Header')
        {{-- End Header --}}
        <div class="flex overflow-hidden">
            <!-- BEGIN: Side Menu -->
            @include('layouts.Component.sidebar')
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                @yield('content')
            </div>
            <!-- END: Content -->
        </div>

        {{-- @include('sweetalert::alert') --}}
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

        <!-- BEGIN: JS Assets-->
        {{-- @yield('js') --}}
      @include('layouts.Component.footer')
      @yield('js')

        <!-- END: JS Assets-->
    </body>
</html>
