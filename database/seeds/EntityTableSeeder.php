<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Entity;

class EntityTableSeeder extends Seeder {

    public function run()
    {
        DB::table('entities')->delete();

        $user = Entity::create(
            [
                'firstname' => 'Dahmane',
                'lastname'  => 'Aissi',
                'facebook'  => 'facebook',
                'twitter'   => 'twitter',
                'instagram' => 'instagram',
                'active'    => 1,
            ]
        );

        $user = Entity::create(
            [
                'firstname' => 'John',
                'lastname'  => 'Doe',
                'facebook'  => 'facebook',
                'twitter'   => 'twitter',
                'instagram' => 'instagram',
                'active'    => 1,
            ]
        );


    }

}