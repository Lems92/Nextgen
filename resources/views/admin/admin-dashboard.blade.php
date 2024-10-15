@extends('dashboard-layout')

@section('title', 'NextGen Admin - Tableau de bord')

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
                                <h2>Nouvelles entreprises inscrites</h2>
                            </div>
                        </div>
                    </div>

                    <div class="admin-table table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom de l'Entreprise</th>
                                <th>Secteur d'Activité</th>
                                <th>Adresse</th>
                                <th>Contact Principal</th>
                                <th>Email de Contact</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($entreprises as $entreprise)
                                <tr>
                                    <td>{{$entreprise->nom_entreprise}}</td>
                                    <td>{{$entreprise->secteur_activite}}</td>
                                    <td>{{$entreprise->adresse}}</td>
                                    <td>{{$entreprise->nom_contact}}</td>
                                    <td>{{$entreprise->email_contact}}</td>
                                    <td>
                                        @if($entreprise->user->is_accepted_by_admin)
                                            <span class="badge bg-success">Accepté</span>
                                        @else
                                            <span class="badge bg-warning">A vérifier</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{route('admin.show_entreprise', ['entreprise' => $entreprise->slug])}}" class="btn btn-secondary">Voir</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Aucun enregistrement trouvé !</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>


            <!-- Section: Pricing Management -->
            <section class="admin-section bg-light mt-5">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2>Gestion des Offres</h2>
                    </div>

                    <div class="row">
                        @forelse($type_abonnements as $type)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="pricing-plan">
                                    <div class="plan-header">
                                        <h4>{{$type->name}}</h4>
                                        <p>Prix: {{$type->price}} Ar / mois</p>
                                    </div>
                                    <div class="plan-features">
                                        <ul>
                                            <li>10 annonces de job</li>
                                            <li>3 offres vedettes</li>
                                            <li>Annonce affichée pendant 30 jours</li>
                                            <li>Support Premium</li>
                                        </ul>
                                    </div>
                                    <div class="plan-footer">
                                        <a href="{{route('admin.type_subscriptions')}}" class="btn btn-warning">Gérér</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h5>Aucun enregistrement trouvé !</h5>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
