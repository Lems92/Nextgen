@extends('dashboard-layout')

@section('title', 'NextGen - Gérer les étudiants')

@section('content')

    @include('header.dashboard-header')

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span>{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="upper-title-box">
                <h3>Gerer les étudiants</h3>
                <div class="text">Liste des étudiants affiliés à votre établissement</div>
            </div>

            <div class="d-flex justify-content-end mb-3">
                <a href="{{route('universite.list_demande_affiliation_etudiant')}}" class="btn btn-secondary"><span class="badge bg-danger">{{$demande_count}}</span> Demande d'affiliation</a>
            </div>

            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Mes étudiants</h4>
                    </div>

                    <div class="widget-content">
                        <div class="table-outer">
                            <table class="default-table manage-event-table">
                                <thead>
                                <tr>
                                    <th>Nom complet</th>
                                    <th>Niveau d'etudes</th>
                                    <th>Date obtention diplome</th>
                                    <th>Téléphone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($etudiants_univ as $etudiant_univ)
                                    <tr>
                                        <td><h6>{{$etudiant_univ->etudiant->prenom . ' ' . $etudiant_univ->etudiant->nom}}</h6></td>
                                        <td>{{$etudiant_univ->etudiant->niveau_etudes}}</td>
                                        <td>{{$etudiant_univ->etudiant->annee_obtention_diplome}}</td>
                                        <td>{{$etudiant_univ->etudiant->numero_telephone}}</td>
                                        <td>
                                            <div class="option-box">
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="{{route('etudiants.portfolio', ["etudiant" => $etudiant_univ->etudiant->slug])}}" data-text="Voir étudiant"><span class="la la-eye"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
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
                </div>
            </div>
        </div>
    </section>

@endsection
