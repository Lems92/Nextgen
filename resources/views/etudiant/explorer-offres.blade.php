@extends('dashboard-layout')

@section('title', 'NextGen - Explorer offre')

@section('content')

    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">

            <div class="upper-title-box">
                <h3>Explorer les offres</h3>
                <div class="text">Explorer et postuler pour l'emploi de vos rêves?</div>
            </div>

            <div class="row">
                <div class="d-flex flex-column-reverse gap-5 flex-sm-row">
                    <div class="col-md-8">
                        @forelse($offers as $offre)
                            <div class="job-block">
                                <div class="inner-box">
                                    <div class="content">
                                <span class="company-logo">
                                    <img src="{{ asset('images/resource/company-logo/' . $offre->logo) }}" alt="">
                                </span>
                                        <h4>
                                            <a href="{{ route('etudiants.offers.show', ['offre' => $offre->slug]) }}">{{ $offre->titre_poste }}</a>
                                        </h4>
                                        <ul class="job-info">
                                            <li><span class="icon flaticon-briefcase"></span> {{ $offre->type_contrat }}
                                            </li>
                                            <li><span class="icon flaticon-map-locator"></span> {{ $offre->lieu_poste }}
                                            </li>
                                            <li><span class="icon flaticon-clock-3"></span> Posté
                                                le {{ $offre->date_debut->format('d M Y') }}</li>
                                            <li><span class="icon flaticon-money"></span>
                                            </li>
                                        </ul>
                                        <ul class="job-other-info">
                                            <li class="time">{{ $offre->duree_contrat }}</li>
                                            <li class="privacy">Disponible</li>
                                            <li class="required">Urgent</li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <h3>Il n'y pas d'offres à afficher</h3>
                        @endforelse
                    </div>
                    <div class="col-md-4">
                        <h5 class="mb-3">Filtre de recherche</h5>
                        <div class="mb-3">
                            <label for="jobTitle" class="form-label">Titre du poste ou Mots-clés</label>
                            <input type="text" class="form-control" id="jobTitle" placeholder="Ex: Développeur Web">
                        </div>
                        <!-- Localisation -->
                        <div class="mb-3">
                            <label for="location" class="form-label">Localisation</label>
                            <input type="text" class="form-control" id="location" placeholder="Ville ou Région">
                        </div>

                        <!-- Type de contrat -->
                        <div class="mb-3">
                            <label for="contractType" class="form-label">Type de contrat</label>
                            <select class="form-select" id="contractType">
                                <option value="">Sélectionner...</option>
                                <option value="cdi">CDI</option>
                                <option value="cdd">CDD</option>
                                <option value="stage">Stage</option>
                                <option value="freelance">Freelance</option>
                                <option value="part-time">Temps partiel</option>
                                <option value="alternance">Alternance</option>
                            </select>
                        </div>

                        <!-- Niveau d'expérience requis -->
                        <div class="mb-3">
                            <label for="experienceLevel" class="form-label">Niveau d'expérience</label>
                            <select class="form-select" id="experienceLevel">
                                <option value="">Sélectionner...</option>
                                <option value="junior">Débutant / Junior</option>
                                <option value="intermediate">Intermédiaire / Confirmé</option>
                                <option value="senior">Senior / Expérimenté</option>
                                <option value="manager">Directeur / Manager</option>
                            </select>
                        </div>

                        <!-- Secteur d'activité -->
                        <div class="mb-3">
                            <label for="sector" class="form-label">Secteur d'activité</label>
                            <select class="form-select" id="sector">
                                <option value="">Sélectionner...</option>
                                <option value="it">Technologies de l'information</option>
                                <option value="marketing">Marketing</option>
                                <option value="finance">Finance</option>
                                <option value="sante">Santé</option>
                                <option value="education">Éducation</option>
                                <option value="industrie">Industrie</option>
                                <option value="commerce">Commerce</option>
                            </select>
                        </div>

                        <!-- Salaire / Rémunération -->
                        <div class="mb-3">
                            <label for="salary" class="form-label">Salaire</label>
                            <input type="number" class="form-control" id="salary" placeholder="Ex: 40000">
                        </div>

                        <!-- Date de publication -->
                        <div class="mb-3">
                            <label for="publicationDate" class="form-label">Date de publication</label>
                            <select class="form-select" id="publicationDate">
                                <option value="">Sélectionner...</option>
                                <option value="today">Aujourd'hui</option>
                                <option value="week">Dernière semaine</option>
                                <option value="month">Dernier mois</option>
                            </select>
                        </div>

                        <!-- Niveau d'études requis -->
                        <div class="mb-3">
                            <label for="educationLevel" class="form-label">Niveau d'études</label>
                            <select class="form-select" id="educationLevel">
                                <option value="">Sélectionner...</option>
                                <option value="bac">BAC</option>
                                <option value="bac+2">BAC+2</option>
                                <option value="bac+3">BAC+3</option>
                                <option value="bac+5">BAC+5</option>
                                <option value="doctorat">Doctorat</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
