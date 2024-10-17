@extends('dashboard-layout')

@section('title', 'Modifier le profil')

@section('content')

@include('header.dashboard-header')

<section class="contact-section bgc-home20">
  <div class="auto-container">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-10">
              <div class="sec-title -type-2 text-center">
                  <h2>Affilier à une Université</h2>
              </div>

              <form id="default-form">
                  <!-- Éducation -->
                  <fieldset class="form-section">
                      <legend><h4>Université</h4></legend>
                      <div class="mb-3">
                          <label for="nom-ecole" class="form-label">Nom de l'école ou de l'université :</label>
                          <select id="nom_ecole" name="nom_ecole" class="form-select" required>
                              <option value="asja">ASJA</option>
                              <option value="itu">ITU</option>
                              <option value="ucm">UCM</option>
                              <option value="Polytech">Polytech</option>
                          </select>
                          <label for="matricule" class="form-label">Matricule :</label>
                          <input type="text" id="matricule" name="matricule"class="form-control" required>
                          <label for="niveau" class="form-label">Niveau :</label>
                          <select id="niveau" name="niveau" class="form-select" required>
                              <option value="L1">L1</option>
                              <option value="L2">L2</option>
                              <option value="L3">L3</option>
                              <option value="M1">M1</option>
                              <option value="M2">M2</option>
                          </select>
                          <label for="carte" class="form-label">Carte d'étudiant :</label>
                          <input type="file" id="carte" name="carte" class="form-control" required>
                      </div>
                  </fieldset>
                  <div class="text-center mt-4">
                      <button type="submit" class="theme-btn btn-style-one">Demander</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</section>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

  <script>
      function ajouterChamp(secteur) {
          const conteneur = document.getElementById(`${secteur}_conteneur`);
          if (!conteneur) {
              console.error(`Le conteneur pour ${secteur} n'existe pas.`);
              return;
          }

          const div = document.createElement('div');
          div.classList.add('champ-academique');
          div.innerHTML = `
              <div class="d-flex justify-content-end">
                  <button type="button" class="btn btn-danger btn-sm" onclick="supprimerChamp(this)">X</button>
              </div>
              <div class="mb-3">
                  <input type="text" name="${secteur}_titre[]" class="form-control" placeholder="Titre" required>
              </div>
              <div class="mb-3">
                  <input type="text" name="${secteur}_annee[]" class="form-control" placeholder="Année" required>
              </div>
              <div class="mb-3">
                  <input type="text" name="${secteur}_durree[]" class="form-control" placeholder="Durrée" required>
              </div>
              <div class="mb-3">
                  <textarea name="${secteur}_description[]" class="form-control" placeholder="Description" rows="4" required></textarea>
              </div>
          `;

          conteneur.appendChild(div);
      }

      function supprimerChamp(button) {
          const div = button.closest('.champ-academique');
          if (div) {
              div.remove();
          }
      }

      document.addEventListener('DOMContentLoaded', function () {
              const regions = {
                  madagascar: [
                      { value: 'analamanga', text: 'Analamanga' },
                      { value: 'atsinanana', text: 'Atsinanana' },
                      { value: 'boeny', text: 'Boeny' },
                      { value: 'ihorombe', text: 'Ihorombe' },
                      { value: 'menabe', text: 'Menabe' },
                      { value: 'sava', text: 'Sava' },
                      { value: 'vakinankaratra', text: 'Vakinankaratra' }
                  ],
                  france: [
                      { value: 'auvergne-rhone-alpes', text: 'Auvergne-Rhône-Alpes' },
                      { value: 'bretagne', text: 'Bretagne' },
                      { value: 'centre-val-de-loire', text: 'Centre-Val de Loire' },
                      { value: 'corse', text: 'Corse' },
                      { value: 'ile-de-france', text: 'Île-de-France' },
                      { value: 'normandie', text: 'Normandie' },
                      { value: 'occitanie', text: 'Occitanie' },
                      { value: 'paca', text: 'Provence-Alpes-Côte d\'Azur' }
                  ]
              };

              const paysSelect = document.getElementById('pays');
              const regionSelect = document.getElementById('region');

              function updateRegions() {
                  const selectedCountry = paysSelect.value;
                  const regionsList = regions[selectedCountry] || [];

                  // Clear existing options
                  regionSelect.innerHTML = '';

                  // Populate new options
                  regionsList.forEach(region => {
                      const option = document.createElement('option');
                      option.value = region.value;
                      option.textContent = region.text;
                      regionSelect.appendChild(option);
                  });
              }

              // Initial population of regions
              updateRegions();

              // Add event listener to update regions when the country changes
              paysSelect.addEventListener('change', updateRegions);
          });
  </script>

<style>
    .sec-title{
        margin-top:50px;
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

    .btn-style-four{
        padding :10px 20px;
        border : 1px solid;
    }

    /* Style pour les champs de texte multilignes */
    textarea.form-control {
        resize: vertical;
    }

    .d-flex{
        padding-bottom: 5px;
    }
    .chosen-container .chosen-drop, .chosen-container .chosen-results{
        color:#66022b;
    }
    .group-result{
        color : #333;
    }
</style>

@endsection
