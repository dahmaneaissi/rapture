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
                'firstname' => 'Dahmane',
                'lastname'  => 'Aissi',
                'email'     => 'aissi.dahmane@gmail.com',
                'password'  => bcrypt( 'khNPqKrSKdfm' ),
            ]
        );
    }

}