<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
          [
            [
                'name'=> 'Administrator',
                'email'=> 'admin@unitedlinkfas.com',
                'password'=>Hash::make('admin'),
                'created_at' => date('Y-m-d'),
                'updated_at' => date('Y-m-d'),
            ],
            [
                'name'          => 'Kirk Remekie',
                'email'         => 'kremekie@unitedlinkfas.com',
                'password'      => Hash::make('remekie01'),
                'created_at'    => date('Y-m-d'),
                'updated_at'    => date('Y-m-d'),
            ],
          ]
    );
    }
}
