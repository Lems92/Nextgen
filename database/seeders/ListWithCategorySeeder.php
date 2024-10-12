<?php

namespace Database\Seeders;

use App\Models\ListWithCategory;
use App\Models\ListCategorie;
use Illuminate\Database\Seeder;

class ListWithCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $domaines_etudes = [
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

        $secteur_activites = [
            "Technologie de l'Information" => [
                "Développement logiciel",
                "Cybersécurité",
                "Intelligence artificielle",
                "Gestion de systèmes informatiques"
            ],
            "Santé" => [
                "Médecine",
                "Soins infirmiers",
                "Pharmacie",
                "Médecine vétérinaire"
            ],
            "Finance et Comptabilité" => [
                "Banque et assurance",
                "Gestion de portefeuille",
                "Comptabilité",
                "Analyse financière"
            ],
            "Ingénierie" => [
                "Génie civil",
                "Génie mécanique",
                "Génie électrique",
                "Génie chimique"
            ],
            "Commerce et Marketing" => [
                "Vente et distribution",
                "Marketing digital",
                "Gestion de marque",
                "Analyse de marché"
            ],
            "Éducation et Formation" => [
                "Enseignement",
                "Formation professionnelle",
                "Pédagogie",
                "Gestion éducative"
            ],
            "Arts et Création" => [
                "Design graphique",
                "Arts visuels",
                "Musique et spectacle",
                "Design d'intérieur"
            ],
            "Sciences et Recherche" => [
                "Biologie",
                "Physique",
                "Chimie",
                "Recherche scientifique"
            ],
            "Tourisme et Hôtellerie" => [
                "Gestion hôtelière",
                "Planification de voyages",
                "Gestion d'événements",
                "Tourisme durable"
            ],
            "Droit et Juridique" => [
                "Droit pénal",
                "Droit civil",
                "Droit international",
                "Droit commercial"
            ],
            "Agriculture et Environnement" => [
                "Gestion agricole",
                "Sciences de l'environnement",
                "Agriculture durable",
                "Conservation de la biodiversité"
            ],
            "Énergie et Ressources Naturelles" => [
                "Énergies renouvelables",
                "Gestion des ressources",
                "Ingénierie énergétique",
                "Exploration minière"
            ],
            "Transport et Logistique" => [
                "Gestion de la chaîne d'approvisionnement",
                "Logistique et distribution",
                "Transport international",
                "Gestion des infrastructures de transport"
            ],
            "Développement et Humanitaire" => [
                "Aide au développement",
                "ONG et organisations humanitaires",
                "Gestion des projets de développement",
                "Travail social"
            ],
            "Télécommunications" => [
                "Réseaux de communication",
                "Gestion des infrastructures télécom",
                "Services Internet",
                "Développement de technologies de communication"
            ]
        ];

        $all = ['domaines_etudes' => $domaines_etudes, 'secteur_activites' => $secteur_activites];

        foreach ($all as $nom_table => $categories) {
            foreach ($categories as $name => $category) {
                $cat = ListCategorie::create([
                    'table' => $nom_table,
                    'name' => $name
                ]);
                foreach ($category as $sous_cat) {
                    $cat->list_with_categories()->create([
                        'name' => $sous_cat,
                        'description' => ''
                    ]);
                }
            }
        }
    }
}
