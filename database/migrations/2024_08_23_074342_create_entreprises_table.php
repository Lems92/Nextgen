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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise');
            $table->string('secteur_activite');
            $table->string('adresse');
            $table->string('complement_adresse')->nullable();
            $table->string('code_postal');
            $table->string('pays');
            $table->string('region');
            $table->string('ville');
            $table->string('site_web')->nullable();
            $table->date('date_creation');
            $table->string('nom_contact');
            $table->string('fonction_contact');
            $table->string('email_contact');
            $table->string('telephone_contact');
            $table->json('opportunities'); // Utiliser text pour les champs pouvant contenir des listes
            $table->json('domaines_activites');
            $table->text('inclusion_diversity');
            $table->text('training_support');
            $table->string('selected_offer');
            $table->string('slug', 255)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
