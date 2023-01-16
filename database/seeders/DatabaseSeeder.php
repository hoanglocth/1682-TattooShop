<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Tattoo;
use App\Models\User;
use Illuminate\Database\Seeder;
use Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => "admin@gmail.com",
            'email_verified_at' => now(),
            'gender' => 1,
            'address' => "Da Nang",
            'password' => bcrypt('admin'),
            'roles' => "1",
            // password
            'remember_token' => Str::random(10),
            'phone' => "0987654321",
            'firstname' => "Admin",
            'lastname' => "account"
        ]);
        User::factory(10)->create();
        Category::factory(10)->create();
        Artist::factory(5)->create();
        Tattoo::factory(1)->create();
    }
}