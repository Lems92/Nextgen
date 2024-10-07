<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('adresse_email')->unique();
            $table->string('numero_telephone')->nullable();
            $table->date('date_naissance')->nullable();
            $table->enum('genre', ['Homme', 'Femme', 'Autre'])->nullable();
            $table->text('adresse_postale')->nullable();
            $table->string('pays')->nullable();
            $table->string('region')->nullable();
            $table->string('ville')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('nom_ecole_universite')->nullable();
            $table->enum('domaine_etudes', ['Sciences', 'Ingénierie', 'Arts', 'Commerce', 'Médecine', 'Droit', 'Économie', 
                                            'Architecture', 'Sciences sociales', 'Sciences de la vie', 'Sciences de l\'environnement', 
                                            'Éducation', 'Tourisme et hôtellerie', 'Agriculture et environnement rural', 
                                            'Technologies de l\'information', 'Communication', 'Langues et cultures', 
                                            'Sciences politiques', 'Gestion', 'Sciences de la santé'])->nullable();
            $table->enum('niveau_etudes', ['Licence', 'Master', 'Doctorat'])->nullable();
            $table->string('annee_obtention_diplome')->nullable();
            $table->string('titre_stage_academique')->nullable();
            $table->string('annee_stage_academique')->nullable();
            $table->string('duree_stage_academique')->nullable();
            $table->text('description_stage_academique')->nullable();
            $table->string('titre_projet_academique')->nullable();
            $table->string('annee_projet_academique')->nullable();
            $table->string('duree_projet_academique')->nullable();
            $table->text('description_projet_academique')->nullable();
            $table->string('titre_these_memoire')->nullable();
            $table->string('annee_these_memoire')->nullable();
            $table->string('duree_these_memoire')->nullable();
            $table->text('description_these_memoire')->nullable();
            $table->string('titre_realisations')->nullable();
            $table->string('annee_realisations')->nullable();
            $table->string('duree_realisations')->nullable();
            $table->text('description_realisations')->nullable();
            $table->string('titre_cours_specialises')->nullable();
            $table->string('annee_cours_specialises')->nullable();
            $table->string('duree_cours_specialises')->nullable();
            $table->text('description_cours_specialises')->nullable();
            $table->string('titre_autres_experiences')->nullable();
            $table->string('annee_autres_experiences')->nullable();
            $table->string('duree_autres_experiences')->nullable();
            $table->text('description_autres_experiences')->nullable();
            $table->text('competences_techniques')->nullable();
            $table->text('competences_recherche_analyse')->nullable();
            $table->text('competences_communication')->nullable();
            $table->text('competences_transversales')->nullable();
            $table->text('experience_professionnelle')->nullable();
            $table->text('portfolio')->nullable();
            $table->text('centres_interet')->nullable();
            $table->string('document_diplome')->nullable();
            $table->string('document_recommandation')->nullable();
            $table->enum('secteur_activite_preferer', ['Technologie de l\'Information', 'Santé', 'Finance et Comptabilité', 
                                                     'Ingénierie', 'Commerce et Marketing', 'Éducation et Formation', 
                                                     'Arts et Création', 'Sciences et Recherche', 'Tourisme et Hôtellerie', 
                                                     'Droit et Juridique', 'Agriculture et Environnement', 
                                                     'Énergie et Ressources Naturelles', 'Transport et Logistique', 
                                                     'Développement et Humanitaire', 'Télécommunications'])->nullable();
            $table->enum('type_emploi_recherche', ['CDI', 'Stage', 'Contrat à durée déterminée', 'Freelance', 'Alternance'])->nullable();
            $table->text('localisation_geographique_preferee')->nullable();
            $table->string('salaire_souhaite')->nullable();
            $table->enum('duree_disponibilite', ['Moins de 1 mois', '1 à 3 mois', '3 à 6 mois', '6 à 12 mois', 'Plus de 12 mois'])->nullable();
            $table->enum('semestre_cours', ['Semestre 1', 'Semestre 2'])->nullable();
            $table->date('vacances_ete_debut')->nullable();
            $table->date('vacances_ete_fin')->nullable();
            $table->text('dates_disponibles_vacances_ete')->nullable();
            $table->boolean('accessibilite')->nullable();
            $table->text('details_accessibilite')->nullable();
            $table->string('origine_ethnique')->nullable();
            $table->enum('statut_socio_economique', ['Origine modeste', 'Classe moyenne', 'Préfère ne pas dire'])->nullable();
            $table->enum('conditions_vie_specifiques', ['Sans domicile fixe', 'En situation de handicap', 'Préfère ne pas dire'])->nullable();
            $table->enum('religion_belief', ['Chrétien', 'Musulman', 'Bouddhiste', 'Hindou', 'Préfère ne pas dire'])->nullable();
            $table->enum('orientation_sexuelle', ['Hétérosexuel', 'Homosexuel', 'Bisexuel', 'Préfère ne pas dire'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}
