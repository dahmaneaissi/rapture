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
                'id'            => 1,
                'title'         => 'Show dashbord',
                'slug'          => 'dashbord.index',
                'description'   => 'Show dashbord description',
            ],
            [
                'id'            => 2,
                'title'         => 'Show roles',
                'slug'          => 'roles.index',
                'description'   => 'description',
            ],
            [
                'id'            => 3,
                'title'         => 'Edit roles',
                'slug'          => 'roles.edit',
                'description'   => 'description',
            ],
            [
                'id'            => 4,
                'title'         => 'Create roles',
                'slug'          => 'roles.create',
                'description'   => 'description',
            ],
            [
                'id'            => 5,
                'title'         => 'Save roles',
                'slug'          => 'roles.save',
                'description'   => 'description',
            ],
            [
                'id'            => 6,
                'title'         => 'Update roles',
                'slug'          => 'roles.update',
                'description'   => 'description',
            ],
            [
                'id'            => 7,
                'title'         => 'Delete roles',
                'slug'          => 'roles.delete',
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