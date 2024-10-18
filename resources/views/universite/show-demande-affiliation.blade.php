@extends('dashboard-layout')

@section('title', 'NextGen - Voir demande affiliation')

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
                                <form method="POST" action="{{route('universite.accept_demande_affiliation', ['demande' => $demande->slug])}}"
                                      id="accept_demande_form">
                                    @csrf
                                </form>
                                <button onclick="accept_affiliation()" class="btn btn-warning ms-3">Accepter la demande</button>
                                <form method="POST" action="{{route('universite.refuser_demande_affiliation', ['demande' => $demande->slug])}}"
                                      id="refuser_demande_form">
                                    @csrf
                                </form>
                                <button onclick="refuser_affiliation()" class="btn btn-warning ms-3">Refuser la demande</button>
                            </div>

                            <h4 class="mb-3">A propos de la demande</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Matricule :</strong>
                                    <p>{{$demande->matricule}}</p>
                                </div>
                                <div class="col-md-6">
                                    <strong>Document scolaire :</strong>
                                    <p><a href="{{'/storage/' . $demande->document_scolaire}}" target="_blank">Télécharger</a></p>
                                </div>
                            </div>

                            <h4 class="mb-3">Informations personnelles</h4>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <strong>Nom complet :</strong>
                                    <p>{{ $demande->etudiant->prenom . ' ' .$demande->etudiant->nom }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Genre :</strong>
                                    <p>{{$demande->etudiant->genre}}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Date de naissance :</strong>
                                    <p>{{ $demande->etudiant->date_naissance }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Nom école / université :</strong>
                                    <p>{{$demande->etudiant->nom_ecole_universite}}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Niveau études et année d'obtention :</strong>
                                    <p>{{ $demande->etudiant->niveau_etudes . ' ' . $demande->etudiant->annee_obtention_diplome }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Domaines d'études :</strong>
                                    <p>{{ $demande->etudiant->domaine_etudes }}</p>
                                </div>
                            </div>

                            <hr>

                            <h4 class="mb-3">Contact</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Nom de téléphone :</strong>
                                    <p>{{ $demande->etudiant->numero_telephone }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Adresse :</strong>
                                    <p>{{ $demande->etudiant->adresse_postale }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Email :</strong>
                                    <p>{{ $demande->etudiant->user->email }}</p>
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
        function accept_affiliation() {
            Swal.fire({
                title: "Voulez-vous vraiment accepter la demande de l'étudiant ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00cb5e",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, accepter"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('accept_demande_form').submit();
                }
            });
        }

        function refuser_affiliation() {
            Swal.fire({
                title: "Voulez-vous vraiment refuser la demande de l'étudiant ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00cb5e",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, refuser"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('refuser_demande_form').submit();
                }
            });
        }
    </script>
@endsection
