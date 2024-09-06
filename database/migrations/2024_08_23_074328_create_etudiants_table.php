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
            $table->foreignId('user_id')->constrained('users');
            $table->string('nom');
            $table->string('prenom');
            $table->string('numero_telephone');
            $table->date('date_naissance');
            $table->enum('genre',['Masculin','Féminin','Non-binaire','Préfère ne pas dire'])->default('Masculin');
            $table->foreignId('region_id')->constrained('regions');
            $table->string('ville');
            $table->string('code_postal');
            $table->string('adresse');
            $table->string('nom_etablissement');
            $table->string('centre_interet');
            $table->string('fichier_recommandation');
            $table->string('photo');
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
