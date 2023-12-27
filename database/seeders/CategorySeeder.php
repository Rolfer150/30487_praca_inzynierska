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
                    'name' => 'IT - Rozwój oprogramowania',
                    'slug' => 'it-rozwoj-oprogramowania'
                ],
                [
                    'name' => 'Obsługa klienta',
                    'slug' => 'obsluga-klienta'
                ],
                [
                    'name' => 'Opieka medyczna',
                    'slug' => 'opieka-medyczna'
                ],
                [
                    'name' => 'Energetyka',
                    'slug' => 'energetyka'
                ],
            ];

        foreach ($categories as $key => $value)
        {
            Category::create($value);
        }
    }
}
