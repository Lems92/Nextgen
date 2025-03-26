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
                        <div class="sec-title -type-2 text-center">
                            <h2>Formulaire d'Inscription Étudiant</h2>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Veuillez corriger les erreurs ci-dessous et remplir convenablement le
                                    formulaire.</strong>
                            </div>
                        @endif

                        <form action="{{route('inscription.etudiant.post')}}" enctype="multipart/form-data"
                              method="POST">
                            @csrf
                            <fieldset class="form-section">
                                <legend><h4> Informations Personnelles </h4></legend>
                                <div class="row">
                                    <div class="form-group col-lg-12 col-md-12 mt-4">
                                        <label for="prenom" class="form-label">Prénom :</label>
                                        <input type="text" id="prenom" name="prenom" value="{{old('prenom')}}"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('prenom')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nom" class="form-label">Nom :</label>
                                        <input type="text" id="nom" name="nom" value="{{old('nom')}}"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('nom')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numero_telephone" class="form-label">Numéro de téléphone :</label>
                                        <input type="tel" id="numero_telephone" value="{{old('numero_telephone')}}"
                                               name="numero_telephone"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('numero_telephone')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date-naissance" class="form-label">Date de naissance :</label>
                                        <input type="date" id="date-naissance" name="date_naissance"
                                               value="{{old('date_naissance')}}"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('date_naissance')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="genre" class="form-label">Genre :</label>
                                        <select id="genre" name="genre" class="form-select" required>
                                            @foreach($genres as $genre)
                                                <option
                                                    value="{{$genre->sigle}}" {{ old('genre') == $genre->sigle ? 'selected' : '' }}>{{$genre->libelle}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('genre')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="adresse-postale" class="form-label">Adresse postale :</label>
                                        <input type="text" id="adresse-postale" value="{{old('adresse_postale')}}"
                                               name="adresse_postale"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('adresse_postale')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pays" class="form-label">Pays :</label>
                                        <select id="pays" name="pays" class="form-select" required>
                                            <option
                                                value="madagascar" {{ old('pays') == 'madagascar' ? 'selected' : '' }}>
                                                Madagascar
                                            </option>
                                            <option value="france" {{ old('pays') == 'france' ? 'selected' : '' }}>
                                                France
                                            </option>
                                        </select>
                                        <x-input-error :messages="$errors->get('pays')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="region" class="form-label">Région :</label>
                                        <select id="region" name="region" class="form-select" required>
                                            @foreach($mada_regions as $region)
                                                {{$region}}
                                                <option
                                                    value="{{$region}}" {{ old('region') == $region ? 'selected' : '' }}>{{$region}}</option>
                                            @endforeach
                                        </select>
                                        <x-input-error :messages="$errors->get('region')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="ville" class="form-label">Ville :</label>
                                        <input type="text" id="ville" name="ville" value="{{old('ville')}}"
                                               class="form-control" required>
                                        <x-input-error :messages="$errors->get('ville')" class="mt-2"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="code-postal" class="form-label">Code postal :</label>
                                        <input type="text" id="code-postal" value="{{old('code_postal')}}"
                                               name="code_postal" class="form-control"
                                               required>
                                        <x-input-error :messages="$errors->get('code_postal')" class="mt-2"/>
                                    </div>
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

    <style>
        .sec-title {
            margin-top: 70px;
        }

        .contact-section {
            padding: 40px 0;
        }

        /* Style pour les titres de sections */
        .sec-title h2 {
            margin-bottom: 24px;
            font-size: 20px !important;
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

        .form-control, .form-select {
            border-radius: 4px;
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 15px;
            width: 100%;
        }

        .form-control:focus, .form-select:focus {
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

        .chosen-container .chosen-drop, .chosen-container .chosen-results {
            color: #66022b;
        }

        .group-result {
            color: #333;
        }
    </style>

    <!-- Lien vers Bootstrap JS et dépendances Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let mada_regions = [];
            @foreach($mada_regions as $region)
            mada_regions.push(@json($region));
            @endforeach
            let france_regions = [];
            @foreach($france_regions as $region)
            france_regions.push(@json($region));
            @endforeach
            const regions = {
                madagascar: mada_regions,
                france: france_regions
            };

            const paysSelect = document.getElementById('pays');
            const regionSelect = document.getElementById('region');

            function updateRegions() {
                const selectedCountry = paysSelect.value;
                const regionsList = regions[selectedCountry] || [];

                // Clear existing options
                regionSelect.innerHTML = '';

                // Populate new options
                regionsList.forEach((region) => {
                    const option = document.createElement('option');
                    option.value = region;
                    option.textContent = region;
                    if (region === "{{old('region')}}") {
                        option.setAttribute('selected', 'selected');
                    }
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
