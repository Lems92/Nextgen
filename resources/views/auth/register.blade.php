@extends('app')


@section('title', 'NextGen - Inscription')

@section('content')
    @include('header.header')

    <div class="login-section">
        <div class="image-layer" style="background-image : url('images/background/signup.png')">
        </div>
        <div class="outer-box">
            <div class="login-form default-form">
                <div class="form-inner">
                    <h3>Creer votre compte NextGen</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <x-text-input id="type_compte" class="block mt-1 w-full" type="hidden" name="type_compte"
                            :value="old('type_compte')" required autocomplete="type_compte" />

                        <div class="form-group">
                            <div class="btn-box row">
                                <div class="col-sm-4">
                                    <a href="#" id="btn-etudiant" class="theme-btn btn-style-four"
                                        onclick="setRole('etudiant', this)"><i class="la la-user"></i> Étudiant</a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" id="btn-entreprise" class="theme-btn btn-style-four"
                                        onclick="setRole('entreprise', this)"><i class="la la-briefcase"></i> Entreprise</a>
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" id="btn-service-carriere" class="theme-btn btn-style-four"
                                        onclick="setRole('service-carriere', this)"><i class=""></i> Service
                                        carrière</a>
                                </div>
                            </div>
                        </div>

                        <!-- Name -->
                        <div class="form-group mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="form-group mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="form-group mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <script>
                        function setRole(type_compte, element) {
                            document.getElementById('type_compte').value = type_compte;
                            var buttons = document.querySelectorAll('.theme-btn');
                            buttons.forEach(function(btn) {
                                btn.classList.remove('active');
                            });
                            element.classList.add('active');
                        }
                    </script>
                @endsection
