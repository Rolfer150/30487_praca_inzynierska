<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company_name = fake()->unique()->text(16);
        return [
            'name' => $company_name,
            'slug' => Str::slug($company_name),
            'image_path' => fake()->imageUrl,
            'website' => fake()->url,
            'email' => fake()->email,
            'phone_number' => fake()->phoneNumber,
            'description' => fake()->realText(512),
            'employees_amount' => fake()->numberBetween(1, 500),
            'address' => [
                'city' => fake()->city,
                'street' => fake()->streetName,
                'home_nr' => fake()->buildingNumber,
                'zip_code' => fake()->postcode,
                'latitude' => fake()->latitude,
                'longitude' => fake()->longitude
            ],
            'user_id' => User::inRandomOrder()->first()->id,
            'created_at' => fake()->date
        ];
    }
}
