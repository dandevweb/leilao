<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class VehicleImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'vehicle_id' => fake()->randomElement(\App\Models\Vehicle::all()->pluck('id')->toArray()),
            'path' => fake('pt_BR')->imageUrl(900, 600),

        ];
    }
}