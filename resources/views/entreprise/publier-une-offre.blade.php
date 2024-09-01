@extends('app')

@section('title, Publier une offre')

@section('content')

@include('header.header')

<div class="page-wrapper">
    <div class="preloader"></div>

        <section class="contact-section bgc-home20">
            <div class="auto-container">
                <div class="upper-title-box">
                    <h3>Publier une offre</h3>
                    <div class="text">Remplissez le formulaire pour publier une offre</div>
                </div>

                <div class="form-container">
                    <form class="default-form">
                        <div class="row">
                            <div class="form-group col-lg-12 col-md-12 mt-4">
                                <label>Titre du poste</label>
                                <input type="text" name="job_title" placeholder="Saisissez le titre du poste proposé">
                            </div>

                            <div class="form-group col-lg-6 col-md-12">
                                <label>Type de contrat</label>
                                <select class="chosen-select">
                                    <option>Stage</option>
                                    <option>CDI</option>
                                    <option>CDD</option>
                                    <option>Alternance</option>
                                    <option>Freelance / Indépendant</option>
                                    <option>Intérim</option>
                                    <option>Apprentissage</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-12">
                                <label>Durée du contrat</label>
                                <select class="chosen-select">
                                    <option>Moins de 1 mois</option>
                                    <option>1 à 3 mois</option>
                                    <option>3 à 6 mois</option>
                                    <option>Plus de 6 mois</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-12">
                                <label>Lieu du poste</label>
                                <select class="chosen-select">
                                    <option>Antananarivo</option>
                                    <option>Toamasina</option>
                                    <option>Mahajanga</option>
                                    <option>Fianarantsoa</option>
                                    <option>Antsirabe</option>
                                    <option>Nosy Be</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-6 col-md-12">
                                <label>Date de début</label>
                                <input type="date" name="start_date">
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Description du poste</label>
                                <textarea placeholder="Décrivez les responsabilités principales et les missions du poste..."></textarea>
                            </div>

                            <!-- Multiple Select -->
                            <div class="form-group col-lg-12 col-md-12">
                                <label>Compétences techniques requises</label>
                                <select class="chosen-select multiple" multiple>
                                    <option>Bureautique</option>
                                    <option>Programmation</option>
                                    <option>Gestion de Bases de Données</option>
                                    <option>Systèmes d'Information</option>
                                    <option>Cybersécurité</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Compétences transversales recherchées</label>
                                <select class="chosen-select multiple" multiple>
                                    <option>Communication écrite et orale</option>
                                    <option>Esprit d'équipe et collaboration</option>
                                    <option>Capacité d'analyse et résolution de problèmes</option>
                                    <option>Leadership et gestion du temps</option>
                                    <option>Adaptabilité et gestion du changement</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Langues Requises</label>
                                <select class="chosen-select multiple" multiple>
                                    <option>Anglais</option>
                                    <option>Français</option>
                                    <option>Espagnol</option>
                                    <option>Allemand</option>
                                    <option>Italien</option>
                                    <option>Portugais</option>
                                    <option>Arabe</option>
                                    <option>Mandarin</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Avantages offerts</label>
                                <textarea placeholder="Décrivez les avantages associés au poste..."></textarea>
                            </div>

                            <div class="form-group col-lg-12 col-md-12">
                                <label>Date limite de candidature</label>
                                <input type="date" name="application_deadline">
                            </div>

                            <div class="form-group col-lg-12 col-md-12 text-right">
                                <a href="#" class="theme-btn btn-style-one">Demander une approbation</a>
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