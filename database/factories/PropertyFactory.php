<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'price' => fake()->randomFloat(0, 300000, 90000),
           'increment' => fake()->randomFloat(0, 500, 10000),
           'category' => fake()->randomElement(['residencial', 'comercial', 'rural']),
           'type' => fake()->randomElement(['casa', 'apartamento', 'terreno', 'fazenda']),
           'description' => fake('pt_BR')->text(),
           'area_total' => fake()->numberBetween(60, 300),
           'area_util' => fake()->numberBetween(40, 100),
           'address' => fake('pt_BR')->address(),
           'city' => fake('pt_BR')->city(),
           'state' => fake('pt_BR')->state(),
           'auction_id' => fake()->randomElement(\App\Models\Auction::all()->pluck('id')->toArray()),
        ];
    }
}