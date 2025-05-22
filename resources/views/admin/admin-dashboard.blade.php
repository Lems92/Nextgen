@extends('dashboard-layout')

@section('title', 'NextGen Admin - Tableau de bord')

@section('content')
    <!-- Header -->
    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">
            <!-- Titre du tableau de bord -->
            <div class="container mb-4">
                <div class="row">
                    <div class="col-12">
                        <h1 class="dashboard-title">Tableau de bord</h1>
                    </div>
                </div>
            </div>

            <!-- Section: Statistiques -->
            <section class="admin-section bg-light mb-5">
                <div class="container">
                    <div class="row">
                        <!-- Graphique des utilisateurs -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Statistiques des Utilisateurs</h5>
                                    <div class="mb-3">
                                        <label for="dateFilter" class="form-label">Filtrer par période</label>
                                        <select class="form-select" id="dateFilter">
                                            <option value="all">Toutes les périodes</option>
                                            <option value="today">Aujourd'hui</option>
                                            <option value="week">Cette semaine</option>
                                            <option value="month">Ce mois</option>
                                            <option value="year">Cette année</option>
                                        </select>
                                    </div>
                                    <div class="total-users mb-3">
                                        <h6>Total des utilisateurs : <span id="totalUsers">{{ $stats['total_users'] }}</span></h6>
                                    </div>
                                    <canvas id="usersChart"></canvas>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Graphique des étudiants -->
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Statistiques des Candidatures Étudiants</h5>
                                    <div class="total-students mb-3">
                                        <h6>Total des étudiants : <span id="totalStudents">{{ $stats['total_students'] }}</span></h6>
                                    </div>
                                    <canvas id="studentsChart"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Graphique des entreprises -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Statistiques des Entreprises</h5>
                                    <div class="mb-3">
                                        <label for="companyFilter" class="form-label">Filtrer par entreprise</label>
                                        <select class="form-select" id="companyFilter">
                                            <option value="all">Toutes les entreprises</option>
                                            @foreach($entreprises as $entreprise)
                                                <option value="{{ $entreprise->id }}">{{ $entreprise->nom_entreprise }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <canvas id="companiesChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Section: Company Submissions Overview -->
            <section class="admin-section bg-light">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-center mb-5">
                                <h2>Nouvelles entreprises inscrites</h2>
                            </div>
                        </div>
                    </div>

                    <div class="admin-table table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom de l'Entreprise</th>
                                <th>Secteur d'Activité</th>
                                <th>Adresse</th>
                                <th>Contact Principal</th>
                                <th>Email de Contact</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($entreprises as $entreprise)
                                <tr>
                                    <td>{{$entreprise->nom_entreprise}}</td>
                                    <td>{{$entreprise->secteur_activite}}</td>
                                    <td>{{$entreprise->adresse}}</td>
                                    <td>{{$entreprise->nom_contact}}</td>
                                    <td>{{$entreprise->email_contact}}</td>
                                    <td>
                                        @if($entreprise->user->is_accepted_by_admin)
                                            <span class="badge bg-success">Accepté</span>
                                        @else
                                            <span class="badge bg-warning">A vérifier</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{route('admin.show_entreprise', ['entreprise' => $entreprise->slug])}}" class="btn btn-secondary">Voir</a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Aucun enregistrement trouvé !</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>


            <!-- Section: Pricing Management -->
            <section class="admin-section bg-light mt-5">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2>Gestion des Offres</h2>
                    </div>

                    <div class="row">
                        @forelse($type_abonnements as $type)
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="pricing-plan">
                                    <div class="plan-header">
                                        <h4>{{$type->name}}</h4>
                                        <p>Prix: {{$type->price}} Ar / mois</p>
                                    </div>
                                    <div class="plan-features">
                                        <ul>
                                            <li>10 annonces de job</li>
                                            <li>3 offres vedettes</li>
                                            <li>Annonce affichée pendant 30 jours</li>
                                            <li>Support Premium</li>
                                        </ul>
                                    </div>
                                    <div class="plan-footer">
                                        <a href="{{route('admin.type_subscriptions')}}" class="btn btn-warning">Gérér</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h5>Aucun enregistrement trouvé !</h5>
                        @endforelse
                    </div>
                </div>
            </section>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Fonction pour formater les nombres sans décimales
        function formatNumber(number) {
            return Math.round(number);
        }

        // Fonction pour mettre à jour les statistiques
        function updateStats() {
            const period = document.getElementById('dateFilter').value;
            const company = document.getElementById('companyFilter').value;

            fetch(`/admin/stats?period=${period}&company=${company}`)
                .then(response => response.json())
                .then(data => {
                    // Mise à jour des totaux
                    document.getElementById('totalUsers').textContent = formatNumber(data.total_users);
                    document.getElementById('totalStudents').textContent = formatNumber(data.total_students);

                    // Mise à jour du graphique des utilisateurs
                    usersChart.data.datasets[0].data = [
                        data.total_students,
                        data.total_companies,
                        data.total_universities
                    ];
                    usersChart.update();

                    // Mise à jour du graphique des étudiants
                    studentsChart.data.datasets[0].data = [
                        data.total_applications,
                        data.accepted_applications,
                        data.rejected_applications,
                        data.pending_applications
                    ];
                    studentsChart.update();

                    // Mise à jour du graphique des entreprises
                    companiesChart.data.datasets[0].data = [
                        data.total_jobs,
                        data.total_accepted_candidates,
                        data.total_rejected_candidates
                    ];
                    companiesChart.update();
                });
        }

        // Initialisation des graphiques
        const usersCtx = document.getElementById('usersChart').getContext('2d');
        const usersChart = new Chart(usersCtx, {
            type: 'pie',
            data: {
                labels: ['Étudiants', 'Entreprises', 'Universités'],
                datasets: [{
                    data: [
                        formatNumber({{ $stats['total_students'] }}),
                        formatNumber({{ $stats['total_companies'] }}),
                        formatNumber({{ $stats['total_universities'] }})
                    ],
                    backgroundColor: ['#66022b', '#DC3545', '#ff6b81']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.label}: ${formatNumber(context.raw)}`;
                            }
                        }
                    }
                }
            }
        });

        const studentsCtx = document.getElementById('studentsChart').getContext('2d');
        const studentsChart = new Chart(studentsCtx, {
            type: 'bar',
            data: {
                labels: ['Postulés', 'Acceptés', 'Rejetés', 'En attente'],
                datasets: [{
                    label: 'Nombre de candidatures',
                    data: [
                        formatNumber({{ $stats['total_applications'] }}),
                        formatNumber({{ $stats['accepted_applications'] }}),
                        formatNumber({{ $stats['rejected_applications'] }}),
                        formatNumber({{ $stats['pending_applications'] }})
                    ],
                    backgroundColor: ['#66022b', '#28a745', '#DC3545', '#ffc107']
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return formatNumber(value);
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${formatNumber(context.raw)}`;
                            }
                        }
                    }
                }
            }
        });

        const companiesCtx = document.getElementById('companiesChart').getContext('2d');
        const companiesChart = new Chart(companiesCtx, {
            type: 'bar',
            data: {
                labels: ['Offres publiées', 'Candidats acceptés', 'Candidats rejetés'],
                datasets: [{
                    label: 'Statistiques des entreprises',
                    data: [
                        formatNumber({{ $stats['total_jobs'] }}),
                        formatNumber({{ $stats['total_accepted_candidates'] }}),
                        formatNumber({{ $stats['total_rejected_candidates'] }})
                    ],
                    backgroundColor: ['#66022b', '#28a745', '#DC3545']
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return formatNumber(value);
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `${context.dataset.label}: ${formatNumber(context.raw)}`;
                            }
                        }
                    }
                }
            }
        });

        // Écouteurs d'événements pour les filtres
        document.getElementById('dateFilter').addEventListener('change', updateStats);
        document.getElementById('companyFilter').addEventListener('change', updateStats);

        // Chargement initial des statistiques
        updateStats();
    </script>

    <style>
        .dashboard-title {
            color: #66022b;
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #66022b;
        }

        .admin-wrapper {
            padding: 20px 0;
        }

        .admin-table {
            margin-top: 30px;
        }

        .admin-table .table thead th {
            background-color: #66022b;
            color: white;
            text-align: center;
        }

        .admin-table .table tbody td {
            text-align: center;
            vertical-align: middle;
        }

        .admin-table .btn {
            margin: 0 5px;
        }

        .pricing-plan {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .plan-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .plan-footer {
            text-align: center;
            margin-top: 15px;
        }

        .admin-details h3 {
            margin-top: 20px;
        }

        .admin-details a.btn {
            margin-top: 15px;
        }

        /* Styles pour les cartes des graphiques */
        .card {
            border: none;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            color: #66022b;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .card-body {
            padding: 20px;
        }
    </style>
@endsection
