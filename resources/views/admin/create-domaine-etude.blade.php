@extends('dashboard-layout')

@section('title', isset($domaine_etude) ? 'Modifier ' . $domaine_etude->name : 'Ajouter domaine d\'étude')

@section('content')

    @include('header.dashboard-header')

    <div class="page-wrapper">
        <div class="preloader"></div>

        <section class="contact-section bgc-home20">
            <div class="auto-container">
                <div class="upper-title-box">
                    <h3>@if(isset($domaine_etude)) Modifier @else Ajouter @endif domaine d'étude</h3>
                </div>

                <div class="form-container">

                    <form action="{{ isset($domaine_etude) ? route('admin.domaines_etudes.validate_update', ['domaine_etude' => $domaine_etude->slug]) : route('admin.domaines_etudes.store') }}" method="POST" class="default-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="domaine_etude_categorie_id">Categorie :</label>
                                @if(isset($domaine_etude))
                                    <select id="domaine_etude_categorie_id" name="domaine_etude_categorie_id" class="chosen-select" disabled>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" {{ $domaine_etude->domaine_etude_categorie_id == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                <select id="domaine_etude_categorie_id" name="domaine_etude_categorie_id" class="chosen-select" required>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" {{ old('domaine_etude_categorie_id') == $cat->id ? 'selected' : '' }}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                                <x-input-error :messages="$errors->get('domaine_etude_categorie_id')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 mt-2">
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" value="{{isset($domaine_etude) ? $domaine_etude->name : old('name')}}" placeholder="Nom" required>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 mt-2">
                                <label for="description">Description</label>
                                <textarea type="text" id="description" name="description" placeholder="Description" >{{isset($domaine_etude) ? $domaine_etude->description : old('description')}}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 text-right">
                                <button class="theme-btn btn-style-one" type="submit">@if(isset($domaine_etude)) Valider la modification @else Valider l'ajout @endif</button>
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
