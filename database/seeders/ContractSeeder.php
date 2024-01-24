<?php

namespace Database\Seeders;

use App\Models\Contract;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contracts =
            [
                [
                    'name' => 'Umowa o pracę'
                ],
                [
                    'name' => 'Umowa o dzieło'
                ],
                [
                    'name' => 'Umowa zlecenie'
                ],
                [
                    'name' => 'Umowa o staż/praktyki'
                ],
                [
                    'name' => 'Umowa agencyjna'
                ],
            ];

        foreach ($contracts as $key => $value)
        {
            Contract::create($value);
        }
    }
}
