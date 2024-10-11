<?php

namespace Database\Seeders;

use App\Models\Parametrage;
use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParametrageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type_contrat = Table::create(['name' => 'type_contrat']);
        $duree_contrat = Table::create(['name' => 'duree_contrat']);
        $lieu_poste = Table::create(['name' => 'lieu_poste']);

        // on associe seulement le nom de table au parametrage
        // type de contrat
        $type_contrats = ['Stage', 'CDI', 'CDD', 'Alternance', 'Freelance/Indépendant', 'Intérim', 'Apprentissage'];
        foreach ($type_contrats as $contrat) {
            Parametrage::create([
                'table' => $type_contrat->name,
                'sigle' => $this->generate_sigle($contrat),
                'libelle' => $contrat,
                'description' => '',
            ]);
        }

        //duree contrat
        $duree_contrats = ['Moins de 1 mois', '1 à 3 mois', '3 à 6 mois', 'Plus de 6 mois'];
        foreach ($duree_contrats as $duree) {
            Parametrage::create([
                'table' => $duree_contrat->name,
                'sigle' => $this->generate_sigle($duree),
                'libelle' => $duree,
                'description' => '',
            ]);
        }

        $lieu_postes = ['Antananarivo', 'Toamasina', 'Antsirabe', 'Fianrantsoa', 'Mahajanga'];
        foreach ($lieu_postes as $lieu) {
            Parametrage::create([
                'table' => $lieu_poste->name,
                'sigle' => $this->generate_sigle($lieu),
                'libelle' => $lieu,
                'description' => '',
            ]);
        }
    }
    protected function generate_sigle($string): string
    {
        $string = strtolower($string);
        return preg_replace('/[^a-z0-9]/', '', $string);
    }
}
