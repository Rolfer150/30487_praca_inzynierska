<?php

namespace Database\Seeders;

use App\Models\WorkMode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workmodes =
            [
                [
                    'name' => 'Praca stacjonarna'
                ],
                [
                    'name' => 'Praca zdalna'
                ],
                [
                    'name' => 'Praca hybrydowa'
                ],
                [
                    'name' => 'Praca mobilna'
                ],
            ];

        foreach ($workmodes as $key => $value)
        {
            WorkMode::create($value);
        }
    }
}
