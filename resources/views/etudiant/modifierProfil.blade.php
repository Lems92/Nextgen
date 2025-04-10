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
                                <h4> Personnelles </h4>
                            </legend>
                            <div class="row">
                                <div class="uploading-outer">
                                    <div class="uploadButton">
                                        <input class="uploadButton-input" type="file" name="profile_picture"
                                            accept="image/*, application/pdf" id="upload" multiple />
                                        <label class="uploadButton-button ripple-effect" for="upload">Importer votre
                                            photo</label>
                                        <span class="uploadButton-file-name"></span>
                                    </div>
                                    <div class="text">Taille maximale du fichier : 1 Mo, Dimensions minimales : 330x300 et
                                        les fichiers acceptés sont .jpg et .png</div>
                                </div>
                                <div class="form-group col-lg-12 col-md-12 mt-4">
                                    <label for="prenom" class="form-label">Prénom :</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control"  required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nom" class="form-label">Nom :</label>
                                    <input type="text" id="nom" name="nom" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Adresse e-mail :</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="telephone" class="form-label">Numéro de téléphone :</label>
                                    <input type="tel" id="telephone" name="numero_telephone" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="date-naissance" class="form-label">Date de naissance :</label>
                                    <input type="date" id="date-naissance" name="date_naissance" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="genre" class="form-label">Genre :</label>
                                    <select id="genre" name="genre" class="form-select" required>
                                        <option value="masculin">Masculin</option>
                                        <option value="feminin">Féminin</option>
                                        <option value="non-binaire">Non-binaire</option>
                                        <option value="prefere-pas-dire">Préfère ne pas dire</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="adresse-postale" class="form-label">Adresse postale :</label>
                                    <input type="text" id="adresse-postale" name="adresse_postale" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pays" class="form-label">Pays :</label>
                                    <select id="pays" name="pays" class="form-select" required>
                                        <option value="madagascar">Madagascar</option>
                                        <option value="france">France</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="region" class="form-label">Région :</label>
                                    <select id="region" name="region" class="form-select" required>
                                        <option value="analamanga">Analamanga</option>
                                        <option value="atsinanana">Atsinanana</option>
                                        <option value="boeny">Boeny</option>
                                        <option value="ihorombe">Ihorombe</option>
                                        <option value="menabe">Menabe</option>
                                        <option value="sava">Sava</option>
                                        <option value="vakinankaratra">Vakinankaratra</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="ville" class="form-label">Ville :</label>
                                    <input type="text" id="ville" name="ville" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="code-postal" class="form-label">Code postal :</label>
                                    <input type="text" id="code-postal" name="code_postal" class="form-control"
                                        required>
                                </div>
                            </div>
                        </fieldset>

                        <!-- Éducation -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Éducation</h4>
                            </legend>
                            <div class="mb-3">
                                <label for="nom-ecole" class="form-label">Nom de l'école ou de l'université :</label>
                                <input type="text" id="nom-ecole" name="nom_ecole_universite" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="domaine-etudes" class="form-label">Domaine d'études :</label>
                                <select id="domaine-etudes" name="domaine_etudes" class="form-select" required>
                                    <option value="sciences">Sciences</option>
                                    <option value="ingenierie">Ingénierie</option>
                                    <option value="arts">Arts</option>
                                    <option value="commerce">Commerce</option>
                                    <option value="medecine">Médecine</option>
                                    <option value="droit">Droit</option>
                                    <option value="economie">Économie</option>
                                    <option value="architecture">Architecture</option>
                                    <option value="sciences-sociales">Sciences sociales</option>
                                    <option value="sciences-vie">Sciences de la vie</option>
                                    <option value="sciences-environnement">Sciences de l'environnement</option>
                                    <option value="education">Éducation</option>
                                    <option value="tourisme-hotel">Tourisme et hôtellerie</option>
                                    <option value="agriculture-environnement">Agriculture et environnement rural</option>
                                    <option value="technologies-information">Technologies de l'information</option>
                                    <option value="communication">Communication</option>
                                    <option value="langues-cultures">Langues et cultures</option>
                                    <option value="sciences-politiques">Sciences politiques</option>
                                    <option value="gestion">Gestion</option>
                                    <option value="sciences-sante">Sciences de la santé</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="niveau-etudes" class="form-label">Niveau d'études :</label>
                                <select id="niveau-etudes" name="niveau_etudes" class="form-select" required>
                                    <option value="licence">Licence</option>
                                    <option value="master">Master</option>
                                    <option value="doctorat">Doctorat</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="annee-diplome" class="form-label">Année d'obtention du diplôme ou année
                                    d'inscription en cours :</label>
                                <input type="text" id="annee-diplome" name="annee_obtention_diplome"
                                    class="form-control" required>
                            </div>
                        </fieldset>

                        <!-- Expérience Académique -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Expérience Académique</h4>
                            </legend>
                            <div class="mb-3">
                                <h6>Stage Académique</h6>
                                <p>ex: Stage de recherche, Stage en laboratoire, Stage en entreprise...</p>
                                <div id="stage_academique"></div>
                                <textarea type="text" id="stage_academique" name="stage_academique" rows="10" class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, durée, et description"></textarea>
                            </div>

                            <div class="mb-3">
                                <h6>Projet Académique</h6>
                                <p>ex. Projet de groupe, projet individuel, projet fin d'étude, projet de recherche...</p>
                                <div id="projet_academique"></div>
                                <textarea type="text" id="projet_academique" name="projet_academique" rows="10" class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, durée, et description"></textarea>
                            </div>

                            <div class="mb-3">
                                <h6>Thèse et Mémoire</h6>
                                <p>ex: Thèse de doctorat, Mémoire de Master, Mémoire de Licence, Dissertation...</p>
                                <div id="these_memoire"></div>
                                <textarea type="text" id="these_memoire" name="these_memoire" rows="10" class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, durée, et description"></textarea>
                            </div>

                            <div class="mb-3">
                                <h6>Réalisations</h6>
                                <p>ex: Publication dans une revue académique, Présentation à une conférence universitaire,
                                    Récompense ou distinction académique, Participation à un concours académique...</p>
                                <div id="realisations"></div>
                                <textarea type="text" id="realisations" name="realisations" rows="10" class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, durée, et description"></textarea>
                            </div>

                            <div class="mb-3">
                                <h6>Cours Spécialisés</h6>
                                <p>ex: Cours de spécialisation, Séminaire, Atelier spécialisé</p>
                                <div id="cours_speciaux"></div>
                                <textarea type="text" id="cours_speciaux" name="cours_speciaux" rows="10" class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, durée, et description"></textarea>
                            </div>


                            <div class="mb-3">
                                <h6>Autres Expériences</h6>
                                <p>ex: Participation à des Evenements académiques, recherche, encadrement, activités
                                    Parascolaires; programmes d'échange, Certificats et diplômes complémentaires...</p>
                                <div id="autres_experiences"></div>
                                <textarea type="text" id="autres_experiences" name="autres_experiences" rows="10" class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, durée, et description"></textarea>
                            </div>
                        </fieldset>

                        <!-- Compétences -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Compétences</h4>
                            </legend>
                            <div class="mb-3">
                                <h6>Compétences techniques</h6>
                                <p>ex: Compétences en Informatiques (Bureautique, programmation, gestion de bases de
                                    données, systèmes d'information, cybersécurité...)</p>
                                <div id="competences_techniques"></div>
                                <input type="text" id="competences_techniques" name="competences_techniques" class="form-control">
                            </div>
                            <div class="mb-3">
                                <h6>Compétences en Recherche et Analyse :</h6>
                                <p>ex: Recherche documentaire, Analyse de donnée, Rédaction de rapports</p>
                                <div id="competences_en_recherche_et_analyse"></div>
                                <input type="text" id="competences_en_recherche_et_analyse" name="competences_en_recherche_et_analyse"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <h6>Compétences en Communication :</h6>
                                <p>ex: Communication orale/ecrite, compétence en négociation</p>
                                <div id="competences_en_communication"></div>
                                <input type="text" id="competences_en_communication"
                                    name="competences_en_communication" class="form-control">
                            </div>
                            <div class="mb-3">
                                <h6>Langues :</h6>
                                <p>ex: Français, Anglais, Allemand, Espagnol...</p>
                                <div id="competences_langues"></div>
                                <input type="text" id="competences_en_communication"
                                    name="competences_langues" class="form-control">
                            </div>
                            <div class="mb-3">
                                <h6>Autres compétences</h6>
                                <p>ex: Compétences interpersonnelles, Résolutions des problèmes, adaptabilités, gestion du
                                    stress, leadership, Ethique et responsabilité, gestion financière...</p>
                                <div id="autres_competences"></div>
                                <input type="text" id="autres_competences" name="autres_competences"
                                    class="form-control">
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
                                <div id="experiences_professionnelles"></div>
                                <textarea type="text" id="experiences_professionnelles" name="experiences_professionnelles" rows="4"
                                    class="form-control"
                                    placeholder="Veuillez préciser le titre, l'année, la durée et la description de l'expérience"></textarea>
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
                                <textarea id="portfolio" name="portfolio" class="form-control" rows="4" required></textarea>
                            </div>
                        </fieldset>

                        <!-- Centres d'Intérêt -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Centres d'Intérêt</h4>
                            </legend>
                            <div class="mb-3">
                                <label for="centres-interet" class="form-label">Hobbies et intérêts personnels :</label>
                                <textarea id="centres-interet" name="centres_interet" class="form-control" rows="4" required></textarea>
                            </div>
                        </fieldset>

                        <!-- Documents -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Documents</h4>
                            </legend>
                            <div class="mb-3">
                                <label for="diplome" class="form-label">Diplôme :</label>
                                <input type="file" id="diplome" name="document_diplome" class="form-control"
                                    accept=".pdf,.doc,.docx">
                            </div>
                            <div class="mb-3">
                                <label for="lettre-recommandation" class="form-label">Lettre de recommandation :</label>
                                <input type="file" id="lettre-recommandation" name="document_recommandation"
                                    class="form-control" accept=".pdf,.doc,.docx">
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
                                        <option value="Développement logiciel">Développement logiciel</option>
                                        <option value="Cybersécurité">Cybersécurité</option>
                                        <option value="Intelligence artificielle">Intelligence artificielle</option>
                                        <option value="Gestion de systèmes informatiques">Gestion de systèmes informatiques
                                        </option>
                                    </optgroup>
                                    <optgroup label="Santé">
                                        <option value="Médecine">Médecine</option>
                                        <option value="Soins infirmiers">Soins infirmiers</option>
                                        <option value="Pharmacie">Pharmacie</option>
                                        <option value="Médecine vétérinaire">Médecine vétérinaire</option>
                                    </optgroup>
                                    <optgroup label="Finance et Comptabilité">
                                        <option value="Banque et assurance">Banque et assurance</option>
                                        <option value="Gestion de portefeuille">Gestion de portefeuille</option>
                                        <option value="Comptabilité">Comptabilité</option>
                                        <option value="Analyse financière">Analyse financière</option>
                                    </optgroup>
                                    <optgroup label="Ingénierie">
                                        <option value="Génie civil">Génie civil</option>
                                        <option value="Génie mécanique">Génie mécanique</option>
                                        <option value="Génie électrique">Génie électrique</option>
                                        <option value="Génie chimique">Génie chimique</option>
                                    </optgroup>
                                    <optgroup label="Commerce et Marketing">
                                        <option value="Vente et distribution">Vente et distribution</option>
                                        <option value="Marketing digital">Marketing digital</option>
                                        <option value="Gestion de marque">Gestion de marque</option>
                                        <option value="Analyse de marché">Analyse de marché</option>
                                    </optgroup>
                                    <optgroup label="Éducation et Formation">
                                        <option value="Enseignement">Enseignement</option>
                                        <option value="Formation professionnelle">Formation professionnelle</option>
                                        <option value="Pédagogie">Pédagogie</option>
                                        <option value="Gestion éducative">Gestion éducative</option>
                                    </optgroup>
                                    <optgroup label="Arts et Création">
                                        <option value="Design graphique">Design graphique</option>
                                        <option value="Arts visuels">Arts visuels</option>
                                        <option value="Musique et spectacle">Musique et spectacle</option>
                                        <option value="Design d'intérieur">Design d'intérieur</option>
                                    </optgroup>
                                    <optgroup label="Sciences et Recherche">
                                        <option value="Biologie">Biologie</option>
                                        <option value="Physique">Physique</option>
                                        <option value="Chimie">Chimie</option>
                                        <option value="Recherche scientifique">Recherche scientifique</option>
                                    </optgroup>
                                    <optgroup label="Tourisme et Hôtellerie">
                                        <option value="Gestion hôtelière">Gestion hôtelière</option>
                                        <option value="Planification de voyages">Planification de voyages</option>
                                        <option value="Gestion d'événements">Gestion d'événements</option>
                                        <option value="Tourisme durable">Tourisme durable</option>
                                    </optgroup>
                                    <optgroup label="Droit et Juridique">
                                        <option value="Droit pénal">Droit pénal</option>
                                        <option value="Droit civil">Droit civil</option>
                                        <option value="Droit international">Droit international</option>
                                        <option value="Droit commercial">Droit commercial</option>
                                    </optgroup>
                                    <optgroup label="Agriculture et Environnement">
                                        <option value="Gestion agricole">Gestion agricole</option>
                                        <option value="Sciences de l'environnement">Sciences de l'environnement</option>
                                        <option value="Agriculture durable">Agriculture durable</option>
                                        <option value="Conservation de la biodiversité">Conservation de la biodiversité
                                        </option>
                                    </optgroup>
                                    <optgroup label="Énergie et Ressources Naturelles">
                                        <option value="Énergies renouvelables">Énergies renouvelables</option>
                                        <option value="Gestion des ressources">Gestion des ressources</option>
                                        <option value="Ingénierie énergétique">Ingénierie énergétique</option>
                                        <option value="Exploration minière">Exploration minière</option>
                                    </optgroup>
                                    <optgroup label="Transport et Logistique">
                                        <option value="Gestion de la chaîne d'approvisionnement">Gestion de la chaîne
                                            d'approvisionnement</option>
                                        <option value="Logistique et distribution">Logistique et distribution</option>
                                        <option value="Transport international">Transport international</option>
                                        <option value="Gestion des infrastructures de transport">Gestion des
                                            infrastructures de transport</option>
                                    </optgroup>
                                    <optgroup label="Développement et Humanitaire">
                                        <option value="Aide au développement">Aide au développement</option>
                                        <option value="ONG et organisations humanitaires">ONG et organisations humanitaires
                                        </option>
                                        <option value="Gestion des projets de développement">Gestion des projets de
                                            développement</option>
                                        <option value="Travail social">Travail social</option>
                                    </optgroup>
                                    <optgroup label="Télécommunications">
                                        <option value="Réseaux de communication">Réseaux de communication</option>
                                        <option value="Gestion des infrastructures télécom">Gestion des infrastructures
                                            télécom</option>
                                        <option value="Services Internet">Services Internet</option>
                                        <option value="Développement de technologies de communication">Développement de
                                            technologies de communication</option>
                                    </optgroup>
                                </select>
                            </div>

                            <!-- Type d'emploi recherché -->
                            <div class="mb-3">
                                <label for="type-emploi" class="form-label">Type d'emploi recherché :</label>
                                <select id="type-emploi" name="type_emploi_recherche[]" class="chosen-select multiples"
                                    multiple required>
                                    <option value="CDI">CDI</option>
                                    <option value="Stage">Stage</option>
                                    <option value="Contrat à durée déterminée">Contrat à durée déterminée</option>
                                    <option value="Freelance">Freelance</option>
                                    <option value="Alternance">Alternance</option>
                                </select>
                            </div>

                            <!-- Localisation géographique préférée -->
                            <div class="mb-3">
                                <label for="localisation-preferree" class="form-label">Localisation géographique préférée
                                    :</label>
                                <input type="text" id="localisation-preferree"
                                    name="localisation_geographique_preferee" class="form-control" required>
                            </div>

                            <!-- Salaire souhaité -->
                            <div class="mb-3">
                                <label for="salaire-souhaite" class="form-label">Salaire souhaité :</label>
                                <input type="text" id="salaire-souhaite" name="salaire_souhaite" class="form-control"
                                    required>
                            </div>
                        </fieldset>

                        <!-- Disponibilité de l’Étudiant Section -->
                        <fieldset class="form-section">
                            <legend>
                                <h4>Disponibilité de l’Étudiant</h4>
                            </legend>
                            <div class="form-group">
                                <label for="duree_dispo">Durée de Disponibilité :</label>
                                <select class="form-control" id="duree_dispo" name="duree_disponibilite"
                                    placeholder="Veuillez choisir">
                                    <option value="moins_1_mois">Moins de 1 mois</option>
                                    <option value="1_3_mois">1 à 3 mois</option>
                                    <option value="3_6_mois">3 à 6 mois</option>
                                    <option value="6_12_mois">6 à 12 mois</option>
                                    <option value="plus_12_mois">Plus de 12 mois</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="semestre">Semestre en Cours :</label>
                                <select class="form-control" id="semestre" name="semestre_cours">
                                    <option value="semestre_1">Semestre 1</option>
                                    <option value="semestre_2">Semestre 2</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="vacances_ete">Vacances d'Été :</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" id="vacances_debut"
                                        name="vacances_ete_debut" placeholder="Date début">
                                    <input type="date" class="form-control" id="vacances_fin" name="vacances_ete_fin"
                                        placeholder="Date fin">
                                </div>
                                <div class="form-group">
                                    <label for="vacances_dispo">Date disponible pendant les vacances d'été</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" id="dispo_debut"
                                            name="dates_disponibles_vacances_ete_debut" placeholder="Date début">
                                        <input type="date" class="form-control" id="dispo_fin"
                                            name="dates_disponibles_vacances_ete_fin" placeholder="Date fin">
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
                                    <option value="oui">Oui</option>
                                    <option value="non">Non</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="amenagements">Si oui, veuillez préciser :</label>
                                <textarea class="form-control" id="amenagements" name="details_accessibilite" rows="3"
                                    placeholder="Précisez les aménagements spécifiques"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="origine_ethnique">Origine ethnique :</label>
                                <select class="form-select" id="origine_ethnique" name="origine_ethnique">
                                    <option value="antaimoro">Antaimoro</option>
                                    <option value="antandroy">Antandroy</option>
                                    <option value="antanosy">Antanosy</option>
                                    <option value="betsileo">Betsileo</option>
                                    <option value="betsimisaraka">Betsimisaraka</option>
                                    <option value="francais">Français</option>
                                    <option value="mahafaly">Mahafaly</option>
                                    <option value="makoa">Makoa</option>
                                    <option value="masikoro">Masikoro</option>
                                    <option value="merina">Merina</option>
                                    <option value="sakalava">Sakalava</option>
                                    <option value="sihanaka">Sihanaka</option>
                                    <option value="tanala">Tanala</option>
                                    <option value="tsimihety">Tsimihety</option>
                                    <option value="tsonga">Tsonga</option>
                                    <option value="zafimaniry">Zafimaniry</option>

                                </select>
                            </div>

                            <div class="form-group">
                                <label for="statut_socio_economique">Statut socio-économique :</label>
                                <select class="form-select" id="statut_socio_economique" name="statut_socio_economique">
                                    <option value="origine_modeste">Origine modeste</option>
                                    <option value="classe_moyenne">Classe moyenne</option>
                                    <option value="prefere_pas_dire">Préfère ne pas dire</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="conditions_vie">Conditions de vie spécifiques :</label>
                                <select class="form-select" id="conditions_vie" name="conditions_vie_specifiques">
                                    <option value="null">null</option>
                                    <option value="sans_domicile">Sans domicile fixe</option>
                                    <option value="handicap">En situation de handicap</option>
                                    <option value="prefere_pas_dire">Préfère ne pas dire</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="religion_croyance">Religion ou croyance :</label>
                                <select class="form-select" id="religion_croyance" name="religion_belief">
                                    <option value="chretien">Chrétien</option>
                                    <option value="musulman">Musulman</option>
                                    <option value="bouddhiste">Bouddhiste</option>
                                    <option value="hindou">Hindou</option>
                                    <option value="prefere_pas_dire">Préfère ne pas dire</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="orientation_sexuelle">Orientation sexuelle :</label>
                                <select class="form-select" id="orientation_sexuelle" name="orientation_sexuelle">
                                    <option value="heterosexuel">Hétérosexuel</option>
                                    <option value="homosexuel">Homosexuel</option>
                                    <option value="bisexuel">Bisexuel</option>
                                    <option value="prefere_pas_dire">Préfère ne pas dire</option>
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
    </style>

@endsection
