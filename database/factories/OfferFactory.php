<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Employment;
use App\Models\Contract;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\App;
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
            'name' => $offer_name,
            'slug' => Str::slug($offer_name),
            'image_path' => fake()->imageUrl,
            'description' => fake()->realText(4000),
            'active' => fake()->boolean,
            'vacancy' => random_int(1, 5),
            'published_at' => fake()->dateTime,
            'user_id' => 1,
            'category_id' => Category::inRandomOrder()->first()->id,
            'employment_id' => Employment::inRandomOrder()->first()->id,
            'contract_id' => Contract::inRandomOrder()->first()->id
        ];
    }
}
