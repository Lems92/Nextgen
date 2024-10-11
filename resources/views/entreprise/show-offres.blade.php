@extends('dashboard-layout')

@section('title', $offre->titre_poste)

@section('content')

    @include('header.dashboard-header')

    @php
        use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
        $user->load('userable');
    @endphp

        <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h2>Détails offres</h2>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="card mb-5" style="height: auto;">
                    <div class="card-body pt-4" style="height: auto;">
                        <div class="d-flex gap-3 justify-content-end align-items-center mb-3">
                            <div>
                                <span class="badge bg-success">Active</span>
                            </div>
                            <button class="btn btn-warning">Modifier</button>
                            <button class="btn btn-danger">Supprimer</button>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-3 ms-3">A propos de l'offre</h4>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h5>Titre du poste</h5>
                                        <p class="h6 mt-2">{{ $offre->titre_poste }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Type de contrat</h5>
                                        <p class="h6 mt-2">{{ $offre->type_contrat }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Durée du contrat</h5>
                                        <p class="h6 mt-2">{{ $offre->duree_contrat }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Lieu du poste</h5>
                                        <p class="h6 mt-2">{{ $offre->lieu_poste }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Date du début</h5>
                                        <p class="h6 mt-2">{{ $offre->date_debut->format('j F Y') }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Description du poste</h5>
                                        <p class="h6 mt-2">{{ $offre->description_poste }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Compétences techniques requis</h5>
                                        <div class="h6 mt-2">
                                            <ul class="list-group">
                                                @forelse($offre->competences_techniques_formated as $comp)
                                                    <li class="list-group-item">{{$comp}}</li>
                                                @empty
                                                    <li class="list-group-item">Pas de compétence technique requis</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Compétences transversales requis</h5>
                                        <div class="h6 mt-2">
                                            <ul class="list-group">
                                                @forelse($offre->competences_transversales_formated as $comp)
                                                    <li class="list-group-item">{{$comp}}</li>
                                                @empty
                                                    <li class="list-group-item">Pas de compétence transversale requis
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Langues requises</h5>
                                        <div class="h6 mt-2">
                                            <ul class="list-group">
                                                @forelse($offre->langues_requises_formated as $comp)
                                                    <li class="list-group-item">{{$comp}}</li>
                                                @empty
                                                    <li class="list-group-item">Pas de langue requise</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Avantages</h5>
                                        <p class="h6 mt-2">{{ $offre->avantages }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Date limite de candidature</h5>
                                        <p class="h6 mt-2">{{ $offre->date_limite_candidature->format('j F Y') }}</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4 class="mb-3 ms-3">Candidatures</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Copyright -->

    </div><!-- End Page Wrapper -->

@endsection
