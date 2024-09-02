@extends('app')

@section('title', 'Accueil')

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
                        <div class="text">Avant de pouvoir activer votre compte sur notre plateforme, veuillez remplir le formulaire suivant pour que nous puissions entrer en contact avec vous.</div>
                    </div>
                </div>
            </div>

            <div class="contact-form default-form">
                <form method="post" action="#" id="email-form">
                    <div class="row">
    
                        <!-- Informations Générales -->
                        <div class="col-lg-12 form-group">
                            <h3>Informations Générales</h3>
                        </div>
    
                        <div class="col-lg-6 form-group">
                            <label>Nom de l’Entreprise</label>
                            <input type="text" name="company_name" placeholder="Nom de l’Entreprise" required>
                        </div>
    
                        <div class="col-lg-6 form-group">
                            <label>Secteur d’Activité</label>
                            <select name="industry" class="chosen-select">
                                <option value="technologie">Technologie de l'information</option>
                                <option value="ingenierie">Ingénierie</option>
                                <option value="sante">Santé</option>
                                <option value="finance">Finance</option>
                                <option value="marketing">Marketing et Communication</option>
                                <option value="education">Éducation</option>
                                <option value="tourisme">Tourisme et Hôtellerie</option>
                                <option value="industrie">Industrie</option>
                                <option value="environnement">Environnement</option>
                                <option value="arts">Arts et Création</option>
                                <option value="services">Services aux entreprises</option>
                                <option value="commerce">Commerce</option>
                            </select>
                        </div>
    
                        <div class="col-lg-12 form-group">
                            <label>Adresse de l’Entreprise</label>
                            <div class="address-fields">
                                <label>Numéro et Rue</label>
                                <input type="text" name="address" placeholder="Numéro et Rue" required>
                                <label>Complément d'Adresse</label>
                                <input type="text" name="address_complement" placeholder="Complément d'Adresse (si nécessaire)">
                                <label>Code Postal</label>
                                <input type="text" name="postal_code" placeholder="Code Postal">
                                <label>Ville</label>
                                <input type="text" name="city" placeholder="Ville" required>
                                <label>Région</label>
                                <select name="region" class="chosen-select">
                                    <option value="" disabled selected>Région</option>
                                    <option value="Analamanga">Analamanga</option>
                                    <option value="Atsinanana">Atsinanana</option>
                                    <option value="Boeny">Boeny</option>
                                    <option value="Ihorombe">Ihorombe</option>
                                    <option value="Menabe">Menabe</option>
                                    <option value="Sava">Sava</option>
                                    <option value="Vakinankaratra">Vakinankaratra</option>
                                </select>
                                <input type="hidden" name="country" value="Madagascar">
                            </div>
                        </div>
    
                        <div class="col-lg-6 form-group">
                            <label>Site Web</label>
                            <input type="text" name="website" placeholder="Site Web">
                        </div>
    
                        <div class="col-lg-6 form-group">
                            <label>Date de Création</label>
                            <input type="date" name="establishment_date" placeholder="Date de Création">
                        </div>
    
                        <!-- Contact Principal -->
                        <div class="col-lg-12 form-group">
                            <h3>Contact Principal</h3>
                        </div>
    
                        <div class="col-lg-6 form-group">
                            <label>Nom du Contact</label>
                            <input type="text" name="contact_name" placeholder="Nom du Contact" required>
                        </div>
    
                        <div class="col-lg-6 form-group">
                            <label>Fonction du Contact</label>
                            <input type="text" name="contact_position" placeholder="Fonction du Contact" required>
                        </div>
    
                        <div class="col-lg-6 form-group">
                            <label>Adresse e-mail du Contact</label>
                            <input type="email" name="contact_email" placeholder="Adresse e-mail du Contact" required>
                        </div>
    
                        <div class="col-lg-6 form-group">
                            <label>Numéro de Téléphone du Contact</label>
                            <input type="text" name="contact_phone" placeholder="Numéro de Téléphone du Contact" required>
                        </div>
    
                        <!-- Informations sur les Opportunités -->
                        <div class="col-lg-12 form-group">
                            <h3>Informations sur les Opportunités</h3>
                        </div>
    
                        <div class="col-lg-12 form-group">
                            <label>Types d'Opportunités Proposées</label>
                            <div class="checkbox-group">
                                <label><input type="checkbox" name="opportunities[]" value="Stages"> Stages</label>
                                <label><input type="checkbox" name="opportunities[]" value="Emplois à Temps Plein"> Emplois à Temps Plein</label>
                                <label><input type="checkbox" name="opportunities[]" value="Emplois à Temps Partiel"> Emplois à Temps Partiel</label>
                                <label><input type="checkbox" name="opportunities[]" value="Alternance"> Alternance</label>
                                <label><input type="checkbox" name="opportunities[]" value="Projets de Recherche"> Projets de Recherche</label>
                                <label><input type="checkbox" name="opportunities[]" value="Mentorat"> Mentorat</label>
                            </div>
                        </div>
    
                        <div class="col-lg-12 form-group">
                            <label>Domaines d'Activité des Opportunités</label>
                            <div class="checkbox-group">
                                <label><input type="checkbox" name="fields[]" value="Développement de Logiciels"> Développement de Logiciels</label>
                                <label><input type="checkbox" name="fields[]" value="Sécurité Informatique"> Sécurité Informatique</label>
                                <label><input type="checkbox" name="fields[]" value="Réseaux et Télécommunications"> Réseaux et Télécommunications</label>
                                <label><input type="checkbox" name="fields[]" value="Intelligence Artificielle"> Intelligence Artificielle</label>
                                <!-- Ajouter d'autres domaines ici -->
                            </div>
                        </div>
    
                        <!-- Responsabilités et Engagement -->
                        <div class="col-lg-12 form-group">
                            <h3>Responsabilités et Engagement</h3>
                        </div>
    
                        <div class="col-lg-12 form-group">
                            <label>Engagement en matière d’Inclusion et Diversité</label>
                            <div class="checkbox-group">
                                <label><input type="checkbox" name="inclusion_diversity[]" value="Politiques d’Égalité des Chances"> Politiques d’Égalité des Chances</label>
                                <label><input type="checkbox" name="inclusion_diversity[]" value="Programmes pour Groupes Sous-représentés"> Programmes pour Groupes Sous-représentés</label>
                                <label><input type="checkbox" name="inclusion_diversity[]" value="Accessibilité au Travail"> Accessibilité au Travail</label>
                            </div>
                        </div>
    
                        <div class="col-lg-12 form-group">
                            <label>Soutien à la Formation et au Développement Professionnel</label>
                            <div class="checkbox-group">
                                <label><input type="checkbox" name="training_support[]" value="Formations Internes"> Formations Internes</label>
                                <label><input type="checkbox" name="training_support[]" value="Opportunités de Développement Professionnel"> Opportunités de Développement Professionnel</label>
                                <label><input type="checkbox" name="training_support[]" value="Programmes de Certification"> Programmes de Certification</label>
                            </div>
                        </div>
    
                        <div class="text mb-4 mt-2">En remplissant ce formulaire, vous acceptez d'être contacté par NextGen à des fins d'informations et de marketing, conformément à notre <a href="#">politique de protection des données personnelles</a>.</div>
                        
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="display: flex; justify-content: center;">
                            <button class="theme-btn btn-style-one" type="button" id="next-btn">Suivant</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Step 2: Pricing Package -->
    <section class="pricing-section" data-step-content="2" style="display:none;">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Les offres pour les entreprises</h2>
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
                                        <div class="price">Ar XXX,XXX <span class="duration">/ mois</span></div>
                                        <div class="table-content">
                                            <ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7</span></li>
                                            </ul>
                                        </div>
                                        <div class="table-footer">
                                            <a href="#" class="theme-btn btn-style-three" onclick="selectOffer(this, 'Standard')">Sélectionner</a>
                                        </div>
                                    </div>
                                </div>
                
                                <!-- Pricing Table - Gold -->
                                <div class="pricing-table tagged col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <span class="tag">Recommendé</span>
                                        <div class="title">Gold</div>
                                        <div class="price">Ar XXX,XXX <span class="duration">/ mois</span></div>
                                        <div class="table-content">
                                            <ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7</span></li>
                                            </ul>
                                        </div>
                                        <div class="table-footer">
                                            <a href="#" class="theme-btn btn-style-three" onclick="selectOffer(this, 'Gold')">Sélectionner</a>
                                        </div>
                                    </div>
                                </div>
                
                                <!-- Pricing Table - Premium -->
                                <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                                    <div class="inner-box">
                                        <div class="title">Prémium</div>
                                        <div class="price">Ar XXX,XXX <span class="duration">/ mois</span></div>
                                        <div class="table-content">
                                            <ul>
                                                <li><span>1 job posting</span></li>
                                                <li><span>0 featured job</span></li>
                                                <li><span>Job displayed for 20 days</span></li>
                                                <li><span>Premium Support 24/7</span></li>
                                            </ul>
                                        </div>
                                        <div class="table-footer">
                                            <a href="#" class="theme-btn btn-style-three" onclick="selectOffer(this, 'Premium')">Sélectionner</a>
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
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="display: flex; justify-content: space-between;">
                <button class="theme-btn btn-style-one" type="button" id="back-btn">Retour</button>
                <button class="theme-btn btn-style-one" type="button" id="submit-btn">Valider</button>
            </div>
        </div>
    </section>
</div>

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
    color: #66022b;/* Text color for selected button */
}

</style>

<script>
    document.getElementById('next-btn').addEventListener('click', function() {
    // Save form data to localStorage
    const formData = new FormData(document.getElementById('email-form'));
    const data = {};
    formData.forEach((value, key) => data[key] = value);
    localStorage.setItem('formData', JSON.stringify(data));

    // Hide Step 1 and show Step 2
    const step1 = document.querySelector('[data-step-content="1"]');
    const step2 = document.querySelector('[data-step-content="2"]');

    if (step1 && step2) {
        step1.style.display = 'none';
        step2.style.display = 'block';
    }

    // Update active steps
    const step1Indicator = document.querySelector('.progress-step[data-step="1"]');
    const step2Indicator = document.querySelector('.progress-step[data-step="2"]');
    
    if (step1Indicator && step2Indicator) {
        step1Indicator.classList.remove('active');
        step2Indicator.classList.add('active');
    }

    // Scroll to the top of Step 2 (Pricing section)
    step2.scrollIntoView({ behavior: 'smooth', block: 'start' });
});

document.getElementById('back-btn').addEventListener('click', function() {
    // Hide Step 2 and show Step 1
    const step2 = document.querySelector('[data-step-content="2"]');
    const step1 = document.querySelector('[data-step-content="1"]');
    
    if (step2 && step1) {
        step2.style.display = 'none';
        step1.style.display = 'block';
    }

    // Update active steps
    const step1Indicator = document.querySelector('.progress-step[data-step="1"]');
    const step2Indicator = document.querySelector('.progress-step[data-step="2"]');
    
    if (step1Indicator && step2Indicator) {
        step1Indicator.classList.add('active');
        step2Indicator.classList.remove('active');
    }
});

document.getElementById('submit-btn').addEventListener('click', function() {
    // Retrieve form data from localStorage
    const formData = JSON.parse(localStorage.getItem('formData'));

    // You can now send this data to your server
    // Example using fetch:
    fetch('/your-server-endpoint', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(formData),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        // Optionally, clear localStorage
        localStorage.removeItem('formData');
        // Redirect or show a success message
        window.location.href = '/thank-you'; // Redirect to a thank-you page
    })
    .catch((error) => {
        console.error('Error:', error);
    });
});
function selectOffer(element, offer) {
    // Remove 'selected' class from all buttons
    const buttons = document.querySelectorAll('.theme-btn.btn-style-three');
    buttons.forEach(btn => {
        btn.classList.remove('selected');
        btn.textContent = 'Sélectionner'; // Reset text to 'Sélectionner'
    });

    // Add 'selected' class to the clicked button
    element.classList.add('selected');
    element.textContent = 'Sélectionné'; // Change text to 'Sélectionné'

    // Store the selected offer in a hidden input
    document.getElementById('selected-offer').value = offer;
}

</script>

@endsection
