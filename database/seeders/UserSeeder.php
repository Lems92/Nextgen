<?php

namespace Database\Seeders;

use App\Models\Universite;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create universite
        $universite = Universite::create([
            'nom_etablissement' => 'Universite',
            'adresse_etablissement' => 'Antsirabe',
            'site_web' => 'www.universite.mg',
            'nom_contact' => 'Nom contact',
            'fonction_contact' => 'Directeur',
            'adresse_email_contact' => 'contact@email.com',
            'numero_telephone_contact' => '0343332038',
            'nombre_etudiants' => '500 à 999',
            'domaines_etudes_proposes' => "['test']",
            'niveaux_etudes_proposes' => "['test']",
        ]);

        $user = User::create([
            'email' => 'universite@gmail.com',
            'password' => bcrypt('password123'),
            'email_verified_at' => now(),
            'is_accepted_by_admin' => true,
            'userable_type' => Universite::class,
            'userable_id' => $universite->id,
        ]);

        $user->assignRole('service-carriere');
    }
}
