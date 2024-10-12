@extends('dashboard-layout')

@section('title', isset($list_with_categorie) ? 'Modifier ' . $list_with_categorie->name : 'Ajouter domaine d\'étude')

@section('content')

    @include('header.dashboard-header')

    <div class="page-wrapper">
        <div class="preloader"></div>

        <section class="contact-section bgc-home20">
            <div class="auto-container">
                <div class="upper-title-box">
                    <h3>@if(isset($list_with_categorie)) Modifier @else Ajouter @endif domaine d'étude</h3>
                </div>

                <div class="form-container">

                    <form action="{{ isset($list_with_categorie) ? route('admin.list_categories.validate_update', ['list_with_categorie' => $list_with_categorie->slug]) : route('admin.list_categories.store') }}" method="POST" class="default-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="domaine_etude_categorie_id">Categorie :</label>
                                @if(isset($list_with_categorie))
                                    <select id="list_categorie_id" name="list_categorie_id" class="chosen-select" disabled>
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}" {{ $list_with_categorie->list_categorie_id == $cat->id ? 'selected' : '' }}>{{$cat->table . ' - ' .$cat->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                <select id="list_categorie_id" name="list_categorie_id" class="chosen-select" required>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" {{ old('list_categorie_id') == $cat->id ? 'selected' : '' }}>{{$cat->table . ' - ' .$cat->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                                <x-input-error :messages="$errors->get('list_categorie_id')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 mt-2">
                                <label for="name">Nom</label>
                                <input type="text" id="name" name="name" value="{{isset($list_with_categorie) ? $list_with_categorie->name : old('name')}}" placeholder="Nom" required>
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 mt-2">
                                <label for="description">Description</label>
                                <textarea type="text" id="description" name="description" placeholder="Description" >{{isset($list_with_categorie) ? $list_with_categorie->description : old('description')}}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 text-right">
                                <button class="theme-btn btn-style-one" type="submit">@if(isset($list_with_categorie)) Valider la modification @else Valider l'ajout @endif</button>
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
