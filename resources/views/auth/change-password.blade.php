@extends('dashboard-layout')

@section('title', 'Changer le mot de passe')

@section('content')
@include('header.dashboard-header')
<div class="container mt-5">
    <h3>Changer le mot de passe</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <div class="mb-3">
            <label>Mot de passe actuel</label>
            <input type="password" name="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nouveau mot de passe</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Confirmer le nouveau mot de passe</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button class="btn btn-primary" type="submit">Changer</button>
    </form>
</div>
@endsection
