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
        $skills =
            [
                [
                    'name' => 'Python',
                    'category_id' => 5
                ],
                [
                    'name' => 'C++',
                    'category_id' => 5
                ],
                [
                    'name' => 'Java',
                    'category_id' => 5
                ],
                [
                    'name' => 'Sql',
                    'category_id' => 4
                ],
                [
                    'name' => 'Git',
                    'category_id' => 5
                ]
            ];

        foreach ($skills as $key => $value)
        {
            Skill::create($value);
        }
    }
}
