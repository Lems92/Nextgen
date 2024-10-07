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
            $table->string('titre');
            $table->foreignId('contrat_id')->constrained('contrats');
            $table->string('duree');
            $table->foreignId('lieu')->constrained('regions');
            $table->string('description');
            $table->string('avantage');
            $table->date('date_limite');
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
