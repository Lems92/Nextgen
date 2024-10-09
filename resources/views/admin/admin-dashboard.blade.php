@extends('dashboard-layout')

@section('title', 'NextGen - Accueil')

@section('content')
    <!-- Header -->
    @include('header.dashboard-header')

    <section class="user-dashboard">
        <div class="dashboard-outer">

            <!-- Section: Company Submissions Overview -->
            <section class="admin-section bg-light">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="text-center mb-5">
                                <h2>Entreprises Soumises</h2>
                            </div>
                        </div>
                    </div>

                    <div class="admin-table table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nom de l'Entreprise</th>
                                <th>Secteur d'Activité</th>
                                <th>Ville</th>
                                <th>Région</th>
                                <th>Contact Principal</th>
                                <th>Email de Contact</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>NextA</td>
                                <td>ESN</td>
                                <td>Antananarivo</td>
                                <td>Analamanga</td>
                                <td>Nom</td>
                                <td>Email</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#" class="btn btn-warning" onclick="showDetails()">Détails/Modifer</a>
                                        <form action="#" method="POST" style="display:inline;">
                                            @csrf
                                            @method('POST')
                                            <button type="submit" class="btn btn-success">Approuver</button>
                                        </form>
                                        <form action="#" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entreprise ?');">
                                                Rejeter
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- Section: Detailed Company Information -->
            <section id="details-entreprise" class="p-4 border rounded shadow-sm" style="display:none;">
                <h2 class="text-center mb-4">Détails de l'Entreprise</h2>

                <!-- Informations Générales -->
                <form>
                    <h4>Informations Générales</h4>

                    <div class="mb-3">
                        <label for="companyName" class="form-label">Nom de l’Entreprise :</label>
                        <input type="text" class="form-control" id="companyName" placeholder="Nom de l'entreprise">
                    </div>

                    <div class="mb-3">
                        <label for="sector" class="form-label">Secteur d'Activité :</label>
                        <select id="sector" class="form-select">
                            <option selected>Choisissez...</option>
                            <option>Informatique</option>
                            <option>Ingénierie</option>
                            <option>Commerce et Gestion</option>
                            <!-- Ajoutez d'autres secteurs ici -->
                        </select>
                    </div>

                    <h4>Adresse de l'Entreprise</h4>

                    <div class="mb-3">
                        <label for="address" class="form-label">Adresse Complète :</label>
                        <input type="text" class="form-control" id="address" placeholder="Numéro et Rue">
                    </div>

                    <div class="mb-3">
                        <label for="address2" class="form-label">Complément d'Adresse (si nécessaire) :</label>
                        <input type="text" class="form-control" id="address2"
                               placeholder="Bâtiment, Appartement, Suite">
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="postalCode" class="form-label">Code Postal :</label>
                            <input type="text" class="form-control" id="postalCode">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="city" class="form-label">Ville :</label>
                            <input type="text" class="form-control" id="city">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="region" class="form-label">Région/Province :</label>
                            <input type="text" class="form-control" id="region">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="country" class="form-label">Pays :</label>
                        <input type="text" class="form-control" id="country">
                    </div>

                    <div class="mb-3">
                        <label for="website" class="form-label">Site Web :</label>
                        <input type="url" class="form-control" id="website" placeholder="https://">
                    </div>

                    <div class="mb-3">
                        <label for="creationDate" class="form-label">Date de Création :</label>
                        <input type="date" class="form-control" id="creationDate">
                    </div>

                    <!-- Contact Principal -->
                    <h4>Contact Principal</h4>

                    <div class="mb-3">
                        <label for="contactName" class="form-label">Nom du Contact :</label>
                        <input type="text" class="form-control" id="contactName" placeholder="Nom du contact">
                    </div>

                    <div class="mb-3">
                        <label for="contactPosition" class="form-label">Fonction du Contact :</label>
                        <input type="text" class="form-control" id="contactPosition" placeholder="Fonction">
                    </div>

                    <div class="mb-3">
                        <label for="contactEmail" class="form-label">Adresse e-mail du Contact :</label>
                        <input type="email" class="form-control" id="contactEmail" placeholder="email@exemple.com">
                    </div>

                    <div class="mb-3">
                        <label for="contactPhone" class="form-label">Numéro de Téléphone du Contact :</label>
                        <input type="tel" class="form-control" id="contactPhone" placeholder="Numéro de téléphone">
                    </div>

                    <!-- Informations sur les Opportunités -->
                    <h4>Informations sur les Opportunités</h4>

                    <div class="mb-3">
                        <label class="form-label">Types d'Opportunités Proposées :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="stage" id="stage">
                            <label class="form-check-label" for="stage">Stages</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="fulltime" id="fulltime">
                            <label class="form-check-label" for="fulltime">Emplois à Temps Plein</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="parttime" id="parttime">
                            <label class="form-check-label" for="parttime">Emplois à Temps Partiel</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="alternance" id="alternance">
                            <label class="form-check-label" for="alternance">Alternance</label>
                        </div>
                    </div>

                    <!-- Domaines d'Activité des Opportunités -->
                    <h4>Domaines d'Activité des Opportunités :</h4>

                    <h5>Technologie de l'Information :</h5>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="dev" id="dev">
                        <label class="form-check-label" for="dev">Développement de Logiciels</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="security" id="security">
                        <label class="form-check-label" for="security">Sécurité Informatique</label>
                    </div>

                    <!-- Ajoutez d'autres domaines ici -->

                    <!-- Responsabilités et Engagement -->
                    <h4>Responsabilités et Engagement</h4>

                    <div class="mb-3">
                        <label class="form-label">Engagement en matière d’Inclusion et Diversité :</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="equality" id="equality">
                            <label class="form-check-label" for="equality">Politiques d’Égalité des Chances</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="underrepresented"
                                   id="underrepresented">
                            <label class="form-check-label" for="underrepresented">Programmes pour Groupes
                                Sous-représentés</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="accessibility" id="accessibility">
                            <label class="form-check-label" for="accessibility">Accessibilité au Travail</label>
                        </div>
                    </div>

                    <!-- Soumettre le formulaire -->
                    <button type="submit" class="btn btn-warning">Modifier</button>
                </form>
            </section>

            <!-- Section: Pricing Management -->
            <section class="admin-section bg-light">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2>Gestion des Offres</h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="pricing-plan">
                                <div class="plan-header">
                                    <h4>Plan Standard</h4>
                                    <p>Prix: 5 Ar / mois</p>
                                </div>
                                <div class="plan-features">
                                    <ul>
                                        <li>10 annonces de job</li>
                                        <li>3 offres vedettes</li>
                                        <li>Annonce affichée pendant 30 jours</li>
                                        <li>Support Premium</li>
                                    </ul>
                                </div>
                                <div class="plan-footer">
                                    <a href="#" class="btn btn-warning" onclick="offre()">Modifier</a>
                                    <form action="#" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette offre ?');">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="admin-section bg-light" id="offre" style="display: none;">
                <div class="container">
                    <div class="text-center mb-5">
                        <h2>Gestion des Offres</h2>
                    </div>
                    <form>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="pricing-plan">
                                    <div class="plan-header">
                                        <h4>Plan Standard</h4>
                                        <p>prix: <input type="text" class="form-control" placeholder="5030000">Ar/mois
                                        </p>
                                    </div>
                                    <div class="plan-features">
                                        <ul>
                                            <input type="text" class="form-control" placeholder="1 reseau">
                                            <input type="text" class="form-control" placeholder="2 tableau">
                                            <input type="text" class="form-control" placeholder="6 fe">
                                            <input type="text" class="form-control" placeholder="9 accees">
                                        </ul>
                                    </div>
                                    <div class="plan-footer">
                                        <a href="#" class="btn btn-warning">Modifier</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .admin-wrapper {
            padding: 20px 0;
        }

        .admin-table {
            margin-top: 30px;
        }

        .admin-table .table thead th {
            background-color: #66022b;
            color: white;
            text-align: center;
        }

        .admin-table .table tbody td {
            text-align: center;
            vertical-align: middle;
        }

        .admin-table .btn {
            margin: 0 5px;
        }

        .pricing-plan {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .plan-header {
            text-align: center;
            margin-bottom: 15px;
        }

        .plan-footer {
            text-align: center;
            margin-top: 15px;
        }

        .admin-details h3 {
            margin-top: 20px;
        }

        .admin-details a.btn {
            margin-top: 15px;
        }
    </style>
    <script>
        function showDetails() {
            var detailsSection = document.getElementById('details-entreprise');
            if (detailsSection.style.display === 'none' || detailsSection.style.display === '') {
                detailsSection.style.display = 'block';
            } else {
                detailsSection.style.display = 'none';
            }
        }

        function offre() {
            document.getElementById('offre').style.display = 'block';
        }
    </script>
@endsection
