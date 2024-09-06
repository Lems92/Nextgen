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
        Schema::create('universite_domaines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('universite_id')->constrained('universites');
            $table->foreignId('domaine_id')->constrained('domaines');
            $table->foreignId('niveau_etude_id')->constrained('niveau_etudes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universite_domaines');
    }
};
