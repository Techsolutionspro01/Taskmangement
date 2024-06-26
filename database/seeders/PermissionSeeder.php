<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // 'view-users',
            // 'create-users',
            // 'update-users',
            // 'delete-users',
            
            // 'view-roles',
            // 'create-roles',
            // 'update-roles',
            // 'delete-roles',

            // 'view-tasks',
            // 'create-tasks',
            // 'update-tasks',
            // 'delete-tasks',

            // 'view-projects',
            // 'create-projects',
            // 'update-projects',
            // 'delete-projects',

            'view-departments',
            'create-departments',
            'update-departments',
            'delete-departments',
        ];
      
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
