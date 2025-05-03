@extends('dashboard-layout')

@section('title', 'Modifier le profil')

@section('content')

    @include('header.dashboard-header')

    <section class="contact-section bgc-home20">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="sec-title -type-2 text-center">
                        <h2>Formulaire d'Inscription Étudiant</h2>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form id="default-form" method="POST" action="{{ route('etudiants.update_profile') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <fieldset class="form-section">
                            <legend>
                                <h4> Informations Personnelles </h4>
                            </legend>
                            <div class="row">
                                <div class="uploading-outer">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="profile_picture" accept="image/*" id="upload" />
                                        <label class="uploadButton-button ripple-effect" for="upload">Importer votre photo</label>
                                        <span class="uploadButton-file-name"></span>
                                    </div>
                                    <div class="text">Taille maximale : 1 Mo · Dimensions minimales : 330×300 px · Formats acceptés : .jpg, .png</div>

                                    @if ($etudiant->profile_picture)
                                        <div class="current-profile-picture mt-3">
                                            <p>Photo actuelle :</p>
                                            <img src="{{ asset('storage/' . $etudiant->profile_picture) }}" alt="Photo de profil" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-lg-12 col-md-12 mt-4">
                                    <label for="prenom" class="form-label">Prénom :</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control" value="{{old('prenom', $etudiant->prenom)}}"  required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nom" class="form-label">Nom :</label>
                                    <input type="text" id="nom" name="nom" class="form-control" value="{{old('nom', $etudiant->nom)}}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telephone" class="form-label">Numéro de téléphone :</label>
                                    <input type="tel" id="telephone" name="numero_telephone" class="form-control" value="{{ old('numero_telephone', $etudiant->numero_telephone) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date-naissance" class="form-label">Date de naissance :</label>
                                    <input type="date" id="date-naissance" name="date_naissance" class="form-control" value="{{ old('date_naissance', $etudiant->date_naissance ? \Carbon\Carbon::parse($etudiant->date_naissance)->format('Y-m-d') : '') }}" required>
                                </div>
                                @php
                                    $options = [
                                        'masculin' => 'Masculin',
                                        'feminin' => 'Féminin',
                                        'non-binaire' => 'Non-binaire',
                                        'prefere-pas-dire' => 'Préfère ne pas dire',
                                    ];

                                    $selected = old('genre') ?? $etudiant->getAttribute('genre');
                                @endphp

                                <div class="col-md-6">
                                    <label for="genre" class="form-label">Genre :</label>
                                    <select id="genre" name="genre" class="form-select" required>
                                        <option value="masculin" {{ old('genre', $etudiant->genre) == 'masculin' ? 'selected' : '' }}>Masculin</option>
                                        <option value="feminin" {{ old('genre', $etudiant->genre) == 'feminin' ? 'selected' : '' }}>Féminin</option>
                                        <option value="non-binaire" {{ old('genre', $etudiant->genre) == 'non-binaire' ? 'selected' : '' }}>Non-binaire</option>
                                        <option value="prefere-pas-dire" {{ old('genre', $etudiant->genre) == 'prefere-pas-dire' ? 'selected' : '' }}>Préfère ne pas dire</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="adresse-postale" class="form-label">Adresse postale :</label>
                                    <input type="text" id="adresse-postale" name="adresse_postale" class="form-control" value="{{ old('adresse_postale', $etudiant->adresse_postale) }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pays" class="form-label">Pays :</label>
                                    <select id="pays" name="pays" class="form-select" required>
                                        <option value="madagascar" {{ old('pays', $etudiant->pays) == 'madagascar' ? 'selected' : '' }}>Madagascar</option>
                                        <option value="france" {{ old('pays', $etudiant->pays) == 'france' ? 'selected' : '' }}>France</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="region" class="form-label">Région :</label>
                                    <select id="region" name="region" class="form-select" required>
                                        <option value="analamanga" {{ old('region', $etudiant->region) == 'analamanga' ? 'selected' : '' }}>Analamanga</option>
                                        <option value="atsinanana" {{ old('region', $etudiant->region) == 'atsinanana' ? 'selected' : '' }}>Atsinanana</option>
                                        <option value="boeny" {{ old('region', $etudiant->region) == 'boeny' ? 'selected' : '' }}>Boeny</option>
                                        <option value="ihorombe" {{ old('region', $etudiant->region) == 'ihorombe' ? 'selected' : '' }}>Ihorombe</option>
                                        <option value="menabe" {{ old('region', $etudiant->region) == 'menabe' ? 'selected' : '' }}>Menabe</option>
                                        <option value="sava" {{ old('region', $etudiant->region) == 'sava' ? 'selected' : '' }}>Sava</option>
                                        <option value="vakinankaratra" {{ old('region', $etudiant->region) == 'vakinankaratra' ? 'selected' : '' }}>Vakinankaratra</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ville" class="form-label">Ville :</label>
                                    <input type="text" id="ville" name="ville" class="form-control" value="{{ old('ville', $etudiant->ville) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="code-postal" class="form-label">Code postal : </label>
                                    <input type="text" id="code-postal" name="code_postal" class="form-control" value="{{ old('code_postal', $etudiant->code_postal) }}"
                                        required>
                                </div>
                                <div class="col-mb-6">
                                    <label for="description" class="form-label">Description :</label>
                                    <textarea id="description" name="description" class="form-control" rows="5" placeholder="Entrez votre description">{{ old('description', $etudiant->description) }}</textarea>
                                </div>
                            </div>
                        </fieldset>

                        <!-- Éducation -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Éducation</h4>
                            </legend>
                            <div class="mb-3">
                                <label for="univ" class="form-label">Nom de l'école ou de l'université :</label>
                                <input type="text" id="univ" name="univ" class="form-control" value="{{ old('univ', $etudiant->univ) }}" required>
                            </div>
                            <div class="mb-3">
                            <label for="domaine-etudes" class="form-label">Domaine d'études :</label>
                            <select id="domaine-etudes" name="domaine_etudes" class="form-select" required>
                                @foreach ($list_categories as $category)
                                    <option value="{{ $category->name }}" {{ old('domaine_etudes', $etudiant->domaine_etudes) == $category->name ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            <div class="mb-3">
                            <label for="domaine-etudes" class="form-label">Domaine d'études :</label>
                            <select id="domaine-etudes" name="domaine_etudes" class="form-select" required>
                                @foreach ($list_categories as $category)
                                    <option value="{{ $category->name }}" {{ old('domaine_etudes', $etudiant->domaine_etudes) == $category->name ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                            @php
                                $options = [
                                    'licence' => 'Licence',
                                    'master' => 'Master',
                                    'doctorat' => 'Doctorat',
                                ];
                            
                                $selected = old('niveau_etudes') ?? $etudiant->getAttribute('niveau_etudes');
                            @endphp
                            
                            <div class="mb-3">
                                <label for="niveau-etudes" class="form-label">Niveau d'études :</label>
                                <select id="niveau-etudes" name="niveau_etudes" class="form-select" required>
                                    <option value="licence" {{ old('niveau_etudes', $etudiant->niveau_etudes) == 'licence' ? 'selected' : '' }}>Licence</option>
                                    <option value="master" {{ old('niveau_etudes', $etudiant->niveau_etudes) == 'master' ? 'selected' : '' }}>Master</option>
                                    <option value="doctorat" {{ old('niveau_etudes', $etudiant->niveau_etudes) == 'doctorat' ? 'selected' : '' }}>Doctorat</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="annee-diplome" class="form-label">Année d'obtention du diplôme ou année d'inscription en cours :</label>
                                <input type="text" id="annee-diplome" name="annee_obtention_diplome" class="form-control" value="{{ old('annee_obtention_diplome', $etudiant->annee_obtention_diplome) }}" required>
                            </div>
                        </fieldset>

                        <!-- Expérience Académique -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Expérience Académique</h4>
                            </legend>
                            <div class="mb-3">
                                <h6>Stage Académique, Projet Académique,Thèse et Mémoire, Réalisations, Cours Spécialisés</h6>
                                <p>ex: Stage de recherche, Stage en laboratoire, Stage en entreprise, Projet de groupe, projet individuel, projet fin d'étude, projet de recherche, Thèse de doctorat, Mémoire de Master, Mémoire de Licence, Dissertation, Publication dans une revue académique, Présentation à une conférence universitaire,
                                    Récompense ou distinction académique, Participation à un concours académique, Cours de spécialisation, Séminaire, Atelier spécialisé, Participation à des Evenements académiques, recherche, encadrement, activités
                                    Parascolaires; programmes d'échange, Certificats et diplômes complémentaires...</p>
                                <div id="experiences_academique"></div>
                                <textarea type="text" id="experiences_academique" name="experiences_academique" rows="10" class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, durée, et description">{{ old('experiences_academique', $etudiant->experiences_academique) }}</textarea>
                            </div>

                        </fieldset>



                        <!-- Compétences -->
                        <fieldset class="form-section">
                                @php
                                    $competences_techniques_array = old('competences_techniques') 
                                        ?? (is_array($etudiant->competences_techniques) 
                                            ? $etudiant->competences_techniques 
                                            : (is_string($etudiant->competences_techniques) && json_decode($etudiant->competences_techniques, true)
                                                ? json_decode($etudiant->competences_techniques, true)
                                                : [])
                                        );
                                    $competences_transversales_array = old('competences_en_recherche_et_analyse') 
                                        ?? (is_array($etudiant->competences_en_recherche_et_analyse) 
                                            ? $etudiant->competences_en_recherche_et_analyse 
                                            : (is_string($etudiant->competences_en_recherche_et_analyse) && json_decode($etudiant->competences_en_recherche_et_analyse, true)
                                                ? json_decode($etudiant->competences_en_recherche_et_analyse, true)
                                                : [])
                                        );
                                    $competences_langues_array = old('competences_langues') 
                                        ?? (is_array($etudiant->competences_langues) 
                                            ? $etudiant->competences_langues 
                                            : (is_string($etudiant->competences_langues) && json_decode($etudiant->competences_langues, true)
                                                ? json_decode($etudiant->competences_langues, true)
                                                : [])
                                        );
                                @endphp
                            <legend>
                                <h4>Compétences</h4>
                            </legend>
                            <div class="mb-3">
                                <h6>Compétences techniques</h6>
                                <div class="checkbox-container">
                                @foreach ($competences_techniques as $competence)
                                    <label>
                                        <input type="checkbox" name="competences_techniques[]" value="{{ $competence->sigle }}"
                                            {{ in_array($competence->sigle, $competences_techniques_array) ? 'checked' : '' }}>
                                        {{ $competence->sigle }}
                                    </label>
                                @endforeach
                                </div>
                            </div>

                            <div class="mb-3">
                                <h6>Compétences Transversales</h6>
                                <p>ex: Recherche documentaire, Analyse de donnée, Rédaction de rapports</p>
                                <div class="checkbox-container">
                                @foreach ($competences_transversales as $competence)
                                    <label>
                                        <input type="checkbox" name="competences_en_recherche_et_analyse[]" value="{{ $competence->sigle }}" 
                                            {{ in_array($competence->sigle, $competences_transversales_array) ? 'checked' : '' }}>
                                        {{ $competence->sigle }}
                                    </label>
                                @endforeach
                                </div>
                            </div>

                            <div class="mb-3">
                                <h6>Langues</h6>
                                <p>ex: Français, Anglais, Allemand, Espagnol...</p>
                                <div class="checkbox-container">
                                @foreach ($competences_langues as $langue)
                                    <label>
                                        <input type="checkbox" name="competences_langues[]" value="{{ $langue->sigle }}" 
                                            {{ in_array($langue->sigle, $competences_langues_array) ? 'checked' : '' }}>
                                        {{ $langue->sigle }}
                                    </label>
                                @endforeach
                                </div>      
                            </div>
                                                        
                            
                        </fieldset>

                        <!-- Expérience Professionnelle -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Expérience Professionnelle</h4>
                            </legend>
                            <div class="mb-3">
                                <h6>Expérience Professionnelle :</h6>
                                <p>ex: Stage en Entreprise, Emplois à temps partiel, Expérience de travail pertinente,
                                    projets professionnels, bénévolat, entrepreneuriat, formations professionnelles,
                                    responsabilités additionnelles, expérience internationale, publications et
                                    contributions...</p>
                                <div id="experience_professionnelle"></div>
                                <textarea type="text" id="experience_professionnelle" name="experience_professionnelle" rows="4"
                                    class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, la durée et la description de l'expérience">{{ old('experience_professionnelle', $etudiant->experience_professionnelle) }}</textarea>
                            </div>
                        </fieldset>

                        <!-- Portfolio -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Portfolio</h4>
                            </legend>
                            <div class="mb-3">
                                <label for="portfolio" class="form-label">Liens vers des projets, articles, créations
                                    artistiques :</label>
                                <textarea id="portfolio" name="portfolio" class="form-control" rows="4" placeholder="Si vous n’en avez pas, veuillez indiquer « Aucun »">{{ old('portfolio', $etudiant->portfolio) }}</textarea>
                            </div>
                        </fieldset>

                        <!-- Centres d'Intérêt -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Centres d'Intérêt</h4>
                            </legend>
                            <div class="mb-3">
                                <label for="centres-interet" class="form-label">Hobbies et intérêts personnels :</label>
                                <textarea id="centres-interet" name="centres_interet" class="form-control" rows="4" required>{{ old('centres_interet', $etudiant->centres_interet) }}</textarea>                            </div>
                        </fieldset>

                        <!-- Documents -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Documents</h4>
                            </legend>
                            <div class="mb-3">
                                <label for="diplome" class="form-label">Diplôme :</label>
                                <input type="file" id="diplome" name="document_diplome" class="form-control" accept=".pdf,.doc,.docx">
                                @if ($etudiant->document_diplome)
                                    <p>Document actuel : <a href="{{ asset('storage/' . $etudiant->document_diplome) }}" target="_blank">Voir le document</a></p>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="lettre-recommandation" class="form-label">Lettre de recommandation :</label>
                                <input type="file" id="lettre-recommandation" name="document_recommandation"
                                    class="form-control" accept=".pdf,.doc,.docx">
                                @if ($etudiant->document_recommandation)
                                    <p>Document actuel : <a href="{{ asset('storage/' . $etudiant->document_recommandation) }}" target="_blank">Voir le document</a></p> 
                                @endif
                            </div>
                        </fieldset>

                        <!-- Préférences de Carrière -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Préférences de Carrière</h4>
                            </legend>

                            <!-- Secteur d'activité préféré -->
                            <div class="mb-3">
                                <label for="secteur-activite" class="form-label">Secteur d'activité préféré :</label>
                                <div id="secteur-activite-container" class="checkbox-container">
                                    <div class="checkbox-group">
                                        @foreach ($list_categories as $category)
                                            @if ($category->table === 'secteur_activites')
                                                <label>
                                                    <input type="checkbox" name="secteur_activite_preferer[]" value="{{ $category->name }}" 
                                                        {{ in_array($category->name, old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'checked' : '' }}>
                                                    {{ $category->name }}
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Type d'emploi recherché -->
                            <div class="mb-3">
                                <label for="type-emploi" class="form-label">Type d'emploi recherché :</label>
                                <div id="type-emploi-container" class="checkbox-container">
                                    <div class="checkbox-group">
                                        @foreach ($parametrage as $param)
                                            @if ($param->table === 'type_contrat')
                                                <label>
                                                    <input type="checkbox" name="type_emploi_recherche[]" value="{{ $param->sigle }}" 
                                                        {{ in_array($param->sigle, old('type_emploi_recherche', json_decode($etudiant->type_emploi_recherche, true) ?? [])) ? 'checked' : '' }}>
                                                    {{ $param->sigle }}
                                                </label>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Localisation géographique préférée -->
                            <div class="mb-3">
                                <label for="localisation-preferree" class="form-label">Localisation géographique préférée
                                    :</label>
                                <input type="text" id="localisation-preferree"
                                    name="localisation_geographique_preferee" class="form-control"  value="{{ old('localisation_geographique_preferee', $etudiant->localisation_geographique_preferee) }}" required>
                            </div>

                            <!-- Salaire souhaité
                            <div class="mb-3">
                                <label for="salaire-souhaite" class="form-label">Salaire souhaité :</label>
                                <input type="text" id="salaire-souhaite" name="salaire_souhaite" class="form-control"
                                    required>
                            </div> -->
                        </fieldset>
                        
                        <!-- Disponibilité de l’Étudiant Section -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Disponibilité de l’Étudiant</h4>
                            </legend>
                            <div class="form-group">
                                <label for="duree_disponibilite">Durée de Disponibilité :</label>
                                <select class="form-control" id="duree_disponibilite" name="duree_disponibilite">
                                    <option value="Moins de 1 mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === 'Moins de 1 mois' ? 'selected' : '' }}>Moins de 1 mois</option>
                                    <option value="1 à 3 mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === '1 à 3 mois' ? 'selected' : '' }}>1 à 3 mois</option>
                                    <option value="3 à 6 mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === '3 à 6 mois' ? 'selected' : '' }}>3 à 6 mois</option>
                                    <option value="6 à 12 mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === '6 à 12 mois' ? 'selected' : '' }}>6 à 12 mois</option>
                                    <option value="plus de 12 mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === 'plus de 12 mois' ? 'selected' : '' }}>Plus de 12 mois</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="semestre">Semestre en Cours :</label>
                                <select class="form-control" id="semestre" name="semestre_cours">
                                    <option value="semestre_1" {{ old('semestre_cours', $etudiant->semestre_cours) == 'semestre_1' ? 'selected' : '' }}>Semestre 1</option>
                                    <option value="semestre_2" {{ old('semestre_cours', $etudiant->semestre_cours) == 'semestre_2' ? 'selected' : '' }}>Semestre 2</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vacances_ete">Vacances d'Été :</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="vacances_debut" name="vacances_ete_debut"
                                        value="{{ old('vacances_ete_debut', $etudiant->vacances_ete_debut ? \Carbon\Carbon::parse($etudiant->vacances_ete_debut)->format('Y-m-d') : '') }}">
                                    <input type="date" class="form-control" id="vacances_fin" name="vacances_ete_fin"
                                        value="{{ old('vacances_ete_fin', $etudiant->vacances_ete_fin ? \Carbon\Carbon::parse($etudiant->vacances_ete_fin)->format('Y-m-d') : '') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="vacances_dispo">Date disponible pendant les vacances d'été :</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="dispo_debut" name="dates_disponibles_vacances_ete_debut"
                                        value="{{ old('dates_disponibles_vacances_ete_debut', $etudiant->dates_disponibles_vacances_ete_debut ? \Carbon\Carbon::parse($etudiant->dates_disponibles_vacances_ete_debut)->format('Y-m-d') : '') }}">
                                    <input type="date" class="form-control" id="dispo_fin" name="dates_disponibles_vacances_ete_fin"
                                        value="{{ old('dates_disponibles_vacances_ete_fin', $etudiant->dates_disponibles_vacances_ete_fin ? \Carbon\Carbon::parse($etudiant->dates_disponibles_vacances_ete_fin)->format('Y-m-d') : '') }}">
                                </div>
                            </div>
                        </fieldset>

                        <!-- Détails spécifiques (Inclusivité Entreprise) Section -->
                        <fieldset class="form-section">
                            <legend>Détails spécifiques (Inclusivité Entreprise)</legend>

                            <div class="form-group">
                                <label for="accessibilite">Accessibilité :</label>
                                <p>Avez-vous besoin d’aménagements spécifiques pour participer à des événements ou des activités ?</p>
                                <select class="form-control" id="accessibilite" name="accessibilite">
                                    <option value="oui" {{ old('accessibilite', $etudiant->accessibilite) == 'oui' ? 'selected' : '' }}>Oui</option>
                                    <option value="non" {{ old('accessibilite', $etudiant->accessibilite) == 'non' ? 'selected' : '' }}>Non</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amenagements">Si oui, veuillez préciser   :</label>
                                <textarea class="form-control" id="amenagements" name="details_accessibilite" rows="3"
                                    placeholder="Précisez les aménagements spécifiques">{{ old('details_accessibilite', $etudiant->details_accessibilite) }}</textarea>
                            </div>


                            <div class="form-group">
                                <label for="statut_socio_economique">Statut socio-économique :</label>
                                <select class="form-select" id="statut_socio_economique" name="statut_socio_economique">
                                    <option value="origine_modeste" {{ old('statut_socio_economique', $etudiant->statut_socio_economique) == 'origine_modeste' ? 'selected' : '' }}>Origine modeste</option>
                                    <option value="classe_moyenne" {{ old('statut_socio_economique', $etudiant->statut_socio_economique) == 'classe_moyenne' ? 'selected' : '' }}>Classe moyenne</option>
                                    <option value="prefere_pas_dire" {{ old('statut_socio_economique', $etudiant->statut_socio_economique) == 'prefere_pas_dire' ? 'selected' : '' }}>Préfère ne pas dire</option>
                                </select>
                            </div>
                            
                            

                            @php
                                $selected = old('conditions_vie_specifiques') ?? $etudiant->getAttribute('conditions_vie_specifiques');
                                $options = [
                                    '' => 'Aucune',
                                    'sans_domicile' => 'Sans domicile fixe',
                                    'handicap' => 'En situation de handicap',
                                    'prefere_pas_dire' => 'Préfère ne pas dire',
                                ];
                            @endphp

                            <div class="form-group">
                                <label for="conditions_vie">Conditions de vie spécifiques :</label>
                                <select class="form-select" id="conditions_vie" name="conditions_vie_specifiques">
                                    <option value="null" {{ old('conditions_vie_specifiques', $etudiant->conditions_vie_specifiques) == 'null' ? 'selected' : '' }}>null</option>
                                    <option value="sans_domicile" {{ old('conditions_vie_specifiques', $etudiant->conditions_vie_specifiques) == 'sans_domicile' ? 'selected' : '' }}>Sans domicile fixe</option>
                                    <option value="handicap" {{ old('conditions_vie_specifiques', $etudiant->conditions_vie_specifiques) == 'handicap' ? 'selected' : '' }}>En situation de handicap</option>
                                    <option value="prefere_pas_dire" {{ old('conditions_vie_specifiques', $etudiant->conditions_vie_specifiques) == 'prefere_pas_dire' ? 'selected' : '' }}>Préfère ne pas dire</option>
                                </select>
                            </div>
                            
                            @php
                                $options = [
                                    'chretien' => 'Chrétien',
                                    'musulman' => 'Musulman',
                                    'bouddhiste' => 'Bouddhiste',
                                    'hindou' => 'Hindou',
                                    'prefere_pas_dire' => 'Préfère ne pas dire',
                                ];

                                $selected = old('religion_belief') ?? $etudiant->getAttribute('religion_belief');
                            @endphp

                            <div class="form-group">
                                <label for="religion_croyance">Religion ou croyance :</label>
                                <select class="form-select" id="religion_croyance" name="religion_belief">
                                    <option value="chretien" {{ old('religion_belief', $etudiant->religion_belief) == 'chretien' ? 'selected' : '' }}>Chrétien</option>
                                    <option value="musulman" {{ old('religion_belief', $etudiant->religion_belief) == 'musulman' ? 'selected' : '' }}>Musulman</option>
                                    <option value="bouddhiste" {{ old('religion_belief', $etudiant->religion_belief) == 'bouddhiste' ? 'selected' : '' }}>Bouddhiste</option>
                                    <option value="hindou" {{ old('religion_belief', $etudiant->religion_belief) == 'hindou' ? 'selected' : '' }}>Hindou</option>
                                    <option value="prefere_pas_dire" {{ old('religion_belief', $etudiant->religion_belief) == 'prefere_pas_dire' ? 'selected' : '' }}>Préfère ne pas dire</option>
                                </select>
                            </div>

                            @php
                                $options = [
                                    'heterosexuel' => 'Hétérosexuel',
                                    'homosexuel' => 'Homosexuel',
                                    'bisexuel' => 'Bisexuel',
                                    'prefere_pas_dire' => 'Préfère ne pas dire',
                                ];

                                $selected = old('orientation_sexuelle') ?? $etudiant->getAttribute('orientation_sexuelle');
                            @endphp

                            <div class="form-group">
                                <label for="orientation_sexuelle">Orientation sexuelle :</label>
                                <select class="form-select" id="orientation_sexuelle" name="orientation_sexuelle">
                                    <option value="heterosexuel" {{ old('orientation_sexuelle', $etudiant->orientation_sexuelle) == 'heterosexuel' ? 'selected' : '' }}>Hétérosexuel</option>
                                    <option value="homosexuel" {{ old('orientation_sexuelle', $etudiant->orientation_sexuelle) == 'homosexuel' ? 'selected' : '' }}>Homosexuel</option>
                                    <option value="bisexuel" {{ old('orientation_sexuelle', $etudiant->orientation_sexuelle) == 'bisexuel' ? 'selected' : '' }}>Bisexuel</option>
                                    <option value="prefere_pas_dire" {{ old('orientation_sexuelle', $etudiant->orientation_sexuelle) == 'prefere_pas_dire' ? 'selected' : '' }}>Préfère ne pas dire</option>
                                </select>
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
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        function ajouterChamp(secteur) {
            const conteneur = document.getElementById(`${secteur}`);
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
                  <input type="text" name="${secteur}_annee[]" class="form-control" placeholder="Année" required>
              </div>
              <div class="mb-3">
                  <input type="text" name="${secteur}_durree[]" class="form-control" placeholder="Durrée" required>
              </div>
              <div class="mb-3">
                  <textarea name="${secteur}_description[]" class="form-control" placeholder="Description" rows="4" required></textarea>
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
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('default-form');

            form.addEventListener('submit', function (event) {
                const typeEmploi = document.getElementById('type-emploi');
                const chosenContainer = document.querySelector('.chosen-container');

                // Vérifiez si le champ est vide
                if (!typeEmploi.value || typeEmploi.value.length === 0) {
                    event.preventDefault(); // Empêche la soumission du formulaire
                    chosenContainer.classList.add('is-invalid'); // Ajoute une classe d'erreur
                    typeEmploi.focus(); // Met le focus sur le champ
                } else {
                    chosenContainer.classList.remove('is-invalid'); // Supprime la classe d'erreur
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const regions = {
                madagascar: [{
                        value: 'analamanga',
                        text: 'Analamanga'
                    },
                    {
                        value: 'atsinanana',
                        text: 'Atsinanana'
                    },
                    {
                        value: 'boeny',
                        text: 'Boeny'
                    },
                    {
                        value: 'ihorombe',
                        text: 'Ihorombe'
                    },
                    {
                        value: 'menabe',
                        text: 'Menabe'
                    },
                    {
                        value: 'sava',
                        text: 'Sava'
                    },
                    {
                        value: 'vakinankaratra',
                        text: 'Vakinankaratra'
                    }
                ],
                france: [{
                        value: 'auvergne-rhone-alpes',
                        text: 'Auvergne-Rhône-Alpes'
                    },
                    {
                        value: 'bretagne',
                        text: 'Bretagne'
                    },
                    {
                        value: 'centre-val-de-loire',
                        text: 'Centre-Val de Loire'
                    },
                    {
                        value: 'corse',
                        text: 'Corse'
                    },
                    {
                        value: 'ile-de-france',
                        text: 'Île-de-France'
                    },
                    {
                        value: 'normandie',
                        text: 'Normandie'
                    },
                    {
                        value: 'occitanie',
                        text: 'Occitanie'
                    },
                    {
                        value: 'paca',
                        text: 'Provence-Alpes-Côte d\'Azur'
                    }
                ]
            };

            const paysSelect = document.getElementById('pays');
            const regionSelect = document.getElementById('region');

            function updateRegions() {
                const selectedCountry = paysSelect.value;
                const regionsList = regions[selectedCountry] || [];

                // Clear existing options
                regionSelect.innerHTML = '';

                // Populate new options
                regionsList.forEach(region => {
                    const option = document.createElement('option');
                    option.value = region.value;
                    option.textContent = region.text;
                    regionSelect.appendChild(option);
                });
            }

            // Initial population of regions
            updateRegions();

            // Add event listener to update regions when the country changes
            paysSelect.addEventListener('change', updateRegions);
        });

        $(document).ready(function () {
            $(".chosen-select").chosen({
                no_results_text: "Aucun résultat trouvé",
                placeholder_text_multiple: "Sélectionnez un ou plusieurs types d'emploi"
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('default-form');

            form.addEventListener('submit', function (event) {
                let isValid = true;
                const requiredFields = form.querySelectorAll('[required]');
                const errorMessageContainer = document.createElement('div');
                errorMessageContainer.classList.add('alert', 'alert-danger', 'mt-3');
                errorMessageContainer.style.display = 'none';
                errorMessageContainer.textContent = 'Veuillez remplir tous les champs obligatoires.';

                // Remove existing error message
                const existingErrorMessage = form.querySelector('.alert-danger');
                if (existingErrorMessage) {
                    existingErrorMessage.remove();
                }

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        field.classList.add('is-invalid');
                    } else {
                        field.classList.remove('is-invalid');
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                    errorMessageContainer.style.display = 'block';
                    form.prepend(errorMessageContainer);
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('#secteur-activite-container input[type="checkbox"]');
            const selectedContainer = document.getElementById('selected-secteurs');

            function updateSelected() {
                selectedContainer.innerHTML = ''; // Réinitialise le conteneur
                checkboxes.forEach(checkbox => {
                    if (checkbox.checked) {
                        const span = document.createElement('span');
                        span.classList.add('selected-item');
                        span.textContent = checkbox.value;
                        selectedContainer.appendChild(span);
                    }
                });
            }

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelected);
            });

            // Initialisation
            updateSelected();
        });
    </script>

    <style>
        .sec-title {
            margin-top: 50px;
        }

        .contact-section {
            padding: 40px 0;
        }

        /* Style pour les titres de sections */
        .sec-title h2 {
            margin-bottom: 30px;
            font-size: 28px;
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

        .form-control,
        .form-select {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
        }
        .checkbox-group {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); /* Ajuste automatiquement le nombre de colonnes */
    flex-wrap: wrap;
    gap: 10px; /* Espacement entre les éléments */
    max-height: 150px;
    overflow-y: auto;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    background: #f9f9f9;
}

.scrollable-checkbox-group {
    max-height: 200px;
    overflow-y: auto;
    border: 1px solid #e0e0e0;
    padding: 10px;
    border-radius: 4px;
}

.styled-checkbox {
    position: relative;
    display: flex;
    align-items: center;
    gap: 10px; /* Espacement entre la case et le texte */
    font-size: 14px;
    color: #333;
    padding: 10px;
    border: 1px solid #ddd; /* Ajout de la bordure */
    border-radius: 5px; /* Coins arrondis */
    background-color: #f9f9f9; /* Couleur de fond */
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

.styled-checkbox:hover {
    border-color: #66022b; /* Couleur de bordure au survol */
    background-color: #f1f1f1; /* Couleur de fond au survol */
}

.styled-checkbox input[type="checkbox"] {
    accent-color: #66022b; /* Couleur personnalisée pour les cases cochées */
}

.styled-checkbox .checkmark {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #e0e0e0;
    border-radius: 4px;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.styled-checkbox input:checked ~ .checkmark {
    background-color: #66022b;
}

.styled-checkbox .checkmark:after {
    content: "";
    position: absolute;
    display: none;
    left: 7px;
    top: 3px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 2px 2px 0;
    transform: rotate(45deg);
}

.styled-checkbox input:checked ~ .checkmark:after {
    display: block;
}
        .form-control:focus,
        .form-select:focus {
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

        .chosen-container .chosen-drop,
        .chosen-container .chosen-results {
            color: #66022b;
        }

        .group-result {
            color: #333;
        }

        /* Uniformisation de la taille des champs */
        .form-control,
        .form-select,
        .chosen-select,
        .uploadButton-input {
            width: 100%;
            min-height: 45px;
            padding: 10px 15px;
            font-size: 14px;
            line-height: 1.5;
            border-radius: 4px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        /* Ajustement spécifique pour les textarea */
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Ajustement pour les champs de type file */
        input[type="file"].form-control {
            padding: 8px 15px;
        }

        /* Ajustement pour les champs multiples */
        .chosen-container {
            width: 100% !important;
            min-height: 45px;
        }
        .chosen-container.is-invalid .chosen-choices {
        border: 1px solid #dc3545; /* Rouge pour indiquer une erreur */
        box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
    }

        .chosen-container-multi .chosen-choices {
            min-height: 45px;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        /* Ajustement pour les conteneurs de champs */
        .mb-3 {
            margin-bottom: 20px;
            width: 100%;
        }

        /* Ajustement pour les groupes de champs */
        .input-group {
            width: 100%;
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }

        .input-group .form-control {
            flex: 1;
            margin-bottom: 0;
        }

        /* Ajustement pour les fieldsets */
        .form-section {
            width: 100%;
            max-width: 100%;
            margin-bottom: 30px;
            padding: 25px;
        }

        .is-invalid {
            border-color: #dc3545;
            box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
        }

        .checkbox-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            max-height: 150px;
            overflow-y: auto;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background: #f9f9f9;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            color: #333;
        }

        .checkbox-group input[type="checkbox"] {
            accent-color: #66022b;
        }

        .selected-secteurs {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f1f1f1;
            display: flex;
            flex-wrap: wrap;
            gap: 5px;
        }

        .selected-item {
            background: #66022b;
            color: #fff;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
        }
    </style>

@endsection
