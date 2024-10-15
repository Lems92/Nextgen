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

            <!-- Horizontal Filter Section -->
            <div class="filter-bar mb-4 p-3 bg-light rounded shadow-sm">
                <form class="row g-3">
                    <!-- Job Title / Keywords -->
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="jobTitle" placeholder="Titre du poste ou Mots-clés">
                    </div>

                    <!-- Localisation -->
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="location" placeholder="Localisation">
                    </div>

                    <!-- Type de contrat -->
                    <div class="col-md-2">
                        <select class="form-select" id="contractType">
                            <option value="">Type de contrat</option>
                            <option value="cdi">CDI</option>
                            <option value="cdd">CDD</option>
                            <option value="stage">Stage</option>
                            <option value="freelance">Freelance</option>
                            <option value="part-time">Temps partiel</option>
                            <option value="alternance">Alternance</option>
                        </select>
                    </div>

                    <!-- Experience Level -->
                    <div class="col-md-2">
                        <select class="form-select" id="experienceLevel">
                            <option value="">Expérience</option>
                            <option value="junior">Débutant / Junior</option>
                            <option value="intermediate">Intermédiaire / Confirmé</option>
                            <option value="senior">Senior / Expérimenté</option>
                            <option value="manager">Directeur / Manager</option>
                        </select>
                    </div>

                    <!-- Secteur d'activité -->
                    <div class="col-md-2">
                        <select class="form-select" id="sector">
                            <option value="">Secteur d'activité</option>
                            <option value="it">Technologies de l'information</option>
                            <option value="marketing">Marketing</option>
                            <option value="finance">Finance</option>
                            <option value="sante">Santé</option>
                            <option value="education">Éducation</option>
                            <option value="industrie">Industrie</option>
                            <option value="commerce">Commerce</option>
                        </select>
                    </div>

                    <!-- Salaire -->
                    <div class="col-md-2">
                        <input type="number" class="form-control" id="salary" placeholder="Salaire (Ex: 40000)">
                    </div>

                    <!-- Date de publication -->
                    <div class="col-md-2">
                        <select class="form-select" id="publicationDate">
                            <option value="">Date de publication</option>
                            <option value="today">Aujourd'hui</option>
                            <option value="week">Dernière semaine</option>
                            <option value="month">Dernier mois</option>
                        </select>
                    </div>

                    <!-- Niveau d'études -->
                    <div class="col-md-2">
                        <select class="form-select" id="educationLevel">
                            <option value="">Niveau d'études</option>
                            <option value="bac">BAC</option>
                            <option value="bac+2">BAC+2</option>
                            <option value="bac+3">BAC+3</option>
                            <option value="bac+5">BAC+5</option>
                            <option value="doctorat">Doctorat</option>
                        </select>
                    </div>

                    <!-- Apply Filters Button -->
                    <div class="col-md-2 d-grid">
                        <button class="btn btn-primary">Appliquer</button>
                    </div>
                </form>
            </div>

            <!-- Job Offers Section -->
            <div class="row">
                <div class="col-lg-12">
                    @forelse($offers as $offre)
                        <div class="job-block mb-4 p-3 bg-white rounded shadow-sm">
                            <div class="inner-box">
                                <div class="content">
                                    <span class="company-logo">
                                        <img src="{{ asset('images/resource/company-logo/' . $offre->logo) }}" alt="">
                                    </span>
                                    <h4>
                                        <a href="{{ route('etudiants.offers.show', ['offre' => $offre->slug]) }}">{{ $offre->titre_poste }}</a>
                                    </h4>
                                    <ul class="job-info">
                                        <li><span class="icon flaticon-briefcase"></span> {{ $offre->type_contrat }}</li>
                                        <li><span class="icon flaticon-map-locator"></span> {{ $offre->lieu_poste }}</li>
                                        <li><span class="icon flaticon-clock-3"></span> Posté le {{ $offre->date_debut->format('d M Y') }}</li>
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
            </div>
        </div>
    </section>

@endsection
