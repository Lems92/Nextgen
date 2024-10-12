<?php

namespace Database\Seeders;

use App\Models\DomaineEtude;
use App\Models\DomaineEtudeCategorie;
use Illuminate\Database\Seeder;

class DomaineEtudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Arts et Humanités' => [
                'Histoire',
                'Littérature',
                'Philosophie',
                'Langues étrangères',
                'Études culturelles',
                'Arts visuels',
                'Musique',
            ],
            'Sciences Sociales' => [
                'Psychologie',
                'Sociologie',
                'Sciences politiques',
                'Économie',
                'Géographie',
                'Relations internationales',
                'Travail social',
            ],
            'Sciences Naturelles' => [
                'Biologie',
                'Chimie',
                'Physique',
                'Mathématiques',
                'Géologie',
                'Sciences de l\'environnement',
                'Astronomie',
            ],
            'Ingénierie et Technologies' => [
                'Génie civil',
                'Génie mécanique',
                'Génie électrique',
                'Génie chimique',
                'Informatique',
                'Télécommunications',
                'Énergies renouvelables',
            ],
            'Médecine et Santé' => [
                'Médecine',
                'Sciences infirmières',
                'Pharmacie',
                'Médecine vétérinaire',
                'Santé publique',
                'Réhabilitation et physiothérapie',
                'Nutrition',
            ],
            'Commerce et Gestion' => [
                'Administration des affaires',
                'Marketing',
                'Finance',
                'Ressources humaines',
                'Gestion de projet',
                'Entrepreneuriat',
                'Logistique et Supply Chain',
            ],
            'Droit' => [
                'Droit pénal',
                'Droit civil',
                'Droit international',
                'Droit commercial',
                'Droit du travail',
                'Droit public',
                'Droit de la propriété intellectuelle',
            ],
            'Education' => [
                'Pédagogie',
                'Gestion de l\'éducation',
                'Formation des enseignants',
                'Psychologie de l\'éducation',
                'Technologies éducatives',
            ],
            'Architecture et Urbanisme' => [
                'Architecture',
                'Urbanisme',
                'Design d\'intérieur',
                'Aménagement du territoire',
                'Conservation du patrimoine',
            ],
            'Sciences et Technologies de l\'Information' => [
                'Développement logiciel',
                'Sécurité informatique',
                'Intelligence artificielle',
                'Big Data',
                'Réseaux et systèmes',
                'Design web et UX',
            ],
            'Agriculture et Environnement' => [
                'Sciences agronomiques',
                'Gestion des ressources naturelles',
                'Agronomie',
                'Écologie',
                'Développement durable',
                'Gestion de l\'eau',
            ],
            'Tourisme et Hôtellerie' => [
                'Gestion hôtelière',
                'Gestion du tourisme',
                'Planification d\'événements',
                'Marketing touristique',
                'Gestion des loisirs',
            ],
            'Sciences Politiques et Relations Internationales' => [
                'Théorie politique',
                'Relations internationales',
                'Diplomatie',
                'Analyse des politiques publiques',
                'Études de sécurité',
            ]
        ];

        foreach ($categories as $name => $domaines_etudes) {
            $cat = DomaineEtudeCategorie::create(['name' => $name]);
            foreach ($domaines_etudes as $de) {
                $cat->domaines_etudes()->create([
                    'name' => $de,
                    'description' => ''
                ]);
            }
        }
    }
}
