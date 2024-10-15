@extends('dashboard-layout')

@section('title', 'NextGen - Dashboard')

@section('content')

    @include('header.dashboard-header')

    @php
        use App\Models\Offre;use Illuminate\Support\Facades\Auth;
        $user = Auth::user();
        $user->load('userable');

        $offre_count = Offre::all()->count();

        $offres_postule_recemment = $user->userable->offres_postules;
    @endphp

        <!-- Dashboard -->
    <section class="user-dashboard">
        <div class="dashboard-outer">
            <div class="upper-title-box">
                <h3>Howdy, {{$user->userable->prenom}}!!</h3>
            </div>
            <div class="row">
                <div class="col">
                    <div class="ui-item">
                        <div class="left">
                            <i class="icon flaticon-briefcase"></i>
                        </div>
                        <div class="right">
                            <h4>{{count($user->userable->offres_postules)}}</h4>
                            <p>Offres postulés</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="ui-item ui-red">
                        <div class="left">
                            <i class="icon la la-file-invoice"></i>
                        </div>
                        <div class="right">
                            <h4>{{$offre_count}}</h4>
                            <p>Offres disponibles</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="ui-item ui-yellow">
                        <div class="left">
                            <i class="icon la la-comment-o"></i>
                        </div>
                        <div class="right">
                            <h4>74</h4>
                            <p>Messages</p>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-12">
                <!-- applicants Widget -->
                <div class="applicants-widget ls-widget">
                    <div class="widget-title">
                        <h4>Offres postulées récemment</h4>
                    </div>
                    <div class="widget-content">
                        <div class="row">
                            <!-- Job Block -->
                            @php
                            $offres = [];
                            $counter = 0;
                            for($i=0; $i<count($offres_postule_recemment); $i++) {
                                $offres[] = $offres_postule_recemment[$i];
                                $counter++;
                                if($counter == 2) {
                                    break;
                                }
                            }
                            @endphp
                            @forelse($offres as $offre)
                                <div class="job-block col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner-box">
                                        <div class="content">
                                    <span class="company-logo">
                                        <img src="{{ asset('images/resource/company-logo/' . $offre->logo) }}" alt="">
                                    </span>
                                            <h4>
                                                <a href="{{ route('etudiants.offers.show', ['offre' => $offre->slug]) }}">{{ $offre->titre_poste }}</a>
                                            </h4>
                                            <ul class="job-info">
                                                <li><span class="icon flaticon-briefcase"></span> {{ $offre->type_contrat }}</li>
                                                <li><span class="icon flaticon-map-locator"></span> {{ $offre->lieu_poste }}</li>
                                                <li><span class="icon flaticon-clock-3"></span> Posté le {{ $offre->date_debut->format('d M Y') }}</li>
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="time">{{ $offre->duree_contrat }}</li>
                                                <li class="privacy">Disponible</li>
                                                <li class="required">Urgent</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <h3>Vous n'avez pas encore postulé à aucun offre !</h3>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
