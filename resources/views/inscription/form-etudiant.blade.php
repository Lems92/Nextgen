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
                    <div class="upper-title-box text-center mb-4">
                        <h3>Formulaire d'Inscription Étudiant</h3>
                    </div>

                    <form id="default-form">

                        <fieldset class="form-section">
                            <legend class="text-primary">Informations Personnelles</legend>
                            <div class="row">
                                <div class="form-group col-lg-12 col-md-12 mt-4">
                                    <label for="prenom" class="form-label">Prénom :</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control" required>
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
                                    <input type="tel" id="telephone" name="telephone" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="date-naissance" class="form-label">Date de naissance :</label>
                                    <input type="date" id="date-naissance" name="date_naissance" class="form-control" required>
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
                                    <input type="text" id="adresse-postale" name="adresse_postale" class="form-control" required>
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
                                    <input type="text" id="code-postal" name="code_postal" class="form-control" required>
                                </div>
                            </div>
                        </fieldset>

                        <!-- Éducation -->
                        <fieldset class="form-section">
                            <legend class="text-primary">Éducation</legend>
                            <div class="mb-3">
                                <label for="nom-ecole" class="form-label">Nom de l'école ou de l'université :</label>
                                <input type="text" id="nom-ecole" name="nom_ecole" class="form-control" required>
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
                                <label for="annee-diplome" class="form-label">Année d'obtention du diplôme ou année d'inscription en cours :</label>
                                <input type="text" id="annee-diplome" name="annee_diplome" class="form-control" required>
                            </div>
                        </fieldset>

                        <!-- Expérience Académique -->
                        <fieldset class="form-section">
                            <legend class="text-primary">Expérience Académique</legend>
                            <div class="mb-3">
                                <h4>Stage Académique</h4>
                                <div id="stage_academique_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('stage_academique')">Ajouter</button>
                            </div>

                            <div class="mb-3">
                                <h4>Projet Académique</h4>
                                <div id="projet_academique_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('projet_academique')">Ajouter</button>
                            </div>

                            <div class="mb-3">
                                <h4>Thèse et Mémoire</h4>
                                <div id="these_memoire_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('these_memoire')">Ajouter</button>
                            </div>

                            <div class="mb-3">
                                <h4>Réalisations</h4>
                                <div id="realisations_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('realisations')">Ajouter</button>
                            </div>

                            <div class="mb-3">
                                <h4>Cours Spécialisés</h4>
                                <div id="cours_speciaux_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('cours_speciaux')">Ajouter</button>
                            </div>

                            <div class="mb-3">
                                <h4>Autres Expériences</h4>
                                <div id="autres_experiences_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('autres_experiences')">Ajouter</button>
                            </div>
                        </fieldset>

                        <!-- Compétences -->
                        <fieldset class="form-section">
                            <legend class="text-primary">Compétences</legend>
                            <div class="mb-3">
                                <h4>Compétences techniques</h4>
                                <div id="competences_techniques_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('competences_techniques')">Ajouter</button>
                            </div>
                            <div class="mb-3">
                                <h4>Compétences en Communication :</h4>
                                <div id="competences_en_communication_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('competences_en_communication')">Ajouter</button>
                            </div>
                            <div class="mb-3">
                                <h4>Compétences en Gestion de Projet :</h4>
                                <div id="competences_gestion_projet_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('competences_gestion_projet')">Ajouter</button>
                            </div>
                        </fieldset>

                        <!-- Expérience Professionnelle -->
                        <fieldset class="form-section">
                            <legend class="text-primary">Expérience Professionnelle</legend>
                            <div class="mb-3">
                                <h4>Expérience Professionnelle :</h4>
                                <div id="experiences_professionnelles_conteneur"></div>
                                <button type="button" class="theme-btn btn-style-one" onclick="ajouterChamp('experiences_professionnelles')">Ajouter</button>
                            </div>
                        </fieldset>

                        <!-- Portfolio -->
                        <fieldset class="form-section">
                            <legend class="text-primary">Portfolio</legend>
                            <div class="mb-3">
                                <label for="portfolio" class="form-label">Liens vers des projets, articles, créations artistiques :</label>
                                <textarea id="portfolio" name="portfolio" class="form-control" rows="4" required></textarea>
                            </div>
                        </fieldset>

                        <!-- Centres d'Intérêt -->
                        <fieldset class="form-section">
                            <legend class="text-primary">Centres d'Intérêt</legend>
                            <div class="mb-3">
                                <label for="centres-interet" class="form-label">Hobbies et intérêts personnels :</label>
                                <textarea id="centres-interet" name="centres_interet" class="form-control" rows="4" required></textarea>
                            </div>
                        </fieldset>

                        <!-- Documents -->
                        <fieldset class="form-section">
                            <legend class="text-primary">Documents</legend>
                            <div class="mb-3">
                                <label for="diplome" class="form-label">Diplôme :</label>
                                <input type="file" id="diplome" name="diplome" class="form-control" accept=".pdf,.doc,.docx" required>
                            </div>
                            <div class="mb-3">
                                <label for="lettre-recommandation" class="form-label">Lettre de recommandation :</label>
                                <input type="file" id="lettre-recommandation" name="lettre_recommandation" class="form-control" accept=".pdf,.doc,.docx" required>
                            </div>
                        </fieldset>

                        <!-- Préférences de Carrière -->
                        <fieldset class="form-section">
                            <legend class="text-primary">Préférences de Carrière</legend>
                            <div class="mb-3">
                                <label for="secteur-activite" class="form-label">Secteur d'activité préféré :</label>
                                <input type="text" id="secteur-activite" name="secteur_activite" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="type-emploi" class="form-label">Type d'emploi recherché :</label>
                                <input type="text" id="type-emploi" name="type_emploi" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="localisation-preferree" class="form-label">Localisation géographique préférée :</label>
                                <input type="text" id="localisation-preferree" name="localisation_preferree" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="salaire-souhaite" class="form-label">Salaire souhaité :</label>
                                <input type="text" id="salaire-souhaite" name="salaire_souhaite" class="form-control" required>
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
            <div class="mb-3">
                <input type="text" name="${secteur}_titre[]" class="form-control" placeholder="Titre" required>
            </div>
            <div class="mb-3">
                <input type="text" name="${secteur}_annee[]" class="form-control" placeholder="Année" required>
            </div>
            <div class="mb-3">
                <textarea name="${secteur}_description[]" class="form-control" placeholder="Description" rows="4" required></textarea>
            </div>
            <button type="button" class="btn btn-danger btn-sm" onclick="supprimerChamp(this)">-</button>
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
            const regions = {
                madagascar: [
                    { value: 'analamanga', text: 'Analamanga' },
                    { value: 'atsinanana', text: 'Atsinanana' },
                    { value: 'boeny', text: 'Boeny' },
                    { value: 'ihorombe', text: 'Ihorombe' },
                    { value: 'menabe', text: 'Menabe' },
                    { value: 'sava', text: 'Sava' },
                    { value: 'vakinankaratra', text: 'Vakinankaratra' }
                ],
                france: [
                    { value: 'auvergne-rhone-alpes', text: 'Auvergne-Rhône-Alpes' },
                    { value: 'bretagne', text: 'Bretagne' },
                    { value: 'centre-val-de-loire', text: 'Centre-Val de Loire' },
                    { value: 'corse', text: 'Corse' },
                    { value: 'ile-de-france', text: 'Île-de-France' },
                    { value: 'normandie', text: 'Normandie' },
                    { value: 'occitanie', text: 'Occitanie' },
                    { value: 'paca', text: 'Provence-Alpes-Côte d\'Azur' }
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

@endsection
