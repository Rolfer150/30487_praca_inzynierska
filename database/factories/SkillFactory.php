<?php

namespace Database\Factories;

use App\Enums\ProgrammingSkills;
use App\Enums\SkillLevel;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
//        $userSkills = Skill::where('user_id', $user->id)->pluck('skill');

        do
        {
            $skill = $this->faker->randomElement(ProgrammingSkills::cases());
        } while (Skill::where('user_id', '=', $user->id)->where('skill', '=', $skill)
        && Skill::where('user_id', $user->id)->count() > 2);

        return [
            'user_id' => $user->id,
            'skill' => $skill,
            'skill_level' => $this->faker->randomElement(SkillLevel::cases())
        ];
    }
}
