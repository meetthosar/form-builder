<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Admin USer
         $admin = \App\Models\User::factory()->create([
             'name' => 'Admin User',
             'email' => 'admin@example.com',
         ]);

         // Customer
        $customer = \App\Models\User::factory()->create([
            'name' => 'Customer User',
            'email' => 'customer@example.com',
        ]);

        $role_admin = Role::create(['name' => 'Admin']);
        $role_customer = Role::create(['name' => 'Customer']);
        $permission_create_form = Permission::create(['name' => 'manage form']);
        $permission_fill_form = Permission::create(['name' => 'fill form']);

        $role_admin->givePermissionTo($permission_create_form);
        $role_admin->givePermissionTo($permission_fill_form);

        $role_customer->givePermissionTo($permission_fill_form);

        $admin->assignRole('Admin');
        $customer->assignRole('Customer');
    }
}
