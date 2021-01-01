<?php

namespace Database\Factories;

use App\Models\ClientAddress;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'address_type_id'    => 1,
           'client_id'          => 1,
           'street'             => $this->faker->secondaryAddress,
           'city'               => $this->faker->city,
           'state'              => 'BC',
           'zipcode'            => Str::substr($this->faker->postcode(),0,5),
           'created_by'         => 1,
           'created_at'         => date('Y-m-d'),
           'updated_by'         => 1,
           'updated_at'         => date('Y-m-d'),

        ];
    }
}
