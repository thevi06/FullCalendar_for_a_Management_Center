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

        // create permissions
        $permissions = [
            'role-management',
            'role-view',
            'role-create',
            'role-edit',
            'role-delete',
            'user-management',
            'user-view',
            'user-create',
            'user-edit',
            'user-delete',
            'calendar-management',
            'calendar-view',
            'calendar-create',
            'calendar-edit',
            'calendar-delete',
            'calendar-renewal',
        ];

        foreach ($permissions as $permission) {
            Permission::updateOrCreate(
                ['name' => $permission],
                ['name' => $permission]
            );
        }

        // create roles and assign created permissions

        $role = Role::updateOrCreate(
            ['name' => 'super-admin'],
            ['name' => 'super-admin']
        );
        $role->givePermissionTo(Permission::all());

        // create a dev super user
        $user = User::updateOrCreate(
            [
                'email' => 'admin@admin.com',
            ],
            [
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin@123'),
                'userRoleId' => $role->id
            ]);
        $user->assignRole($role);

        // create a demo super user
        // $user = User::updateOrCreate(
        //     [
        //         'email' => 'it@yaden.lk',
        //     ],
        //     [
        //         'name' => 'Yaden International Super user',
        //         'email' => 'it@yaden.lk',
        //         'password' => bcrypt('yaden@123'),
        //         'userRoleId' => $role->id
        //     ]);
        // $user->assignRole($role);
    }
}
