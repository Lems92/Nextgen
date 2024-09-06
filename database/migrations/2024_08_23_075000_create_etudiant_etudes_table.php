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
        Schema::create('etudiant_etudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('etudiants');
            $table->foreignId('domaine_id')->constrained('domaines');
            $table->foreignId('niveau_etude_id')->constrained('niveau_etudes');
            $table->integer('annee');
            $table->enum('etat_diplome',['Obtenue','En cours'])->default('Obtenue');
            $table->string('fichier_diplome');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiant_etudes');
    }
};
