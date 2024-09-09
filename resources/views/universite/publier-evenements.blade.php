@extends('app')

@section('content')

@include('header.univ')

<section class="contact-section bgc-home20" id="contact-section" data-step-content="1">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="sec-title -type-2 text-center">
                    <h2>Formulaire pour les services carrieres</h2>
                    <div class="text">Avant de pouvoir activer votre compte sur notre plateforme, veuillez remplir le formulaire suivant pour que nous puissions entrer en contact avec vous.</div>
                </div>
            </div>
        </div>
        <div class="contact-form default-form">
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <form method="POST" action="{{ route('events.store') }}">
                @csrf
                <input type="hidden" name="universite_id">
            
                <!-- Autres champs du formulaire -->
                <div class="form-group">
                    <label for="event-title">Titre de l'événement</label>
                    <input type="text" id="event-title" name="event_title" class="form-control" required>
                </div>
            
                <!-- Champs pour les dates et heures -->
                <div class="form-group">
                    <label for="start-date">Date de début</label>
                    <input type="date" id="start-date" name="start_date" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="end-date">Date de fin</label>
                    <input type="date" id="end-date" name="end_date" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="start-time">Heure de début</label>
                    <input type="time" id="start-time" name="start_time" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="end-time">Heure fin</label>
                    <input type="time" id="end-time" name="end_time" class="form-control" required>
                </div>
            
                <div class="form-group">
                    <label for="event-description">Description</label>
                    <textarea id="event-description" name="event_description" class="form-control" required></textarea>
                </div>
            
                <button type="submit" class="btn btn-primary">Créer l'événement</button>
            </form>
            
                
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Event listener to remove the event section when "X" is clicked
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-event')) {
            const eventSection = event.target.closest('.event-section');
            if (eventSection) {
                eventSection.remove();
            }
        }
    });

    // Event listener to clone the event section when "Ajouter un autre événement" is clicked
    const addEventButton = document.querySelector('.add-event');
    const eventSection = document.querySelector('.event-section');

    addEventButton.addEventListener('click', function() {
        // Clone the event section
        const newEventSection = eventSection.cloneNode(true);

        // Reset the input values in the cloned section
        newEventSection.querySelectorAll('input, textarea').forEach(function(input) {
            input.value = '';
        });

        // Insert the new section before the "Ajouter un autre événement" button
        addEventButton.closest('.row').insertAdjacentElement('beforebegin', newEventSection);
    });
});

</script>

<style>
    .container {
     max-width: 800px;
     margin: 0 auto;
     padding: 20px;
     background-color: #f9f9f9;
     border-radius: 8px;
 }

 .group-result{
     color: #66022b;
 }

 .remove-event{
     border-radius: 50px;
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
</style>
@endsection

