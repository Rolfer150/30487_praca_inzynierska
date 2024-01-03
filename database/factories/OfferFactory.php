<?php

namespace Database\Factories;

//use App\Models\Employment;
//use App\Models\Contract;
//use App\Models\WorkMode;
use App\Enums\Contract;
use App\Enums\Employment;
use App\Enums\WorkMode;
use App\Models\Category;
use App\Models\User;
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
        $offer_name = fake()->unique()->realText(64);
        $payment = fake()->randomElement(PaymentType::cases());

        if ($payment == PaymentType::HBRUTTO || $payment == PaymentType::HNETTO) $salary = fake()->numberBetween(10, 500);
        else $salary = fake()->numberBetween(1500, 50000);

        return [
            'name' => $offer_name,
            'slug' => Str::slug($offer_name),
            'image_path' => fake()->imageUrl,
            'description' => fake()->text(512),
            'tasks' => [
                    fake()->realText(64),
                    fake()->realText(64),
                    fake()->realText(64),
                    fake()->realText(64),
            ],
            'expectancies' => [
                    fake()->realText(64),
                    fake()->realText(64),
                    fake()->realText(64),
                    fake()->realText(64),
            ],
            'additionals' => [
                    fake()->realText(64),
                    fake()->realText(64),
                    fake()->realText(64),
                    fake()->realText(64),
            ],
            'assurances' => [
                    fake()->realText(64),
                    fake()->realText(64),
                    fake()->realText(64),
                    fake()->realText(64),
            ],
            'active' => fake()->boolean,
            'vacancy' => fake()->numberBetween(1, 5),
            'user_id' => User::inRandomOrder()->first()->id,
            'payment' => $payment,
            'salary' => $salary,
            'category_id' => Category::inRandomOrder()->first()->id,
//            'employment_id' => Employment::inRandomOrder()->first()->id,
//            'contract_id' => Contract::inRandomOrder()->first()->id,
//            'work_mode_id' => WorkMode::inRandomOrder()->first()->id,
            'employment' => fake()->randomElement(Employment::cases()),
            'contract' => fake()->randomElement(Contract::cases()),
            'work_mode' => fake()->randomElement(WorkMode::cases()),
            'created_at' => fake()->date
        ];
    }
}
