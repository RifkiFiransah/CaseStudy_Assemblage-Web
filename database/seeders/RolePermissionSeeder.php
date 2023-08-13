<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);

        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'show']);

        Role::create(['name' => 'leader']);
        Role::create(['name' => 'member']);

        $leader = Role::findByName('leader');
        $leader->givePermissionTo('create');
        $leader->givePermissionTo('update');
        $leader->givePermissionTo('delete');
        $leader->givePermissionTo('read');
        $leader->givePermissionTo('show');

        $member = Role::findByName('member');
        $member->givePermissionTo('read');
        $member->givePermissionTo('show');
    }
}
