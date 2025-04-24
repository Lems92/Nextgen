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
                                <ul class="tab-buttons d-flex justify-content-between">
                                    <li class="tab-btn active-btn" data-tab="#pending">
                                        En attente <span class="badge">{{ $candidats->where('status', 'pending')->count() }}</span>
                                    </li>
                                    <li class="tab-btn" data-tab="#accepted">
                                        Acceptés pour un entretien <span class="badge">{{ $candidats->where('status', 'accepted')->count() }}</span>
                                    </li>
                                    <li class="tab-btn" data-tab="#recruited">
                                        Recrutés <span class="badge">{{ $candidats->where('status', 'recruited')->count() }}</span>
                                    </li>
                                    <li class="tab-btn" data-tab="#rejected">
                                        Refusés <span class="badge">{{ $candidats->where('status', 'rejected')->count() }}</span>
                                    </li>
                                </ul>

                                <div class="tabs-content">
                                    <!-- Section En attente -->
                                    <div class="tab active-tab" id="pending">
                                        <div class="d-flex flex-column gap-2" style="padding-top: 30px;">
                                            @forelse($candidats->where('status', 'pending') as $candidat)
                                                <div class="candidate-block-three">
                                                    <div class="inner-box">
                                                        <div class="content" style="padding-left: 0;">
                                                            <h5>Poste : </h5>
                                                            <h4 class="name"><a href="{{ route('entreprise.offres.show', ['offre' => $candidat['offre']->slug]) }}">{{ $candidat['offre']['titre_poste'] }}</a></h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">{{ $candidat['offre']['type_contrat'] }}</li>
                                                                <li class="designation">{{ $candidat['offre']['duree_contrat'] }}</li>
                                                                <li class="designation">{{ $candidat['offre']['lieu_poste'] }}</li>
                                                                <li class="designation">Début {{ $candidat['offre']['date_debut']->format('j F Y') }}</li>
                                                                <li class="designation">Limite {{ $candidat['offre']['date_limite_candidature']->format('j F Y') }}</li>
                                                            </ul>
                                                            <h5 class="mt-3">Candidats :</h5>
                                                            <h4 class="name"><a href="{{ route('etudiants.portfolio', ['etudiant' => $candidat['etudiant']->slug]) }}">{{ $candidat['etudiant']->prenom }} {{ $candidat['etudiant']->nom }}</a></h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">{{ $candidat['etudiant']->domaine_etudes }}</li>
                                                                <li class="designation">{{ $candidat['etudiant']->niveau_etudes }}</li>
                                                                <li><span class="icon flaticon-map-locator"></span>{{ $candidat['etudiant']->adresse_postale }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <!-- Bouton pour voir le portfolio -->
                                                                <li>
                                                                    <button onclick="window.location.href='{{ route('etudiants.portfolio', ['etudiant' => $candidat['etudiant']->slug]) }}'" data-text="Voir le portfolio">
                                                                        <span class="la la-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <!-- Bouton pour approuver le candidat -->
                                                                <li>
                                                                    <form action="{{ route('candidats.approvePage', ['id' => $candidat['etudiant']->id]) }}" method="GET">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Approuver">
                                                                            <span class="la la-check-circle"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                                <!-- Bouton pour recruter le candidat -->
                                                                <li>
                                                                    <form action="{{ route('candidats.recruitPage', ['id' => $candidat['etudiant']->id]) }}" method="GET" onsubmit="return confirm('Êtes-vous sûr de vouloir recruter ce candidat ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Recruter">
                                                                            <span class="la la-user-plus"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                                <!-- Bouton pour rejeter le candidat -->
                                                                <li>
                                                                    <form action="{{ route('candidats.rejectPage', ['id' => $candidat['etudiant']->id]) }}" method="GET" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter ce candidat ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Rejeter">
                                                                            <span class="la la-times-circle"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p>Pas de candidats en attente</p>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- Section Acceptés -->
                                    <div class="tab" id="accepted">
                                        <div class="d-flex flex-column gap-2" style="padding-top: 30px;">
                                            @forelse($candidats->where('status', 'accepted') as $candidat)
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
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <!-- Bouton pour voir le portfolio -->
                                                                <li>
                                                                    <button onclick="window.location.href='{{ route('etudiants.portfolio', ['etudiant' => $candidat['etudiant']->slug]) }}'" data-text="Voir le portfolio">
                                                                        <span class="la la-eye"></span>
                                                                    </button>
                                                                </li>
                                                                
                                                                <li>
                                                                    <form action="{{ route('candidats.pending', ['id' => $candidat['etudiant']->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir mettre ce candidat en attente ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Mettre en attente">
                                                                            <span class="la la-clock-o"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                                <!-- Bouton pour approuver le candidat
                                                                <li>
                                                                    <form action="{{ route('candidats.approve', ['id' => $candidat['etudiant']->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir approuver ce candidat ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Approuver">
                                                                            <span class="la la-check-circle"></span>
                                                                        </button>
                                                                    </form>
                                                                </li> -->

                                                                <li>
                                                                    <form action="{{ route('candidats.recruitPage', ['id' => $candidat['etudiant']->id]) }}" method="GET" onsubmit="return confirm('Êtes-vous sûr de vouloir recruter ce candidat ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Recruter">
                                                                            <span class="la la-user-plus"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                                <!-- Bouton pour rejeter le candidat -->
                                                                <li>
                                                                    <form action="{{ route('candidats.rejectPage', ['id' => $candidat['etudiant']->id]) }}" method="GET" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter ce candidat ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Rejeter">
                                                                            <span class="la la-times-circle"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p>Pas de candidats acceptés</p>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- Section Recrutés -->
                                    <div class="tab" id="recruited">
                                        <div class="d-flex flex-column gap-2" style="padding-top: 30px;">
                                            @forelse($candidats->where('status', 'recruited') as $candidat)
                                                <div class="candidate-block-three">
                                                    <div class="inner-box">
                                                        <div class="content" style="padding-left: 0;">
                                                            <h5>Poste : </h5>
                                                            <h4 class="name"><a href="{{ route('entreprise.offres.show', ['offre' => $candidat['offre']->slug]) }}">{{ $candidat['offre']['titre_poste'] }}</a></h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">{{ $candidat['offre']['type_contrat'] }}</li>
                                                                <li class="designation">{{ $candidat['offre']['duree_contrat'] }}</li>
                                                                <li class="designation">{{ $candidat['offre']['lieu_poste'] }}</li>
                                                                <li class="designation">Début {{ $candidat['offre']['date_debut']->format('j F Y') }}</li>
                                                                <li class="designation">Limite {{ $candidat['offre']['date_limite_candidature']->format('j F Y') }}</li>
                                                            </ul>
                                                            <h5 class="mt-3">Candidats :</h5>
                                                            <h4 class="name"><a href="{{ route('etudiants.portfolio', ['etudiant' => $candidat['etudiant']->slug]) }}">{{ $candidat['etudiant']->prenom }} {{ $candidat['etudiant']->nom }}</a></h4>
                                                            <ul class="candidate-info">
                                                                <li class="designation">{{ $candidat['etudiant']->domaine_etudes }}</li>
                                                                <li class="designation">{{ $candidat['etudiant']->niveau_etudes }}</li>
                                                                <li><span class="icon flaticon-map-locator"></span>{{ $candidat['etudiant']->adresse_postale }}</li>
                                                            </ul>
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <!-- Bouton pour voir le portfolio -->
                                                                <li>
                                                                    <button onclick="window.location.href='{{ route('etudiants.portfolio', ['etudiant' => $candidat['etudiant']->slug]) }}'" data-text="Voir le portfolio">
                                                                        <span class="la la-eye"></span>
                                                                    </button>
                                                                </li>

                                                                <!-- Bouton pour mettre en attente -->
                                                                <li>
                                                                    <form action="{{ route('candidats.pending', ['id' => $candidat['etudiant']->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir mettre ce candidat en attente ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Mettre en attente">
                                                                            <span class="la la-clock-o"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>

                                                                <!-- Bouton pour rejeter le candidat -->
                                                                <li>
                                                                    <form action="{{ route('candidats.reject', ['id' => $candidat['etudiant']->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter ce candidat ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Rejeter">
                                                                            <span class="la la-times-circle"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p>Pas de candidats recrutés</p>
                                            @endforelse
                                        </div>
                                    </div>

                                    <!-- Section Refusés -->
                                    <div class="tab" id="rejected">
                                        <div class="d-flex flex-column gap-2" style="padding-top: 30px;">
                                            @forelse($candidats->where('status', 'rejected') as $candidat)
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
                                                        </div>
                                                        <div class="option-box">
                                                            <ul class="option-list">
                                                                <!-- Bouton pour voir le portfolio -->
                                                                <li>
                                                                    <button onclick="window.location.href='{{ route('etudiants.portfolio', ['etudiant' => $candidat['etudiant']->slug]) }}'" data-text="Voir le portfolio">
                                                                        <span class="la la-eye"></span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <form action="{{ route('candidats.pending', ['id' => $candidat['etudiant']->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir mettre ce candidat en attente ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Mettre en attente">
                                                                            <span class="la la-clock-o"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                                <!-- Bouton pour mettre en attente -->
                                                                <li>
                                                                    <form action="{{ route('candidats.pending', ['id' => $candidat['etudiant']->id]) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir mettre ce candidat en attente ?');">
                                                                        @csrf
                                                                        <input type="hidden" name="offre_id" value="{{ $candidat['offre']->id }}">
                                                                        <button type="submit" data-text="Mettre en attente">
                                                                            <span class="la la-clock-o"></span>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @empty
                                                <p>Pas de candidats refusés</p>
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

    <style>
        .tab-buttons {
    display: flex;
    gap: 20px;
    list-style: none;
    padding: 0;
    margin: 0;
}

.tab-btn {
    cursor: pointer;
    padding: 10px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    transition: background-color 0.3s;
}

.tab-btn:hover {
    background-color: #e0e0e0;
}

.tab-btn .badge {
    background-color: #6d0f27;
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 12px;
    margin-left: 5px;
}

#approvalPopup.hidden {
    display: none;
}
    </style>
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

        function openApprovalPopup(etudiantId, offreId, prenom, titrePoste) {
            document.getElementById('popupEtudiantId').value = etudiantId;
            document.getElementById('popupOffreId').value = offreId;
            document.getElementById('emailBody').value = `Bonjour ${prenom},\n\nNous sommes ravis de vous inviter à un entretien pour le poste de ${titrePoste}.`;
            document.getElementById('approvalPopup').classList.remove('hidden');
        }

        function closeApprovalPopup() {
            document.getElementById('approvalPopup').classList.add('hidden');
        }
    </script>

    </body>

    </html>
@endsection
