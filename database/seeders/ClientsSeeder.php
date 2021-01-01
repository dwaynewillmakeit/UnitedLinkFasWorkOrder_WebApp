<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Client;
use App\Models\ClientAddress;
use App\Models\ClientAddressType;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory()->count(50)
        ->has(ClientAddress::factory()->count(10)->state(function(array $attributes){
            return[
                'address_type_id' => ClientAddressType::where('name','=','Site')->first()->id,
            ];
        }),'addresses')
        ->has(ClientAddress::factory()->state(function(array $attributes){
            return[
                'address_type_id' => ClientAddressType::where('name','=','Billing')->first()->id,
            ];
        }),'addresses')
        ->create();
    }
}
