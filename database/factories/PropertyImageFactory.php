<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyImage>
 */
class PropertyImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'property_id' => fake()->randomElement(\App\Models\Property::all()->pluck('id')->toArray()),
            'path' => fake('pt_BR')->imageUrl(900, 600),

        ];
    }
}