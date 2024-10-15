@extends('dashboard-layout')

@section('title', 'Evénements')

@section('content')

    @include('header.dashboard-header')



    <section class="ls-section">
        <div class="auto-container">
            <div class="upper-title-box">
                <h3>Liste des événements</h3>
            </div>
            <h4>Evénements à venir</h4>
            <!-- Content Column -->
            <div class="content-column col-lg-12 col-md-12 col-sm-12">
                <div class="ls-outer">

                    <!-- Event Block -->
                    @forelse($event_coming as $event)
                        <div class="job-block">
                            <div class="inner-box">
                                <div class="content">
                                    <h4><a href="#">{{$event->event_title}}</a></h4>
                                    <ul class="job-info">
                                        <li><span class="icon flaticon-calendar"></span>
                                            Date début : {{$event->start_date->format('j F Y')}}
                                        </li>
                                        <li><span class="icon flaticon-calendar"></span>
                                            Date fin : {{$event->end_date->format('j F Y')}}
                                        </li>
                                        <li><span class="icon flaticon-clock-3"></span>
                                            Heure commencement : {{$event->start_time->format('H:i')}}
                                        </li>
                                        <li><span class="icon flaticon-clock-3"></span>
                                            Heure fin : {{$event->end_time->format('H:i')}}
                                        </li>
                                    </ul>
                                    <p>
                                        {{$event->description}}
                                    </p>
                                    <div class="d-flex justify-content-between flex-wrap gap-3">
                                        <h6>Organisé par : {{$event->universite->nom_etablissement}}</h6>
                                        <h6>Lieu: {{$event->universite->adresse_etablissement}}</h6>
                                    <h6>Contact email : {{$event->universite->adresse_email_contact}}</h6>
                                        <h6>Téléphone : {{$event->universite->numero_telephone_contact}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="mb-3">Pas d'événement à venir !</p>
                    @endforelse
                    <a href="#">Afficher plus</a>
                </div>
            </div>
            <h4 class="mt-5">Evénements passés</h4>
            <!-- Content Column -->
            <div class="content-column col-lg-12 col-md-12 col-sm-12">
                <div class="ls-outer">

                    <!-- Event Block -->
                    @forelse($event_passed as $event)
                        <div class="job-block">
                            <div class="inner-box">
                                <div class="content">
                                    <h4><a href="#">{{$event->event_title}}</a></h4>
                                    <ul class="job-info">
                                        <li><span class="icon flaticon-calendar"></span>
                                            Date début : {{$event->start_date->format('j F Y')}}
                                        </li>
                                        <li><span class="icon flaticon-calendar"></span>
                                            Date fin : {{$event->end_date->format('j F Y')}}
                                        </li>
                                        <li><span class="icon flaticon-clock-3"></span>
                                            Heure commencement : {{$event->start_time->format('H:i')}}
                                        </li>
                                        <li><span class="icon flaticon-clock-3"></span>
                                            Heure fin : {{$event->end_time->format('H:i')}}
                                        </li>
                                    </ul>
                                    <p>
                                        {{$event->description}}
                                    </p>
                                    <h6>Organisé par : {{$event->universite->nom_etablissement}}<br>
                                        Lieu: {{$event->universite->adresse_etablissement}}<br>
                                        Contact email : {{$event->universite->adresse_email_contact}}<br>
                                        Téléphone : {{$event->universite->numero_telephone_contact}}
                                    </h6>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="mb-3">Pas d'événement à afficher !</p>
                    @endforelse
                    <a href="#">Afficher plus</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .ls-section {
            position: relative;
            padding: 50px 50px 100px;
        }
    </style>
@endsection
