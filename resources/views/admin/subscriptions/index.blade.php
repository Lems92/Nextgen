@extends('dashboard-layout')

@section('title', 'NextGen Admin - Abonnements')

@section('content')
    <!-- Header -->
    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">
            <!-- Section: Company Submissions Overview -->
            <section class="admin-section bg-light">
                <div class="container">

                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-center mb-5">
                                <h2>Gestion des Abonnements</h2>
                            </div>
                        </div>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="admin-table table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom entreprise</th>
                                <th>Email du contact</th>
                                <th>Abonnement Actuel</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->userable->nom_entreprise }}</td>
                                    <td>{{ $user->userable->email_contact }}</td>
                                    <td>
                                        @if($user->subscription)
                                            {{ $user->subscription->name }}<br>
                                            <small>Début : {{ $user->subscription_started_at->format('d/m/Y') }}</small>
                                            <br>
                                            <small>Expiration
                                                : {{ $user->subscription_expires_at->format('d/m/Y') }}</small>
                                        @else
                                            Aucun
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Bouton pour ouvrir le modal d'assignation/changement -->
                                        <a href="{{route('admin.subscriptions.assign_get', ['user' => $user->slug])}}" class="btn btn-sm btn-primary">
                                            Assigner/Changer
                                        </a>

                                        <!-- Bouton pour ouvrir le modal de renouvellement si abonnement actif -->
                                        @if($user->hasActiveSubscription())
                                            <a href="{{route('admin.subscriptions.renew_get', ['user' => $user->slug])}}" class="btn btn-sm btn-warning">
                                                Renouveler
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5">Aucun enregistrement trouvé !</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </section>

    <style>

        .admin-wrapper {
            padding: 20px 0;
        }

        .admin-table {
            margin-top: 30px;
        }

        .admin-table .table thead th {
            background-color: #66022b;
            color: white;
            text-align: center;
        }

        .admin-table .table tbody td {
            text-align: center;
            vertical-align: middle;
        }

        .admin-table .btn {
            margin: 0 5px;
        }

        .pricing-plan {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .plan-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .plan-footer {
            text-align: center;
            margin-top: 15px;
        }

        .admin-details h3 {
            margin-top: 20px;
        }

        .admin-details a.btn {
            margin-top: 15px;
        }
    </style>

@endsection
