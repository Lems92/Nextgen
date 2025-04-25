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
            <div class="row">
                <div class="ui-block col-md-6 col-sm-12">
                    <a href="{{ route('entreprise.offres') }}" class="ui-item-link">
                        <div class="ui-item">
                            <div class="left">
                                <i class="icon flaticon-briefcase"></i>
                            </div>
                            <div class="right">
                                <h4>{{count($user->userable->offres)}}</h4>
                                <p>Offres publiées</p>
                            </div>
                        </div>
                    </a>
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

    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Gérer les emplois</h3>
                <div class="text">Prêts à reprendre ?</div>
            </div>

            <div class="col-lg-12">
                <!-- Ls widget -->
                <div class="ls-widget">
                    <div class="tabs-box">
                        <div class="widget-title">
                            <h4>Mes offres d'emplois</h4>
                            <!--
                            <div class="chosen-outer">
                                Tabs Box
                                <select class="chosen-select">
                                    <option>Last 6 Months</option>
                                    <option>Last 12 Months</option>
                                    <option>Last 16 Months</option>
                                    <option>Last 24 Months</option>
                                    <option>Last 5 year</option>
                                </select>
                            </div>-->
                        </div>

                        <div class="widget-content">
                            <div class="table-outer">
                                <table class="default-table manage-job-table">
                                    <thead>
                                    <tr>
                                        <th>Titre du poste</th>
                                        <th>Candidatures</th>
                                        <th>Date de publication</th>
                                        <th>Date limite</th>
                                        <th>Etat</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($offres as $offre)
                                        <tr>
                                            <td>
                                                <h6>{{$offre->titre_poste}}</h6>
                                                <span class="info"><i class="icon flaticon-map-locator"></i> {{$offre->lieu_poste}}</span>
                                            </td>
                                            <td class="applied"><a href="#">{{count($offre->etudiants)}} candidature(s)</a></td>
                                            <td>{{ $offre->created_at->format('j F Y') }}</td>
                                            <td>{{ $offre->date_limite_candidature->format('j F Y')}}</td>
                                            <td class="status">Active</td>
                                            <td>
                                                <div class="option-box">
                                                    <ul class="option-list">
                                                        <li>
                                                            <a href="{{route('entreprise.offres.show', ['offre' => $offre->slug])}}" data-text="Voir l'offre"><span
                                                                    class="la la-eye"></span></a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('entreprise.offres.edit', ['offre' => $offre->slug])}}" data-text="Modifier l'offre"><span
                                                                    class="la la-pencil"></span></a>
                                                        </li>
                                                        <li>
                                                            <form method="post" id="delete_offre_form{{$offre->id}}" action="{{route('entreprise.offres.delete', ['offre' => $offre->slug])}}">
                                                                @csrf
                                                            </form>
                                                            <button onclick="deleteOffre('delete_offre_form{{$offre->id}}')" data-text="Supprimer l'offre"><span
                                                                    class="la la-trash"></span></button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-start">Aucun enregistrement trouvé !</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
