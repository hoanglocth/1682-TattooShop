<?php

use Illuminate\Database\Seeder;

class TattooSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Tattoo::class, 500)->create();
    }
}
