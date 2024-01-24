<?php

namespace Database\Seeders;

use App\Models\Employment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employments =
            [
                [
                    'name' => 'Pełny etat'
                ],
                [
                    'name' => 'Część etatu'
                ],
                [
                    'name' => 'Dodatkowa'
                ],
            ];

        foreach ($employments as $key => $value)
        {
            Employment::create($value);
        }
    }
}
