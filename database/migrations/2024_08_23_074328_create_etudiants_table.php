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
            $table->enum('genre', ['masculin', 'feminin', 'non-binaire', 'prefere-pas-dire']);
            $table->text('adresse_postale');
            $table->string('pays');
            $table->string('region');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('nom_ecole_universite');
            $table->string('domaine_etudes');
            $table->enum('niveau_etudes', ['Licence', 'Master', 'Doctorat']);
            $table->string('annee_obtention_diplome');
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
            $table->json('secteur_activite_preferer')->nullable();
            $table->json('type_emploi_recherche')->nullable();
            $table->text('localisation_geographique_preferee')->nullable();
            $table->string('salaire_souhaite')->nullable();
            $table->enum('duree_disponibilite', [
                'Moins de 1 mois',
                '1 à 3 mois',
                '3 à 6 mois',
                '6 à 12 mois',
                'Plus de 12 mois'
            ])->nullable();
            $table->enum('semestre_cours', ['semestre_1', 'semestre_2'])->nullable();
            $table->date('vacances_ete_debut')->nullable();
            $table->date('vacances_ete_fin')->nullable();
            $table->text('dates_disponibles_vacances_ete_debut')->nullable();
            $table->text('dates_disponibles_vacances_ete_fin')->nullable();
            $table->boolean('accessibilite')->nullable();
            $table->text('details_accessibilite')->nullable();
            $table->string('origine_ethnique')->nullable();
            $table->enum('statut_socio_economique', ['origine_modeste', 'classe_moyenne', 'prefere_pas_dire'])->nullable();
            $table->enum('conditions_vie_specifiques', ['sans_domicile_fixe', 'handicap', 'prefere_pas_dire'])->nullable();
            $table->enum('religion_belief', ['chretien', 'musulman', 'bouddhiste', 'hindou', 'prefere_pas_dire'])->nullable();
            $table->enum('orientation_sexuelle', ['hétérosexuel', 'homosexuel', 'bisexuel', 'prefere_pas_dire'])->nullable();
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
