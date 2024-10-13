@extends('app')

@section('title', 'Formulaire pour les Étudiants')

@section('content')

    @include('header.header')

    <div class="page-wrapper">
        <div class="preloader"></div>

        <!-- Formulaire d'Inscription Étudiant -->
        <section class="contact-section bgc-home20">
            <div class="auto-container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="sec-title -type-2 text-center">
                            <h2>Formulaire d'Inscription Étudiant</h2>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Veuillez corriger les erreurs ci-dessous et remplir convenablement le
                                    formulaire.</strong>
                            </div>
                        @endif

                        <form action="{{route('inscription.etudiant.post')}}" enctype="multipart/form-data"
                              method="POST">
                            @csrf
                            <fieldset class="form-section">
                                <legend><h4> Informations Personnelles </h4></legend>
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 mt-4">
                                        <label for="prenom" class="form-label">Prénom :</label>
                                        <input type="text" id="prenom" name="prenom" value="{{old('prenom')}}"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('prenom')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nom" class="form-label">Nom :</label>
                                        <input type="text" id="nom" name="nom" value="{{old('nom')}}"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('nom')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numero_telephone" class="form-label">Numéro de téléphone :</label>
                                        <input type="tel" id="numero_telephone" value="{{old('numero_telephone')}}"
                                               name="numero_telephone"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('numero_telephone')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date-naissance" class="form-label">Date de naissance :</label>
                                        <input type="date" id="date-naissance" name="date_naissance"
                                               value="{{old('date_naissance')}}"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('date_naissance')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="genre" class="form-label">Genre :</label>
                                        <select id="genre" name="genre" class="form-select" required>
                                            @foreach($genres as $genre)
                                                <option
                                                    value="{{$genre->sigle}}" {{ old('genre') == $genre->sigle ? 'selected' : '' }}>{{$genre->libelle}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('genre')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="adresse-postale" class="form-label">Adresse postale :</label>
                                        <input type="text" id="adresse-postale" value="{{old('adresse_postale')}}"
                                               name="adresse_postale"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('adresse_postale')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pays" class="form-label">Pays :</label>
                                        <select id="pays" name="pays" class="form-select" required>
                                            <option
                                                value="madagascar" {{ old('pays') == 'madagascar' ? 'selected' : '' }}>
                                                Madagascar
                                            </option>
                                            <option value="france" {{ old('pays') == 'france' ? 'selected' : '' }}>
                                                France
                                            </option>
                                        </select>
                                        <x-input-error :messages="$errors->get('pays')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="region" class="form-label">Région :</label>
                                        <select id="region" name="region" class="form-select" required>
                                            @foreach($mada_regions as $region)
                                                {{$region}}
                                                <option
                                                    value="{{$region}}" {{ old('region') == $region ? 'selected' : '' }}>{{$region}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('region')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ville" class="form-label">Ville :</label>
                                        <input type="text" id="ville" name="ville" value="{{old('ville')}}"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('ville')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code-postal" class="form-label">Code postal :</label>
                                        <input type="text" id="code-postal" value="{{old('code_postal')}}"
                                               name="code_postal" class="form-control"
                                               required>
                                        <x-input-error :messages="$errors->get('code_postal')" class="mt-2"/>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Éducation -->
                            <fieldset class="form-section">
                                <legend><h4>Éducation</h4></legend>
                                <div class="mb-3">
                                    <label for="nom-ecole" class="form-label">Nom de l'école ou de l'université
                                        :</label>
                                    <input type="text" id="nom-ecole" name="nom_ecole_universite"
                                           value="{{old('nom_ecole_universite')}}" class="form-control"
                                           required>
                                    <x-input-error :messages="$errors->get('nom_ecole_universite')" class="mt-2"/>
                                </div>
                                <div class="mb-3">
                                    <label for="domaine-etudes" class="form-label">Domaine d'études :</label>
                                    <select id="domaine-etudes" name="domaine_etudes" class="form-select" required>
                                        @foreach($domaines_etudes_categories as $categorie)
                                            <optgroup label="{{$categorie->name}}">
                                                @foreach($categorie->list_with_categories as $sous_cat)
                                                    <option value="{{$sous_cat->name}}"
                                                            title="{{$sous_cat->description}}"
                                                        {{ old('domaine_etudes') == $sous_cat->name ? 'selected' : '' }}
                                                    >{{$sous_cat->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('domaine_etudes')" class="mt-2"/>
                                </div>
                                <div class="mb-3">
                                    <label for="niveau-etudes" class="form-label">Niveau d'études :</label>
                                    <select id="niveau-etudes" name="niveau_etudes" class="form-select" required>
                                        @foreach($niveau_etudes as $niveau)
                                            <option
                                                value="{{$niveau->sigle}}" {{ old('niveau_etudes') == $niveau->sigle ? 'selected' : '' }}>{{$niveau->libelle}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('niveau_etudes')" class="mt-2"/>
                                </div>
                                <div class="mb-3">
                                    <label for="annee-diplome" class="form-label">Année d'obtention du diplôme ou année
                                        d'inscription en cours :</label>
                                    <input type="number" id="annee-diplome" value="{{old('annee_obtention_diplome')}}"
                                           name="annee_obtention_diplome"
                                           class="form-control"
                                           required>
                                    <x-input-error :messages="$errors->get('annee_obtention_diplome')" class="mt-2"/>
                                </div>
                            </fieldset>

                            <!-- Expérience Académique -->
                            <fieldset class="form-section">
                                <legend><h4>Expérience Académique</h4></legend>
                                <div class="mb-3">
                                    <h6>Stage Académique</h6>
                                    <p>ex: Stage de recherche, Stage en laboratoire, Stage en entreprise...</p>
                                    <div id="stage_academique_conteneur"></div>
                                    <button type="button" class="theme-btn btn-style-four"
                                            onclick="ajouterChamp('stage_academique')">Ajouter
                                    </button>
                                </div>

                                <div class="mb-3">
                                    <h6>Projet Académique</h6>
                                    <p>ex. Projet de groupe, projet individuel, projet fin d'étude, projet de
                                        recherche...</p>
                                    <div id="projet_academique_conteneur"></div>
                                    <button type="button" class="theme-btn btn-style-four"
                                            onclick="ajouterChamp('projet_academique')">Ajouter
                                    </button>
                                </div>

                                <div class="mb-3">
                                    <h6>Thèse et Mémoire</h6>
                                    <p>ex: Thèse de doctorat, Mémoire de Master, Mémoire de Licence, Dissertation...</p>
                                    <div id="these_memoire_conteneur"></div>
                                    <button type="button" class="theme-btn btn-style-four"
                                            onclick="ajouterChamp('these_memoire')">Ajouter
                                    </button>
                                </div>

                                <div class="mb-3">
                                    <h6>Réalisations</h6>
                                    <p>ex: Publication dans une revue académique, Présentation à une conférence
                                        universitaire, Récompense ou distinction académique, Participation à un concours
                                        académique...</p>
                                    <div id="realisations_conteneur"></div>
                                    <button type="button" class="theme-btn btn-style-four"
                                            onclick="ajouterChamp('realisations')">Ajouter
                                    </button>
                                </div>

                                <div class="mb-3">
                                    <h6>Cours Spécialisés</h6>
                                    <p>ex: Cours de spécialisation, Séminaire, Atelier spécialisé</p>
                                    <div id="cours_speciaux_conteneur"></div>
                                    <button type="button" class="theme-btn btn-style-four"
                                            onclick="ajouterChamp('cours_speciaux')">Ajouter
                                    </button>
                                </div>

                                <div class="mb-3">
                                    <h6>Autres Expériences</h6>
                                    <p>ex: Participation à des Evenements académiques, recherche, encadrement, activités
                                        Parascolaires; programmes d'échange, Certificats et diplômes
                                        complémentaires...</p>
                                    <div id="autres_experiences_conteneur"></div>
                                    <button type="button" class="theme-btn btn-style-four"
                                            onclick="ajouterChamp('autres_experiences')">Ajouter
                                    </button>
                                </div>
                            </fieldset>

                            <!-- Compétences -->
                            <fieldset class="form-section">
                                <legend><h4>Compétences</h4></legend>
                                <div class="mb-3">
                                    <label class="h6" for="competences_techniques">Compétences techniques</label>
                                    <select id="competences_techniques" name="competences_techniques[]"
                                            class="chosen-select" multiple>
                                        @foreach($competences_techniques as $comp)
                                            <option value="{{$comp->sigle}}"
                                                {{ in_array($comp->sigle, old('competences_techniques') ?? []) ? 'selected' : '' }}>
                                                {{$comp->libelle}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('competences_techniques')" class="mt-2"/>
                                </div>
                                <div class="mb-3">
                                    <label for="competences_en_recherche_et_analyse" class="h6">Compétences en Recherche
                                        et Analyse :</label>
                                    <select id="competences_en_recherche_et_analyse"
                                            name="competences_en_recherche_et_analyse[]" class="chosen-select" multiple>
                                        @foreach($competences_en_recherche_et_analyse as $comp)
                                            <option value="{{$comp->sigle}}"
                                                {{ in_array($comp->sigle, old('competences_en_recherche_et_analyse') ?? []) ? 'selected' : '' }}>
                                                {{$comp->libelle}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('competences_en_recherche_et_analyse')"
                                                   class="mt-2"/>
                                </div>
                                <div class="mb-3">
                                    <label for="competences_en_communication" class="h6">Compétences en Communication
                                        :</label>
                                    <select id="competences_en_communication" name="competences_en_communication[]"
                                            class="chosen-select" multiple>
                                        @foreach($competences_en_communication as $comp)
                                            <option value="{{$comp->sigle}}"
                                                {{ in_array($comp->sigle, old('competences_en_communication') ?? []) ? 'selected' : '' }}>
                                                {{$comp->libelle}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('competences_en_communication')"
                                                   class="mt-2"/>
                                </div>
                                <div class="mb-3">
                                    <h4>Compétences Transversales :</h4>
                                    <div>
                                        <label for="competences_interpersonnelles" class="h6">Compétences
                                            Interpersonnelles :</label>
                                        <select id="competences_interpersonnelles"
                                                name="competences_interpersonnelles[]" class="chosen-select" multiple>
                                            @foreach($competences_interpersonnelles as $comp)
                                                <option value="{{$comp->sigle}}"
                                                    {{ in_array($comp->sigle, old('competences_interpersonnelles') ?? []) ? 'selected' : '' }}>
                                                    {{$comp->libelle}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('competences_interpersonnelles')"
                                                       class="mt-2"/>
                                    </div>
                                    <div>
                                        <label for="competences_resolution_problemes" class="h6">Compétences en
                                            Résolution de Problèmes :</label>
                                        <select id="competences_resolution_problemes"
                                                name="competences_resolution_problemes[]" class="chosen-select"
                                                multiple>
                                            @foreach($competences_resolution_problemes as $comp)
                                                <option value="{{$comp->sigle}}"
                                                    {{ in_array($comp->sigle, old('competences_resolution_problemes') ?? []) ? 'selected' : '' }}>
                                                    {{$comp->libelle}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('competences_resolution_problemes')"
                                                       class="mt-2"/>
                                    </div>
                                    <div>
                                        <label for="competences_adaptabilite" class="h6">Compétences en Adaptabilité
                                            :</label>
                                        <select id="competences_adaptabilite" name="competences_adaptabilite[]"
                                                class="chosen-select" multiple>
                                            @foreach($competences_adaptabilite as $comp)
                                                <option value="{{$comp->sigle}}"
                                                    {{ in_array($comp->sigle, old('competences_adaptabilite') ?? []) ? 'selected' : '' }}>
                                                    {{$comp->libelle}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('competences_adaptabilite')"
                                                       class="mt-2"/>
                                    </div>
                                    <div>
                                        <label for="competences_gestion_stress" class="h6">Compétences en Gestion du
                                            Stress :</label>
                                        <select id="competences_gestion_stress" name="competences_gestion_stress[]"
                                                class="chosen-select" multiple>
                                            @foreach($competences_gestion_stress as $comp)
                                                <option value="{{$comp->sigle}}"
                                                    {{ in_array($comp->sigle, old('competences_gestion_stress') ?? []) ? 'selected' : '' }}>
                                                    {{$comp->libelle}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('competences_gestion_stress')"
                                                       class="mt-2"/>
                                    </div>
                                    <div>
                                        <label for="competences_leadership" class="h6">Compétences en Leadership
                                            :</label>
                                        <select id="competences_leadership" name="competences_leadership[]"
                                                class="chosen-select" multiple>
                                            @foreach($competences_leadership as $comp)
                                                <option value="{{$comp->sigle}}"
                                                    {{ in_array($comp->sigle, old('competences_leadership') ?? []) ? 'selected' : '' }}>
                                                    {{$comp->libelle}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('competences_leadership')" class="mt-2"/>
                                    </div>
                                    <div>
                                        <label for="competences_ethique_responsabilite" class="h6">Compétences en
                                            Éthique et Responsabilité :</label>
                                        <select id="competences_ethique_responsabilite"
                                                name="competences_ethique_responsabilite[]" class="chosen-select"
                                                multiple>
                                            @foreach($competences_ethique_responsabilite as $comp)
                                                <option value="{{$comp->sigle}}"
                                                    {{ in_array($comp->sigle, old('competences_ethique_responsabilite') ?? []) ? 'selected' : '' }}>
                                                    {{$comp->libelle}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('competences_ethique_responsabilite')"
                                                       class="mt-2"/>
                                    </div>
                                    <div>
                                        <label for="competences_gestion_financiere" class="h6">Compétences en Gestion
                                            Financière :</label>
                                        <select id="competences_gestion_financiere"
                                                name="competences_gestion_financiere[]" class="chosen-select" multiple>
                                            @foreach($competences_gestion_financiere as $comp)
                                                <option value="{{$comp->sigle}}"
                                                    {{ in_array($comp->sigle, old('competences_gestion_financiere') ?? []) ? 'selected' : '' }}>
                                                    {{$comp->libelle}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('competences_gestion_financiere')"
                                                       class="mt-2"/>
                                    </div>
                                    <div>
                                        <label for="competences_langues" class="h6">Compétences en Langues :</label>
                                        <select id="competences_langues" name="competences_langues[]"
                                                class="chosen-select" multiple>
                                            @foreach($competences_langues as $comp)
                                                <option value="{{$comp->sigle}}"
                                                    {{ in_array($comp->sigle, old('competences_langues') ?? []) ? 'selected' : '' }}>
                                                    {{$comp->libelle}}
                                                </option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('competences_langues')" class="mt-2"/>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Expérience Professionnelle -->
                            <fieldset class="form-section">
                                <legend><h4>Expérience Professionnelle</h4></legend>
                                <div class="mb-3">
                                    <h6>Expérience Professionnelle :</h6>
                                    <p>ex: Stage en Entreprise, Emplois à temps partiel, Expérience de travail
                                        pertinente, projets professionnels, bénévolat, entrepreneuriat, formations
                                        professionnelles, responsabilités additionnelles, expérience internationale,
                                        publications et contributions...</p>
                                    <div id="experiences_professionnelles_conteneur"></div>
                                    <button type="button" class="theme-btn btn-style-four"
                                            onclick="ajouterExperiencesPro()">Ajouter
                                    </button>
                                </div>
                            </fieldset>

                            <!-- Portfolio -->
                            <fieldset class="form-section">
                                <legend><h4>Portfolio</h4></legend>
                                <div class="mb-3">
                                    <label for="portfolio" class="form-label">Liens vers des projets, articles,
                                        créations artistiques :</label>
                                    <textarea id="portfolio" name="portfolio" class="form-control" rows="4"
                                              required>{{old('portfolio')}}</textarea>
                                    <x-input-error :messages="$errors->get('portfolio')" class="mt-2"/>
                                </div>
                            </fieldset>

                            <!-- Centres d'Intérêt -->
                            <fieldset class="form-section">
                                <legend><h4>Centres d'Intérêt</h4></legend>
                                <div class="mb-3">
                                    <label for="centres-interet" class="form-label">Hobbies et intérêts personnels
                                        :</label>
                                    <textarea id="centres-interet" name="centres_interet" class="form-control" rows="4"
                                              required>{{old('centres_interet')}}</textarea>
                                    <x-input-error :messages="$errors->get('centres_interet')" class="mt-2"/>
                                </div>
                            </fieldset>

                            <!-- Documents -->
                            <fieldset class="form-section">
                                <legend><h4>Documents</h4></legend>
                                <div class="mb-3">
                                    <label for="diplome" class="form-label">Diplôme :</label>
                                    <input type="file" id="diplome" name="document_diplome" class="form-control"
                                           accept=".pdf,.doc,.docx" required>
                                    <x-input-error :messages="$errors->get('document_diplome')" class="mt-2"/>
                                </div>
                                <div class="mb-3">
                                    <label for="document_recommandation" class="form-label">Lettre de recommandation
                                        :</label>
                                    <input type="file" id="document_recommandation" name="document_recommandation"
                                           class="form-control" accept=".pdf,.doc,.docx" required>
                                    <x-input-error :messages="$errors->get('document_recommandation')" class="mt-2"/>
                                </div>
                            </fieldset>

                            <!-- Préférences de Carrière -->
                            <fieldset class="form-section">
                                <legend><h4>Préférences de Carrière</h4></legend>

                                <!-- Secteur d'activité préféré -->
                                <div class="mb-3">
                                    <label for="secteur-activite" class="form-label">Secteur d'activité préféré
                                        :</label>
                                    <select id="secteur-activite" name="secteur_activite_preferer[]"
                                            class="chosen-select multiple" multiple>
                                        @foreach($secteur_activites_categories as $categorie)
                                            <optgroup label="{{$categorie->name}}">
                                                @foreach($categorie->list_with_categories as $sous_cat)
                                                    <option value="{{$sous_cat->name}}"
                                                            title="{{$sous_cat->description}}"
                                                        {{ old('secteur_activite_preferer') == $sous_cat->name ? 'selected' : '' }}
                                                    >{{$sous_cat->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('secteur_activite_preferer')" class="mt-2"/>
                                </div>

                                <!-- Type d'emploi recherché -->
                                <div class="mb-3">
                                    <label for="type-emploi" class="form-label">Type d'emploi recherché :</label>
                                    <select id="type-emploi" name="type_emploi_recherche[]"
                                            class="chosen-select multiples"
                                            multiple>
                                        @foreach($type_contrats as $contrat)
                                            <option value="{{$contrat->sigle}}"
                                                {{ in_array($contrat->sigle, old('type_emploi_recherche') ?? []) ? 'selected' : '' }}>
                                                {{$contrat->libelle}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('type_emploi_recherche')" class="mt-2"/>
                                </div>

                                <!-- Localisation géographique préférée -->
                                <div class="mb-3">
                                    <label for="localisation_geographique_preferee" class="form-label">Localisation
                                        géographique
                                        préférée :</label>
                                    <input type="text" id="localisation_geographique_preferee"
                                           name="localisation_geographique_preferee"
                                           value="{{old('localisation_geographique_preferee')}}"
                                           class="form-control" required>
                                    <x-input-error :messages="$errors->get('localisation_geographique_preferee')"
                                                   class="mt-2"/>
                                </div>
                            </fieldset>

                            <!-- Disponibilité de l’Étudiant Section -->
                            <fieldset class="form-section">
                                <legend><h4>Disponibilité de l’Étudiant</h4></legend>
                                <div class="form-group">
                                    <label for="duree_dispo">Durée de Disponibilité :</label>
                                    <select class="form-control" id="duree_dispo" name="duree_disponibilite">
                                        @foreach($duree_contrats as $duree)
                                            <option
                                                value="{{$duree->sigle}}" {{ old('duree_disponibilite') == $duree->sigle ? 'selected' : '' }}>{{$duree->libelle}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('duree_disponibilite')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <label for="semestre">Semestre en Cours :</label>
                                    <select class="form-control" id="semestre" name="semestre_cours">
                                        <option
                                            value="Semestre 1" {{old('semestre_cours') == 'Semestre 1' ? 'selected' : ''}}>
                                            Semestre 1
                                        </option>
                                        <option
                                            value="Semestre 2" {{old('semestre_cours') == 'Semestre 2' ? 'selected' : ''}}>
                                            Semestre 2
                                        </option>
                                    </select>
                                    <x-input-error :messages="$errors->get('semestre_cours')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <label for="vacances_ete">Vacances d'Été :</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="vacances_debut"
                                               value="{{old('vacances_ete_debut')}}"
                                               name="vacances_ete_debut" placeholder="Date début">
                                        <input type="date" class="form-control" id="vacances_fin"
                                               value="{{old('vacances_ete_fin')}}"
                                               name="vacances_ete_fin"
                                               placeholder="Date fin">
                                    </div>
                                    <x-input-error :messages="$errors->get('vacances_ete_debut')" class="mt-2"/>
                                    <x-input-error :messages="$errors->get('vacances_ete_fin')" class="mt-2"/>
                                </div>
                                <div class="form-group">
                                    <label for="vacances_dispo">Date disponible pendant les vacances d'été</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="dispo_debut"
                                               value="{{old('dates_disponibles_vacances_ete_debut')}}"
                                               name="dates_disponibles_vacances_ete_debut"
                                               placeholder="Date début">
                                        <input type="date" class="form-control" id="dispo_fin"
                                               value="{{old('dates_disponibles_vacances_ete_fin')}}"
                                               name="dates_disponibles_vacances_ete_fin"
                                               placeholder="Date fin">
                                    </div>
                                    <x-input-error :messages="$errors->get('dates_disponibles_vacances_ete_debut')"
                                                   class="mt-2"/>
                                    <x-input-error :messages="$errors->get('dates_disponibles_vacances_ete_fin')"
                                                   class="mt-2"/>
                                </div>
                            </fieldset>

                            <!-- Détails spécifiques (Inclusivité Entreprise) Section -->
                            <fieldset class="form-section">
                                <legend>Détails spécifiques (Inclusivité Entreprise)</legend>

                                <div class="form-group">
                                    <label for="accessibilite">Accessibilité :</label>
                                    <p>Avez-vous besoin d’aménagements spécifiques pour participer à des événements ou
                                        des activités ?</p>
                                    <select class="form-control" id="accessibilite" name="accessibilite">
                                        <option value="1" {{old('accesibilite') == '1' ? 'selected': ''}}>Oui</option>
                                        <option value="0" {{old('accesibilite') == '0' ? 'selected': ''}}>Non</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('accessibilite')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <label for="details_accessibilite">Si oui, veuillez préciser :</label>
                                    <textarea class="form-control" id="details_accessibilite"
                                              name="details_accessibilite" rows="3"
                                              placeholder="Précisez les aménagements spécifiques">{{old('details_accessibilite')}}</textarea>
                                    <x-input-error :messages="$errors->get('details_accessibilite')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <label for="origine_ethnique">Origine ethnique :</label>
                                    <select class="form-select" id="origine_ethnique" name="origine_ethnique">
                                        @foreach($ethnies as $foko)
                                            <option
                                                value="{{$foko}}" {{ old('origine_ethnique') == $foko ? 'selected' : '' }}>{{$foko}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('origine_ethnique')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <label for="statut_socio_economique">Statut socio-économique :</label>
                                    <select class="form-select" id="statut_socio_economique"
                                            name="statut_socio_economique">
                                        @foreach($statut_socio_economiques as $param)
                                            <option
                                                value="{{$param->sigle}}" {{ old('statut_socio_economique') == $param->sigle ? 'selected' : '' }}>{{$param->libelle}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('statut_socio_economique')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <label for="conditions_vie_specifiques">Conditions de vie spécifiques :</label>
                                    <select class="form-select" id="conditions_vie_specifiques"
                                            name="conditions_vie_specifiques">
                                        @foreach($conditions_vie_specifiques as $param)
                                            <option
                                                value="{{$param->sigle}}" {{ old('conditions_vie_specifiques') == $param->sigle ? 'selected' : '' }}>{{$param->libelle}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('conditions_vie_specifiques')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <label for="religion_belief">Religion ou croyance :</label>
                                    <select class="form-select" id="religion_belief" name="religion_belief">
                                        @foreach($religions as $param)
                                            <option
                                                value="{{$param->sigle}}" {{ old('religion_belief') == $param->sigle ? 'selected' : '' }}>{{$param->libelle}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('religion_belief')" class="mt-2"/>
                                </div>

                                <div class="form-group">
                                    <label for="orientation_sexuelle">Orientation sexuelle :</label>
                                    <select class="form-select" id="orientation_sexuelle" name="orientation_sexuelle">
                                        @foreach($orientation_sexuelles as $param)
                                            <option
                                                value="{{$param->sigle}}" {{ old('orientation_sexuelle') == $param->sigle ? 'selected' : '' }}>{{$param->libelle}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('orientation_sexuelle')" class="mt-2"/>
                                </div>
                            </fieldset>

                            <div class="text-center mt-4">
                                <button type="submit" class="theme-btn btn-style-one">Soumettre</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .sec-title {
            margin-top: 70px;
        }

        .contact-section {
            padding: 40px 0;
        }

        /* Style pour les titres de sections */
        .sec-title h2 {
            margin-bottom: 24px;
            font-size: 20px !important;
            color: #333;
        }

        /* Style pour les fieldsets */
        .form-section {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 30px;
            background: #f9f9f9;
        }

        .form-section legend {
            font-size: 20px;
            color: #66022b;
            border-bottom: 2px solid #66022b;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        /* Style pour les labels et les champs de formulaire */
        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        .form-control, .form-select {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
        }

        .form-control:focus, .form-select:focus {
            border-color: #66022b;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        /* Style pour les sections d'ajout de champs dynamiques */
        .mb-3 {
            margin-bottom: 20px;
        }

        .champ-academique {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
            color: #fff;
            padding: 5px 10px;
            border-radius: 40px;
            cursor: pointer;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-style-four {
            padding: 10px 20px;
            border: 1px solid;
        }

        /* Style pour les champs de texte multilignes */
        textarea.form-control {
            resize: vertical;
        }

        .d-flex {
            padding-bottom: 5px;
        }

        .chosen-container .chosen-drop, .chosen-container .chosen-results {
            color: #66022b;
        }

        .group-result {
            color: #333;
        }
    </style>

    <!-- Lien vers Bootstrap JS et dépendances Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        function ajouterChamp(secteur) {
            const conteneur = document.getElementById(`${secteur}_conteneur`);
            if (!conteneur) {
                console.error(`Le conteneur pour ${secteur} n'existe pas.`);
                return;
            }

            const div = document.createElement('div');
            div.classList.add('champ-academique');
            div.innerHTML = `
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger btn-sm" onclick="supprimerChamp(this)">X</button>
            </div>
            <div class="mb-3">
                <input type="text" name="${secteur}_titre[]" class="form-control" placeholder="Titre" required>
            </div>
            <div class="mb-3">
                <input type="number" name="${secteur}_annee[]" class="form-control" placeholder="Année" required>
            </div>
            <div class="mb-3">
                <input type="text" name="${secteur}_duree[]" class="form-control" placeholder="Durrée" required>
            </div>
            <div class="mb-3">
                <textarea name="${secteur}_description[]" class="form-control" placeholder="Description" rows="4"></textarea>
            </div>
        `;

            conteneur.appendChild(div);
        }

        function supprimerChamp(button) {
            const div = button.closest('.champ-academique');
            if (div) {
                div.remove();
            }
        }

        function ajouterExperiencesPro() {
            const conteneur = document.getElementById(`experiences_professionnelles_conteneur`);
            if (!conteneur) {
                console.error(`Le conteneur pour experiences_professionnelles_conteneur n'existe pas.`);
                return;
            }

            const div = document.createElement('div');
            div.classList.add('champ-academique');
            div.innerHTML = `
            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-danger btn-sm" onclick="supprimerExperiencesPro(this)">X</button>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="experiences_professionnelles_titre_poste[]" class="form-control" placeholder="Titre du poste" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="experiences_professionnelles_nom_entreprise[]" class="form-control" placeholder="Nom de l'entreprise" required>
                     </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label>Date debut *</label>
                        <input type="date" class="form-control" name="experiences_professionnelles_date_debut[]" placeholder="Date debut" required>
                    </div>
                    <div class="col-md-6">
                        <label>Date fin (optionnel si en cours)</label>
                        <input type="date" class="form-control" name="experiences_professionnelles_date_fin[]" placeholder="Date fin">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="experiences_professionnelles_lieu[]" class="form-control" placeholder="Lieu" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="experiences_professionnelles_secteur[]" class="form-control" placeholder="Secteur" required>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="type_contrat">Type contrat</label>
                        <select id="type_contrat" class="form-control" name="experiences_professionnelles_type_contrat[]">
                            <option>CDI</option>
                            <option>CDD</option>
                            <option>Stage</option>
                            <option>Alternance</option>
                            <option>Freelance / Indépendant</option>
                            <option>Intérim</option>
                            <option>Apprentissage</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Salaire (optionnel)</label>
                        <input type="number" name="experiences_professionnelles_salaire[]" class="form-control" placeholder="Salaire">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <textarea name="experiences_professionnelles_description[]" class="form-control" placeholder="Description" rows="4"></textarea>
            </div>
        `;

            conteneur.appendChild(div);
        }

        function supprimerExperiencesPro(button) {
            const div = button.closest('.champ-academique');
            if (div) {
                div.remove();
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            let mada_regions = [];
            @foreach($mada_regions as $region)
            mada_regions.push(@json($region));
            @endforeach
            let france_regions = [];
            @foreach($france_regions as $region)
            france_regions.push(@json($region));
            @endforeach
            const regions = {
                madagascar: mada_regions,
                france: france_regions
            };

            const paysSelect = document.getElementById('pays');
            const regionSelect = document.getElementById('region');

            function updateRegions() {
                const selectedCountry = paysSelect.value;
                const regionsList = regions[selectedCountry] || [];

                // Clear existing options
                regionSelect.innerHTML = '';

                // Populate new options
                regionsList.forEach((region) => {
                    const option = document.createElement('option');
                    option.value = region;
                    option.textContent = region;
                    if (region === "{{old('region')}}") {
                        option.setAttribute('selected', 'selected');
                    }
                    regionSelect.appendChild(option);
                });
            }

            // Initial population of regions
            updateRegions();

            // Add event listener to update regions when the country changes
            paysSelect.addEventListener('change', updateRegions);
        });
    </script>

@endsection
