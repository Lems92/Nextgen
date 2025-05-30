@extends('dashboard-layout')

@section('title', 'NextGen - Offres')

@section('content')

    @include('header.dashboard-header')


    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3>Liste des offres publiées</h3>
                        <div class="text">Gérer vos offres ?</div>
                    </div>
                    <div>
                        @php
                            $user = auth()->user();
                            $entreprise = $user->userable;
                            $offresCount = $entreprise->offres()->count();
                            $subscription = $user->subscription;
                            $maxOffres = match($subscription->name) {
                                'Standard' => 2,
                                'Premium' => 5,
                                'Gold' => PHP_INT_MAX,
                                default => 0,
                            };
                            $canPublish = $offresCount < $maxOffres;
                        @endphp

                        @if($canPublish)
                            <a href="{{route('entreprise.offres.create')}}" class="btn btn-primary"><i class="la la-plus"></i> Publier annonce</a>
                        @else
                            <button class="btn btn-secondary" disabled title="Limite d'annonces atteinte">
                                <i class="la la-plus"></i> Limite atteinte
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if(!$canPublish)
                    <div class="alert alert-warning">
                        <strong>Limite d'annonces atteinte !</strong>
                        <p>
                            Vous avez atteint la limite de {{ $maxOffres }} annonce(s) avec votre abonnement {{ $subscription->name }}.
                            @if($subscription->name !== 'Gold')
                                Pour publier plus d'annonces, veuillez passer à un abonnement supérieur.
                            @endif
                        </p>
                    </div>
                @endif

                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <!--<h4>My Job Listings</h4>

                            <div class="chosen-outer">
                                Tabs Box
                                <select class="chosen-select">
                                    <option>Last 6 Months</option>
                                    <option>Last 12 Months</option>
                                    <option>Last 16 Months</option>
                                    <option>Last 24 Months</option>
                                    <option>Last 5 year</option>
                                </select>
                            </div>
                            -->
                        </div>

                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                    <tr>
                                        <th>Titre du poste</th>
                                        <th>Candidatures</th>
                                        <th>Date de publication</th>
                                        <th>Date limite</th>
                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($offres as $offre)
                                        <tr>
                                            <td>
                                                <h6>{{$offre->titre_poste}}</h6>
                                                <span class="info"><i class="icon flaticon-map-locator"></i> {{$offre->lieu_poste}}</span>
                                            </td>
                                            <td class="applied"><a href="#">{{count($offre->etudiants)}} candidature(s)</a></td>
                                            <td>{{ $offre->created_at->format('j F Y') }}</td>
                                            <td>{{ $offre->date_limite_candidature->format('j F Y')}}</td>
                                            <td class="status">Active</td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li>
                                                            <a href="{{route('entreprise.offres.show', ['offre' => $offre->slug])}}" data-text="Voir l'offre"><span
                                                                    class="la la-eye"></span></a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('entreprise.offres.edit', ['offre' => $offre->slug])}}" data-text="Modifier l'offre"><span
                                                                    class="la la-pencil"></span></a>
                                                        </li>
                                                        <li style="display: none;">
                                                            <form method="post" id="delete_offre_form{{$offre->id}}" action="{{route('entreprise.offres.delete', ['offre' => $offre->slug])}}">
                                                                @csrf
                                                            </form>
                                                        </li>
                                                        <li>
                                                            <button type="button" class="btn btn-link p-0 m-0" onclick="deleteOffre('delete_offre_form{{$offre->id}}')" title="Supprimer l'offre" data-text="Supprimer l'offre">
                                                                <span class="la la-trash"></span>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-start">Aucun enregistrement trouvé !</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Copyright -->

    </div><!-- End Page Wrapper -->


    <script>
        function deleteOffre(form_id) {
            Swal.fire({
                title: "Voulez vous vraiment supprimer cet élément?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#ff2443",
                cancelButtonColor: "#3d3d3d",
                confirmButtonText: "Oui, supprimer"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(form_id).submit();
                }
            });
        }
    </script>
    <style>
        .btn-primary {
            color: #fff;
            background-color: #66022b;
            border-color: #000000;
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
            cursor: not-allowed;
        }

        .alert {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 4px;
        }

        .alert-warning {
            background-color: #fff3cd;
            border-color: #ffeeba;
            color: #856404;
        }

        .alert-warning strong {
            color: #533f03;
        }

        /* Ensure the entire section fills the screen */
        .user-dashboard {
            min-height: 100vh; /* Ensure the section fills the screen height */
            display: flex;
            flex-direction: column;
        }

        .dashboard-outer {
            flex: 1; /* Allow the dashboard to take up remaining space */
            display: flex;
            flex-direction: column;
        }

        .row {
            flex: 1;
        }

        .ls-widget {
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .tabs-box {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .widget-content {
            flex: 1;
            overflow: auto; /* Ensure content is scrollable if it overflows */
        }

        .table-outer {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .default-table {
            flex: 1;
            width: 100%;
            table-layout: fixed;
            margin-bottom: 0;
        }

        .default-table th,
        .default-table td {
            padding: 10px;
            text-align: left;
            vertical-align: middle;
            border-top: 1px solid #ddd;
            word-wrap: break-word; /* Prevent content from overflowing cells */
        }

    </style>
@endsection
