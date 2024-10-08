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
        Schema::create('universites', function (Blueprint $table) {
            $table->id();
            $table->string('nom_etablissement');
            $table->string('adresse_etablissement');
            $table->string('site_web');
            $table->string('nom_contact');
            $table->string('fonction_contact');
            $table->string('adresse_email_contact');
            $table->string('numero_telephone_contact');
            $table->string('nombre_etudiants');
            $table->json('domaines_etudes_proposes');
            $table->json('niveaux_etudes_proposes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universites');
    }
};
