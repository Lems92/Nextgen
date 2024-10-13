@extends('dashboard-layout')

@section('title', 'NextGen - Explorer offre')

@section('content')

    @include('header.dashboard-header')

    <section class="ls-section">
        <div class="auto-container">
            <div class="filters-backdrop"></div>
            <div class="row">
                @foreach($offers as $offre)
                    <div class="job-block">
                        <div class="inner-box">
                            <div class="content">
                                <span class="company-logo">
                                    <img src="{{ asset('images/resource/company-logo/' . $offre->logo) }}" alt="">
                                </span>
                                <h4>
                                    <a href="{{ route('offers.show', ['id' => $offre->id]) }}">{{ $offre->titre_poste }}</a>
                                </h4>
                                <ul class="job-info">
                                    <li><span class="icon flaticon-briefcase"></span> {{ $offre->type_contrat }}
                                    </li>
                                    <li><span class="icon flaticon-map-locator"></span> {{ $offre->lieu_poste }}
                                    </li>
                                    <li><span class="icon flaticon-clock-3"></span> Posté
                                        le {{ $offre->date_debut->format('d M Y') }}</li>
                                    <li><span class="icon flaticon-money"></span>
                                    </li>
                                </ul>
                                <ul class="job-other-info">
                                    <li class="time">{{ $offre->duree_contrat }}</li>
                                    <li class="privacy">Disponible</li>
                                    <li class="required">Urgent</li>
                                </ul>
                                <form id="application-form-{{ $offre->id }}"
                                      action="{{ route('offers.apply', ['id' => $offre->id]) }}" method="POST">
                                    @csrf
                                    <button type="button" class="theme-btn btn-style-one"
                                            onclick="confirmApply({{ $offre->id }})">Postuler
                                    </button>
                                </form>


                            </div>

                        </div>
                    </div>
                @endforeach
                <div class="ls-show-more">
                    <p>Showing 36 of 497 Jobs</p>
                    <div class="bar"><span class="bar-inner" style="width: 40%"></span></div>
                    <button class="show-more">Show More</button>
                </div>
            </div>
        </div>
    </section>


    <script>
        function confirmApply(offreId) {
            if (confirm("Êtes-vous sûr de vouloir postuler pour ce poste ?")) {
                // Soumet le formulaire si l'utilisateur confirme
                document.getElementById('application-form-' + offreId).submit();
            }
        }
    </script>
@endsection
