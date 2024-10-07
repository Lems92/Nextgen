<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameCategorieDommaineIdInDomainesTable extends Migration
{
    public function up()
    {
        Schema::table('domaines', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère
            $table->dropForeign(['categorie_dommaine_id']);
        });

        Schema::table('domaines', function (Blueprint $table) {
            // Renommer la colonne
            $table->renameColumn('categorie_dommaine_id', 'categorie_domaine_id');
        });

        Schema::table('domaines', function (Blueprint $table) {
            // Ajouter de nouveau la contrainte de clé étrangère
            $table->foreign('categorie_domaine_id')->references('id')->on('categorie_domaines');
        });
    }

    public function down()
    {
        Schema::table('domaines', function (Blueprint $table) {
            // Supprimer la nouvelle contrainte de clé étrangère
            $table->dropForeign(['categorie_domaine_id']);
        });

        Schema::table('domaines', function (Blueprint $table) {
            // Renommer la colonne à son nom d'origine
            $table->renameColumn('categorie_domaine_id', 'categorie_dommaine_id');
        });

        Schema::table('domaines', function (Blueprint $table) {
            // Ajouter à nouveau la contrainte de clé étrangère d'origine
            $table->foreign('categorie_dommaine_id')->references('id')->on('categorie_domaines');
        });
    }
}

