<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories =
            [
                [
                    'name' => 'Praca fizyczna',
                    'slug' => 'praca-fizyczna'
                ],
                [
                    'name' => 'Mechanika',
                    'slug' => 'mechanika'
                ],
                [
                    'name' => 'Bankowość',
                    'slug' => 'bankowosc'
                ],
                [
                    'name' => 'Administracja baz danych',
                    'slug' => 'administracja-baz-danych'
                ],
                [
                    'name' => 'Opieka medyczna',
                    'slug' => 'opieka-medyczna'
                ]
            ];

        foreach ($categories as $key => $value)
        {
            Category::create($value);
        }
    }
}
