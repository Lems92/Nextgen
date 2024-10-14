<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SubscriptionPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'mise_en_ligne_offre',
            'mise_en_ligne_cible_offre',
            'gestion_candidature',
            'page_presentation_entreprise',
            'shortlist_vip',
            'marque_employeur_en_avant',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
