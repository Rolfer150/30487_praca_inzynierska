<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var \App\Models\User $adminUser **/

        $name = 'Admin';
        $surname = 'Admiński';

        $adminUser = User::factory()->create([
            'email' => 'admin@test.pl',
            'name' => $name,
            'surname' => $surname,
            'slug' => Str::slug($name . '-' . $surname . '-' . random_int(1000, 9999)),
            'password' => bcrypt('test1234')
        ]);

        $adminUser->assignRole('admin');
    }
}
