@extends('dashboard-layout')

@section('title', 'NextGen Admin - ' . $universite->nom_etablissement)

@section('content')
    <!-- Header -->
    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">

            <!-- Section: University Details Overview -->
            <section class="admin-section bg-light">

                <div class="text-center mb-5">
                    <h2>Détails de l'université</h2>
                </div>

                <div class="px-3">
                    <div class="card mb-4 mx-auto" style="height: auto;">
                        <div class="card-body px-5 pt-3 pb-5" style="height: auto;">
                            <div class="col-lg-12 d-flex justify-content-end align-items-center">
                                @if($universite->user->email_verified_at)
                                    <div>
                                        <span class="badge bg-success">Email vérifié</span>
                                    </div>
                                @else
                                    <div>
                                        <span class="badge bg-danger">Email non vérifié</span>
                                    </div>
                                @endif
                                @if($universite->user->is_accepted_by_admin)
                                    <div>
                                        <span class="badge bg-success ms-3">Compte vérifié</span>
                                    </div>
                                @else
                                    <form method="POST" action="{{route('admin.activate_account')}}"
                                          id="activate_account_form">
                                        @csrf
                                        <input type="hidden" name="type" value="universite">
                                        <input type="hidden" name="route" value="{{route('admin.show_universite', ['universite' => $universite->slug])}}">
                                        <input type="hidden" name="id" value="{{$universite->user->id}}">
                                    </form>
                                    <button onclick="activateAccount()" class="btn btn-warning ms-3">Accepter l'inscription</button>
                                @endif
                            </div>

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
