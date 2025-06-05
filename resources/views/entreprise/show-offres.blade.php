@extends('dashboard-layout')

@section('title', 'NextGen - Détails de l\'offre')

@section('content')
    @include('header.dashboard-header')

    <section class="job-detail-section">
        <!-- Upper Box -->
        <div class="upper-box" style="padding-left: 0; padding-right: 0; width: 100vw; margin-left: calc(-50vw + 50%); background: #f8f9fb;">
            <div class="auto-container" style="padding-left: 40px; padding-right: 0; margin: 0; max-width: none; width: 100vw;">
                <!-- Job Block -->
                <div class="job-block-seven style-three" style="margin-left: 0;">
                    <div class="inner-box" style="margin-left: 0;">
                        <div class="content" style="padding: 30px 0;">
                            <h4 style="font-size: 2rem; margin-bottom: 20px;">{{ $offre->titre_poste }}</h4>
                            
                            <div class="company-info" style="display: flex; align-items: center; gap: 20px; margin-bottom: 30px;">
                                <div class="company-logo">
                                    <img src="{{ $offre->entreprise->profile_picture ? asset('storage/' . $offre->entreprise->profile_picture) : asset('images/pdp_entreprise.png') }}" 
                                         alt="Logo de l'entreprise" 
                                         style="width: 80px; height: 80px; object-fit: cover; border-radius: 12px; border: 2px solid #eee; background: #fff;">
                                </div>
                                <div class="company-details">
                                    <h5 style="font-size: 1.5rem; margin-bottom: 10px;">
                                        <a href="{{ route('entreprise.public_show', ['entreprise' => $offre->entreprise->slug]) }}" 
                                           style="color: #66022b; text-decoration: none;">
                                            {{ $offre->entreprise->nom_entreprise }}
                                        </a>
                                    </h5>
                                    <a href="{{ route('entreprise.public_show', ['entreprise' => $offre->entreprise->slug]) }}" 
                                       class="theme-btn btn-style-three" 
                                       style="background-color: #66022b; color: #fff; border: none; padding: 8px 22px; border-radius: 6px; font-size: 0.9rem; font-weight: 500; text-decoration: none; display: inline-block;">
                                        Voir la page de l'entreprise
                                    </a>
                                </div>
                            </div>

                            <ul class="job-info" style="display: flex; gap: 20px; margin-bottom: 20px;">
                                <li><span class="icon flaticon-briefcase"></span> {{ $offre->type_contrat }}</li>
                                <li><span class="icon flaticon-map-locator"></span> {{ $offre->lieu_poste }}</li>
                                <li><span class="icon flaticon-clock-3"></span> {{ $offre->duree_contrat }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job-detail-outer">
            <div class="auto-container">
                <div class="row">
                    <div class="content-column col-lg-8 col-md-12 col-sm-12">
                        <div class="job-detail">
                            <h4>Description du poste</h4>
                            <p>{{ $offre->description_poste }}</p>

                            <h4 class="mt-4">Compétences requises</h4>
                            <div class="widget-content">
                                <h6>Compétences techniques</h6>
                                <ul class="job-skills">
                                    @foreach($offre->competences_techniques as $comp)
                                        <li><a href="#">{{ str_replace('_', ' ', $comp) }}</a></li>
                                    @endforeach
                                </ul>

                                <h6 class="mt-3">Compétences transversales</h6>
                                <ul class="job-skills">
                                    @foreach($offre->competences_transversales as $comp)
                                        <li><a href="#">{{ str_replace('_', ' ', $comp) }}</a></li>
                                    @endforeach
                                </ul>

                                <h6 class="mt-3">Langues requises</h6>
                                <ul class="job-skills">
                                    @foreach($offre->langues_requises as $langue)
                                        <li><a href="#">{{ str_replace('_', ' ', $langue) }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                            @if($offre->avantages)
                                <h4 class="mt-4">Avantages</h4>
                                <p>{{ $offre->avantages }}</p>
                            @endif

                            <div class="mt-4">
                                <p><strong>Date de début :</strong> {{ $offre->date_debut->format('d/m/Y') }}</p>
                                <p><strong>Date limite de candidature :</strong> {{ $offre->date_limite_candidature->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget">
                                <div class="widget-content">
                                    <div class="btn-box">
                                        <a href="#" class="theme-btn btn-style-one" style="background-color: #66022b; color: #fff; border: none; padding: 12px 30px; border-radius: 6px; font-size: 1rem; font-weight: 500; text-decoration: none; display: block; text-align: center;">
                                            Postuler maintenant
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .job-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            list-style: none;
            padding: 0;
        }
        .job-skills li a {
            display: inline-block;
            padding: 8px 16px;
            background: #f8f9fb;
            border-radius: 6px;
            color: #66022b;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }
        .job-skills li a:hover {
            background: #66022b;
            color: #fff;
        }
        .job-info {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 20px;
        }
        .job-info li {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
        }
        .job-info .icon {
            color: #66022b;
        }
    </style>
@endsection
