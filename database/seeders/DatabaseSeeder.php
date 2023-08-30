<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Offer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            ContractSeeder::class,
            EmploymentSeeder::class,
            WorkmodeSeeder::class,
            UserSeeder::class
        ]);
        Offer::factory(100)->create();
    }
}
