@extends('app')

@section('content')

@include('header.header')
<style>
       .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
    }

    .group-result{
        color: #66022b;
    }

    .remove-event{
        border-radius: 50px;
    }

    h2{
        padding-top: 50px;
    }
    .form-group label {
        font-weight: bold;
    }

    .form-group select[multiple] {
        height: auto;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-between {
        justify-content: space-between;
    }

    .align-items-center {
        align-items: center;
    }
    .contact-section .contact-form .theme-btn {
        margin-top: 20px;
        border: 1px solid;
    }
</style>
<section class="contact-section bgc-home20" id="contact-section" data-step-content="1">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="sec-title -type-2 text-center">
                    <h2>Formulaire pour les services carrieres</h2>
                    <div class="text">Avant de pouvoir activer votre compte sur notre plateforme, veuillez remplir le formulaire suivant pour que nous puissions entrer en contact avec vous.</div>
                </div>
            </div>
        </div>
        <div class="contact-form default-form">
            <form>
                <!-- Informations Générales de l'Établissement -->
                <div class="form-group">
                    <label>Nom complet de l'établissement :</label>
                    <input type="text" class="form-control" name="nom_etablissement">
                </div>
                <div class="form-group">
                    <label>Adresse de l'établissement :</label>
                    <input type="text" class="form-control" name="adresse_etablissement">
                </div>
                <div class="form-group">
                    <label>Site Web :</label>
                    <input type="text" class="form-control" name="site_web">
                </div>

                <!-- Personne de Contact -->
                <div class="form-group">
                    <label>Nom et fonction :</label>
                    <input type="text" class="form-control" name="nom_fonction">
                </div>
                <div class="form-group">
                    <label>Adresse e-mail :</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>Numéro de téléphone :</label>
                    <input type="text" class="form-control" name="telephone">
                </div>

                <!-- Détails sur les Étudiants -->
                <div class="form-group">
                    <label>Nombre d'étudiants inscrits :</label>
                    <select class="form-control" name="nombre_etudiants">
                        <option>Moins de 100</option>
                        <option>100 à 499</option>
                        <option>500 à 999</option>
                        <option>1 000 à 4 999</option>
                        <option>5 000 à 9 999</option>
                    </select>
                </div>

                <!-- Domaines d'études proposés -->
                <div class="form-group">
                    <label>Domaines d'études proposés :</label>
                    <select class="chosen-select multiple" multiple>
                        <optgroup label="Arts et Humanités">
                            <option>Histoire</option>
                            <option>Littérature</option>
                            <option>Philosophie</option>
                            <option>Langues étrangères</option>
                            <option>Études culturelles</option>
                            <option>Arts visuels</option>
                            <option>Musique</option>
                        </optgroup>
                        <optgroup label="Sciences Sociales">
                            <option>Psychologie</option>
                            <option>Sociologie</option>
                            <option>Sciences politiques</option>
                            <option>Économie</option>
                            <option>Géographie</option>
                            <option>Relations internationales</option>
                            <option>Travail social</option>
                        </optgroup>
                        <optgroup label="Sciences Naturelles">
                            <option>Biologie</option>
                            <option>Chimie</option>
                            <option>Physique</option>
                            <option>Mathématiques</option>
                            <option>Géologie</option>
                            <option>Sciences de l'environnement</option>
                            <option>Astronomie</option>
                        </optgroup>
                        <optgroup label="Ingénierie et Technologies">
                            <option>Génie civil</option>
                            <option>Génie mécanique</option>
                            <option>Génie électrique</option>
                            <option>Génie chimique</option>
                            <option>Informatique</option>
                            <option>Télécommunications</option>
                            <option>Énergies renouvelables</option>
                        </optgroup>
                        <optgroup label="Médecine et Santé">
                            <option>Médecine</option>
                            <option>Sciences infirmières</option>
                            <option>Pharmacie</option>
                            <option>Médecine vétérinaire</option>
                            <option>Santé publique</option>
                            <option>Réhabilitation et physiothérapie</option>
                            <option>Nutrition</option>
                        </optgroup>
                        <optgroup label="Commerce et Gestion">
                            <option>Administration des affaires</option>
                            <option>Marketing</option>
                            <option>Finance</option>
                            <option>Ressources humaines</option>
                            <option>Gestion de projet</option>
                            <option>Entrepreneuriat</option>
                            <option>Logistique et Supply Chain</option>
                        </optgroup>
                        <optgroup label="Droit">
                            <option>Droit pénal</option>
                            <option>Droit civil</option>
                            <option>Droit international</option>
                            <option>Droit commercial</option>
                            <option>Droit du travail</option>
                            <option>Droit public</option>
                            <option>Droit de la propriété intellectuelle</option>
                        </optgroup>
                        <optgroup label="Éducation">
                            <option>Pédagogie</option>
                            <option>Gestion de l'éducation</option>
                            <option>Formation des enseignants</option>
                            <option>Psychologie de l'éducation</option>
                            <option>Technologies éducatives</option>
                        </optgroup>
                        <optgroup label="Architecture et Urbanisme">
                            <option>Architecture</option>
                            <option>Urbanisme</option>
                            <option>Design d'intérieur</option>
                            <option>Aménagement du territoire</option>
                            <option>Conservation du patrimoine</option>
                        </optgroup>
                        <optgroup label="Sciences et Technologies de l'Information">
                            <option>Développement logiciel</option>
                            <option>Sécurité informatique</option>
                            <option>Intelligence artificielle</option>
                            <option>Big Data</option>
                            <option>Réseaux et systèmes</option>
                            <option>Design web et UX</option>
                        </optgroup>
                        <optgroup label="Agriculture et Environnement">
                            <option>Sciences agronomiques</option>
                            <option>Gestion des ressources naturelles</option>
                            <option>Agronomie</option>
                            <option>Écologie</option>
                            <option>Développement durable</option>
                            <option>Gestion de l'eau</option>
                        </optgroup>
                        <optgroup label="Tourisme et Hôtellerie">
                            <option>Gestion hôtelière</option>
                            <option>Gestion du tourisme</option>
                            <option>Planification d'événements</option>
                            <option>Marketing touristique</option>
                            <option>Gestion des loisirs</option>
                        </optgroup>
                        <optgroup label="Sciences Politiques et Relations Internationales">
                            <option>Théorie politique</option>
                            <option>Relations internationales</option>
                            <option>Diplomatie</option>
                            <option>Analyse des politiques publiques</option>
                            <option>Études de sécurité</option>
                        </optgroup>
                    </select>
                </div>

                <!-- Niveaux d'études proposés -->
                <div class="form-group">
                    <label>Niveaux d'études proposés :</label>
                    <select class="chosen-select multiple" multiple>
                        <option>Licence générale</option>
                        <option>Licence professionnelle</option>
                        <option>Licence en alternance</option>
                        <option>Master 1</option>
                        <option>Master 2</option>
                        <option>Master Recherche</option>
                        <option>Master Professionnel</option>
                        <option>Doctorat</option>
                        <option>Thèse de Doctorat</option>
                        <option>Post-doctorat</option>
                        <option>Certificat de Compétences Professionnelles</option>
                        <option>Diplôme Universitaire</option>
                        <option>Diplôme d'Études Supérieures Spécialisées</option>
                        <option>Diplôme d'Études Supérieures</option>
                        <option>Formations courtes spécialisées</option>
                        <option>Certificats de spécialisation</option>
                        <option>Diplômes de formation continue</option>
                        <option>Double diplôme en partenariat avec d’autres institutions académiques</option>
                    </select>
                </div>

                <!-- Activités et Événements -->
                <!-- Section Calendrier Événement -->
                <div class="form-group">
                    <div class="form-group d-flex justify-content-between align-items-center">
                        <h4>Calendrier des Événements</h4>
                    </div>
                    <div class="event-section">
                        <!-- X Button positioned to the right after "Calendrier des Événements" -->
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-danger remove-event">X</button>
                        </div>


                        <!-- Titre de l'événement -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="event-title">Titre de l'événement</label>
                                <input type="text" id="event-title" name="event_title[]" class="form-control" placeholder="Titre de l'événement" required>
                            </div>
                        </div>

                        <!-- Dates et Heure -->
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label for="start-date">Date de début</label>
                                <input type="date" id="start-date" name="start_date[]" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="end-date">Date de fin</label>
                                <input type="date" id="end-date" name="end_date[]" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="start-time">Heure de début</label>
                                <input type="time" id="start-time" name="start_time[]" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label for="end-time">Heure fin</label>
                                <input type="time" id="end-time" name="end_time[]" class="form-control" required>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="event-description">Description</label>
                                <textarea id="event-description" name="event_description[]" class="form-control" rows="4" placeholder="Description de l'événement" required></textarea>
                            </div>
                        </div>

                    </div>

                    <!-- Ajouter un autre événement -->
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="theme-btn btn-style-four add-event">Ajouter un autre événement</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <button type="button" class="theme-btn btn-style-one">Envoyer</button>
                        </div>
                    </div>
                </div>

</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Event listener to remove the event section when "X" is clicked
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-event')) {
            const eventSection = event.target.closest('.event-section');
            if (eventSection) {
                eventSection.remove();
            }
        }
    });

    // Event listener to clone the event section when "Ajouter un autre événement" is clicked
    const addEventButton = document.querySelector('.add-event');
    const eventSection = document.querySelector('.event-section');

    addEventButton.addEventListener('click', function() {
        // Clone the event section
        const newEventSection = eventSection.cloneNode(true);

        // Reset the input values in the cloned section
        newEventSection.querySelectorAll('input, textarea').forEach(function(input) {
            input.value = '';
        });

        // Insert the new section before the "Ajouter un autre événement" button
        addEventButton.closest('.row').insertAdjacentElement('beforebegin', newEventSection);
    });
});

</script>
@endsection
