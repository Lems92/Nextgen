@extends('app')

@section('title', 'NextGen - Réinitialisation du mot de passe')

@section('content')
@include('header.header')
<div class="login-section">
    <div class="image-layer" style="background-image : url('{{ asset('images/inscription1.jpg') }}');"></div>
    <div class="outer-box">
        <div class="login-form default-form">
            <div class="form-inner">
                <h3>Réinitialisation du mot de passe</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                    </div>

                    <div class="form-group">
                        <label for="password">Nouveau mot de passe</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirmation">Confirmer le mot de passe</label>
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="theme-btn btn-style-one">
                            Réinitialiser le mot de passe
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
