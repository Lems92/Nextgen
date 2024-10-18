@extends('dashboard-layout')

@section('title', 'NextGen - Demande affiliation étudiants')

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
                <h3>Demande affiliation des étudiants</h3>
                <div class="text">Liste des étudiants qui demande affiliation</div>
            </div>

            <!-- Ls widget -->
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Liste des demandes des étudiants</h4>
                    </div>

                    <div class="widget-content">
                        <div class="table-outer">
                            <table class="default-table manage-event-table">
                                <thead>
                                <tr>
                                    <th>Nom complet</th>
                                    <th>Matricule</th>
                                    <th>Téléphone</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($demandes as $demande)
                                    <tr>
                                        <td><h6>{{$demande->etudiant->prenom . ' ' . $demande->etudiant->nom}}</h6></td>
                                        <td>{{$demande->matricule}}</td>
                                        <td>{{$demande->etudiant->numero_telephone}}</td>
                                        <td>
                                            <div class="option-box">
                                                <ul class="option-list">
                                                    <li>
                                                        <a href="{{route('universite.show_demande_affiliation', ['demande' => $demande->slug])}}" data-text="View Event"><span class="la la-eye"></span>
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
