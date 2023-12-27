<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Company;
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
        Offer::factory(1000)->create();
        Company::factory(100)->create();

        $categories = Category::all();
        Company::all()->each(function ($company) use ($categories) {
            $company->categories()->saveMany($categories->random(2));
        });
        User::all()->each(function ($user) use ($categories) {
            $user->categories()->saveMany($categories->random(2));
        });
    }
}
