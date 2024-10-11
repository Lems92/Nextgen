@extends('dashboard-layout')

@section('title', $parametrage ? 'Modifier ' . $parametrage->libelle : 'Ajouter parametrage')

@section('content')

    @include('header.dashboard-header')

    <div class="page-wrapper">
        <div class="preloader"></div>

        <section class="contact-section bgc-home20">
            <div class="auto-container">
                <div class="upper-title-box">
                    <h3>@if($parametrage) Modifier @else Ajouter @endif parametrage</h3>
                </div>

                <div class="form-container">

                    <form action="{{ $parametrage ? route('admin.parametrages.validate_update', ['id' => $parametrage->id]) : route('admin.parametrages.store') }}" method="POST" class="default-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-12">
                                <label for="table">Table :</label>
                                @if($parametrage)
                                    <select id="table" name="table" class="chosen-select" disabled>
                                        @foreach($tables as $table)
                                            <option value="{{$table->name}}" {{ $parametrage->table == $table->name ? 'selected' : '' }}>{{$table->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                <select id="table" name="table" class="chosen-select" required>
                                    @foreach($tables as $table)
                                        <option value="{{$table->name}}" {{ old('table') == $table->name ? 'selected' : '' }}>{{$table->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                                <x-input-error :messages="$errors->get('table')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 mt-2">
                                <label for="sigle">Sigle</label>
                                <input type="text" id="sigle" name="sigle" value="{{$parametrage ? $parametrage->sigle : old('sigle')}}" placeholder="Sigle" required>
                                <x-input-error :messages="$errors->get('sigle')" class="mt-2" />
                            </div>
                            <div class="form-group col-lg-12 col-md-12 mt-2">
                                <label for="libelle">Libellé</label>
                                <input type="text" id="libelle" name="libelle" value="{{$parametrage ? $parametrage->libelle : old('libelle')}}" placeholder="Libellé" required>
                                <x-input-error :messages="$errors->get('libelle')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 mt-2">
                                <label for="description">Description</label>
                                <textarea type="text" id="description" name="description" placeholder="Description" >{{$parametrage ? $parametrage->description : old('description')}}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="form-group col-lg-12 col-md-12 text-right">
                                <button class="theme-btn btn-style-one" type="submit">@if($parametrage) Valider la modification @else Valider l'ajout @endif</button>
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
