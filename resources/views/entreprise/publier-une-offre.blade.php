@extends('dashboard-layout')

@section('title', 'Publier une offre')

@section('content')

@include('header.dashboard-header')

<div class="page-wrapper">
    <div class="preloader"></div>

    <section class="contact-section bgc-home20">
        <div class="auto-container">
            <div class="upper-title-box">
                <h3>Publier une offre</h3>
                <div class="text">Remplissez le formulaire pour publier une offre</div>
            </div>

            <div class="form-container">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif


                <form action="{{ route('entreprise.offres.store') }}" method="POST" class="default-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-lg-12 col-md-12 mt-4">
                            <label for="titre_poste">Titre du poste</label>
                            <input type="text" id="titre_poste" name="titre_poste" value="{{old('titre_poste')}}" placeholder="Saisissez le titre du poste proposé" required>
                            <x-input-error :messages="$errors->get('titre_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="type_contrat">Type de contrat</label>
                            <select id="type_contrat" name="type_contrat" class="chosen-select" required>
                                <option {{ old('type_contrat') == 'Stage' ? 'selected' : '' }}>Stage</option>
                                <option {{ old('type_contrat') == 'CDI' ? 'selected' : '' }}>CDI</option>
                                <option {{ old('type_contrat') == 'CDD' ? 'selected' : '' }}>CDD</option>
                                <option {{ old('type_contrat') == 'Alternance' ? 'selected' : '' }}>Alternance</option>
                                <option {{ old('type_contrat') == 'Freelance / Indépendant' ? 'selected' : '' }}>Freelance / Indépendant</option>
                                <option {{ old('type_contrat') == 'Intérim' ? 'selected' : '' }}>Intérim</option>
                                <option {{ old('type_contrat') == 'Apprentissage' ? 'selected' : '' }}>Apprentissage</option>
                            </select>
                            <x-input-error :messages="$errors->get('type_contrat')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="duree_contrat">Durée du contrat</label>
                            <select id="duree_contrat" name="duree_contrat" class="chosen-select" required>
                                <option {{ old('duree_contrat') == 'Moins de 1 mois' ? 'selected' : '' }}>Moins de 1 mois</option>
                                <option {{ old('duree_contrat') == '1 à 3 mois' ? 'selected' : '' }}>1 à 3 mois</option>
                                <option {{ old('duree_contrat') == '3 à 6 mois' ? 'selected' : '' }}>3 à 6 mois</option>
                                <option {{ old('duree_contrat') == 'Plus de 6 mois' ? 'selected' : '' }}>Plus de 6 mois</option>
                            </select>
                            <x-input-error :messages="$errors->get('duree_contrat')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="lieu_poste">Lieu du poste</label>
                            <select id="lieu_poste" name="lieu_poste" class="chosen-select" required>
                                <option {{ old('lieu_poste') == 'Antananarivo' ? 'selected' : '' }}>Antananarivo</option>
                                <option {{ old('lieu_poste') == 'Toamasina' ? 'selected' : '' }}>Toamasina</option>
                                <option {{ old('lieu_poste') == 'Mahajanga' ? 'selected' : '' }}>Mahajanga</option>
                                <option {{ old('lieu_poste') == 'Fianarantsoa' ? 'selected' : '' }}>Fianarantsoa</option>
                                <option {{ old('lieu_poste') == 'Antsirabe' ? 'selected' : '' }}>Antsirabe</option>
                                <option {{ old('lieu_poste') == 'Nosy Be' ? 'selected' : '' }}>Nosy Be</option>
                            </select>
                            <x-input-error :messages="$errors->get('lieu_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-6 col-md-12">
                            <label for="date_debut">Date de début</label>
                            <input type="date" id="date_debut" value="{{old('date_debut')}}" name="date_debut" required>
                            <x-input-error :messages="$errors->get('date_debut')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="description_poste">Description du poste</label>
                            <textarea id="description_poste" name="description_poste" placeholder="Décrivez les responsabilités principales et les missions du poste..." required>{{old('description_poste')}}</textarea>
                            <x-input-error :messages="$errors->get('description_poste')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="comptetences_techniques">Compétences techniques requises</label>
                            <select id="comptetences_techniques" name="competences_techniques[]" class="chosen-select multiple" multiple required>
                                <option>Bureautique</option>
                                <option>Programmation</option>
                                <option>Gestion de Bases de Données</option>
                                <option>Systèmes d'Information</option>
                                <option>Cybersécurité</option>
                            </select>
                            <x-input-error :messages="$errors->get('competences_techniques')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="competences_transversales">Compétences transversales recherchées</label>
                            <select id="competences_transversales" name="competences_transversales[]" class="chosen-select multiple" multiple required>
                                <option>Communication écrite et orale</option>
                                <option>Esprit d'équipe et collaboration</option>
                                <option>Capacité d'analyse et résolution de problèmes</option>
                                <option>Leadership et gestion du temps</option>
                                <option>Adaptabilité et gestion du changement</option>
                            </select>
                            <x-input-error :messages="$errors->get('competences_transversales')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="langues_requises">Langues Requises</label>
                            <select id="langues_requises" name="langues_requises[]" class="chosen-select multiple" multiple required>
                                <option>Anglais</option>
                                <option>Français</option>
                                <option>Espagnol</option>
                                <option>Allemand</option>
                                <option>Italien</option>
                                <option>Portugais</option>
                                <option>Arabe</option>
                                <option>Mandarin</option>
                            </select>
                            <x-input-error :messages="$errors->get('langues_requises')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="avantages">Avantages offerts</label>
                            <textarea id="avantages" name="avantages" placeholder="Décrivez les avantages associés au poste...">{{old('avantages')}}</textarea>
                            <x-input-error :messages="$errors->get('avantages')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12">
                            <label for="date_limite_candidature">Date limite de candidature</label>
                            <input type="date" id="date_limite_candidature" value="{{old('date_limite_candidature')}}" name="date_limite_candidature" required>
                            <x-input-error :messages="$errors->get('date_limite_candidature')" class="mt-2" />
                        </div>

                        <div class="form-group col-lg-12 col-md-12 text-right">
                            <button class="theme-btn btn-style-one" type="submit">Publier</button>
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
