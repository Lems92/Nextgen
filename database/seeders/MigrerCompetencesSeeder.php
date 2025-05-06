<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etudiant;

class MigrerCompetencesSeeder extends Seeder
{   
    // Fonction pour nettoyer et décoder les valeurs JSON
    public function nettoieCompetence($valeur) {
        $iteration = 0;
        while (is_string($valeur) && $iteration < 5) {
            $test = json_decode($valeur, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $valeur = $test;
            } else {
                break;
            }
            $iteration++;
        }
    
        // Si à la fin c’est toujours pas un tableau, dernier fallback
        if (!is_array($valeur)) {
            $valeur = array_map('trim', explode(',', $valeur));
        }
    
        return json_encode($valeur, JSON_UNESCAPED_UNICODE);
    }

    public function run()
{
    // Récupérer tous les étudiants
    $etudiants = \App\Models\Etudiant::all();

    // Définir les champs à réinitialiser
    $champs = [
        'competences_techniques',
        'competences_en_recherche_et_analyse',
        'competences_en_communication',
        'competences_langues',
        'autres_competences',
    ];

    // Parcourir tous les étudiants
    foreach ($etudiants as $etudiant) {
        foreach ($champs as $champ) {
            // Réinitialiser la valeur de chaque compétence à null
            $etudiant->$champ = null;
        }
        
        // Sauvegarder l'étudiant avec les nouvelles valeurs
        $etudiant->save();
    }

    // Message de succès après réinitialisation
    echo "\n✅ Les compétences ont été supprimées.\n";
}

}
