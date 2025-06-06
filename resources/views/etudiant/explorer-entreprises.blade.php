@extends('dashboard-layout')

@section('title', 'NextGen - Explorer les entreprises')

@section('content')
    @include('header.dashboard-header')

    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>

            <div class="row">
                <!-- Filters Column -->
                <div class="filters-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="filters-outer">
                            <button type="button" class="theme-btn close-filters">X</button>

                            <!-- Filter Block -->
                            <div class="filter-block">
                                <h4>Secteur d'activité</h4>
                                <div class="form-group">
                                    <select class="chosen-select" id="secteur-filter">
                                        <option value="">Tous les secteurs</option>
                                        @foreach($entreprises->pluck('secteur_activite')->unique() as $secteur)
                                            <option value="{{ $secteur }}">{{ $secteur }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="ls-outer">
                        <!-- ls Switcher -->
                        <div class="ls-switcher">
                            <div class="showing-result">
                                <div class="text">{{ count($entreprises) }} entreprises trouvées</div>
                            </div>
                        </div>

                        <div class="row" id="entreprises-list">
                            @forelse($entreprises as $entreprise)
                                <div class="company-block col-lg-6 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                            <div class="company-logo">
                                                <img src="{{ $entreprise->profile_picture ? asset('storage/' . $entreprise->profile_picture) : asset('images/pdp_entreprise.png') }}" 
                                                     alt="Logo de l'entreprise" 
                                                     style="width: 80px; height: 80px; object-fit: cover; border-radius: 12px; border: 2px solid #eee; background: #fff;">
                                            </div>
                                            <h4>
                                                <a href="{{ route('entreprise.public_show', ['entreprise' => $entreprise->slug]) }}">
                                                    {{ $entreprise->nom_entreprise }}
                                                </a>
                                            </h4>
                                            <ul class="company-info">
                                                <li><i class="la la-map-marker"></i> {{ $entreprise->adresse ?? 'Non spécifié' }}</li>
                                                <li><i class="la la-briefcase"></i> {{ $entreprise->secteur_activite }}</li>
                                                <li><i class="la la-file-text"></i> {{ count($entreprise->offres) }} offres disponibles</li>
                                            </ul>
                                            <div class="btn-box">
                                                <a href="{{ route('entreprise.public_show', ['entreprise' => $entreprise->slug]) }}" 
                                                   class="theme-btn btn-style-three">
                                                    Voir le profil
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        Aucune entreprise disponible pour le moment.
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .company-block {
            margin-bottom: 30px;
        }
        .company-block .inner-box {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .company-block .inner-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .company-block .content {
            text-align: center;
        }
        .company-block .company-logo {
            margin-bottom: 15px;
        }
        .company-block h4 {
            margin-bottom: 10px;
        }
        .company-block h4 a {
            color: #66022b;
            text-decoration: none;
            font-weight: 600;
        }
        .company-block .company-info {
            list-style: none;
            padding: 0;
            margin: 15px 0;
        }
        .company-block .company-info li {
            color: #666;
            margin-bottom: 5px;
        }
        .company-block .company-info li i {
            color: #66022b;
            margin-right: 5px;
        }
        .company-block .btn-box {
            margin-top: 15px;
        }
        .company-block .theme-btn {
            background-color: #66022b;
            color: #fff;
            padding: 8px 20px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .company-block .theme-btn:hover {
            background-color: #4a011f;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const secteurFilter = document.getElementById('secteur-filter');
            const entreprisesList = document.getElementById('entreprises-list');

            secteurFilter.addEventListener('change', function() {
                const selectedSecteur = this.value;
                const entreprises = document.querySelectorAll('.company-block');

                entreprises.forEach(entreprise => {
                    const secteur = entreprise.querySelector('.company-info li:nth-child(2)').textContent.trim();
                    if (!selectedSecteur || secteur === selectedSecteur) {
                        entreprise.style.display = 'block';
                    } else {
                        entreprise.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection 