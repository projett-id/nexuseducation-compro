<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'manage-users']);
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['manage-users']);

        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@nexuseducation.com',
            'password' => bcrypt('password'), // 👈 default password
        ]);
        $admin->assignRole($adminRole);
    }
}
