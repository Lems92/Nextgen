@extends('dashboard-layout')

@section('title', 'NextGen - Shortlist VIP')

@section('content')

@include('header.dashboard-header')

<section class="user-dashboard">
    <div class="dashboard-outer">
        <div class="upper-title-box">
            <h3>Shortlist VIP - Meilleurs Candidats</h3>
        </div>
        <div class="col-lg-12">
            <div class="ls-widget">
                <div class="tabs-box">
                    <div class="widget-title">
                        <h4>Candidats Pré-sélectionnés</h4>
                    </div>
                    <div class="widget-content">
                        <div class="tabs-box">
                            <div class="aplicants-upper-bar">
                                <h6>Total des candidats: {{ count($candidats) }}</h6>
                            </div>

                            <div class="tabs-content">
                                <div class="tab active-tab" id="totals">
                                    <div class="row">
                                        @foreach($candidats as $candidat)
                                            <div class="candidate-block-three col-lg-6 col-md-12 col-sm-12">
                                              @if($candidat->offres_postules && $candidat->offres_postules->first())
                                                    <h4>Poste postulé : {{ $candidat->offres_postules->first()->titre_poste }}</h4>
                                                @endif
                                                <div class="inner-box">
                                                    <div class="content">
                                                        <figure class="image">
                                                            @if($candidat->profile_picture)
                                                                <img src="{{ asset('storage/' . $candidat->profile_picture) }}" alt="{{ $candidat->prenom }}">
                                                            @else
                                                                <img src="{{ asset('images/resource/candidate-1.png') }}" alt="{{ $candidat->prenom }}">
                                                            @endif
                                                        </figure>
                                                        <h4 class="name">
                                                            <a href="#">{{ $candidat->prenom }} {{ $candidat->nom }}</a>
                                                            <span class="badge bg-success">Score: {{ number_format($candidat->score, 1) }}</span>
                                                        </h4>
                                                        <ul class="candidate-info">
                                                            @if($candidat->domaine_etudes)
                                                                <li class="designation">{{ $candidat->domaine_etudes }}</li>
                                                            @endif
                                                            @if($candidat->ville)
                                                                <li><span class="icon flaticon-map-locator"></span> {{ $candidat->ville }}, {{ $candidat->pays }}</li>
                                                            @endif
                                                            @if($candidat->niveau_etudes)
                                                                <li><i class="las la-university"></i>{{ $candidat->niveau_etudes }}</li>
                                                            @endif
                                                            
                                                        </ul>
                                                        
                                                        @if(is_array($candidat->competences_techniques) && count($candidat->competences_techniques))
                                                            <div class="competences-section">
                                                                <h5>Compétences Techniques</h5>
                                                                <ul class="post-tags">
                                                                    @foreach($candidat->competences_techniques as $competence)
                                                                        <li><a href="#">{{ $competence }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif

                                                        @if(is_array($candidat->competences_langues) && count($candidat->competences_langues))
                                                            <div class="langues-section">
                                                                <h5>Langues</h5>
                                                                <ul class="post-tags">
                                                                    @foreach($candidat->competences_langues as $langue)
                                                                        <li><a href="#">{{ $langue }}</a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="option-box">
                                                      <ul class="option-list">
                                                          <!-- Voir le profil -->
                                                          <li>
                                                              <button onclick="window.location.href='{{ route('etudiants.portfolio', ['etudiant' => $candidat->slug]) }}'" data-text="Voir le portfolio">
                                                                  <span class="la la-eye"></span>
                                                              </button>
                                                          </li>
                                                          <!-- Approuver -->
                                                          <li>
                                                              <form action="{{ route('candidats.approvePage', ['id' => $candidat->id]) }}" method="GET">
                                                                  @csrf
                                                                  <input type="hidden" name="offre_id" value="{{ $candidat->offres_postules->first()->id ?? '' }}">
                                                                  <button type="submit" data-text="Approuver">
                                                                      <span class="la la-check-circle"></span>
                                                                  </button>
                                                              </form>
                                                          </li>
                                                          <!-- Recruter -->
                                                          <li>
                                                              <form action="{{ route('candidats.recruitPage', ['id' => $candidat->id]) }}" method="GET" onsubmit="return confirm('Êtes-vous sûr de vouloir recruter ce candidat ?');">
                                                                  @csrf
                                                                  <input type="hidden" name="offre_id" value="{{ $candidat->offres_postules->first()->id ?? '' }}">
                                                                  <button type="submit" data-text="Recruter">
                                                                      <span class="la la-user-plus"></span>
                                                                  </button>
                                                              </form>
                                                          </li>
                                                          <!-- Rejeter -->
                                                          <li>
                                                              <form action="{{ route('candidats.rejectPage', ['id' => $candidat->id]) }}" method="GET" onsubmit="return confirm('Êtes-vous sûr de vouloir rejeter ce candidat ?');">
                                                                  @csrf
                                                                  <input type="hidden" name="offre_id" value="{{ $candidat->offres_postules->first()->id ?? '' }}">
                                                                  <button type="submit" data-text="Rejeter">
                                                                      <span class="la la-times-circle"></span>
                                                                  </button>
                                                              </form>
                                                          </li>
                                                      </ul>
                                                  </div>
                                                </div>
                                            </div>
                                        @endforeach
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

@endsection
