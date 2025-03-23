<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Permissions
        // users
        Permission::create(['name' => 'add_users']);
        Permission::create(['name' => 'change_users']);
        Permission::create(['name' => 'view_users']);
        Permission::create(['name' => 'delete_users']);
        
        // todos
        Permission::create(['name' => 'add_todos']);
        Permission::create(['name' => 'change_todos']);
        Permission::create(['name' => 'view_todos']);
        Permission::create(['name' => 'delete_todos']);

        // roles
        $admin = Role::create(['name' => 'admin']);
        $editor = Role::create(['name' => 'editor']);
        
        $editor->givePermissionTo([
            'add_todos',
            'change_todos',
            'view_todos',
            'delete_todos'
        ]);
        
        $admin->givePermissionTo(Permission::all());

        // $admin->givePermissionTo($manageUsers);
        // $editor->givePermissionTo($editArticles);
    }
}
