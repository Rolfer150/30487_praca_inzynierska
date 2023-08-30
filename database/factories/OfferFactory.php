<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Employment;
use App\Models\Contract;
use App\Models\Workmode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Enums\PaymentType;

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
        $offer_name = fake()->unique()->realText(20);
        return [
            'name' => $offer_name,
            'slug' => Str::slug($offer_name),
            'image_path' => fake()->imageUrl,
            'description' => fake()->realText(4000),
            'active' => fake()->boolean,
            'vacancy' => fake()->numberBetween(1, 5),
            'published_at' => fake()->dateTime,
            'user_id' => 1,
            'payment' => fake()->randomElement(PaymentType::cases()),
            'category_id' => Category::inRandomOrder()->first()->id,
            'employment_id' => Employment::inRandomOrder()->first()->id,
            'contract_id' => Contract::inRandomOrder()->first()->id,
            'workmode_id' => Workmode::inRandomOrder()->first()->id
        ];
    }
}
