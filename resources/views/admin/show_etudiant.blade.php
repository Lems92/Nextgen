@extends('dashboard-layout')

@section('title', 'NextGen Admin - ' . $etudiant->prenom . ' ' . $etudiant->nom)

@section('content')
    <!-- Header -->
    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">

            <!-- Section: University Details Overview -->
            <section class="admin-section bg-light">

                <div class="text-center mb-5">
                    <h2>Détails de l'étudiant</h2>
                </div>

                <div class="px-3">
                    <div class="card mb-4 mx-auto" style="height: auto;">
                        <div class="card-body px-5 pt-3 pb-5" style="height: auto;">
                            <div class="col-lg-12 d-flex justify-content-end align-items-center">
                                @if($etudiant->user->email_verified_at)
                                    <div>
                                        <span class="badge bg-success">Email vérifié</span>
                                    </div>
                                @else
                                    <div>
                                        <span class="badge bg-danger">Email non vérifié</span>
                                    </div>
                                @endif
                                @if($etudiant->user->is_accepted_by_admin)
                                    <div>
                                        <span class="badge bg-success ms-3">Compte vérifié</span>
                                    </div>
                                @else
                                    <div>
                                        <span class="badge bg-warning ms-3">En attente de validation</span>
                                    </div>
                                @endif
                            </div>

                            <h4 class="mb-3">Informations personnelles</h4>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <strong>Nom complet :</strong>
                                    <p>{{ $etudiant->prenom . ' ' .$etudiant->nom }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Genre :</strong>
                                    <p>{{$etudiant->genre}}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Date de naissance :</strong>
                                    <p>{{ $etudiant->date_naissance }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Origine ethnique :</strong>
                                    <p>{{ $etudiant->origine_ethnique }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Statut socio-économique :</strong>
                                    <p>{{ $etudiant->statut_socio_economique }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Religion :</strong>
                                    <p>{{ $etudiant->religion_belief }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Orientation sexuelle :</strong>
                                    <p>{{ $etudiant->orientation_sexuelle }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Nom école / université :</strong>
                                    <p>{{$etudiant->nom_ecole_universite}}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Niveau études et année d'obtention :</strong>
                                    <p>{{ $etudiant->niveau_etudes . ' ' . $etudiant->annee_obtention_diplome }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Domaines d' études :</strong>
                                    <p>{{ $etudiant->domaine_etudes }}</p>
                                </div>
                            </div>

                            <hr>

                            <h4 class="mb-3">Contact</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Nom de téléphone :</strong>
                                    <p>{{ $etudiant->numero_telephone }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Adresse :</strong>
                                    <p>{{ $etudiant->adresse_postale }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Email :</strong>
                                    <p>{{ $etudiant->user->email }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Pays - Region - Ville - Code postal :</strong>
                                    <p>{{ $etudiant->pays . ' - ' . $etudiant->region . ' - ' . $etudiant->ville . ' - ' . $etudiant->code_postal }}</p>
                                </div>
                            </div>

                            <hr>

                            <h4 class="mb-3">Compétences</h4>
                            <div class="row">

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences techniques</h5>
                                    <ul>
                                        @foreach($etudiant->competences_techniques as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences en recherche et analyse</h5>
                                    <ul>
                                        @foreach($etudiant->competences_en_recherche_et_analyse as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences en communication</h5>
                                    <ul>
                                        @foreach($etudiant->competences_en_communication as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences interpersonnelles</h5>
                                    <ul>
                                        @foreach($etudiant->competences_interpersonnelles as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences en resolution de problème</h5>
                                    <ul>
                                        @foreach($etudiant->competences_resolution_problemes as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences adaptabilité</h5>
                                    <ul>
                                        @foreach($etudiant->competences_adaptabilite as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences gestion de stress</h5>
                                    <ul>
                                        @foreach($etudiant->competences_gestion_stress as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences leadership</h5>
                                    <ul>
                                        @foreach($etudiant->competences_leadership as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences éthique et responsabilité</h5>
                                    <ul>
                                        @foreach($etudiant->competences_ethique_responsabilite as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences en gestion financières</h5>
                                    <ul>
                                        @foreach($etudiant->competences_gestion_financiere as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <hr>

                            <div class="row">

                                <div class="col-md-6">
                                    <h5 class="mb-3">Compétences linguistiques</h5>
                                    <ul>
                                        @foreach($etudiant->competences_langues as $value)
                                            <li>{{ $value }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
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

    <script>
        function activateAccount() {
            Swal.fire({
                title: "Voulez-vous vraiment accepter l'inscription ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00cb5e",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, accepter"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('activate_account_form').submit();
                }
            });
        }
    </script>
@endsection
