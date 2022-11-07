<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auction>
 */
class AuctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'date' => fake()->dateTimeBetween('now', '2022-12-31'),
           'name' => 'Leilão ' . fake()->firstName(),
           'address' => fake('pt_BR')->address(),
           'city' => fake('pt_BR')->city(),
           'state' => fake('pt_BR')->state(),
           'bank_id' => fake()->randomElement(\App\Models\Bank::all()->pluck('id')->toArray()),
        ];
    }
}
