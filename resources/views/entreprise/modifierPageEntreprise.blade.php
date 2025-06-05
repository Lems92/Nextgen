@extends('dashboard-layout')

@section('title', 'Modifier la page entreprise')

@section('content')
    @include('header.dashboard-header')

    <section class="contact-section bgc-home20">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="sec-title -type-2 text-center">
                        <h2>Modifier les informations de l'entreprise</h2>
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

                    <form id="entreprise-form" method="POST" action="{{ route('entreprise.update_page') }}" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="form-section">
                            <legend>
                                <h4>Informations Générales</h4>
                            </legend>
                            <div class="mb-3">
                                <label for="profile_picture" class="form-label">Photo de profil :</label>
                                <div class="current-profile-picture mb-3">
                                    <p class="mb-2">Photo actuelle :</p>
                                    <img src="{{ $entreprise->profile_picture ? asset('storage/' . $entreprise->profile_picture) : asset('images/pdp_entreprise.png') }}" 
                                         alt="Photo de profil actuelle" 
                                         style="width: 150px; height: 150px; object-fit: cover; border-radius: 16px; border: 2px solid #eee; background: #fff;">
                                </div>
                                <input type="file" id="profile_picture" name="profile_picture" class="form-control" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="nom_entreprise" class="form-label">Nom de l'entreprise :</label>
                                <input type="text" id="nom_entreprise" name="nom_entreprise" class="form-control" value="{{ old('nom_entreprise', $entreprise->nom_entreprise) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description :</label>
                                <textarea id="description" name="description" class="form-control" rows="4" required>{{ old('description', $entreprise->description) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date_creation" class="form-label">Date de création :</label>
                                <input type="date" id="date_creation" name="date_creation" class="form-control" value="{{ old('date_creation', isset($entreprise->getAttributes()['date_creation']) ? \Illuminate\Support\Carbon::parse($entreprise->getAttributes()['date_creation'])->format('Y-m-d') : '') }}">
                            </div>
                            <div class="mb-3">
                                <label for="secteur_activite" class="form-label">Secteur d'activité :</label>
                                <div id="secteur_activite" class="radio-group">
                                    @foreach($secteur_activites_categories as $categorie)
                                        <label class="styled-radio">
                                            <input type="radio" name="secteur_activite" value="{{ $categorie->name }}"
                                                {{ old('secteur_activite', $entreprise->secteur_activite) == $categorie->name ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            {{ $categorie->name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="telephone_contact" class="form-label">Téléphone :</label>
                                <input type="text" id="telephone_contact" name="telephone_contact" class="form-control" value="{{ old('telephone_contact', $entreprise->telephone_contact) }}">
                            </div>
                            <div class="mb-3">
                                <label for="email_contact" class="form-label">Email :</label>
                                <input type="email" id="email_contact" name="email_contact" class="form-control" value="{{ old('email_contact', $entreprise->email_contact) }}">
                            </div>
                            <div class="mb-3">
                                <label for="adresse" class="form-label">Adresse :</label>
                                <input type="text" id="adresse" name="adresse" class="form-control" value="{{ old('adresse', $entreprise->adresse) }}">
                            </div>
                            <div class="mb-3">
                                <label for="site_web" class="form-label">Site web :</label>
                                <input type="text" id="site_web" name="site_web" class="form-control" value="{{ old('site_web', $entreprise->site_web) }}">
                            </div>
                            
                        </fieldset>

                        <fieldset class="form-section">
                            <legend>
                                <h4>Opportunités proposées</h4>
                            </legend>
                            @php
                                $oppsRaw = $entreprise->getAttributes()['opportunities'] ?? '[]';
                                $oppsArray = json_decode($oppsRaw, true);
                                // Si après le premier décodage, c'est encore une chaîne, on redécode
                                if (is_string($oppsArray)) {
                                    $oppsArray = json_decode($oppsArray, true);
                                }
                                $opps = old('opportunities', $oppsArray);
                                if (!is_array($opps)) $opps = [];
                            @endphp
                            <div class="checkbox-group scrollable-checkbox-group">
                                @foreach($opportunites_proposes as $opportunite)
                                    <label class="styled-checkbox">
                                        <input type="checkbox" name="opportunities[]" value="{{$opportunite->sigle}}"
                                            {{ in_array($opportunite->sigle, $opps) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                        {{$opportunite->libelle}}
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>

                        <fieldset class="form-section">
                            <legend>
                                <h4>Domaines d'activités</h4>
                            </legend>
                            @php
                                $domsRaw = $entreprise->getAttributes()['domaines_activites'] ?? '[]';
                                $domsArray = json_decode($domsRaw, true);
                                if (is_string($domsArray)) {
                                    $domsArray = json_decode($domsArray, true);
                                }
                                $doms = old('domaines_activites', $domsArray);
                                if (!is_array($doms)) $doms = [];
                            @endphp
                            <div class="checkbox-group scrollable-checkbox-group">
                                @foreach($domaines_etudes_categories as $categorie)
                                    @foreach($categorie->list_with_categories as $sous_cat)
                                        <label class="styled-checkbox">
                                            <input type="checkbox" name="domaines_activites[]" value="{{$sous_cat->name}}"
                                                {{ in_array($sous_cat->name, $doms) ? 'checked' : '' }}>
                                            <span class="checkmark"></span>
                                            {{$sous_cat->name}}
                                        </label>
                                    @endforeach
                                @endforeach
                            </div>
                        </fieldset>

                        <fieldset class="form-section">
                            <legend>
                                <h4>Inclusion et diversité</h4>
                            </legend>
                            @php
                                $inclusionsRaw = $entreprise->getAttributes()['inclusion_diversity'] ?? '[]';
                                $inclusionsArray = json_decode($inclusionsRaw, true);
                                if (is_string($inclusionsArray)) {
                                    $inclusionsArray = json_decode($inclusionsArray, true);
                                }
                                $inclusions = old('inclusion_diversity', $inclusionsArray);
                                if (!is_array($inclusions)) $inclusions = [];
                            @endphp
                            <div class="checkbox-group scrollable-checkbox-group">
                                @foreach($engagement_inclusivite_diversites as $engagement)
                                    <label class="styled-checkbox">
                                        <input type="checkbox" name="inclusion_diversity[]" value="{{$engagement->sigle}}"
                                            {{ in_array($engagement->sigle, old('inclusion_diversity', $inclusions)) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                        {{$engagement->libelle}}
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>

                        <fieldset class="form-section">
                            <legend>
                                <h4>Soutien à la formation</h4>
                            </legend>
                            @php
                                $supportsRaw = $entreprise->getAttributes()['training_support'] ?? '[]';
                                $supportsArray = json_decode($supportsRaw, true);
                                if (is_string($supportsArray)) {
                                    $supportsArray = json_decode($supportsArray, true);
                                }
                                $supports = old('training_support', $supportsArray);
                                if (!is_array($supports)) $supports = [];
                            @endphp
                            <div class="checkbox-group scrollable-checkbox-group">
                                @foreach($soutien_formations as $soutien)
                                    <label class="styled-checkbox">
                                        <input type="checkbox" name="training_support[]" value="{{$soutien->sigle}}"
                                            {{ in_array($soutien->sigle, $supports) ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                        {{$soutien->libelle}}
                                    </label>
                                @endforeach
                            </div>
                        </fieldset>

                        <div class="text-center mt-4">
                            <button type="submit" class="theme-btn btn-style-one">Enregistrer les modifications</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <style>
        .sec-title {
            margin-top: 50px;
        }
        .contact-section {
            padding: 40px 0;
        }
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
        .form-label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }
        .form-control {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
        }
        .form-control:focus {
            border-color: #66022b;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .mb-3 {
            margin-bottom: 20px;
        }
        .theme-btn.btn-style-one {
            background: #66022b;
            color: #fff;
            border: none;
            padding: 10px 30px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        .theme-btn.btn-style-one:hover {
            background: #4a0120;
        }
        .checkbox-group {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            flex-wrap: wrap;
            gap: 10px;
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
            gap: 10px;
            font-size: 14px;
            color: #333;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease, background-color 0.3s ease;
        }
        .styled-checkbox:hover {
            border-color: #66022b;
            background-color: #f1f1f1;
        }
        .styled-checkbox input[type="checkbox"] {
            position: relative;
            margin: 0;
            accent-color: #66022b;
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
        /* Pour le groupe de radios */
        .radio-group {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #f9f9f9;
        }
        .styled-radio {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .styled-radio input[type="radio"] {
            position: relative;
            margin: 0;
            accent-color: #66022b;
        }
        .styled-radio .checkmark {
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
        .styled-radio input:checked ~ .checkmark {
            background-color: #66022b;
        }
        .styled-radio .checkmark:after {
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
        .styled-radio input:checked ~ .checkmark:after {
            display: block;
        }
    </style>
@endsection 