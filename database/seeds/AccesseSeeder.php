<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Access\Role;
use App\Models\Access\Permission;

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

        // Je crée une permission
        $permission = Permission::create(
            [
                'id'            => 1,
                'title'         => 'Show dashbord',
                'slug'          => 'show-dashbord',
                'description'   => 'Show dashbord description',
            ]
        );

        // J'attache la permission au role
        $permission->roles()->attach(1);

        // Je crée une permission
        $permission = Permission::create(
            [
                'id'            => 2,
                'title'         => 'Edit Entity',
                'slug'          => 'edit-entity',
                'description'   => 'Editer',
            ]
        );

        // J'attache la permission au role
        $permission->roles()->attach(2);
    }

}