<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Dman\Models\Access\Role;
use Dman\Models\Access\Permission;

class AccesseSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();

        // Je crée le role
        $role = Role::create(
            [
                'id'            => 1,
                'title'         => 'Administrateur',
                'slug'          => 'Administrator',
                'description'   => 'Chikour houma khalia',
            ]
        );
        // J'attache le role au user
        $role->users()->attach(1);

        $role = Role::create(
            [
                'id'            => 2,
                'title'         => 'Editeur',
                'slug'          => 'Editor',
                'description'   => 'Editeur Desc',
            ]
        );
        // J'attache le role au user
        $role->users()->attach(1);

        $permissions = [
            [
                'title'         => 'logout',
                'slug'          => 'users.logout',
                'description'   => 'logout',
            ],
            [
                'title'         => 'User index',
                'slug'          => 'users.index',
                'description'   => 'user index desc',
            ],
            [
                'title'         => 'Show dashbord',
                'slug'          => 'dashbord.index',
                'description'   => 'Show dashbord description',
            ],
            [
                'title'         => 'Show roles',
                'slug'          => 'roles.index',
                'description'   => 'description',
            ],
            [
                'title'         => 'Edit roles',
                'slug'          => 'roles.edit',
                'description'   => 'description',
            ],
            [
                'title'         => 'Create roles',
                'slug'          => 'roles.create',
                'description'   => 'description',
            ],
            [
                'title'         => 'Save roles',
                'slug'          => 'roles.save',
                'description'   => 'description',
            ],
            [

                'title'         => 'Update roles',
                'slug'          => 'roles.update',
                'description'   => 'description',
            ],
            [
                'title'         => 'Delete roles',
                'slug'          => 'roles.delete',
                'description'   => 'description',
            ],
            [
                'title'         => 'Show permissions',
                'slug'          => 'permissions.index',
                'description'   => 'description',
            ],
            [
                'title'         => 'Edit permissions',
                'slug'          => 'permissions.edit',
                'description'   => 'description',
            ],
            [
                'title'         => 'Create permissions',
                'slug'          => 'permissions.create',
                'description'   => 'description',
            ],
            [
                'title'         => 'Save permissions',
                'slug'          => 'permissions.save',
                'description'   => 'description',
            ],
            [
                'title'         => 'Update permissions',
                'slug'          => 'permissions.update',
                'description'   => 'description',
            ],
            [
                'title'         => 'Delete permissions',
                'slug'          => 'permissions.delete',
                'description'   => 'description',
            ],
        ];

        foreach ( $permissions as $permission )
        {
            $permission = Permission::create( $permission );
            $permission->roles()->attach(1);
        }

    }

}