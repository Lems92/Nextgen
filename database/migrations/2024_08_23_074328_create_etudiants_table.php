<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->string('numero_telephone');
            $table->date('date_naissance');
            $table->string('genre');
            $table->string('adresse_postale');
            $table->string('pays');
            $table->string('region');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('nom_ecole_universite');
            $table->string('domaine_etudes');
            $table->string('niveau_etudes');
            $table->string('annee_obtention_diplome');
            /*$table->string('titre_stage_academique')->nullable();
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
            $table->text('description_autres_experiences')->nullable();*/
            $table->json('competences_techniques')->nullable();
            $table->json('competences_en_recherche_et_analyse')->nullable();
            $table->json('competences_en_communication')->nullable();
            $table->json('competences_interpersonnelles')->nullable();
            $table->json('competences_resolution_problemes')->nullable();
            $table->json('competences_adaptabilite')->nullable();
            $table->json('competences_gestion_stress')->nullable();
            $table->json('competences_leadership')->nullable();
            $table->json('competences_ethique_responsabilite')->nullable();
            $table->json('competences_gestion_financiere')->nullable();
            $table->json('competences_langues')->nullable();

            //autres
            $table->text('experience_professionnelle')->nullable();
            $table->text('portfolio')->nullable();
            $table->text('centres_interet')->nullable();
            $table->string('document_diplome');
            $table->string('document_recommandation');
            $table->json('secteur_activite_preferer')->nullable();
            $table->json('type_emploi_recherche')->nullable();
            $table->string('localisation_geographique_preferee');
            //$table->string('salaire_souhaite')->nullable();
            $table->string('duree_disponibilite');
            $table->string('semestre_cours');
            $table->date('vacances_ete_debut');
            $table->date('vacances_ete_fin');
            $table->date('dates_disponibles_vacances_ete_debut');
            $table->date('dates_disponibles_vacances_ete_fin');
            $table->boolean('accessibilite')->default(false);
            $table->text('details_accessibilite')->nullable();
            $table->string('origine_ethnique');
            $table->string('statut_socio_economique');
            $table->string('conditions_vie_specifiques');
            $table->string('religion_belief');
            $table->string('orientation_sexuelle');
            $table->string('slug', 255)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
