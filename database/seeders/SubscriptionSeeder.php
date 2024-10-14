<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subscriptions = [
            'Standard' => [
                'mise_en_ligne_offre',
                'gestion_candidature',
            ],
            'Premium' => [
                'mise_en_ligne_offre',
                'gestion_candidature',
                'mise_en_ligne_cible_offre',
                'page_presentation_entreprise',
            ],
            'Gold' => [
                'mise_en_ligne_offre',
                'gestion_candidature',
                'mise_en_ligne_cible_offre',
                'page_presentation_entreprise',
                'shortlist_vip',
                'marque_employeur_en_avant',
            ],
        ];

        foreach ($subscriptions as $name => $permissions) {
            $subscription = Subscription::firstOrCreate(['name' => $name], [
                'price' => match($name) {
                    'Standard' => 100000.00,
                    'Premium' => 200000.00,
                    'Gold' => 300000.00,
                    default => 0,
                },
                'description' => ucfirst($name) . ' plan description.',
            ]);

            $permissionModels = Permission::whereIn('name', $permissions)->get();
            $subscription->permissions()->sync($permissionModels);
        }
    }
}
