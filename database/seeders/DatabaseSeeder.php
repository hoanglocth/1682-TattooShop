<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'email' => 'admin@gmail.com',
            'phone' => 0000000000,
            'address' => 'Da Nang',
            'firstname' => "Admin",
            'lastname' => "1",
            'roles' => 0,
            'email_verified_at' => now(),
            'password' => bcrypt('admin'), // password
            'remember_token' => Str::random(10),
        ]);
        // 

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
