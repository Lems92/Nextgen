<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom_entreprise', 255);
            $table->string('secteur_activite', 255);
            $table->string('adresse', 255);
            $table->string('complement_adresse', 255)->nullable();
            $table->string('code_postal', 255);
            $table->string('pays', 255);
            $table->string('region', 255)->nullable();
            $table->string('ville', 255);
            $table->string('site_web', 255)->nullable();
            $table->date('date_creation');
            $table->string('nom_contact', 255);
            $table->string('fonction_contact', 255);
            $table->string('email_contact', 255);
            $table->string('telephone_contact', 255);
            $table->json('opportunities');
            $table->json('domaines_activites');
            $table->text('inclusion_diversity');
            $table->text('training_support');
            $table->string('selected_offer', 255);
            $table->string('profile_picture', 255)->nullable();
            $table->string('slug', 255)->unique();
            $table->timestamps();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
}