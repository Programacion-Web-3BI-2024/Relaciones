<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Chef::factory(4)->create();
        \App\Models\Pizza::factory(10)->create();
        \App\Models\Ingrediente::factory(20)->create();
        \App\Models\Tiene::factory(40)->create();

    }
}
