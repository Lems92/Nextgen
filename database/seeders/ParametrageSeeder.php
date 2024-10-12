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
            'niveau_etude' => ['Baccalaureat', 'License', 'Master', 'Doctorat'],
            'competences_en_recherche_et_analyse' => [
                'Recherche documentaire',
                'Analyse de donnée',
                'Rédaction de rapports',
                'Veille technologique',
                'Méthodologie de recherche',
                'Analyse statistique',
                'Synthèse de rapports',
                'Gestion de l\'information',
            ],
            'competences_en_communication' => [
                'Communication orale/écrite',
                'Compétence en négociation',
                'Présentation',
                'Écoute active',
                'Gestion des conflits',
                'Communication interculturelle',
                'Rédaction',
                'Relations publiques',
            ],
            'competences_interpersonnelles' => ['Travail en équipe', 'Empathie'],
            'competences_resolution_problemes' => ['Pensée critique', 'Créativité'],
            'competences_adaptabilite' => ['Flexibilité', 'Apprentissage continu'],
            'competences_gestion_stress' => ['Gestion de strees', 'Équilibre travail-vie personnelle'],
            'competences_leadership' => ['Gestion d\'équipe', 'Price de décision'],
            'competences_ethique_responsabilite' => ['Ethique professionnelle', 'Responsabilité sociale'],
            'competences_gestion_financiere' => ['Gestion de budget', 'Analyse financière'],
            'statut_socio_economique' => ['Origine modeste', 'Classe moyenne', 'Préfère ne pas dire'],
            'conditions_vie_specifiques' => ['Préfère ne pas dire', 'Sans domicile fixe', 'En situation de handicap'],
            'religion' => ['Chrétien', 'Musulman', 'Boudhiste', 'Hindou', 'Préfère ne pas dire'],
            'orientation_sexuelle' => ['Hétérosexuel', 'Homosexuel', 'Bisexuel', 'Préfère ne pas dire'],
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
