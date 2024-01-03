<?php

namespace Database\Seeders;

use App\Models\Skill;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::pluck('id');
        $faker = Factory::create();

        Skill::factory(200)
            ->create()
            ->each(function ($skill) use ($user, $faker)
            {
                $skill->users()->attach($faker->unique()->randomElement($user));
            });
    }
}
