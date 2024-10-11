<?php

namespace Database\Seeders;

use App\Models\Parametrage;
use App\Models\Table;
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
            'nombre_etudiant' => ['Moins de 100', '100 à 499', '500 à 999', '1 000 à 4 999', '5 000 à 9 999', 'Plus de 10 000'],
            'niveaux_etudes_proposes' => [
                'Licence générale',
                'Licence professionnelle',
                'Licence en alternance',
                'Master 1',
                'Master 2',
                'Master Recherche',
                'Master Professionnel',
                'Doctorat',
                'Thèse de Doctorat',
                'Post-doctorat',
                'Certificat de Compétences Professionnelles',
                'Diplôme Universitaire',
                'Diplôme d\'Études Supérieures Spécialisées',
                'Diplôme d\'Études Supérieures',
                'Formations courtes spécialisées',
                'Certificats de spécialisation',
                'Diplômes de formation continue',
                'Double diplôme en partenariat avec d\’autres institutions académiques',
            ],
            'genre' => ['Masculin', 'Féminin', 'Non binaire', 'Préfère ne pas dire'],
            'domaine_etude' => [
                'Sciences',
                'Ingénierie',
                'Arts',
                'Commerce',
                'Médecine',
                'Droit',
                'Économie',
                'Architecture',
                'Sciences sociales',
                'Sciences de la vie',
                'Sciences de l\'environnement',
                'Éducation',
                'Tourisme et hôtellerie',
                'Agriculture et environnement rural',
                'Technologies de l\'information',
                'Communication',
                'Langues et cultures',
                'Sciences politiques',
                'Gestion',
                'Sciences de la santé',
            ]
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
        return str_replace(' ', '_', $string);
    }
}
