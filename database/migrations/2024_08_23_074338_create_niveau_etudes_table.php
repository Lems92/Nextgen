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
        Schema::create('niveau_etudes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categorie_niveau_etude_id')->constrained('categorie_niveau_etudes');
            $table->string('nom_niveau_etude');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveau_etudes');
    }
};
