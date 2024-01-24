<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands =
            [
                [
                    'name' => 'Praca fizyczna',
                    'slug' => 'praca-fizyczna'
                ],
                [
                    'name' => 'Obsługa klienta',
                    'slug' => 'obsluga-klienta'
                ],
                [
                    'name' => 'Bankowość',
                    'slug' => 'bankowosc'
                ],
                [
                    'name' => 'IT - Rozwój oprogramowania',
                    'slug' => 'it-rozwoj-oprogramowania'
                ],
                [
                    'name' => 'Energetyka',
                    'slug' => 'energetyka'
                ],
            ];

        foreach ($brands as $key => $value)
        {
            Brand::create($value);
        }
    }
}
