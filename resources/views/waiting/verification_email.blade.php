@extends('dashboard-layout')

@section('title', 'Dashboard')

@section('content')

    @include('header.dashboard-header')

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success text-center mb-2">
                    Un nouveau lien de vérification a été envoyé à l'adresse e-mail que vous avez fournie lors de votre inscription.
                </div>
            @endif
            <div class="text-center">
                Merci pour votre inscription sur NextGen !
Veuillez vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer.
Cela ne prendra qu’une minute et vous pourrez ensuite publier votre première mission.
Pas reçu notre e-mail ?
Cliquez ci-dessous pour le renvoyer.
            </div>

            <div class="mt-4 d-flex justify-content-center gap-4 align-items-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <button class="btn btn-primary">Renvoyer un email</button>
                    </div>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="btn btn-secondary">
                        Se deconnecter
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- End Dashboard -->

    <!-- Copyright -->

    </div><!-- End Page Wrapper -->

@endsection
