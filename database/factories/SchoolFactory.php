<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\School>
 */
class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company() . ' School',
            'address' => fake()->address(),
            'logo' => null,
            'email' => fake()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'website' => fake()->url(),
        ];
    }
}
