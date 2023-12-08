<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var \App\Models\User $adminUser **/

        $adminUser = User::factory()->create([
            'email' => 'admin@test.pl',
//            'name' => 'Admin',
            'password' => bcrypt('test1234')
        ]);

        $adminUser->assignRole('admin');
    }
}
