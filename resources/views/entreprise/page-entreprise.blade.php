@extends('dashboard-layout')

@section('title', 'NextGen - Page-entreprise')

@section('content')

    @include('header.dashboard-header')

    <section class="job-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="auto-container">
                <!-- Job Block -->
                <div class="job-block-seven style-three">
                    <div class="inner-box">
                        <div class="content">
                            <span class="company-logo"><img src="images/resource/company-logo/5-1.png" alt=""></span>
                            <h4>Invision</h4>
                            <ul class="job-other-info">
                                <li class="time">Offres disponible – {{count($entreprise->offres)}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12 order-2">
                        <div class="job-detail">
                            <h4>Apropos de l'entreprise</h4>
                            <h6 class="mt-3">Description</h6>
                            <p>{{$entreprise->description ?? 'Aucun description'}}</p>
                            <h6 class="mt-3">Date création</h6>
                            <p>{{$entreprise->date_creation->format('j F Y') ?? 'Aucun description'}}</p>

                            <h4 class="widget-title mt-3">Opportunités</h4>
                            <div class="widget-content">
                                <ul class="job-skills">
                                    @foreach($entreprise->opportunities as $comp)
                                        <li><a href="#">{{$comp}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <h4 class="widget-title mt-3">Domaines d'activités</h4>
                            <div class="widget-content">
                                <ul class="job-skills">
                                    @foreach($entreprise->domaines_activites as $comp)
                                        <li><a href="#">{{$comp}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <h4 class="widget-title mt-3">Inclusion et diversité</h4>
                            <div class="widget-content">
                                <ul class="job-skills">
                                    @foreach($entreprise->inclusion_diversity as $comp)
                                        <li><a href="#">{{$comp}}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            <h4 class="widget-title mt-3">Support de formation</h4>
                            <div class="widget-content">
                                <ul class="job-skills">
                                    @foreach($entreprise->training_support as $comp)
                                        <li><a href="#">{{$comp}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Related Jobs -->
                        <div class="related-jobs">
                            <div class="title-box">
                                <h3>{{count($entreprise->offres)}} postes sur l'entreprise</h3>
                            </div>

                            @forelse($entreprise->offres as $offre)
                                <div class="job-block">
                                    <div class="inner-box">
                                        <div class="content" style="padding-left: 0;">
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
                                <p>Aucun offre à afficher</p>
                            @endforelse
                        </div>
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar pd-right">

                            <div class="sidebar-widget company-widget">
                                <div class="widget-content">
                                    <ul class="company-info mt-0">
                                        <li>Secteur d'activité: <span>{{$entreprise->secteur_activite ?? ''}}</span>
                                        </li>
                                        <li>Crée en: <span>{{$entreprise->date_creation->format('j F Y') ?? ''}}</span>
                                        </li>
                                        <li>Tel.: <span>{{$entreprise->telephone_contact ?? ''}}</span></li>
                                        <li>Email: <span>{{$entreprise->email_contact ?? ''}}</span></li>
                                        <li>Emplacement: <span>{{$entreprise->adresse ?? ''}}</span></li>
                                    </ul>

                                    <div class="btn-box"><a href="#"
                                                            class="theme-btn btn-style-three">{{$entreprise->site_web ?? ''}}</a>
                                    </div>
                                </div>
                            </div>

                            <div class="sidebar-widget contact-widget">

                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
