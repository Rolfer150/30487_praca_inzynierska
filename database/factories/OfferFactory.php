<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $offer_name = fake()->realText(20);
        return [
            'offer_name' => $offer_name,
            'slug' => Str::slug($offer_name),
            'image_path' => fake()->imageUrl,
            'description' => fake()->realText(4000),
            'active' => fake()->boolean,
            'published_at' => fake()->dateTime,
            'user_id' => 1,
        ];
    }
}
