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
            $table->string('nom_ecole_universite')->nullable();
            $table->string('domaine_etudes')->nullable();
            $table->string('niveau_etudes')->nullable();
            $table->string('annee_obtention_diplome')->nullable();
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
            $table->string('document_diplome')->nullable();
            $table->string('document_recommandation')->nullable();
            $table->json('secteur_activite_preferer')->nullable();
            $table->json('type_emploi_recherche')->nullable();
            $table->string('localisation_geographique_preferee')->nullable();
            $table->string('duree_disponibilite')->nullable();
            $table->string('semestre_cours')->nullable();
            $table->date('vacances_ete_debut')->nullable();
            $table->date('vacances_ete_fin')->nullable();
            $table->date('dates_disponibles_vacances_ete_debut')->nullable();
            $table->date('dates_disponibles_vacances_ete_fin')->nullable();
            $table->boolean('accessibilite')->default(false);
            $table->text('details_accessibilite')->nullable();
            $table->string('origine_ethnique')->nullable();
            $table->string('statut_socio_economique')->nullable();
            $table->string('conditions_vie_specifiques')->nullable();
            $table->string('religion_belief')->nullable();
            $table->string('orientation_sexuelle')->nullable();
            $table->string('profile_picture')->nullable();
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
