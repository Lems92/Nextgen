@extends('dashboard-layout')

@section('title', 'NextGen - Mon université' )

@section('content')
    <!-- Header -->
    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">

            <!-- Section: University Details Overview -->
            <section class="admin-section bg-light">

                <div class="text-center mb-5">
                    <h2>Mon université</h2>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="px-3">
                    <div class="card mb-4 mx-auto" style="height: auto;">
                        <div class="card-body p-5" style="height: auto;">
                            @if($universite)
                                @if($etudiant_univ_id)
                                <form method="POST" action="{{route('etu_univ.delete_affiliation')}}"
                                      id="delete_affiliation_form">
                                    @csrf
                                    <input type="hidden" name="etu_univ_id" value="{{$etudiant_univ_id}}">
                                </form>
                                <div class="d-flex justify-content-end">
                                    <button onclick="supprimer_affiliation_univ()" class="btn btn-danger">Je ne fais plus partie de l'université ?</button>
                                </div>
                                @endif
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <strong>Nom de l'établissement :</strong>
                                    <p>{{ $universite->nom_etablissement }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Site Web :</strong>
                                    <p><a href="{{ $universite->site_web }}" target="_blank">{{ $universite->site_web }}</a></p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Adresse :</strong>
                                    <p>{{ $universite->adresse_etablissement }}</p>
                                </div>
                            </div>

                            <hr>

                            <h4 class="mb-3">Contact</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Nom du contact :</strong>
                                    <p>{{ $universite->nom_contact }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Fonction du contact :</strong>
                                    <p>{{ $universite->fonction_contact }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Email du contact :</strong>
                                    <p>{{ $universite->adresse_email_contact }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Téléphone du contact :</strong>
                                    <p>{{ $universite->numero_telephone_contact }}</p>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-3">Nombre d'étudiants</h4>
                                    <p>{{ $universite->nombre_etudiants }}</p>
                                </div>

                                <div class="col-md-6">
                                    <h4 class="mb-3">Domaines d'études proposés</h4>
                                    <ul>
                                        @foreach($universite->domaines_etudes_proposes as $domaine)
                                            <li>{{ $domaine }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-3">Niveaux d'études proposés</h4>
                                    <ul>
                                        @foreach($universite->niveaux_etudes_proposes as $niveau)
                                            <li>{{ $niveau }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @else
                                <p>Vous n'êtes affiliés à aucun universités, pour effectuer une demande d'affiliation, veuillez cliquer sur le bouton suivant : </p>
                                <a href="{{route('etudiant.demande_affiliation_univ_get')}}" class="btn btn-primary mt-3">Demander affiliation</a>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </section>

    <script>
        function supprimer_affiliation_univ() {
            Swal.fire({
                title: "Etes-vous sûr de supprimer l'affiliation?",
                text: 'L\'action est irreversible',
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#00cb5e",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oui, je suis sûr"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete_affiliation_form').submit();
                }
            });
        }
    </script>

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
