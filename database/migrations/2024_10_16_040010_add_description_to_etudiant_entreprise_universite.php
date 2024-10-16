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
        Schema::table('universites', function (Blueprint $table) {
            $table->addColumn('text', 'description')->nullable();
        });

        Schema::table('etudiants', function (Blueprint $table) {
            $table->addColumn('text', 'description')->nullable();
        });

        Schema::table('entreprises', function (Blueprint $table) {
            $table->addColumn('text', 'description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('universites', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('etudiants', function (Blueprint $table) {
            $table->dropColumn('description');
        });

        Schema::table('entreprises', function (Blueprint $table) {
            $table->dropColumn('description');
        });
    }
};
