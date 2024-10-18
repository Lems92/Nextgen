@extends('dashboard-layout')

@section('title', 'NextGen - Mon abonnement')

@section('content')


    @php

        function reformat_permission_name(string $string): string {
            $string = str_replace('_', ' ', $string);
            $string[0] = strtoupper($string[0]);
            return $string;
        }

    @endphp

    @include('header.dashboard-header')

    <style>
        .user-dashboard {
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .dashboard-outer {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        .upper-title-box {
            border-bottom: 2px solid #ccc;
            margin-bottom: 20px;
        }

        h3, h4 {
            color: #333;
        }

        .text {
            color: #666;
        }

        .badge {
            padding: 5px 10px;
            font-size: 0.9em;
            border-radius: 5px;
        }

        .badge.bg-success {
            background-color: #28a745;
        }

        .badge.bg-danger {
            background-color: #dc3545;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            font-size: 0.9em;
            border-radius: 5px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            min-height: 150px;
            max-height: 250px;
            flex: 1;
            margin-right: 10px;
            height: auto;

        }

        .card h4 {
            margin-bottom: 10px;
        }

        .contact-admin {
            padding: 20px;
            border-radius: 10px;
            margin-top: 40px;
            text-align: center;
        }

        .contact-admin h4 {
            color: #333;
        }

        .contact-admin p {
            color: #555;
        }

        .contact-admin .btn {
            margin-top: 15px;
            padding: 10px 15px;
            font-size: 0.9em;
        }

        .card-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }


        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
            }
            .card {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>

    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Mon abonnement</h3>
                <div class="text">Veuillez choisir l'offre qui vous convient</div>
            </div>


            <div class="card-container">

                <div class="card" style="height: auto; padding-bottom: 10px;">
                    <h4 class="mb-3">État de l'abonnement</h4>
                    @if(Auth::user()->subscription)
                        <p><strong>Type :</strong> {{ Auth::user()->subscription->name }}</p>
                        <p><strong>Date de Début :</strong> {{ Auth::user()->subscription_started_at->format('j F Y') }}</p>
                        <p><strong>Date d'Expiration :</strong> {{ Auth::user()->subscription_expires_at->format('j F Y') }}</p>
                        <p><strong>Status :</strong>
                            @if(Auth::user()->hasActiveSubscription())
                                <span class="badge bg-success">Actif</span>
                            @else
                                <span class="badge bg-danger">Expiré</span>
                            @endif
                        </p>

                        @if(Auth::user()->hasActiveSubscription())
                            <p>Votre abonnement est actif. Pour renouveler, veuillez contacter un administrateur.</p>
                        @else
                            <a href="{{ route('subscriptions.index') }}" class="btn btn-primary">Choisir un Abonnement</a>
                        @endif
                    @else
                        <p>Vous n'avez actuellement aucun abonnement.</p>
                    @endif
                </div>

                <div class="card" style="height: auto; padding-bottom: 10px;">
                    <h4 class="mb-3">Permissions</h4>
                    <ul class="">
                        @forelse(Auth::user()->getAllPermissions()->pluck('name') as $permission)
                            <li>{{ reformat_permission_name($permission) }}</li>
                        @empty
                            <li>Pas de permissions à afficher</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="contact-admin">
                <h4>Besoin d'aide ?</h4>
                <p>Si vous avez des questions ou avez besoin de renouveler votre abonnement, n'hésitez pas à contacter l'administrateur.</p>
                <a href="mailto:admin@example.com" class="btn btn-secondary">Contacter l'administrateur</a>
            </div>

        </div>
    </section>

@endsection
