@extends('layouts.auth.auth')
@section('css')
    <!-- Sidemenu-responsive-tabs css -->
    <link href="{{ asset('/assets/css/auth/style.css') }}" rel="stylesheet" />
@endsection

@section('content')
    <div class="container">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <img class="img-log" src="{{asset('assets/site/images/light4.png')}}" alt="">
                </a>
            </div>


        </div>
        <h2>{{ __('auth.login') ?? 'تسجيل الدخول' }}</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">{{ __('auth.email') ?? 'البريد الإلكتروني' }}</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br>
            <label for="password">{{ __('auth.password') }}</label>
            <input type="password" id="password" name="password" required autocomplete="current-password">
            <br>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <br>
            <label for="remember">
                <input type="checkbox" id="remember" name="remember">
                {{ __('auth.remember') ?? 'تذكرني' }}
            </label>
            <br>
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="" href="{{ route('password.request') }}">
                        {{ __('auth.forgot') ?? 'نسيت كلمة المرور؟' }}
                    </a>
                @endif

                <button type="submit" class="">
                    {{ __('auth.login') ?? 'تسجيل الدخول' }}
                </button>
            </div>

        </form>

        <p>{{__('auth.dont_have_account')}} <a href="{{ route('register') }}">{{ __('auth.register') ?? 'إنشاء حساب' }}</a>
        </p>

    </div>
@endsection

@section('js')
@endsection