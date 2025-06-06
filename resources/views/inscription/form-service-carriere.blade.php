@extends('app')

@section('title','Inscription Service Carriere')

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

        .group-result {
            color: #66022b;
        }

        .remove-event {
            border-radius: 50px;
        }

        h2 {
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

        .error-message {
            font-size: 0.875rem;
            color: #dc3545;
            margin-top: 0.25rem;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        .is-invalid:focus {
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
        }

        select[multiple].is-invalid {
            border-color: #dc3545 !important;
        }
    </style>
    <section class="contact-section bgc-home20" id="contact-section" data-step-content="1">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="sec-title -type-2 text-center">
                        <h2>Formulaire pour les services carrieres</h2>
                        <div class="text">Avant de pouvoir activer votre compte sur notre plateforme, veuillez remplir
                            le formulaire suivant pour que nous puissions entrer en contact avec vous.
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-form default-form">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Veuillez corriger les erreurs ci-dessous et remplir convenablement le
                            formulaire.</strong>
                    </div>
                @endif
                <form method="POST" action="{{ route('inscription.service-carriere.post') }}">
                    @csrf

                    <div class="col-lg-12 form-group">
                        <h3>Informations Générales</h3>
                    </div>

                    <div class="form-group">
                        <label for="nom_etablissement">Nom complet de l'établissement :</label>
                        <input type="text" id="nom_etablissement" value="{{old('nom_etablissement')}}"
                               class="form-control" name="nom_etablissement" required>
                        <x-input-error :messages="$errors->get('nom_etablissement')" class="mt-2"/>
                    </div>
                    <div class="form-group">
                        <label for="adresse_etablissement">Adresse de l'établissement :</label>
                        <input type="text" id="adresse_etablissement" value="{{old('adresse_etablissement')}}"
                               class="form-control" name="adresse_etablissement" required>
                        <x-input-error :messages="$errors->get('adresse_etablissement')" class="mt-2"/>
                    </div>
                    <div class="form-group">
                        <label for="site_web">Site Web :</label>
                        <input type="text" id="site_web" value="{{old('site_web')}}" class="form-control"
                               name="site_web">
                        <x-input-error :messages="$errors->get('site_web')" class="mt-2"/>
                    </div>

                    <!-- Détails sur les Étudiants -->
                    <div class="form-group">
                        <label for="nombre_etudiants">Nombre d'étudiants inscrits :</label>
                        <select class="form-control" id="nombre_etudiants" name="nombre_etudiants" required>
                            @foreach($nombre_etudiants as $nombre)
                                <option
                                    value="{{$nombre->sigle}}" {{ old('type_contrat') == $nombre->sigle ? 'selected' : '' }}>{{$nombre->libelle}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('nombre_etudiants')" class="mt-2"/>
                    </div>

                    <!-- Domaines d'études proposés -->
                    <div class="form-group">
                        <label for="domaines_etudes_proposes">Domaines d'études proposés :</label>
                        <select class="chosen-select multiple" id="domaines_etudes_proposes"
                                name="domaines_etudes_proposes[]" multiple>
                            @foreach($domaines_etudes_categories as $categorie)
                                <optgroup label="{{$categorie->name}}">
                                    @foreach($categorie->list_with_categories as $sous_cat)
                                        <option value="{{$sous_cat->name}}"
                                                title="{{$sous_cat->description}}"
                                                {{ in_array($sous_cat->name, old('domaines_etudes_proposes') ?? []) ? 'selected' : '' }}
                                        >{{$sous_cat->name}}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('domaines_etudes_proposes')" class="mt-2"/>
                    </div>

                    <!-- Niveaux d'études proposés -->
                    <div class="form-group">
                        <label for="niveaux_etudes_proposes">Niveaux d'études proposés :</label>
                        <select class="chosen-select multiple" id="niveaux_etudes_proposes"
                                name="niveaux_etudes_proposes[]" multiple>
                            @foreach($niveaux_etudes_proposes as $niveau_etude)
                                <option value="{{$niveau_etude->sigle}}"
                                    {{ in_array($niveau_etude->sigle, old('niveaux_etudes_proposes') ?? []) ? 'selected' : '' }}>
                                    {{$niveau_etude->libelle}}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('niveaux_etudes_proposes')" class="mt-2"/>
                    </div>

                    <!-- Personne de Contact -->
                    <div class="col-lg-12 mt-5 form-group">
                        <h3>Personne de contact</h3>
                    </div>

                    <div class="form-group">
                        <label for="nom_contact">Nom :</label>
                        <input type="text" id="nom_contact" value="{{old('nom_contact')}}" class="form-control"
                               name="nom_contact" required>
                        <x-input-error :messages="$errors->get('nom_contact')" class="mt-2"/>
                    </div>
                    <div class="form-group">
                        <label for="fonction_contact">Fonction :</label>
                        <input type="text" id="fonction_contact" value="{{old('fonction_contact')}}"
                               class="form-control" name="fonction_contact" required>
                        <x-input-error :messages="$errors->get('fonction_contact')" class="mt-2"/>
                    </div>
                    <div class="form-group">
                        <label for="adresse_email_contact">Adresse e-mail :</label>
                        <input type="email" id="adresse_email_contact" value="{{old('adresse_email_contact')}}"
                               class="form-control" name="adresse_email_contact" required>
                        <x-input-error :messages="$errors->get('adresse_email_contact')" class="mt-2"/>
                    </div>
                    <div class="form-group">
                        <label for="numero_telephone_contact">Numéro de téléphone :</label>
                        <input type="text" id="numero_telephone_contact" value="{{old('numero_telephone_contact')}}"
                               class="form-control" name="numero_telephone_contact" required>
                        <x-input-error :messages="$errors->get('numero_telephone_contact')" class="mt-2"/>
                    </div>

                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="theme-btn btn-style-one">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const inputs = form.querySelectorAll('input, select, textarea');
            
            inputs.forEach(input => {
                // Ajouter un message d'erreur personnalisé
                input.addEventListener('invalid', function(e) {
                    e.preventDefault();
                    if (!input.validity.valid) {
                        let message = '';
                        if (input.validity.valueMissing) {
                            message = 'Ce champ est obligatoire';
                        } else if (input.validity.typeMismatch && input.type === 'email') {
                            message = 'Veuillez entrer une adresse email valide';
                        } else if (input.validity.typeMismatch && input.type === 'tel') {
                            message = 'Veuillez entrer un numéro de téléphone valide';
                        } else if (input.validity.typeMismatch && input.type === 'url') {
                            message = 'Veuillez entrer une URL valide';
                        }
                        
                        // Créer ou mettre à jour le message d'erreur
                        let errorDiv = input.nextElementSibling;
                        if (!errorDiv || !errorDiv.classList.contains('error-message')) {
                            errorDiv = document.createElement('div');
                            errorDiv.className = 'error-message text-danger mt-1';
                            input.parentNode.insertBefore(errorDiv, input.nextSibling);
                        }
                        errorDiv.textContent = message;
                        input.classList.add('is-invalid');
                    }
                });

                // Supprimer le message d'erreur lors de la saisie
                input.addEventListener('input', function() {
                    if (input.validity.valid) {
                        const errorDiv = input.nextElementSibling;
                        if (errorDiv && errorDiv.classList.contains('error-message')) {
                            errorDiv.textContent = '';
                        }
                        input.classList.remove('is-invalid');
                    }
                });
            });

            // Validation des champs select multiples
            const multiSelects = document.querySelectorAll('select[multiple]');
            multiSelects.forEach(select => {
                if (select.hasAttribute('required')) {
                    select.addEventListener('change', function() {
                        if (select.selectedOptions.length === 0) {
                            select.classList.add('is-invalid');
                        } else {
                            select.classList.remove('is-invalid');
                        }
                    });
                }
            });

            // Validation du formulaire avant soumission
            form.addEventListener('submit', function(e) {
                let isValid = true;
                inputs.forEach(input => {
                    if (!input.validity.valid) {
                        isValid = false;
                        input.dispatchEvent(new Event('invalid'));
                    }
                });
                
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection
