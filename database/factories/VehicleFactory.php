<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'price' => fake()->randomFloat(0, 20000, 90000),
            'increment' => fake()->randomFloat(0, 500, 1000),
            'stored_in' => fake('pt_BR')->city(),
            'quantity' => fake()->numberBetween(1, 10),
            'description' => 'Veículo '. fake()->text(),
            'auction_id' => fake()->randomElement(\App\Models\Auction::all()->pluck('id')->toArray()),
        ];
    }
}