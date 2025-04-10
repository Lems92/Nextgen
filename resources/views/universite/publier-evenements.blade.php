@extends('dashboard-layout')

@section('title', 'NexGen - Service carière - ' . (isset($event) ? 'Modifier' : 'Publier') . ' événement')

@section('content')

    @include('header.dashboard-header')

    <section class="contact-section bgc-home20" id="contact-section" data-step-content="1">
        <div class="auto-container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="sec-title -type-2 text-center">
                        <h2>{{isset($event) ? 'Modifier' : 'Publier'}} événement</h2>
                    </div>
                </div>
            </div>
            <div class="contact-form default-form">
                <form method="POST" action="{{ isset($event) ? route('universite.edit_event_validate', ['event' => $event->id]) : route('universite.publier_event.store') }}">
                    @csrf
                    <input type="hidden" name="universite_id">

                    <!-- Autres champs du formulaire -->
                    <div class="form-group">
                        <label for="event-title">Titre de l'événement</label>
                        <input type="text" id="event-title" value="{{old('event_title', isset($event) ? $event->event_title : '')}}" name="event_title" class="form-control" required>
                        <x-input-error :messages="$errors->get('event_title')" class="mt-2" />
                    </div>

                    <!-- Champs pour les dates et heures -->
                    <div class="form-group">
                        <label for="start-date">Date de début</label>
                        <input type="date" id="start-date" value="{{old('start_date', isset($event) ? $event->start_date->format('Y-m-d') : '')}}" name="start_date" class="form-control" required>
                        <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="end-date">Date de fin</label>
                        <input type="date" id="end-date" value="{{old('end_date', isset($event) ? $event->end_date->format('Y-m-d') : '')}}" name="end_date" class="form-control" required>
                        <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="start-time">Heure de début</label>
                        <input type="time" id="start-time" value="{{old('start_time', isset($event) ? $event->start_time->format('H:i') : '')}}" name="start_time" class="form-control" required>
                        <x-input-error :messages="$errors->get('start_time')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="end-time">Heure fin</label>
                        <input type="time" id="end-time" name="end_time" value="{{old('end_time', isset($event) ? $event->end_time->format('H:i') : '')}}" class="form-control" required>
                        <x-input-error :messages="$errors->get('end_time')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <label for="event-description">Description</label>
                        <textarea id="event-description" name="event_description" class="form-control"
                                  required>{{old('event_description', isset($event) ? $event->event_description : '')}}</textarea>
                        <x-input-error :messages="$errors->get('event_description')" class="mt-2" />
                    </div>

                    <button type="submit" class="theme-btn btn-style-one">{{isset($event) ? 'Modifier' : 'Publier'}} l'événement</button>
                </form>
            </div>
        </div>
    </section>

    <style>

        .form-group label {
            font-weight: bold;
        }

        .form-group select[multiple] {
            height: auto;
        }

        .contact-section .contact-form .theme-btn {
            margin-top: 20px;
            border: 1px solid;
        }

    </style>
@endsection

