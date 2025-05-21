@extends('dashboard-layout')

@section('title', isset($offre) ? $offre->titre_poste : 'NextGen - Publier une offre')

@section('content')

@include('header.dashboard-header')

<div class="page-wrapper">
    <div class="preloader"></div>

    <section class="contact-section bgc-home20">
        <div class="auto-container">
            <div class="upper-title-box">
                @if(isset($offre))
                    <h3>Modifier l'offre</h3>
                @else
                    <h3>Publier une offre</h3>
                @endif
                <!--<div class="text">Remplissez le formulaire pour publier une offre</div>-->
            </div>

            <div class="form-container">

                @php
                    // Compétences techniques
                    $competencesTechniquesRaw = isset($offre) ? ($offre->competences_techniques ?? '[]') : '[]';
                    $competencesTechniquesArray = is_string($competencesTechniquesRaw) ? json_decode($competencesTechniquesRaw, true) : [];
                    if (!is_array($competencesTechniquesArray)) $competencesTechniquesArray = [];
                    $competencesTechniquesChecked = old('competences_techniques', $competencesTechniquesArray);
                    $competencesTechniquesCheckedLower = array_map('mb_strtolower', array_map('trim', $competencesTechniquesChecked));

                    // Compétences transversales
                    $competencesTransversalesRaw = isset($offre) ? ($offre->competences_transversales ?? '[]') : '[]';
                    $competencesTransversalesArray = is_string($competencesTransversalesRaw) ? json_decode($competencesTransversalesRaw, true) : [];
                    if (!is_array($competencesTransversalesArray)) $competencesTransversalesArray = [];
                    $competencesTransversalesChecked = old('competences_transversales', $competencesTransversalesArray);

                    // Langues requises
                    $languesRequisesRaw = isset($offre) ? ($offre->langues_requises ?? '[]') : '[]';
                    $languesRequisesArray = is_string($languesRequisesRaw) ? json_decode($languesRequisesRaw, true) : [];
                    if (!is_array($languesRequisesArray)) $languesRequisesArray = [];
                    $languesRequisesChecked = old('langues_requises', $languesRequisesArray);


                    dump('offre:', $offre);
                    dump('competencesTechniquesRaw:', $competencesTechniquesRaw);
                    dump('competencesTechniquesArray:', $competencesTechniquesArray);
                    dump('competencesTechniquesChecked:', $competencesTechniquesChecked);
                @endphp

                <form action="{{ isset($offre) ? route('entreprise.offres.update', ['offre' => $offre->slug]) : route('entreprise.offres.store') }}" method="POST" class="default-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12">
                            <label for="titre_poste">Titre du poste</label>
                            <input type="text" id="titre_poste" name="titre_poste" value="{{old('titre_poste', isset($offre) ? $offre->titre_poste : '')}}" placeholder="Saisissez le titre du poste proposé" required>
                            <x-input-error :messages="$errors->get('titre_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="type_contrat">Type de contrat</label>
                            <select id="type_contrat" name="type_contrat" class="chosen-select" required>
                                @foreach($type_contrats as $contrat)
                                    <option value="{{$contrat->sigle}}" {{ old('type_contrat', isset($offre) ? $offre->type_contrat : '') == $contrat->sigle ? 'selected' : '' }}>{{$contrat->libelle}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('type_contrat')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="duree_contrat">Durée du contrat</label>
                            <select id="duree_contrat" name="duree_contrat" class="chosen-select" required>
                                @foreach($duree_contrats as $duree)
                                    <option value="{{$duree->sigle}}" {{ old('duree_contrat', isset($offre) ? $offre->duree_contrat : '') == $duree->sigle ? 'selected' : '' }}>{{$duree->libelle}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('duree_contrat')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="lieu_poste">Lieu du poste</label>
                            <select id="lieu_poste" name="lieu_poste" class="chosen-select" required>
                                @foreach($lieu_postes as $lieu)
                                    <option value="{{$lieu->sigle}}" {{ old('lieu_contrat', isset($offre) ? $offre->lieu_poste : '') == $lieu->sigle ? 'selected' : '' }}>{{$lieu->libelle}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('lieu_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="date_debut">Date de début</label>
                            <input type="date" id="date_debut" value="{{old('date_debut', isset($offre) ? $offre->date_debut->format('Y-m-d') : null)}}" name="date_debut" required>
                            <x-input-error :messages="$errors->get('date_debut')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="description_poste">Description du poste</label>
                            <textarea id="description_poste" name="description_poste" placeholder="Décrivez les responsabilités principales et les missions du poste..." required>{{ old('description_poste', isset($offre) ? nl2br(e($offre->description_poste)) : '') }}</textarea>
                            <x-input-error :messages="$errors->get('description_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="competences_techniques">Compétences techniques requises</label>
                            <div id="competences_techniques" class="checkbox-group">
                                @foreach($competences_techniques as $competence_technique)
                                    <label class="styled-checkbox">
                                        <input type="checkbox" name="competences_techniques[]" value="{{$competence_technique->sigle}}" 
                                            {{ in_array(normalize($competence_technique->sigle), $competencesTechniquesCheckedNormalized) ? 'checked' : '' }}>
                                        {{$competence_technique->libelle}}
                                        <small style="color:red">
                                            [valeur: {{ $competence_technique->sigle }} | 
                                            comparé à: {{ implode(',', $competencesTechniquesChecked) }}]
                                        </small>
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('competences_techniques')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="competences_transversales">Compétences transversales recherchées</label>
                            <div id="competences_transversales" class="checkbox-group">
                                @foreach($competences_transversales as $competence_transversale)
                                    <label class="styled-checkbox">
                                        <input type="checkbox" name="competences_transversales[]" value="{{$competence_transversale->sigle}}" 
                                            {{ in_array($competence_transversale->sigle, $competencesTransversalesChecked) ? 'checked' : '' }}>
                                        {{$competence_transversale->libelle}}
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('competences_transversales')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="langues_requises">Langues Requises</label>
                            <div id="langues_requises" class="checkbox-group">
                                @foreach($langues as $langue)
                                    <label class="styled-checkbox">
                                        <input type="checkbox" name="langues_requises[]" value="{{$langue->sigle}}" 
                                            {{ in_array($langue->sigle, $languesRequisesChecked) ? 'checked' : '' }}>
                                        {{$langue->libelle}}
                                    </label>
                                @endforeach
                            </div>
                            <x-input-error :messages="$errors->get('langues_requises')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="avantages">Avantages offerts</label>
                            <textarea id="avantages" name="avantages" placeholder="Décrivez les avantages associés au poste..." required>{{ old('avantages', isset($offre) ? nl2br(e($offre->avantages)) : '') }}</textarea>
                            <x-input-error :messages="$errors->get('avantages')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="date_limite_candidature">Date limite de candidature</label>
                            <input type="date" id="date_limite_candidature" value="{{old('date_limite_candidature', isset($offre) ? $offre->date_limite_candidature->format('Y-m-d') : null)}}" name="date_limite_candidature" required>
                            <x-input-error :messages="$errors->get('date_limite_candidature')" class="mt-2" />
                        </div>

                        @php
                            $user = auth()->user();
                            $subscription = $user->subscription;
                            $canFeature = in_array($subscription->name, ['Premium', 'Gold']);
                        @endphp

                        @if($canFeature)
                            <div class="form-group col-lg-12 col-md-12">
                                <label class="styled-checkbox">
                                    <input type="checkbox" name="mise_en_avant" value="1" {{ old('mise_en_avant', isset($offre) ? $offre->mise_en_avant : false) ? 'checked' : '' }}>
                                    Mettre en avant cette offre (Urgent)
                                </label>
                                @if($subscription->name === 'Premium')
                                    <small class="text-muted d-block mt-2">Vous pouvez avoir une seule offre mise en avant par mois avec l'abonnement Premium.</small>
                                @endif
                            </div>
                        @endif

                        <div class="form-group col-lg-12 col-md-12 text-right">
                            <button class="theme-btn btn-style-one" type="submit">@if(isset($offre)) Modifier l'offre @else Publier l'offre @endif</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


</div>
        <style>
.form-group.text-right {
    text-align: center; /* Centre le bouton horizontalement */
}

.theme-btn.btn-style-one {
    display: inline-block; /* Assure que le bouton reste à sa taille normale */
    margin: 0 auto; /* Centre le bouton si nécessaire */
}
    /* Style pour le groupe de checkboxes */
.checkbox-group {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Colonnes dynamiques */
    gap: 15px; /* Espacement entre les éléments */
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: #f9f9f9;
}

/* Style pour chaque checkbox */
.styled-checkbox {
    display: flex;
    align-items: center;
    gap: 10px; /* Espacement entre la case et le texte */
    font-size: 14px;
    color: #333;
    padding: 10px;
    border: 1px solid #ddd; /* Bordure autour de chaque case */
    border-radius: 5px; /* Coins arrondis */
    background-color: #fff; /* Couleur de fond */
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

/* Effet au survol */
.styled-checkbox:hover {
    border-color: #66022b; /* Couleur de bordure au survol */
    background-color: #f1f1f1; /* Couleur de fond au survol */
}

/* Style pour les cases cochées */
.styled-checkbox input[type="checkbox"] {
    accent-color: #66022b; /* Couleur personnalisée pour les cases cochées */
}
    .form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .form-group label {
        font-weight: bold;
    }

    .form-group select[multiple] {
        height: auto;
    }
    .upper-title-box{
        text-align: center;
        padding-top: 20px
    }
</style>
@endsection
