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
        $all = [
            'type_contrat' => ['Stage', 'CDI', 'CDD', 'Alternance', 'Freelance/Indépendant', 'Intérim', 'Apprentissage'],
            'duree_contrat' => ['Moins de 1 mois', '1 à 3 mois', '3 à 6 mois', 'Plus de 6 mois'],
            'lieu_poste' => ['Antananarivo', 'Toamasina', 'Antsirabe', 'Fianrantsoa', 'Mahajanga'],
            'competence_technique' => ['Bureautique', 'Programmation', 'Gestion de Bases de Données', 'Systèmes d\'Information', 'Cybersécurité'],
            'competence_transversale' => [
                'Communication écrite et orale',
                'Esprit d\'équipe et collaboration',
                'Capacité d\'analyse et résolution de problèmes',
                'Leadership et gestion du temps',
                'Adaptabilité et gestion du changement',
            ],
            'competence_linguistique' => ['Anglais', 'Français', 'Espagnol', 'Allemand', 'Italien', 'Portugais', 'Arabe', 'Mandarin'],
        ];

        foreach ($all as $nom_table => $values) {
            Table::create(['name' => $nom_table]);
            foreach ($values as $elem) {
                Parametrage::create([
                    'table' => $nom_table,
                    'sigle' => $this->generate_sigle($elem),
                    'libelle' => $elem,
                    'description' => '',
                ]);
            }
        }
    }

    protected function generate_sigle($string): string
    {
        $string = strtolower($string);
        return preg_replace('/[^a-z0-9]/', '', $string);
    }
}
