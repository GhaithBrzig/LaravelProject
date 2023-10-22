<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $simple_user = Role::create(['name' => 'simple user']);
        $company = Role::create(['name' => 'company']);
        $admin = Role::create(['name' => 'admin']);

        $permission = Permission::create(['name' => 'edit articles']);
    }
}
