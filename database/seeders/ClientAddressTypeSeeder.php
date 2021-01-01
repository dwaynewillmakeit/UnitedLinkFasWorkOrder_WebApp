<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;


class ClientAddressTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('client_address_types')->insert(
            [
                ['name'=>'Billing','description'=>'Client\'s billing address','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')],
                ['name'=>'Site','description'=>'Client\'s site address','created_at'=>date('Y-m-d'),'updated_at'=>date('Y-m-d')]
            ]
        );
    }
}
