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

                            <div class="col-lg-6 form-group">
                                <label for="nom_entreprise">Nom de l’Entreprise</label>
                                <input type="text" id="nom_entreprise" name="nom_entreprise"
                                       placeholder="Nom de l’Entreprise" value="{{old('nom_entreprise')}}" required>
                                <x-input-error :messages="$errors->get('nom_entreprise')" class="mt-2" />
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="secteur_activite">Secteur d’Activité</label>
                                <select id="secteur_activite" name="secteur_activite" class="chosen-select">
                                    @foreach($secteur_activites_categories as $categorie)
                                        <option value="{{$categorie->name}}" {{ old('secteur_activite') == $categorie->name ? 'selected' : '' }}>{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('secteur_activite')" class="mt-2" />
                            </div>

                            <div class="col-lg-12 form-group">
                                <label>Adresse de l’Entreprise</label>
                                <div class="address-fields">
                                    <label for="adresse">Numéro et Rue</label>
                                    <input type="text" id="adresse" name="adresse" value="{{old('adresse')}}" placeholder="Numéro et Rue" required>
                                    <x-input-error :messages="$errors->get('adresse')" class="mt-2" />

                                    <label for="complement_adresse">Complément d'Adresse</label>
                                    <input type="text" id="complement_adresse" value="{{old('complement_adresse')}}" name="complement_adresse"
                                           placeholder="Complément d'Adresse (si nécessaire)">
                                    <x-input-error :messages="$errors->get('complement_adresse')" class="mt-2" />

                                    <label for="code_postal">Code Postal</label>
                                    <input id="code_postal" type="text" name="code_postal" value="{{old('code_postal')}}" placeholder="Code Postal">
                                    <x-input-error :messages="$errors->get('code_postal')" class="mt-2" />

                                    <label for="ville">Ville</label>
                                    <input id="ville" type="text" name="ville" value="{{old('ville')}}" placeholder="Ville" required>
                                    <x-input-error :messages="$errors->get('ville')" class="mt-2" />

                                    <label for="region">Région</label>
                                    <select id="region" name="region" class="chosen-select">
                                        <option value="" disabled selected>Région</option>
                                        @foreach($mada_regions as $region)
                                            {{$region}}
                                            <option value="{{$region}}" {{ old('region') == $region ? 'selected' : '' }}>{{$region}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('region')" class="mt-2" />

                                    <input type="hidden" name="pays" value="Madagascar">
                                </div>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="site_web">Site Web</label>
                                <input id="site_web" type="text" name="site_web" value="{{old('site_web')}}" placeholder="Site Web">
                                <x-input-error :messages="$errors->get('site_web')" class="mt-2" />
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="date_creation">Date de Création</label>
                                <input id="date_creation" type="date" name="date_creation"
                                       value="{{old('date_creation')}}"
                                       placeholder="Date de Création">
                                <x-input-error :messages="$errors->get('date_creation')" class="mt-2" />
                            </div>

                            <!-- Contact Principal -->
                            <div class="col-lg-12 form-group">
                                <h3>Contact Principal</h3>
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="nom_contact">Nom du Contact</label>
                                <input type="text" id="nom_contact" name="nom_contact" value="{{old('nom_contact')}}" placeholder="Nom du Contact"
                                       required>
                                <x-input-error :messages="$errors->get('nom_contact')" class="mt-2" />
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="fonction_contact">Fonction du Contact</label>
                                <input type="text" id="fonction_contact" name="fonction_contact"
                                       value="{{old('fonction_contact')}}"
                                       placeholder="Fonction du Contact" required>
                                <x-input-error :messages="$errors->get('fonction_contact')" class="mt-2" />
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="email_contact">Adresse e-mail du Contact</label>
                                <input type="email" id="email_contact" name="email_contact"
                                       value="{{old('email_contact')}}"
                                       placeholder="Adresse e-mail du Contact" required>
                                <x-input-error :messages="$errors->get('email_contact')" class="mt-2" />
                            </div>

                            <div class="col-lg-6 form-group">
                                <label for="telephone_contact">Numéro de Téléphone du Contact</label>
                                <input type="text" id="telephone_contact" name="telephone_contact"
                                       value="{{old('telephone_contact')}}"
                                       placeholder="Numéro de Téléphone du Contact" required>
                                <x-input-error :messages="$errors->get('telephone_contact')" class="mt-2" />
                            </div>

                            <!-- Informations sur les Opportunités -->
                            <div class="col-lg-12 form-group">
                                <h3>Informations sur les Opportunités</h3>
                            </div>

                            <div class="col-lg-12 form-group">
                                <h5 class="mb-2">Types d'Opportunités Proposées</h5>
                                <div class="checkbox-group d-flex flex-wrap justify-content-start gap-2">
                                    @foreach($opportunites_proposes as $opportunite)
                                        <label>
                                            <input type="checkbox" name="opportunities[]"
                                                      value="{{$opportunite->sigle}}"
                                                {{ in_array($opportunite->sigle, old('opportunities') ?? []) ? 'checked' : '' }}
                                            > {{$opportunite->libelle}}
                                        </label>
                                    @endforeach
                                </div>
                                <x-input-error :messages="$errors->get('opportunities')" class="mt-2" />
                            </div>

                            <div class="col-lg-12 form-group">
                                <h5 class="mb-2">Domaines d'Activité des Opportunités</h5>
                                <div class="checkbox-group d-flex flex-wrap justify-content-start gap-2">
                                    @foreach($domaines_etudes_categories as $categorie)
                                        @foreach($categorie->list_with_categories as $sous_cat)
                                            <label>
                                                <input type="checkbox" name="domaines_activites[]"
                                                       value="{{$sous_cat->name}}"
                                                    {{ in_array($sous_cat->name, old('domaines_activites') ?? []) ? 'checked' : '' }}
                                                > {{$sous_cat->name}}
                                            </label>
                                        @endforeach
                                    @endforeach
                                </div>
                                <x-input-error :messages="$errors->get('domaines_activites')" class="mt-2" />
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
                                            <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="title">Standard</div>
                                                    <div class="price">Ar XXX,XXX <span class="duration">/ mois</span>
                                                    </div>
                                                    <div class="table-content">
                                                        <ul>
                                                            <li><span>1 job posting</span></li>
                                                            <li><span>0 featured job</span></li>
                                                            <li><span>Job displayed for 20 days</span></li>
                                                            <li><span>Premium Support 24/7</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="table-footer">
                                                        <a href="#tabs-content" class="theme-btn btn-style-three"
                                                           data-offer="standard" onclick="selectOffer(this)">Sélectionner</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Pricing Table - Gold -->
                                            <div class="pricing-table tagged col-lg-4 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <span class="tag">Recommendé</span>
                                                    <div class="title">Gold</div>
                                                    <div class="price">Ar XXX,XXX <span class="duration">/ mois</span>
                                                    </div>
                                                    <div class="table-content">
                                                        <ul>
                                                            <li><span>1 job posting</span></li>
                                                            <li><span>0 featured job</span></li>
                                                            <li><span>Job displayed for 20 days</span></li>
                                                            <li><span>Premium Support 24/7</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="table-footer">
                                                        <a href="#tabs-content" class="theme-btn btn-style-three"
                                                           data-offer="gold"
                                                           onclick="selectOffer(this)">Sélectionner</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Pricing Table - Premium -->
                                            <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                                                <div class="inner-box">
                                                    <div class="title">Prémium</div>
                                                    <div class="price">Ar XXX,XXX <span class="duration">/ mois</span>
                                                    </div>
                                                    <div class="table-content">
                                                        <ul>
                                                            <li><span>1 job posting</span></li>
                                                            <li><span>0 featured job</span></li>
                                                            <li><span>Job displayed for 20 days</span></li>
                                                            <li><span>Premium Support 24/7</span></li>
                                                        </ul>
                                                    </div>
                                                    <div class="table-footer">
                                                        <a href="#tabs-content" class="theme-btn btn-style-three"
                                                           data-offer="premium"
                                                           onclick="selectOffer(this)">Sélectionner</a>
                                                    </div>
                                                </div>
                                            </div>
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

    </style>
@endsection
