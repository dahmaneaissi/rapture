<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        $user = User::create(
            [
                'id'        => '1',
                'name'      => 'Renault',
                'lastname'  => 'Renault',
                'tel'       => '0770000000',
                'email'     => 'digital@allegorie.tv',
                'willaya'   => 16,
                'birthday'  => '15-12-1987',
                'role'      => 'administrator',
                'password'  => bcrypt( 'khNPqKrSKdfm' ),
                'medias_id'  => 99999999
            ]
        );
    }

}