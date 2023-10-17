<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

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
            WorkModeSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);
        User::factory(80)->create()->each(function ($user)
        {
            $user->assignRole('user');
        });
        Offer::factory(500)->create();
    }
}
