@extends('dashboard-layout')

@section('title', 'NextGen - Gerer candidat')

@section('content')

    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Candidats de tous les offres</h3>
            </div>

            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-content">

                            <div class="tabs-box">

                                <div class="tabs-content">
                                    <!--Tab-->
                                    <div class="tab active-tab" id="totals">
                                        <div class="d-flex flex-column gap-2" style="padding-top: 30px;">
                                            <!-- Candidate block three -->
                                            @forelse($candidats as $candidat)
                                            <div class="candidate-block-three">
                                                <div class="inner-box">
                                                    <div class="content" style="padding-left: 0;">
                                                        <h5>Poste : </h5>
                                                        <h4 class="name"><a href="{{route('entreprise.offres.show', ['offre' => $candidat['offre']->slug])}}">{{$candidat['offre']['titre_poste']}}</a></h4>
                                                        <ul class="candidate-info">
                                                            <li class="designation">{{$candidat['offre']['type_contrat']}}</li>
                                                            <li class="designation">{{$candidat['offre']['duree_contrat']}}</li>
                                                            <li class="designation">{{$candidat['offre']['lieu_poste']}}</li>
                                                            <li class="designation">Début {{$candidat['offre']['date_debut']->format('j F Y')}}</li>
                                                            <li class="designation">Limite {{$candidat['offre']['date_limite_candidature']->format('j F Y')}}</li>
                                                        </ul>
                                                        <h5 class="mt-3">Candidats :</h5>
                                                        <h4 class="name"><a href="{{route('etudiants.portfolio', ['etudiant' => $candidat['etudiant']->slug])}}">{{$candidat['etudiant']->prenom}} {{$candidat['etudiant']->nom}}</a></h4>
                                                        <ul class="candidate-info">
                                                            <li class="designation">{{$candidat['etudiant']->domaine_etudes}}</li>
                                                            <li class="designation">{{$candidat['etudiant']->niveau_etudes}}</li>
                                                            <li><span class="icon flaticon-map-locator"></span>
                                                                {{$candidat['etudiant']->adresse_postale}}
                                                            </li>
                                                        </ul>
                                                        <ul class="post-tags">
                                                            <li><a href="#">App</a></li>
                                                            <li><a href="#">Design</a></li>
                                                            <li><a href="#">Digital</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="option-box">
                                                        <ul class="option-list">
                                                            <li>
                                                                <button onclick="window.location.href='{{ route('entreprise.offres.show', ['offre' => $candidat['offre']->slug]) }}'" data-text="Voir l'offre">
                                                                    <span class="la la-eye"></span>
                                                                </button>
                                                            </li>
                                                            <li>
                                                                <button data-text="Approve Aplication"><span class="la la-check"></span></button>
                                                            </li>
                                                            <li>
                                                                <button data-text="Reject Aplication"><span class="la la-times-circle"></span></button>
                                                            </li>
                                                            <li>
                                                                <button data-text="Delete Aplication"><span class="la la-trash"></span></button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                                <p>Pas de candidats à afficher</p>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        Chart.defaults.global.defaultFontFamily = "Sofia Pro";
        Chart.defaults.global.defaultFontColor = '#888';
        Chart.defaults.global.defaultFontSize = '14';

        var ctx = document.getElementById('chart').getContext('2d');

        var chart = new Chart(ctx, {

            type: 'line',
            // The data for our dataset
            data: {
                labels: ["January", "February", "March", "April", "May", "June"],
                // Information about the dataset
                datasets: [{
                    label: "Views",
                    backgroundColor: 'transparent',
                    borderColor: '#1967D2',
                    borderWidth: "1",
                    data: [196, 132, 215, 362, 210, 252],
                    pointRadius: 3,
                    pointHoverRadius: 3,
                    pointHitRadius: 10,
                    pointBackgroundColor: "#1967D2",
                    pointHoverBackgroundColor: "#1967D2",
                    pointBorderWidth: "2",
                }]
            },

            // Configuration options
            options: {

                layout: {
                    padding: 10,
                },

                legend: {
                    display: false
                },
                title: {
                    display: false
                },

                scales: {
                    yAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            borderDash: [6, 10],
                            color: "#d8d8d8",
                            lineWidth: 1,
                        },
                    }],
                    xAxes: [{
                        scaleLabel: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        },
                    }],
                },

                tooltips: {
                    backgroundColor: '#333',
                    titleFontSize: 13,
                    titleFontColor: '#fff',
                    bodyFontColor: '#fff',
                    bodyFontSize: 13,
                    displayColors: false,
                    xPadding: 10,
                    yPadding: 10,
                    intersect: false
                }
            },
        });
    </script>

    </body>

    </html>
@endsection
