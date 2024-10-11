@extends('dashboard-layout')

@section('title', $offre ? $offre->titre_poste : 'Publier une offre')

@section('content')

@include('header.dashboard-header')

<div class="page-wrapper">
    <div class="preloader"></div>

    <section class="contact-section bgc-home20">
        <div class="auto-container">
            <div class="upper-title-box">
                @if($offre)
                    <h3>Modifier l'offre</h3>
                @else
                    <h3>Publier une offre</h3>
                @endif
                <!--<div class="text">Remplissez le formulaire pour publier une offre</div>-->
            </div>

            <div class="form-container">

                <form action="{{ $offre ? route('entreprise.offres.update', ['offre' => $offre->slug]) : route('entreprise.offres.store') }}" method="POST" class="default-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12">
                            <label for="titre_poste">Titre du poste</label>
                            <input type="text" id="titre_poste" name="titre_poste" value="{{old('titre_poste', $offre->titre_poste)}}" placeholder="Saisissez le titre du poste proposé" required>
                            <x-input-error :messages="$errors->get('titre_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="type_contrat">Type de contrat</label>
                            <select id="type_contrat" name="type_contrat" class="chosen-select" required>
                                @foreach($type_contrats as $contrat)
                                    <option value="{{$contrat->sigle}}" {{ old('type_contrat', $offre->type_contrat) == $contrat->sigle ? 'selected' : '' }}>{{$contrat->libelle}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('type_contrat')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="duree_contrat">Durée du contrat</label>
                            <select id="duree_contrat" name="duree_contrat" class="chosen-select" required>
                                @foreach($duree_contrats as $duree)
                                    <option value="{{$duree->sigle}}" {{ old('duree_contrat', $offre->duree_contrat) == $duree->sigle ? 'selected' : '' }}>{{$duree->libelle}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('duree_contrat')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="lieu_poste">Lieu du poste</label>
                            <select id="lieu_poste" name="lieu_poste" class="chosen-select" required>
                                @foreach($lieu_postes as $lieu)
                                    <option value="{{$lieu->sigle}}" {{ old('lieu_contrat', $offre->lieu_poste) == $lieu->sigle ? 'selected' : '' }}>{{$lieu->libelle}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('lieu_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="date_debut">Date de début</label>
                            <input type="date" id="date_debut" value="{{old('date_debut', $offre->date_debut ? $offre->date_debut->format('Y-m-d') : null)}}" name="date_debut" required>
                            <x-input-error :messages="$errors->get('date_debut')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="description_poste">Description du poste</label>
                            <textarea id="description_poste" name="description_poste" placeholder="Décrivez les responsabilités principales et les missions du poste..." required>{{old('description_poste', $offre->description_poste)}}</textarea>
                            <x-input-error :messages="$errors->get('description_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="comptetences_techniques">Compétences techniques requises</label>
                            <select id="comptetences_techniques" name="competences_techniques[]" class="chosen-select multiple" multiple required>
                                @foreach($competences_techniques as $competence_technique)
                                    <option value="{{$competence_technique->sigle}}"
                                        {{ in_array($competence_technique->sigle, old('competences_techniques', $offre->competences_techniques ?? [])) ? 'selected' : '' }}>
                                        {{$competence_technique->libelle}}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('competences_techniques')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="competences_transversales">Compétences transversales recherchées</label>
                            <select id="competences_transversales" name="competences_transversales[]" class="chosen-select multiple" multiple required>
                                @foreach($competences_transversales as $competence_transversale)
                                    <option value="{{$competence_transversale->sigle}}"
                                        {{ in_array($competence_transversale->sigle, old('competences_transversales', $offre->competences_transversales ?? [])) ? 'selected' : '' }}>
                                        {{$competence_transversale->libelle}}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('competences_transversales')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="langues_requises">Langues Requises</label>
                            <select id="langues_requises" name="langues_requises[]" class="chosen-select multiple" multiple required>
                                @foreach($langues as $langue)
                                    <option value="{{$langue->sigle}}"
                                        {{ in_array($langue->sigle, old('langues_requises', $offre->langues_requises ?? [])) ? 'selected' : '' }}>
                                        {{$langue->libelle}}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('langues_requises')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="avantages">Avantages offerts</label>
                            <textarea id="avantages" name="avantages" placeholder="Décrivez les avantages associés au poste...">{{old('avantages', $offre->avantages)}}</textarea>
                            <x-input-error :messages="$errors->get('avantages')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="date_limite_candidature">Date limite de candidature</label>
                            <input type="date" id="date_limite_candidature" value="{{old('date_limite_candidature', $offre->date_limite_candidature ? $offre->date_limite_candidature->format('Y-m-d') : null)}}" name="date_limite_candidature" required>
                            <x-input-error :messages="$errors->get('date_limite_candidature')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12 text-right">
                            <button class="theme-btn btn-style-one" type="submit">@if($offre) Modifier l'offre @else Publier l'offre @endif</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>


</div>
        <style>
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
