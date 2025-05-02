@extends('dashboard-layout')

@section('title', 'Profil')

@section('content')

    @include('header.dashboard-header')
    <!-- End User Sidebar -->

    <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-box">
                <div class="auto-container">
                    <!-- Candidate block Six -->
                    <div class="candidate-block-six">
                        <div class="inner-box">
                            <figure class="image">
                                <img src="{{ $etudiant->profile_picture ? asset('storage/' . $etudiant->profile_picture) : asset('storage/images/default_avatar.png') }}" alt="Photo de profil">
                            </figure>
                            <h4 class="name">
                                <a href="#">{{$etudiant->prenom ?? ''}} {{$etudiant->nom ?? ''}}</a>
                                @if(!empty($etudiant->universite))
                                    <span class="badge badge-success" style="background-color: #28a745; color: white; padding: 5px 10px; border-radius: 5px; font-size: 12px;">
                                        Vérifié
                                    </span>
                                @endif
                            </div>
                            <span class="designation">{{$etudiant->domaine_etudes ?? ''}}</span>
                            <div class="content">
                                <!--<ul class="post-tags">
                                    <li><a href="#">App</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Digital</a></li>
                                </ul>-->

                                <ul class="candidate-info">
                                    <li><span class="icon flaticon-map-locator"></span> {{$etudiant->adresse_postale ?? ''}}
                                    </li>
                                    <li>{{$etudiant->pays ?? ''}} - {{$etudiant->region ?? ''}} - {{$etudiant->ville ?? ''}} - {{$etudiant->code_postal ?? ''}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="candidate-detail-outer">
                <div class="auto-container">
                    <div class="row">
                        <div class="content-column col-lg-8 col-md-12 col-sm-12 order-2">
                            <div class="job-detail">
                                <h4>A propos du candidat</h4>

                                <p>{!! nl2br(e($etudiant->description ?? 'Aucun information à afficher')) !!}</p>

                                <!-- Resume / Education -->
                                <div class="resume-outer">
                                    <div class="upper-title">
                                        <h4>Education</h4>
                                    </div>
                                    <!-- Resume BLock -->
                                    <div class="resume-block">
                                        <div class="inner">
                                            <div class="title-box">
                                                <div class="info-box">
                                                    <h3>{{$etudiant->domaine_etudes ?? ''}}</h3>
                                                    <span>{{$etudiant->univ ?? ''}}</span>
                                                </div>
                                                <div class="edit-box">
                                                    <span class="year">{{$etudiant->annee_obtention_diplome ?? ''}}</span>
                                                </div>
                                            </div>
                                            <div class="text">Diplome de {{$etudiant->niveau_etudes ?? ''}}</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Experiences professionnelles -->
                                <h4 class="widget-title">Expériences professionnelles</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @if(!empty($etudiant->experience_professionnelle))
                                            @foreach(explode("\n", $etudiant->experience_professionnelle) as $exp_pro)
                                                <li>{{ $exp_pro }}</li>
                                            @endforeach
                                        @else
                                            <li>Aucune expérience professionnelle disponible</li>
                                        @endif
                                    </ul>
                                </div>

                                <!-- Experiences académiques -->
                                <h4 class="widget-title mt-3">Expériences académiques</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @if(!empty($etudiant->experiences_academique))
                                            @foreach(explode("\n", $etudiant->experiences_academique) as $exp_aca)
                                                <li>{{ $exp_aca }}</li>
                                            @endforeach
                                        @else
                                            <li>Aucune expérience académique disponible</li>
                                        @endif
                                    </ul>
                                </div> 
                                
                                <h4 class="widget-title">Compétences techniques</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @if(!empty($etudiant->competences_techniques) && is_array(json_decode($etudiant->competences_techniques, true)))
                                            @foreach(json_decode($etudiant->competences_techniques, true) as $comp)
                                                <li>{!! nl2br(e($comp)) !!}</li>
                                            @endforeach
                                        @else
                                            <li>Aucune compétence technique disponible</li>
                                        @endif
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences en recherche et analyse</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @if(!empty($etudiant->competences_en_recherche_et_analyse) && is_array(json_decode($etudiant->competences_en_recherche_et_analyse, true)))
                                            @foreach(json_decode($etudiant->competences_en_recherche_et_analyse, true) as $comp)
                                                <li>{!! nl2br(e($comp)) !!}</li>
                                            @endforeach
                                        @else
                                            <li>Aucune compétence en recherche et analyse disponible</li>
                                        @endif
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences en communication</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @if(!empty($etudiant->competences_en_communication) && is_array(json_decode($etudiant->competences_en_communication, true)))
                                            @foreach(json_decode($etudiant->competences_en_communication, true) as $comp)
                                                <li>{!! nl2br(e($comp)) !!}</li>
                                            @endforeach
                                        @else
                                            <li>Aucune compétence en communication disponible</li>
                                        @endif
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Centres d'intérêts</h4>
                                <p>
                                    @if(!empty($etudiant->centres_interet))
                                        {!! nl2br(e($etudiant->centres_interet)) !!}
                                    @else
                                        Aucun centre d'intérêt spécifié.
                                    @endif
                                </p>

                                
                                <h4 class="widget-title mt-3">Lien portfolio</h4>
                                <p>{{$etudiant->portfolio ?? ''}}</p>

                                <h4 class="widget-title mt-3">Documents</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @if($etudiant->document_diplome)
                                            <li>
                                                <a href="{{ asset('storage/' . $etudiant->document_diplome) }}" target="_blank" style="color: rgba(82, 7, 19, 0.877);">Télécharger le diplôme</a>
                                            </li>
                                        @else
                                            <li>Aucun document de diplôme disponible</li>
                                        @endif

                                        @if($etudiant->document_recommandation)
                                            <li>
                                                <a href="{{ asset('storage/' . $etudiant->document_recommandation) }}" target="_blank" style="color: rgba(82, 7, 19, 0.877);">Télécharger la lettre de recommandation</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Secteurs d'activités préférés</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @php
                                            $secteurs = is_array($etudiant->secteur_activite_preferer) 
                                                        ? $etudiant->secteur_activite_preferer 
                                                        : json_decode($etudiant->secteur_activite_preferer, true);
                                        @endphp

                                        @if(!empty($secteurs) && is_array($secteurs))
                                            @foreach($secteurs as $secteur)
                                                <li><a href="#">{{ $secteur }}</a></li>
                                            @endforeach
                                        @else
                                            <li>Aucun secteur d'activité préféré spécifié</li>
                                        @endif
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Type d'emploi recherché</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @if(!empty($etudiant->type_emploi_recherche) && is_array(json_decode($etudiant->type_emploi_recherche, true)))
                                            @foreach(json_decode($etudiant->type_emploi_recherche, true) as $emploi)
                                                <li><a href="#">{{ $emploi }}</a></li>
                                            @endforeach
                                        @else
                                            <li>Aucun type d'emploi recherché spécifié</li>
                                        @endif
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Type d'emploi recherché</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @php
                                            $type_emploi_recherche = is_array($etudiant->type_emploi_recherche) 
                                                ? $etudiant->type_emploi_recherche
                                                : json_decode($etudiant->type_emploi_recherche, true);
                                        @endphp

                                        @if(!empty($type_emploi_recherche) && is_array($type_emploi_recherche))
                                            @foreach($type_emploi_recherche as $type)
                                                <li><a href="#">{{ $type }}</a></li>
                                            @endforeach
                                        @else
                                            <li>Aucun type d'emploi recherché spécifié</li>
                                        @endif
                                    </ul> 
                                                    
                                </div>

                                <h4 class="widget-title mt-3">Localisation préférée</h4>
                                <p>
                                    @if(!empty($etudiant->localisation_geographique_preferee))
                                        {{ $etudiant->localisation_geographique_preferee }}
                                    @else
                                        Aucune localisation préférée spécifiée.
                                    @endif
                                </p>

                                <h4 class="widget-title mt-3">Durée de disponibilité</h4>
                                <p>
                                    @if(!empty($etudiant->duree_disponibilite))
                                        {{ $etudiant->duree_disponibilite }}
                                    @else
                                        Aucune durée de disponibilité spécifiée.
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                            <aside class="sidebar">
                                <div class="sidebar-widget">
                                    <div class="widget-content">
                                        <ul class="job-overview">
                                            <!--<li>
                                                <i class="icon icon-calendar"></i>
                                                <h5>Experience:</h5>
                                                <span>0-2 ans</span>
                                            </li>-->

                                            <li>
                                                <i class="icon icon-expiry"></i>
                                                <h5>Date de naissance:</h5>
                                                <span>{{$etudiant->date_naissance}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-user-2"></i>
                                                <h5>Genre :</h5>
                                                <span>{{$etudiant->genre ?? ''}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-language"></i>
                                                <h5>Langages :</h5>
                                                <span>
                                                    @if(!empty($etudiant->competences_langues) && is_array(json_decode($etudiant->competences_langues, true)))
                                                        @foreach(json_decode($etudiant->competences_langues, true) as $lang)
                                                            {{ $lang }},
                                                        @endforeach
                                                    @else
                                                        Aucune langue spécifiée.
                                                    @endif
                                                </span>
                                            </li>

                                            <li>
                                                <i class="icon icon-degree"></i>
                                                <h5>Université :</h5>
                                                <span>
                                                @if($etudiant->univ)
                                                    {{ $etudiant->univ}}
                                                @else
                                                    Aucune université associée.
                                                @endif</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-degree"></i>
                                                <h5>Niveaux d'études :</h5>
                                                <span>{{$etudiant->niveau_etudes ?? ''}}</span>
                                            </li>

                                        </ul>
                                        <h4>Contact</h4>
                                        <ul>
                                            <li>Email: {{$etudiant->user->email ?? ''}}</li>
                                            <li>Téléphone : {{$etudiant->numero_telephone ?? ''}}</li>
                                        </ul>
                                    </div>

                                </div>

                                <!--<div class="sidebar-widget social-media-widget">
                                    <h4 class="widget-title">Social media</h4>
                                    <div class="widget-content">
                                        <div class="social-links">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>-->
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
    .resume-block .title-box {
    position: relative;
    display: flex
;
    align-items: flex-start;
    margin-bottom: 0px;
}
.language-list span {
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 5px;
        padding: 5px 10px;
        background-color:rgb(255, 255, 255);
        border-radius: 5px;
        font-size: 14px;
        color: #333;
    }
</style>

@endsection
