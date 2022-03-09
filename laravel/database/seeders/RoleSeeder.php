<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
=======
>>>>>>> origin/b1.1-bruno

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
<<<<<<< HEAD
            [
                'name' => 'admin',
            ],
            [
                'name' => 'basic',
            ],
            [
                'name' => 'tech',
            ],
            [
                'name' => 'coord',
            ]
=======
            ['name' => 'admin'],
            ['name' => 'basic'],
            ['name' => 'tech'],
            ['name' => 'coord'],
>>>>>>> origin/b1.1-bruno
        ]);
    }
}
