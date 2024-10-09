<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create permissions
        Permission::create(['name' => 'login']);

        //create roles
        //etudiant
        Role::create(['name' => 'etudiant'])->givePermissionTo([
            'login'
        ]);

        //entreprise
        Role::create(['name' => 'entreprise'])->givePermissionTo([
            'login'
        ]);

        //service-carriere
        Role::create(['name' => 'service-carriere'])->givePermissionTo([
            'login'
        ]);

        //admin
        Role::create(['name' => 'admin'])->givePermissionTo([
            'login'
        ]);


        // create admin
        $admin = User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'),
            'userable_type' => null,
            'userable_id' => null,
            'email_verified_at' => now(),
            'is_active' => true,
        ]);

        $admin->assignRole("admin");
    }
}
