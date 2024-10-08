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
            //$table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Clé étrangère vers la table `users`
            $table->string('nom_entreprise');
            $table->string('pays');
            $table->foreignId('region_id')->constrained('regions');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('adresse');
            $table->string('complement_adresse')->nullable();
            $table->string('site_web');
            $table->string('taille_entreprise');
            //$table->string('description');
            //$table->string('secteur_activite');
            $table->date('date_creation');
            $table->string('nom_contact');
            $table->string('fonction_contact');
            $table->string('email_contact');
            $table->string('telephone_contact');
            $table->text('opportunities')->nullable(); // Utiliser text pour les champs pouvant contenir des listes
            $table->text('fields')->nullable();
            $table->text('inclusion_diversity')->nullable();
            $table->text('training_support')->nullable();
            $table->string('selected_offer')->nullable();
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
