<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Define permissions
        $permissions = [
            'manage sliders',
            'manage product categories',
            'manage products',
            'manage product colors',
            'manage product images',
            'manage projects',
            'manage certificates',
            'manage contact messages',
            'manage users',
            'view dashboard',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions

        // Super Admin - Has all permissions
        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $superAdmin->syncPermissions(Permission::all());

        // Admin - Has most permissions except user management
        $adminPermissions = [
            'manage sliders',
            'manage product categories',
            'manage products',
            'manage product colors',
            'manage product images',
            'manage projects',
            'manage certificates',
            'manage contact messages',
            'view dashboard',
        ];
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->syncPermissions($adminPermissions);

        // Editor - Limited CRUD permissions
        $editorPermissions = [
            'manage sliders',
            'manage products',
            'manage product images',
            'manage projects',
            'view dashboard',
        ];
        $editor = Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);
        $editor->syncPermissions($editorPermissions);

        // Assign super_admin role to the first admin user
        $adminUser = User::where('email', 'admin@admin.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('super_admin');
        }
    }
}
