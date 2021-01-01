<?php

namespace Database\Factories;

use App\Models\client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'           => $this->faker->name,
            'email'          => $this->faker->unique()->safeEmail,
            'active'         => true,
            'created_by'      => 1,
            'created_at'      => date('Y-m-d'),
            'updated_by'     => 1,
            'updated_at'     => date('Y-m-d'),
         ];
    }
}
