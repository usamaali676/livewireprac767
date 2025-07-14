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
        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        @include('layouts.Component.head')
        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="login" oncontextmenu="return false;"  style="user-select: none;">
        <div class="container sm:px-10">
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        {{-- <img alt="Firm TechSol" class="w-6" src="{{asset('images/logo.svg')}}"> --}}
                        {{-- <span class="text-white text-lg ml-3"> The Journey Inventors </span> --}}
                        <span class="text-white text-lg ml-3"> FTS </span>
                    </a>
                    <div class="my-auto">
                        {{-- <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_KXdLRdwnM5.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop controls autoplay></lottie-player> --}}
                        <img alt="Firm TechSol" class="-intro-x w-1/2 -mt-16" src="{{asset('images/illustration.svg')}}">

                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            A few more clicks to
                            <br>
                            sign in to your account.
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your Sales Sheet in one place</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                            Log In
                        </h2>
                        <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                        <div class="intro-x mt-8">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="intro-x mt-10 xl:mt-8 text-slate-600 dark:text-slate-500 text-center xl:text-left"> Copyright all Right Reserved 2022 | Developed and Managed by <a class="text-primary dark:text-slate-200" href=""> Ali Rajpoot </a> </div>
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </div>

        <!-- BEGIN: JS Assets-->
        @include('layouts.Component.footer')
        <!-- END: JS Assets-->
    </body>
</html>
