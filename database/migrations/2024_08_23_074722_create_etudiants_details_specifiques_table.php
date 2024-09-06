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
        Schema::create('etudiants_details_specifiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('etudiant_id')->constrained('etudiants');
            $table->enum('origine_ethnique',
            ['Merina','Antandroy','Antanosy','Bestileo','Betsimisaraka','Tsimihety','Sakalava'
            ,'Zafimaniry','Antaimoro','Mahafaly','Masikoro','Tanala','Tsonga','Sihanaka','Makoa'])
            ->default('Merina');
            $table->enum('statut_socio_econimique',['Origine modeste','Classe moyenne','Préfère ne pas dire'])
            ->default('Origine modeste');
            $table->enum('statut_socio_economique',['Sans domicile fixe','En situation de handicap','Préfère ne pas dire'])
            ->default('Sans domicile fixe');
            $table->enum('religion',['Chrétien','Musulman','Bouddhiste','Hindo','Préfère ne pas dire'])
            ->default('Chrétien');
            $table->enum('orientation_sexuelle',['Hétérosexuelle','Homosexuelle','Bisexuelle','Préfère ne pas dire'])
            ->default('Hétérosexuelle');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants_details_specifiques');
    }
};
