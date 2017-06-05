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
                'name'      => 'Dahmane',
                'lastname'  => 'Aissi',
                'tel'       => '0770714662',
                'email'     => 'aissi.dahmane@gmail.com',
                'willaya'   => 16,
                'birthday'  => '15-12-1987',
                'role'      => 'administrator',
                'password'  => bcrypt( 'khNPqKrSKdfm' ),
                'medias_id'  => 99999999
            ]
        );
    }

}