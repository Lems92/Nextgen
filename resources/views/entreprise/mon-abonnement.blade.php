@extends('dashboard-layout')

@section('title', 'NextGen - Service carrière - Gestion candidat')

@section('content')

    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Mon abonnement</h3>
                <div class="text">Veuillez choisir l'offre qui vous convient</div>
            </div>

            <div>
                <h4 class="mt-4 mb-3">Etat de l'abonnement </h4>
                @if(Auth::user()->subscription)
                    <p><strong>Type :</strong> {{ Auth::user()->subscription->name }}</p>
                    <p><strong>Date de Début :</strong> {{ Auth::user()->subscription_started_at->format('j F Y') }}</p>
                    <p><strong>Date d'Expiration :</strong> {{ Auth::user()->subscription_expires_at->format('j F Y') }}
                    </p>
                    <p><strong>Status :</strong>
                        @if(Auth::user()->hasActiveSubscription())
                            <span class="badge bg-success">Actif</span>
                        @else
                            <span class="badge bg-danger">Expiré</span>
                        @endif
                    </p>

                    @if(Auth::user()->hasActiveSubscription())
                        <!-- Option pour les utilisateurs de demander un renouvellement via un formulaire ou simplement informer l'administrateur -->
                        <p>Votre abonnement est actif. Pour renouveler, veuillez contacter un administrateur.</p>
                    @else
                        <a href="{{ route('subscriptions.index') }}" class="btn btn-primary">Choisir un Abonnement</a>
                    @endif
                @else
                    <p>Vous n'avez actuellement aucun abonnement.</p>
                    <a href="{{ route('subscriptions.index') }}" class="btn btn-primary">Choisir un Abonnement</a>
                @endif

                <h4 class="mt-4">Permissions :</h4>
                <ul>
                    @foreach(Auth::user()->getAllPermissions()->pluck('name') as $permission)
                        <li>{{ $permission }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

@endsection
