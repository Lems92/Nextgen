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
                            <figure class="image"><img src="images/resource/candidate-4.png" alt=""></figure>
                            <h4 class="name"><a href="#">{{$etudiant->prenom}} {{$etudiant->nom}}</a></h4>
                            <span class="designation">{{$etudiant->domaine_etudes}}</span>
                            <div class="content">
                                <ul class="post-tags">
                                    <li><a href="#">App</a></li>
                                    <li><a href="#">Design</a></li>
                                    <li><a href="#">Digital</a></li>
                                </ul>

                                <ul class="candidate-info">
                                    <li><span class="icon flaticon-map-locator"></span> {{$etudiant->adresse_postale}}
                                    </li>
                                    <li>{{$etudiant->pays}} - {{$etudiant->region}} - {{$etudiant->ville}} - {{$etudiant->code_postal}}</li>
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
                                <h4>Candidates About</h4>

                                <p>Hello my name is Nicole Wells and web developer from Portland. In pharetra orci
                                    dignissim, blandit mi semper, ultricies diam. Suspendisse malesuada suscipit nunc
                                    non volutpat. Sed porta nulla id orci laoreet tempor non consequat enim. Sed vitae
                                    aliquam velit. Aliquam ante erat, blandit at pretium et, accumsan ac est. Integer
                                    vehicula rhoncus molestie. Morbi ornare ipsum sed sem condimentum, et pulvinar
                                    tortor luctus. Suspendisse condimentum lorem ut elementum aliquam.</p>
                                <p>Mauris nec erat ut libero vulputate pulvinar. Aliquam ante erat, blandit at pretium
                                    et, accumsan ac est. Integer vehicula rhoncus molestie. Morbi ornare ipsum sed sem
                                    condimentum, et pulvinar tortor luctus. Suspendisse condimentum lorem ut elementum
                                    aliquam. Mauris nec erat ut libero vulputate pulvinar.</p>

                                <!-- Resume / Education -->
                                <div class="resume-outer">
                                    <div class="upper-title">
                                        <h4>Education</h4>
                                    </div>
                                    <!-- Resume BLock -->
                                    <div class="resume-block">
                                        <div class="inner">
                                            <span class="name">M</span>
                                            <div class="title-box">
                                                <div class="info-box">
                                                    <h3>{{$etudiant->domaine_etudes}}</h3>
                                                    <span>{{$etudiant->nom_ecole_universite}}</span>
                                                </div>
                                                <div class="edit-box">
                                                    <span class="year">{{$etudiant->annee_obtention_diplome}}</span>
                                                </div>
                                            </div>
                                            <div class="text">Diplome de {{$etudiant->niveau_etudes}}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Resume / Work & Experience -->
                                <div class="resume-outer theme-blue">
                                    <div class="upper-title">
                                        <h4>Experiences professionnelles</h4>
                                    </div>
                                    <!-- Resume BLock -->
                                    @foreach($etudiant->experiences_professionnelles as $exp_pro)
                                        <div class="resume-block">
                                            <div class="inner">
                                                <span class="name">S</span>
                                                <div class="title-box">
                                                    <div class="info-box">
                                                        <h3>{{$exp_pro->titre_poste}}</h3>
                                                        <span>{{$exp_pro->nom_entreprise}}</span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <span
                                                            class="year">{{$exp_pro->date_debut->format('j F Y')}} - {{$exp_pro->date_fin->format('j F Y')}}</span>
                                                    </div>
                                                </div>
                                                <div class="text">{{$exp_pro->description}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Resume / Work & Experience -->
                                <div class="resume-outer theme-blue">
                                    <div class="upper-title">
                                        <h4>Experiences académiques</h4>
                                    </div>
                                    <!-- Resume BLock -->
                                    @foreach($etudiant->experiences_academiques as $exp_aca)
                                        <div class="resume-block">
                                            <div class="inner">
                                                <span class="name">S</span>
                                                <div class="title-box">
                                                    <div class="info-box">
                                                        <h3>{{$exp_aca->titre}}</h3>
                                                        <span>{{$exp_aca->type}}</span>
                                                    </div>
                                                    <div class="edit-box">
                                                        <span class="year">{{$exp_aca->annee}}</span>
                                                    </div>
                                                </div>
                                                <div class="text"><h4>Duréé : {{$exp_aca->duree}}</h4></div>
                                                <div class="text">{{$exp_aca->description}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <h4 class="widget-title">Compétences techniques</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_techniques as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences en recherche et analyse</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_en_recherche_et_analyse as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences en recherche et analyse</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_en_recherche_et_analyse as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences en communication</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_en_communication as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences interpersonnelles</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_interpersonnelles as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences resolution de problèmes</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_resolution_problemes as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences adaptabilité</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_adaptabilite as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences en gestion de stress</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_gestion_stress as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences en leadership</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_leadership as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences éthiques et responsabilités</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_ethique_responsabilite as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Compétences en gestion financière</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->competences_gestion_financiere as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Centres d'intérêts</h4>
                                <p>{{$etudiant->centres_interet}}</p>

                                <h4 class="widget-title mt-3">Lien portfolio</h4>
                                <p>{{$etudiant->portfolio}}</p>

                                <h4 class="widget-title mt-3">Secteur activités préférées</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->secteur_activite_preferer as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Type emploi recherché</h4>
                                <div class="widget-content">
                                    <ul class="job-skills">
                                        @foreach($etudiant->type_emploi_recherche as $comp)
                                            <li><a href="#">{{$comp}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>

                                <h4 class="widget-title mt-3">Localisation préférée</h4>
                                <p>{{$etudiant->localisation_geographique_preferee}}</p>

                                <h4 class="widget-title mt-3">Durée disponibilité</h4>
                                <p>{{$etudiant->duree_disponibilite}}</p>
                            </div>
                        </div>

                        <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                            <aside class="sidebar">
                                <div class="sidebar-widget">
                                    <div class="widget-content">
                                        <ul class="job-overview">
                                            <li>
                                                <i class="icon icon-calendar"></i>
                                                <h5>Experience:</h5>
                                                <span>0-2 ans</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-expiry"></i>
                                                <h5>Age:</h5>
                                                <span>{{Carbon\Carbon::parse($etudiant->date_naissance)->age}} Ans</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-user-2"></i>
                                                <h5>Genre :</h5>
                                                <span>{{$etudiant->genre}}</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-language"></i>
                                                <h5>Langages:</h5>
                                                <span>@foreach($etudiant->competences_langues as $lang)
                                                        {{$lang}},
                                                    @endforeach</span>
                                            </li>

                                            <li>
                                                <i class="icon icon-degree"></i>
                                                <h5>Niveaux d'études :</h5>
                                                <span>{{$etudiant->niveau_etudes}}</span>
                                            </li>

                                        </ul>
                                        <h4>Contact</h4>
                                        <ul>
                                            <li>Email: {{$etudiant->user->email}}</li>
                                            <li>Téléphone : {{$etudiant->numero_telephone}}</li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="sidebar-widget social-media-widget">
                                    <h4 class="widget-title">Social media</h4>
                                    <div class="widget-content">
                                        <div class="social-links">
                                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"><i class="fab fa-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
