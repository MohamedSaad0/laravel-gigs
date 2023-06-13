<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'title' => fake()->sentence(),
           'tags' => 'laravel, api, backend',
           'company' => fake()->company(),
            'email' => fake()->email(),
            // 'logo' =>fake()->sentence(1),
            'website' => fake()->url(),
            'locations' => fake()->city(),
            'description' => fake()->paragraph(5)
        ];
    }
}
