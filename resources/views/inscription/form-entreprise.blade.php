@extends('app')

@section('title', 'Inscription entreprise')

@section('content')

    @include('header.header')

    <div class="page-wrapper">
        <div class="preloader"></div>

        <!-- Step 1: Registration Form -->
        <section class="contact-section bgc-home20" id="contact-section" data-step-content="1">
            <div class="auto-container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="sec-title -type-2 text-center">
                            <h2>Formulaire pour les Entreprises</h2>
                            <div class="text">Avant de pouvoir activer votre compte sur notre plateforme, veuillez
                                remplir le formulaire suivant pour que nous puissions entrer en contact avec vous.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact-form default-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Veuillez corriger les erreurs ci-dessous et remplir convenablement le
                                formulaire.</strong>
                        </div>
                    @endif
                    <form method="post" action="{{ route('inscription.entreprise.post') }}">
                        @csrf
                        <div class="row">
                            <!-- Informations Générales -->
                            <div class="col-lg-12 form-group">
                                <h3>Informations Générales</h3>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="nom_entreprise">Nom de l’Entreprise</label>
                                <input type="text" id="nom_entreprise" name="nom_entreprise"
                                       placeholder="Nom de l’Entreprise" value="{{old('nom_entreprise')}}" required>
                                <x-input-error :messages="$errors->get('nom_entreprise')" class="mt-2"/>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="secteur_activite">Secteur d’Activité</label>
                                <div id="secteur_activite" class="radio-group">
                                    @foreach($secteur_activites_categories as $categorie)
                                        <label class="styled-radio">
                                            <input type="radio" name="secteur_activite" value="{{$categorie->name}}" 
                                                {{ old('secteur_activite') == $categorie->name ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            {{$categorie->name}}
                                        </label>
                                    @endforeach
                                </div>
                                <x-input-error :messages="$errors->get('secteur_activite')" class="mt-2"/>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label>Adresse de l’Entreprise</label>
                                <div class="address-fields">
                                    <label for="adresse">Numéro et Rue</label>
                                    <input type="text" id="adresse" name="adresse" value="{{old('adresse')}}"
                                           placeholder="Numéro et Rue" required>
                                    <x-input-error :messages="$errors->get('adresse')" class="mt-2"/>

                                    <label for="complement_adresse">Complément d'Adresse</label>
                                    <input type="text" id="complement_adresse" value="{{old('complement_adresse')}}"
                                           name="complement_adresse"
                                           placeholder="Complément d'Adresse (si nécessaire)">
                                    <x-input-error :messages="$errors->get('complement_adresse')" class="mt-2"/>

                                    <label for="code_postal">Code Postal</label>
                                    <input id="code_postal" type="text" name="code_postal"
                                           value="{{old('code_postal')}}" placeholder="Code Postal">
                                    <x-input-error :messages="$errors->get('code_postal')" class="mt-2"/>

                                    <label for="ville">Ville</label>
                                    <input id="ville" type="text" name="ville" value="{{old('ville')}}"
                                           placeholder="Ville" required>
                                    <x-input-error :messages="$errors->get('ville')" class="mt-2"/>


                                    <input type="hidden" name="pays" value="Madagascar">
                                </div>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="site_web">Site Web</label>
                                <input id="site_web" type="text" name="site_web" value="{{old('site_web')}}"
                                       placeholder="Site Web">
                                <x-input-error :messages="$errors->get('site_web')" class="mt-2"/>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="date_creation">Date de Création</label>
                                <input id="date_creation" type="date" name="date_creation"
                                       value="{{old('date_creation')}}"
                                       placeholder="Date de Création">
                                <x-input-error :messages="$errors->get('date_creation')" class="mt-2"/>
                            </div>

                            <!-- Contact Principal -->
                            <div class="col-lg-12 form-group">
                                <h3>Contact Principal</h3>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="nom_contact">Nom du Contact</label>
                                <input type="text" id="nom_contact" name="nom_contact" value="{{old('nom_contact')}}"
                                       placeholder="Nom du Contact"
                                       required>
                                <x-input-error :messages="$errors->get('nom_contact')" class="mt-2"/>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="fonction_contact">Fonction du Contact</label>
                                <input type="text" id="fonction_contact" name="fonction_contact"
                                       value="{{old('fonction_contact')}}"
                                       placeholder="Fonction du Contact" required>
                                <x-input-error :messages="$errors->get('fonction_contact')" class="mt-2"/>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="email_contact">Adresse e-mail du Contact</label>
                                <input type="email" id="email_contact" name="email_contact"
                                       value="{{old('email_contact')}}"
                                       placeholder="Adresse e-mail du Contact" required>
                                <x-input-error :messages="$errors->get('email_contact')" class="mt-2"/>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="telephone_contact">Numéro de Téléphone du Contact</label>
                                <input type="text" id="telephone_contact" name="telephone_contact"
                                       value="{{old('telephone_contact')}}"
                                       placeholder="Numéro de Téléphone du Contact" required>
                                <x-input-error :messages="$errors->get('telephone_contact')" class="mt-2"/>
                            </div>

                            <!-- Informations sur les Opportunités -->
                            <div class="col-lg-12 form-group">
                                <h3>Informations sur les Opportunités</h3>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="opportunites_proposees">Types d'Opportunités Proposées</label>
                                <div id="opportunites_proposees" class="checkbox-group scrollable-checkbox-group">
                                    @foreach($opportunites_proposes as $opportunite)
                                        <label class="styled-checkbox">
                                            <input type="checkbox" name="opportunities[]" value="{{$opportunite->sigle}}" 
                                                {{ in_array($opportunite->sigle, old('opportunities') ?? []) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            {{$opportunite->libelle}}
                                        </label>
                                    @endforeach
                                </div>
                                <x-input-error :messages="$errors->get('opportunities')" class="mt-2"/>
                            </div>

                            <div class="col-lg-12 form-group">
                                <label for="domaines_activites">Domaines d'Activité des Opportunités</label>
                                <div id="domaines_activites" class="checkbox-group scrollable-checkbox-group">
                                    @foreach($domaines_etudes_categories as $categorie)
                                        @foreach($categorie->list_with_categories as $sous_cat)
                                            <label class="styled-checkbox">
                                                <input type="checkbox" name="domaines_activites[]" value="{{$sous_cat->name}}" 
                                                    {{ in_array($sous_cat->name, old('domaines_activites') ?? []) ? 'checked' : '' }}>
                                                <span class="checkmark"></span>
                                                {{$sous_cat->name}}
                                            </label>
                                        @endforeach
                                    @endforeach
                                </div>
                                <x-input-error :messages="$errors->get('domaines_activites')" class="mt-2"/>
                            </div>

                            <!-- Responsabilités et Engagement -->
                            <div class="col-lg-12 form-group">
                                <h3>Responsabilités et Engagement</h3>
                            </div>

                            <div class="col-lg-12 form-group">
                                <h5 class="mb-2">Engagement en matière d’Inclusion et Diversité</h5>
                                <div class="checkbox-group">
                                    @foreach($engagement_inclusivite_diversites as $engagement)
                                        <label>
                                            <input type="checkbox" name="inclusion_diversity[]"
                                                   value="{{$engagement->sigle}}"
                                                {{ in_array($engagement->sigle, old('inclusion_diversity') ?? []) ? 'checked' : '' }}
                                            > {{$engagement->libelle}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-lg-12 form-group">
                                <h5 class="mb-2">Soutien à la Formation et au Développement Professionnel</h5>
                                <div class="checkbox-group">
                                    @foreach($soutien_formations as $soutien)
                                        <label>
                                            <input type="checkbox" name="training_support[]"
                                                   value="{{$soutien->sigle}}"
                                                {{ in_array($soutien->sigle, old('training_support') ?? []) ? 'checked' : '' }}
                                            > {{$soutien->libelle}}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                </div>
                <div class="auto-container mt-5">
                    <div class="sec-title text-center">
                        <h2>Les plans pour les entreprises</h2>
                    </div>
                    <!--Tabs Container-->
                    <div class="tabs-content">
                        <!--Tab / Active Tab-->
                        <div class="tab active-tab" id="monthly">
                            <div class="content">
                                <div class="row">
                                    <!-- Pricing Table - Standard -->
                                    @foreach($offres as $offre)
                                        @if($offre->name === 'Standard') <!-- Afficher uniquement le plan Standard -->
                                            <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                                                <div class="inner-box d-flex justify-content-between flex-column" style="min-height: 580px;">
                                                    <div>
                                                        <div class="title">{{$offre->name}}</div>
                                                        <div class="price">€ {{$offre->price}} <span class="duration">/ mois</span></div>
                                                        <div class="table-content">
                                                            <ul>
                                                                @foreach($offre->permissions as $permission)
                                                                    <li>
                                                                        <span>{{ ucwords(str_replace('_', ' ', $permission->name)) }}</span>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="table-footer">
                                                        <a href="#tabs-content" class="theme-btn btn-style-three"
                                                           data-offer="{{$offre->name}}" onclick="selectOffer(this)">Sélectionner</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hidden input to store selected offer -->
                    <input type="hidden" id="selected-offer" name="selected_offer" value="">

                    <!-- Back and Next buttons -->
                    <div class="text mb-4 mt-2">En remplissant ce formulaire, vous acceptez d'être contacté par
                        NextGen à des fins d'informations et de marketing, conformément à notre <a href="#">politique
                            de protection des données personnelles</a>.
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 form-group"
                         style="display: flex; justify-content: center;">
                        <button class="theme-btn btn-style-one" type="submit" id="next-btn">Envoyer</button>
                    </div>
                </div>
                </form>
            </div>
    </div>
    </section>

    <!-- Step 2: Pricing Package -->
    </div>


    <script>
        function selectOffer(button) {
            // Désélectionner tous les boutons
            const buttons = document.querySelectorAll('.theme-btn.btn-style-three');
            buttons.forEach(btn => {
                btn.classList.remove('selected');
            });

            // Sélectionner le bouton cliqué
            button.classList.add('selected');

            // Mettre à jour le champ caché avec l'offre sélectionnée
            document.getElementById('selected-offer').value = button.getAttribute('data-offer');
        }
    </script>

    <style>
        /* Style pour les checkboxes */
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
        .progress-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            margin-bottom: 30px;
        }

        .progress-bar {
            position: absolute;
            top: 50%;
            left: 50px;
            right: 50px;
            height: 4px;
            background: #e0e0e0;
            z-index: 1;
            transition: width 0.4s ease;
        }

        .progress-step {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 50px;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e0e0e0;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.4s ease;
        }

        .step-label {
            margin-top: 8px;
            font-size: 14px;
            color: #333;
        }

        .contact-section .contact-form h3 {
            font-size: 20px;
            color: #66022b;
            border-bottom: 2px solid #66022b;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .theme-btn.btn-style-three.selected {
            border: #66022b solid 1px;
            background-color: #fff;
            color: #66022b; /* Text color for selected button */
        }
        .checkbox-group {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Colonnes dynamiques */
    gap: 15px; /* Espacement entre les éléments */
    max-height: 300px; /* Hauteur maximale avec défilement */
    overflow-y: auto;
    border: 1px solid #ddd; /* Bordure autour du groupe */
    padding: 15px; /* Espacement interne */
    border-radius: 5px; /* Coins arrondis */
    background: #f9f9f9; /* Couleur de fond */
}

/* Style pour chaque checkbox */
.checkbox-group label {
    display: flex;
    align-items: center;
    gap: 10px; /* Espacement entre la case et le texte */
    font-size: 14px;
    color: #333;
    padding: 10px;
    border: 1px solid #ddd; /* Bordure autour de chaque case */
    border-radius: 5px; /* Coins arrondis */
    background-color: #fff; /* Couleur de fond */
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

/* Effet au survol */
.checkbox-group label:hover {
    border-color: #66022b; /* Couleur de bordure au survol */
    background-color: #f1f1f1; /* Couleur de fond au survol */
}

/* Style pour les cases cochées */
.checkbox-group input[type="checkbox"] {
    accent-color: #66022b; /* Couleur personnalisée pour les cases cochées */
}

/* Style pour les titres des sections */
h5.mb-2 {
    font-size: 16px;
    font-weight: bold;
    color: #66022b;
    margin-bottom: 10px;
}
.radio-group {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Colonnes dynamiques */
    gap: 15px; /* Espacement entre les éléments */
    padding: 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: #f9f9f9;
}

/* Style pour chaque bouton radio */
.styled-radio {
    display: flex;
    align-items: center;
    gap: 10px; /* Espacement entre le bouton et le texte */
    font-size: 14px;
    color: #333;
    padding: 10px;
    border: 1px solid #ddd; /* Bordure autour de chaque bouton */
    border-radius: 5px; /* Coins arrondis */
    background-color: #fff; /* Couleur de fond */
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

/* Effet au survol */
.styled-radio:hover {
    border-color: #66022b; /* Couleur de bordure au survol */
    background-color: #f1f1f1; /* Couleur de fond au survol */
}

/* Masquer le bouton radio natif 
.styled-radio input[type="radio"] {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}*/

/* Style pour le cercle personnalisé */
.styled-radio .checkmark {
    display: none;
    height: 20px;
    width: 20px;
    background-color: #e0e0e0;
    border-radius: 50%;
    position: relative;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.styled-radio input[type="radio"] {
    accent-color: #66022b; /* Couleur personnalisée pour les boutons radio sélectionnés */
    cursor: pointer;
}

/* Ajout d'un point au centre lorsque sélectionné */
.styled-radio .checkmark:after {
    content: "";
    position: absolute;
    display: none;
    top: 6px;
    left: 6px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
}

.styled-radio input:checked ~ .checkmark:after {
    display: block;
}

    </style>
@endsection
