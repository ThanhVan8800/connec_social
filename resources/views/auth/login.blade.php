<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
@extends('layouts.guest')
@section('title')
Login
@endsection
@section('content')
<div class="preloader"></div>

<div class="main-wrap">

    <div class="nav-header bg-transparent shadow-none border-0">
        <div class="nav-top w-100">
            <a href="index.html"><i class="feather-zap text-success display1-size me-2 ms-0"></i><span
                    class="d-inline-block fredoka-font ls-3 fw-600 text-current font-xxl logo-text mb-0">ConnectMe.
                </span> </a>
            <a href="#" class="mob-menu ms-auto me-2 chat-active-btn"><i
                    class="feather-message-circle text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
            <a href="default-video.html" class="mob-menu me-2"><i
                    class="feather-video text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
            <a href="#" class="me-2 menu-search-icon mob-menu"><i
                    class="feather-search text-grey-900 font-sm btn-round-md bg-greylight"></i></a>
            <button class="nav-menu me-0 ms-2"></button>

            <a href="#"
                class="header-btn d-none d-lg-block bg-dark fw-500 text-white font-xsss p-3 ms-auto w100 text-center lh-20 rounded-xl"
                data-bs-toggle="modal" data-bs-target="#Modallogin">Login</a>
            <a href="#"
                class="header-btn d-none d-lg-block bg-current fw-500 text-white font-xsss p-3 ms-2 w100 text-center lh-20 rounded-xl"
                data-bs-toggle="modal" data-bs-target="#Modalregister">Register</a>

        </div>


    </div>

    <div class="row">
        <div class="col-xl-5 d-none d-xl-block p-0 vh-100 bg-image-cover bg-no-repeat"
            style="background-image: url(/template/images/login-bg.jpg);"></div>
        <div class="col-xl-7 vh-100 align-items-center d-flex bg-white rounded-3 overflow-hidden">
            <div class="card shadow-none border-0 ms-auto me-auto login-card">
                <div class="card-body rounded-0 text-left">
                    <h2 class="fw-700 display1-size display2-md-size mb-3">Login into <br>your account</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group icon-input mb-3">
                            <i class="font-sm ti-email text-grey-500 pe-0"></i>
                            <input type="text" name="email"
                                class="style2-input ps-5 form-control text-grey-900 font-xsss fw-600"
                                placeholder="Your Email Address">
                        </div>
                        <div class="form-group icon-input mb-1">
                            <input type="Password" name="password"
                                class="style2-input ps-5 form-control text-grey-900 font-xss ls-3"
                                placeholder="Password">
                            <i class="font-sm ti-lock text-grey-500 pe-0"></i>
                        </div>
                        <div class="form-check text-left mb-3">
                            <input type="checkbox" class="form-check-input mt-2" id="exampleCheck5">
                            <label class="form-check-label font-xsss text-grey-500" for="exampleCheck5">Remember
                                me</label>
                            <a href="{{ route('password.request') }}"
                                class="fw-600 font-xsss text-grey-700 mt-1 float-right">Forgot your
                                Password?</a>
                        </div>

                        <div class="col-sm-12 p-0 text-left">
                            <div class="form-group mb-1"><button type="submit"
                                    class="form-control text-center style2-input text-white fw-600 bg-dark border-0 p-0 ">Login</button>
                            </div>
                            <h6 class="text-grey-500 font-xsss fw-500 mt-0 mb-0 lh-32">Dont have account <a
                                    href="{{ route('register') }}" class="fw-700 ms-1">Register</a></h6>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection