@extends('dashboard-layout')

@section('title', 'NextGen - Entreprise - Dashboard')

@section('content')
    @include('header.dashboard-header')

    @php
        use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
        $user->load('userable');

        $applicant_count = 0;

        foreach ($user->userable->offres as $offre) {
            $offre = $offre->load('etudiants');
            $applicant_count += count($offre->etudiants);
        }
    @endphp

    <style>
        .stat-box {
            background: linear-gradient(135deg,#66022b 0%, #a8325e 100%);
            color: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 24px 0 16px 0;
            margin-bottom: 24px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.2s;
        }
        .stat-box:hover {
            transform: translateY(-5px) scale(1.03);
            box-shadow: 0 8px 32px rgba(102,2,43,0.18);
        }
        .stat-box h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        .stat-box p {
            font-size: 2.2rem;
            font-weight: bold;
            margin: 0;
            color: #fff;
            animation: countUp 1s ease;
        }
        .stat-box .stat-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
            display: block;
            opacity: 0.18;
            position: absolute;
            right: 16px;
            bottom: 8px;
        }
        @keyframes countUp {
            from { opacity: 0; transform: scale(0.8);}
            to { opacity: 1; transform: scale(1);}
        }
    </style>

        <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            @if(session('error'))
                <div class="alert alert-warning alert-dismissible text-center fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="upper-title-box">
                <h3>Bienvenue, {{$user->userable->nom_entreprise}}!</h3>
            </div>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="offreFilter" class="form-label fw-bold">Filtrer les statistiques :</label>
                    <select id="offreFilter" class="form-select">
                        <option value="global">Statistiques globales</option>
                        @foreach($offres as $offre)
                            <option value="{{ $offre->id }}">{{ $offre->titre_poste }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div id="stats-global" class="row mb-4 stats-block">
                @include('entreprise.partials.stats-box', ['stats' => $stats])
            </div>
            @foreach($stats_by_offer as $offre_id => $stat)
                <div id="stats-offre-{{ $offre_id }}" class="row mb-4 stats-block" style="display:none;">
                    @include('entreprise.partials.stats-box', ['stats' => $stat])
                </div>
            @endforeach
            
            <div class="row mb-4">
                <div class="col-12">
                    <canvas id="statsChart" height="80"></canvas>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard -->



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
    document.querySelectorAll('.stat-box p').forEach(function(el) {
        let end = parseInt(el.textContent);
        let start = 0;
        let duration = 800;
        let step = Math.ceil(end / (duration / 16));
        el.textContent = 0;
        let interval = setInterval(function() {
            start += step;
            if (start >= end) {
                el.textContent = end;
                clearInterval(interval);
            } else {
                el.textContent = start;
            }
        }, 16);
    });

    // Données globales
    const statsGlobal = @json($stats);

    // Données par offre
    const statsByOffer = @json($stats_by_offer);

    // Labels pour le graphique
    const chartLabels = [
        'Vues',
        'Candidatures',
        'En attente',
        'Acceptés',
        'Refusés',
        'Recrutés'
    ];

    // Fonction pour extraire les valeurs d'un objet stats
    function getStatsArray(stats) {
        return [
            stats.total_views,
            stats.total_postules,
            stats.total_pending,
            stats.total_accepted,
            stats.total_rejected,
            stats.total_recruited
        ];
    }

    // Initialisation du graphique
    let ctx = document.getElementById('statsChart').getContext('2d');
    let chartData = {
        labels: chartLabels,
        datasets: [{
            label: 'Statistiques',
            data: getStatsArray(statsGlobal),
            backgroundColor: [
                '#66022b', '#a8325e', '#e57373', '#81c784', '#ffd54f', '#64b5f6'
            ],
            borderColor: [
                '#66022b', '#a8325e', '#e57373', '#81c784', '#ffd54f', '#64b5f6'
            ],
            borderWidth: 1
        }]
    };
    let statsChart = new Chart(ctx, {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            if (Number.isInteger(value)) {
                                return value;
                            }
                        },
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Mise à jour du graphique lors du changement de filtre
    document.getElementById('offreFilter').addEventListener('change', function() {
        let value = this.value;
        let data;
        if (value === 'global') {
            data = getStatsArray(statsGlobal);
        } else {
            data = getStatsArray(statsByOffer[value]);
        }
        statsChart.data.datasets[0].data = data;
        statsChart.update();
    });
    </script>

@endsection
