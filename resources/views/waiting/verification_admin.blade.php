@extends('dashboard-layout')

@section('title', 'Dashboard')

@section('content')

    @include('header.dashboard-header')

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
        <div class="text-center">
            <h2>Votre compte est en cours de verification</h2>
            <h5 class="mt-4 mb-4">Cela peut prendre quelque temps, vous allez recevoir un email pour confirmer l'activation de votre compte.</h5>
            <h3>Merci d'avoir choisi notre plateforme!</h3>
        </div>
        </div>
    </section>
    <!-- End Dashboard -->

    <!-- Copyright -->

    </div><!-- End Page Wrapper -->

@endsection
