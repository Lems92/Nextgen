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
                                    <option value="sciences" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'sciences' ? 'selected' : '' }}>Sciences</option>
                                    <option value="ingenierie" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'ingenierie' ? 'selected' : '' }}>Ingénierie</option>
                                    <option value="arts" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'arts' ? 'selected' : '' }}>Arts</option>
                                    <option value="commerce" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'commerce' ? 'selected' : '' }}>Commerce</option>
                                    <option value="medecine" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'medecine' ? 'selected' : '' }}>Médecine</option>
                                    <option value="droit" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'droit' ? 'selected' : '' }}>Droit</option>
                                    <option value="economie" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'economie' ? 'selected' : '' }}>Économie</option>
                                    <option value="architecture" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'architecture' ? 'selected' : '' }}>Architecture</option>
                                    <option value="sciences-sociales" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'sciences-sociales' ? 'selected' : '' }}>Sciences sociales</option>
                                    <option value="sciences-vie" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'sciences-vie' ? 'selected' : '' }}>Sciences de la vie</option>
                                    <option value="sciences-environnement" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'sciences-environnement' ? 'selected' : '' }}>Sciences de l'environnement</option>
                                    <option value="education" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'education' ? 'selected' : '' }}>Éducation</option>
                                    <option value="tourisme-hotel" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'tourisme-hotel' ? 'selected' : '' }}>Tourisme et hôtellerie</option>
                                    <option value="agriculture-environnement" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'agriculture-environnement' ? 'selected' : '' }}>Agriculture et environnement rural</option>
                                    <option value="technologies-information" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'technologies-information' ? 'selected' : '' }}>Technologies de l'information</option>
                                    <option value="communication" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'communication' ? 'selected' : '' }}>Communication</option>
                                    <option value="langues-cultures" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'langues-cultures' ? 'selected' : '' }}>Langues et cultures</option>
                                    <option value="sciences-politiques" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'sciences-politiques' ? 'selected' : '' }}>Sciences politiques</option>
                                    <option value="gestion" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'gestion' ? 'selected' : '' }}>Gestion</option>
                                    <option value="sciences-sante" {{ old('domaine_etudes', $etudiant->domaine_etudes) == 'sciences-sante' ? 'selected' : '' }}>Sciences de la santé</option>
                                </select>
                            </div>
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
                            <legend>
                                <h4>Compétences</h4>
                            </legend>
                            <div class="mb-3">
                                <h6>Compétences techniques</h6>
                                <p>ex: Compétences en Informatiques (Bureautique, programmation, gestion de bases de données, systèmes d'information, cybersécurité...)</p>
                                <textarea id="competences_techniques" name="competences_techniques" class="form-control no-wrap" rows="4" placeholder="Entrez vos compétences techniques" wrap="off" style="white-space: pre; overflow-wrap: normal;">{{ old('competences_techniques', is_array($etudiant->competences_techniques) ? implode("\n", $etudiant->competences_techniques) : (is_string($etudiant->competences_techniques) ? implode("\n", json_decode($etudiant->competences_techniques, true) ?? []) : '') ) }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <h6>Compétences en Recherche et Analyse :</h6>
                                <p>ex: Recherche documentaire, Analyse de donnée, Rédaction de rapports</p>
                                <textarea id="competences_en_recherche_et_analyse" name="competences_en_recherche_et_analyse" class="form-control no-wrap" rows="4" wrap="off" style="white-space: pre; overflow-wrap: normal;">{{ old('competences_en_recherche_et_analyse', is_array($etudiant->competences_en_recherche_et_analyse) ? implode("\n", $etudiant->competences_en_recherche_et_analyse) : (is_string($etudiant->competences_en_recherche_et_analyse) && json_decode($etudiant->competences_en_recherche_et_analyse, true) ? implode("\n", json_decode($etudiant->competences_en_recherche_et_analyse, true)) : $etudiant->competences_en_recherche_et_analyse)) }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <h6>Compétences en Communication :</h6>
                                <p>ex: Communication orale/écrite, compétence en négociation</p>
                                <textarea id="competences_en_communication" name="competences_en_communication" class="form-control no-wrap" rows="4" wrap="off" style="white-space: pre; overflow-wrap: normal;">{{ old('competences_en_communication', is_array($etudiant->competences_en_communication) ? implode("\n", $etudiant->competences_en_communication) : (is_string($etudiant->competences_en_communication) ? implode("\n", json_decode($etudiant->competences_en_communication, true) ?? []) : '') ) }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <h6>Langues :</h6>
                                <p>ex: Français, Anglais, Allemand, Espagnol...</p>
                                <textarea id="competences_langues" name="competences_langues" class="form-control no-wrap" rows="4" wrap="off" style="white-space: pre; overflow-wrap: normal;">{{ old('competences_langues', is_array($etudiant->competences_langues) ? implode("\n", $etudiant->competences_langues) : (is_string($etudiant->competences_langues) ? implode("\n", json_decode($etudiant->competences_langues, true) ?? []) : '') ) }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <h6>Autres compétences</h6>
                                <p>ex: Compétences interpersonnelles, Résolution des problèmes, adaptabilité, gestion du stress, leadership, éthique et responsabilité, gestion financière...</p>
                                <textarea id="autres_competences" name="autres_competences" class="form-control no-wrap" rows="4" wrap="off" style="white-space: pre; overflow-wrap: normal;">{{ old('autres_competences', is_array($etudiant->autres_competences) ? implode("\n", $etudiant->autres_competences) : (is_string($etudiant->autres_competences) ? implode("\n", json_decode($etudiant->autres_competences, true) ?? []) : '') ) }}</textarea>
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
                                <select id="secteur-activite" name="secteur_activite_preferer[]"
                                    class="chosen-select multiple" multiple required>
                                    <optgroup label="Technologie de l'Information">
                                        <option value="Développement logiciel" {{ in_array('Développement logiciel', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Développement logiciel</option>
                                        <option value="Cybersécurité" {{ in_array('Cybersécurité', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Cybersécurité</option>
                                        <option value="Intelligence artificielle" {{ in_array('Intelligence artificielle', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }} >Intelligence artificielle</option>
                                        <option value="Gestion de systèmes informatiques" {{ in_array('Gestion de systèmes informatiques', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }} >Gestion de systèmes informatiques
                                        </option>
                                    </optgroup>
                                    <optgroup label="Santé">
                                        <option value="Médecine" {{ in_array('Médecines', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }} >Médecine</option>
                                        <option value="Soins infirmiers" {{ in_array('Soins infirmiers', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }} >Soins infirmiers</option>
                                        <option value="Pharmacie" {{ in_array('Pharmacie', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Pharmacie</option>
                                        <option value="Médecine vétérinaire" {{ in_array('Médecine vétérinaire', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Médecine vétérinaire</option>
                                    </optgroup>
                                    <optgroup label="Finance et Comptabilité">
                                        <option value="Banque et assurance" {{ in_array('Banque et assurance', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Banque et assurance</option>
                                        <option value="Gestion de portefeuille" {{ in_array('Gestion de portefeuille', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion de portefeuille</option>
                                        <option value="Comptabilité" {{ in_array('Comptabilité', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Comptabilité</option>
                                        <option value="Analyse financière" {{ in_array('Analyse financière', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Analyse financière</option>
                                    </optgroup>
                                    <optgroup label="Ingénierie">
                                        <option value="Génie civil" {{ in_array('Génie civil', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Génie civil</option>
                                        <option value="Génie mécanique" {{ in_array('Génie mécanique', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Génie mécanique</option>
                                        <option value="Génie électrique" {{ in_array('Génie électrique', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Génie électrique</option>
                                        <option value="Génie chimique" {{ in_array('Génie chimique', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Génie chimique</option>
                                    </optgroup>
                                    <optgroup label="Commerce et Marketing">
                                        <option value="Vente et distribution" {{ in_array('Vente et distribution', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Vente et distribution</option>
                                        <option value="Marketing digital" {{ in_array('Marketing digital', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Marketing digital</option>
                                        <option value="Gestion de marque" {{ in_array('Gestion de marque', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion de marque</option>
                                        <option value="Analyse de marché" {{ in_array('Analyse de marché', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Analyse de marché</option>
                                    </optgroup>
                                    <optgroup label="Éducation et Formation">
                                        <option value="Enseignement" {{ in_array('Enseignement', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Enseignement</option>
                                        <option value="Formation professionnelle" {{ in_array('Formation professionnelle', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Formation professionnelle</option>
                                        <option value="Pédagogie" {{ in_array('Pédagogie', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Pédagogie</option>
                                        <option value="Gestion éducative" {{ in_array('Gestion éducative', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion éducative</option>
                                    </optgroup>
                                    <optgroup label="Arts et Création">
                                        <option value="Design graphique" {{ in_array('Design graphique', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Design graphique</option>
                                        <option value="Arts visuels" {{ in_array('Arts visuels', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Arts visuels</option>
                                        <option value="Musique et spectacle" {{ in_array('Musique et spectacle', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Musique et spectacle</option>
                                        <option value="Design d'intérieur" {{ in_array('Design d\'intérieur', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Design d'intérieur</option>
                                    </optgroup>
                                    <optgroup label="Sciences et Recherche">
                                        <option value="Biologie" {{ in_array('Biologie', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Biologie</option>
                                        <option value="Physique" {{ in_array('Physique', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Physique</option>
                                        <option value="Chimie" {{ in_array('Chimie', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Chimie</option>
                                        <option value="Recherche scientifique" {{ in_array('Recherche scientifique', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Recherche scientifique</option>
                                    </optgroup>
                                    <optgroup label="Tourisme et Hôtellerie">
                                        <option value="Gestion hôtelière" {{ in_array('Gestion hôtelière', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion hôtelière</option>
                                        <option value="Planification de voyages" {{ in_array('Planification de voyages', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Planification de voyages</option>
                                        <option value="Gestion d'événements" {{ in_array('Gestion d\'événements', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion d'événements</option>
                                        <option value="Restauration" {{ in_array('Restauration', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Restauration</option>
                                    </optgroup>
                                    <optgroup label="Ressources Humaines">
                                        <option value="Gestion des ressources humaines">Gestion des ressources humaines</option>
                                        <option value="Recrutement et sélection">Recrutement et sélection</option>
                                        <option value="Développement organisationnel">Développement organisationnel</option>
                                        <option value="Formation et développement">Formation et développement</option>
                                    </optgroup>
                                    <optgroup label="Marketing et Publicité">
                                        <option value="Publicité" {{ in_array('Publicité', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Publicité</option>
                                        <option value="Relations publiques" {{ in_array('Relations publiques', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Relations publiques</option>
                                        <option value="Marketing numérique" {{ in_array('Marketing numérique', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Marketing numérique</option>
                                        <option value="Gestion de marque" {{ in_array('Gestion de marque', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion de marque</option>
                                    </optgroup>
                                    <optgroup label="Droit et Juridique">
                                        <option value="Droit pénal" {{ in_array('Droit pénal', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Droit pénal</option>
                                        <option value="Droit civil" {{ in_array('Droit civil', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Droit civil</option>
                                        <option value="Droit international" {{ in_array('Droit international', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Droit international</option>
                                        <option value="Droit commercial" {{ in_array('Droit commercial', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Droit commercial</option>
                                    </optgroup> 
                                    <optgroup label="Agriculture et Environnement">
                                        <option value="Gestion agricole" {{ in_array('Gestion agricole', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion agricole</option>
                                        <option value="Sciences de l'environnement" {{ in_array('Sciences de l\'environnement', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Sciences de l'environnement</option>
                                        <option value="Agriculture durable" {{ in_array('Agriculture durable', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Agriculture durable</option>
                                        <option value="Conservation de la biodiversité" {{ in_array('Conservation de la biodiversité', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Conservation de la biodiversité</option>
                                    </optgroup>
                                    <optgroup label="Énergie et Ressources Naturelles">
                                        <option value="Énergies renouvelables" {{ in_array('Énergies renouvelables', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Énergies renouvelables</option>
                                        <option value="Gestion des ressources" {{ in_array('Gestion des ressources', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion des ressources</option>
                                        <option value="Ingénierie énergétique" {{ in_array('Ingénierie énergétique', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Ingénierie énergétique</option>
                                        <option value="Exploration minière" {{ in_array('Exploration minière', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Exploration minière</option>
                                    </optgroup>
                                    <optgroup label="Transport et Logistique">
                                        <option value="Gestion de la chaîne d'approvisionnement" {{ in_array('Gestion de la chaîne d\'approvisionnement', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion de la chaîne d'approvisionnement</option>
                                        <option value="Logistique et distribution" {{ in_array('Logistique et distribution', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Logistique et distribution</option>
                                        <option value="Transport international" {{ in_array('Transport international', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Transport international</option>
                                        <option value="Gestion des infrastructures de transport" {{ in_array('Gestion des infrastructures de transport', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion des infrastructures de transport</option>
                                    </optgroup>
                                    <optgroup label="Développement et Humanitaire">
                                        <option value="Aide au développement" {{ in_array('Aide au développement', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Aide au développement</option>
                                        <option value="ONG et organisations humanitaires" {{ in_array('ONG et organisations humanitaires', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>ONG et organisations humanitaires</option>
                                        <option value="Gestion des projets de développement" {{ in_array('Gestion des projets de développement', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion des projets de développement</option>
                                        <option value="Travail social" {{ in_array('Travail social', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Travail social</option>
                                    </optgroup>

                                    <optgroup label="Télécommunications">
                                        <option value="Réseaux de communication" {{ in_array('Réseaux de communication', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Réseaux de communication</option>
                                        <option value="Gestion des infrastructures télécom" {{ in_array('Gestion des infrastructures télécom', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Gestion des infrastructures télécom</option>
                                        <option value="Services Internet" {{ in_array('Services Internet', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Services Internet</option>
                                        <option value="Développement de technologies de communication" {{ in_array('Développement de technologies de communication', old('secteur_activite_preferer', json_decode($etudiant->secteur_activite_preferer, true) ?? [])) ? 'selected' : '' }}>Développement de technologies de communication</option>
                                    </optgroup>
                                </select>
                            </div>

                            <!-- Type d'emploi recherché -->
                            <div class="mb-3">
                                <label for="type-emploi" class="form-label">Type d'emploi recherché :</label>
                                @php
                                    $typeEmploiRecherche = old('type_emploi_recherche', is_string($etudiant->type_emploi_recherche) ? json_decode($etudiant->type_emploi_recherche, true) : ($etudiant->type_emploi_recherche ?? []));
                                @endphp

                                <select id="type-emploi" name="type_emploi_recherche[]" class="chosen-select multiples" multiple required>
                                    <option value="CDI" {{ in_array('CDI', $typeEmploiRecherche) ? 'selected' : '' }}>CDI</option>
                                    <option value="Stage" {{ in_array('Stage', $typeEmploiRecherche) ? 'selected' : '' }}>Stage</option>
                                    <option value="Contrat à durée déterminée" {{ in_array('Contrat à durée déterminée', $typeEmploiRecherche) ? 'selected' : '' }}>Contrat à durée déterminée</option>
                                    <option value="Freelance" {{ in_array('Freelance', $typeEmploiRecherche) ? 'selected' : '' }}>Freelance</option>
                                    <option value="Alternance" {{ in_array('Alternance', $typeEmploiRecherche) ? 'selected' : '' }}>Alternance</option>
                                </select>
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
                                    <option value="moins_1_mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === 'moins_1_mois' ? 'selected' : '' }}>Moins de 1 mois</option>
                                    <option value="1_3_mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === '1_3_mois' ? 'selected' : '' }}>1 à 3 mois</option>
                                    <option value="3_6_mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === '3_6_mois' ? 'selected' : '' }}>3 à 6 mois</option>
                                    <option value="6_12_mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === '6_12_mois' ? 'selected' : '' }}>6 à 12 mois</option>
                                    <option value="plus_12_mois" {{ old('duree_disponibilite', $etudiant->duree_disponibilite) === 'plus_12_mois' ? 'selected' : '' }}>Plus de 12 mois</option>
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
                                <p>Avez-vous besoin d’aménagements spécifiques pour participer à des événements ou des
                                    activités ?</p>
                                <select class="form-control" id="accessibilite" name="accessibilite">
                                    <option value="oui" {{ old('accessibilite', $etudiant->accessibilite) == 'oui' ? 'selected' : '' }}>Oui</option>
                                    <option value="non" {{ old('accessibilite', $etudiant->accessibilite) == 'non' ? 'selected' : '' }}>Non</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amenagements">Si oui, veuillez préciser :</label>
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

                            <div class="form-group">
                                <label for="conditions_vie">Conditions de vie spécifiques :</label>
                                <select class="form-select" id="conditions_vie" name="conditions_vie_specifiques">
                                    <option value="null" {{ old('conditions_vie_specifiques', $etudiant->conditions_vie_specifiques) == 'null' ? 'selected' : '' }}>null</option>
                                    <option value="sans_domicile" {{ old('conditions_vie_specifiques', $etudiant->conditions_vie_specifiques) == 'sans_domicile' ? 'selected' : '' }}>Sans domicile fixe</option>
                                    <option value="handicap" {{ old('conditions_vie_specifiques', $etudiant->conditions_vie_specifiques) == 'handicap' ? 'selected' : '' }}>En situation de handicap</option>
                                    <option value="prefere_pas_dire" {{ old('conditions_vie_specifiques', $etudiant->conditions_vie_specifiques) == 'prefere_pas_dire' ? 'selected' : '' }}>Préfère ne pas dire</option>
                                </select>
                            </div>

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
    </style>

@endsection
