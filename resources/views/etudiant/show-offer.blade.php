@extends('dashboard-layout')

@section('title', 'NextGen - ' . $offre->titre_poste)

@section('content')

    @include('header.dashboard-header')

    <section class="job-detail-section">
        <!-- Upper Box -->
        <div class="upper-box">
            <div class="auto-container">
                <!-- Job Block -->
                <div class="job-block-seven">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-warning">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="inner-box">
                        <div class="content">
                            <span class="company-logo"><img src="images/resource/company-logo/5-1.png" alt=""></span>
                            <h4><a href="#">{{$offre->titre_poste}}</a></h4>
                            <ul class="job-info">
                                <li><span class="icon flaticon-briefcase"></span> {{$offre->type_contrat}}</li>
                                <li><span class="icon flaticon-map-locator"></span> {{$offre->lieu_poste}}</li>
                                <li><span class="icon flaticon-clock-3"></span>{{$offre->created_at->diffForHumans()}}</li>
                                <li><span class="icon flaticon-target"></span> {{$offre->duree_contrat}}</li>
                            </ul>
                            <ul class="job-other-info">
                                <li class="time">Full Time</li>
                                <li class="privacy">Private</li>
                                <li class="required">Urgent</li>
                            </ul>
                        </div>

                        <div class="btn-box">
                            <p class="mt-3">{{count($offre->etudiants)}} candidats pour ce poste</p>
                            <form method="post" id="postuler_offre" action="{{route('etudiants.offers.apply', ['offre' => $offre->slug])}}">
                                @csrf
                            </form>
                            <a href="javascript:void(0);" onclick="postuler()" class="theme-btn btn-style-one">Postuler</a>
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
                            <h4>Description</h4>
                            <p>{{$offre->description_poste}}</p>
                            <h4>Skill & Experience</h4>
                            <h6 class="mb-3 ms-3"><i class="la la-check-square"></i> Competences techniques</h6>
                            <ul class="ms-5 mb-4">
                                @forelse($offre->competences_techniques as $element)
                                    <li style="font-size: 14px!important;"><i class="la la-check"></i> {{$element}}</li>
                                @empty
                                    <li>Aucun !</li>
                                @endforelse
                            </ul>
                            <h6 class="mb-3 ms-3"><i class="la la-check-square"></i> Competences transversales</h6>
                            <ul class="ms-5 mb-4">
                                @forelse($offre->competences_transversales as $element)
                                    <li style="font-size: 14px!important;"><i class="la la-check"></i> {{$element}}</li>
                                @empty
                                    <li>Aucun !</li>
                                @endforelse
                            </ul>
                            <h6 class="mb-3 ms-3"><i class="la la-check-square"></i> Langues requises</h6>
                            <ul class="ms-5 mb-4">
                                @forelse($offre->langues_requises as $element)
                                    <li style="font-size: 14px!important;"><i class="la la-check"></i> {{$element}}</li>
                                @empty
                                    <li>Aucun !</li>
                                @endforelse
                            </ul>

                            <h4>Avantages</h4>
                            <p>{{$offre->avantages}}</p>
                        </div>

                        <!-- Related Jobs -->
                    </div>

                    <div class="sidebar-column col-lg-4 col-md-12 col-sm-12">
                        <aside class="sidebar">
                            <div class="sidebar-widget">
                                <!-- Job Overview -->
                                <h4 class="widget-title">A propos de l'offre</h4>
                                <div class="widget-content">
                                    <ul class="job-overview">
                                        <li>
                                            <i class="icon icon-calendar"></i>
                                            <h5>Date publication:</h5>
                                            <span>{{$offre->created_at->locale('fr')->diffForHumans()}}</span>
                                        </li>
                                        <li>
                                            <i class="icon icon-expiry"></i>
                                            <h5>Date limite candidature :</h5>
                                            <span>{{$offre->date_limite_candidature->format("j F Y")}}</span>
                                        </li>
                                        <li>
                                            <i class="icon icon-location"></i>
                                            <h5>Lieu :</h5>
                                            <span>{{$offre->lieu_poste}}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="sidebar-widget company-widget">
                                <div class="widget-content">
                                    <div class="company-title">
                                        <div class="company-logo"><img src="images/resource/company-7.png" alt=""></div>
                                        <h5 class="company-name">{{$offre->entreprise->nom_entreprise}}</h5>
                                        <a href="#" class="profile-link">Voir le profile de la compagnie</a>
                                    </div>

                                    <ul class="company-info">
                                        <li>Secteur d'activité: <span>{{$offre->entreprise->secteur_activite}}</span></li>
                                        <li>Adresse: <span>{{$offre->entreprise->adresse}}</span></li>
                                        <li>Date création: <span>{{$offre->entreprise->date_creation->format('j F Y')}}</span></li>
                                        <li>Téléphone: <span>{{$offre->entreprise->telephone_contact}}</span></li>
                                        <li>Email: <span>{{$offre->entreprise->email_contact}}</span></li>
                                    </ul>

                                    <div class="btn-box"><a href="{{$offre->entreprise->site_web}}" class="theme-btn btn-style-three">{{$offre->entreprise->site_web}}</a>
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
        .job-block-seven {
            position: relative;
            padding-left: 50px;
        }
    </style>

    <script>
        function postuler() {
            Swal.fire({
                title: "Voulez vous vraiment postuler pour cette offre?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#00cb5e",
                cancelButtonColor: "rgba(52,52,52,0.36)",
                confirmButtonText: "Oui, accepter"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('postuler_offre').submit();
                }
            });
        }
    </script>

@endsection
