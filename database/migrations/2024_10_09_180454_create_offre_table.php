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
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->string('titre_poste');
            $table->string('type_contrat');
            $table->string('duree_contrat');
            $table->string('lieu_poste');
            $table->string('date_debut');
            $table->text('description_poste');
            $table->json('competences_techniques');
            $table->json('competences_transversales');
            $table->json('langues_requises');
            $table->text('avantages');
            $table->string('date_limite_candidature');
            $table->foreignId('entreprise_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offres');
    }
};
