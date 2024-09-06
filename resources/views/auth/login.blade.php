
@extends('app')


@section('title', 'NextGen - Inscription')

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="login-section">
            <div class="image-layer" style="background-image : url('images/background/signin.png');"></div>
            <div class="outer-box">
                <!-- Login Form -->
                <div class="login-form default-form">
                    <div class="form-inner">
                        <h3>Se connecter à NextGen</h3>
                        <!--Login Form-->
                        <form method="post" action="add-parcel.html">
                            <div class="form-group">
                                <label>Email</label>
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <label>Mot de passe</label>
                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <div class="form-group">
                                <div class="field-outer">
                                    <div class="input-group checkboxes square">
                                        <input id="remember_me" type="checkbox"
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                            name="remember">
                                        <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                            href="{{ route('password.request') }}">
                                            {{ __('Mot de passe oublié?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="theme-btn btn-style-one" type="submit" name="log-in">Se
                                    connecter</button>
                            </div>
                        </form>

                        <div class="bottom-box">
                            {{-- <div class="text">Ne possède pas encore de compte ?<a href="{{route('inscription')}}">S'inscrire</a></div> --}}
                        </div>
                    </div>
                </div>
                <!--End Login Form -->
            </div>
        </div>

    </form>

@endsection
{{-- @extends('app')

@include('header.header')

@section('title', 'NextGen - Inscription')

@section('content') --}}

{{-- @endsection --}}
