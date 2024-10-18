@extends('dashboard-layout')

@section('title', 'Demander affiliation université')

@section('content')

    @include('header.dashboard-header')

    <section class="contact-section bgc-home20">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="sec-title -type-2 text-center">
                        <h2>Affilier à une Université</h2>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('warning'))
                        <div class="alert alert-warning">
                            {{ session('warning') }}
                        </div>
                    @endif

                    <form id="default-form" action="{{route('etudiant.demande_affiliation_univ_post')}}" method="post"
                          enctype="multipart/form-data">
                        <!-- Éducation -->
                        <fieldset class="form-section">
                            <legend><h4>Université</h4></legend>
                            @if(count($universites) > 0)
                                <div class="mb-3">
                                    @csrf
                                    <label for="univ_id" class="form-label">Nom de l'école ou de l'université
                                        :</label>
                                    <select id="univ_id" name="universite_id" class="form-select" required>
                                        @foreach($universites as $univ)
                                            <option value="{{$univ->id}}">{{$univ->nom_etablissement}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('universite_id')" class="mt-2"/>
                                    <label for="matricule" class="form-label">Matricule :</label>
                                    <input type="text" id="matricule" name="matricule" class="form-control" required>
                                    <x-input-error :messages="$errors->get('matricule')" class="mt-2"/>
                                    <!--<label for="niveau" class="form-label">Niveau :</label>
                                    <select id="niveau" name="niveau" class="form-select" required>
                                        <option value="L1">L1</option>
                                        <option value="L2">L2</option>
                                        <option value="L3">L3</option>
                                        <option value="M1">M1</option>
                                        <option value="M2">M2</option>
                                    </select>-->
                                    <label for="carte" class="form-label">Carte d'étudiant ou certificat de scolarité
                                        :</label>
                                    <input type="file" id="carte" name="document_scolaire" class="form-control"
                                           required>
                                    <x-input-error :messages="$errors->get('document_scolaire')" class="mt-2"/>
                                </div>
                            @else
                                <p>Désolé, il n'y a pas encore d'université partenaires !</p>
                            @endif
                        </fieldset>
                        <div class="text-center mt-4">
                            @if(count($universites) > 0)
                                <button type="submit" class="theme-btn btn-style-one">Demander</button>
                            @endif
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


        /* Style pour les champs de texte multilignes */
        textarea.form-control {
            resize: vertical;
        }


        .chosen-container .chosen-drop, .chosen-container .chosen-results {
            color: #66022b;
        }

    </style>

@endsection
