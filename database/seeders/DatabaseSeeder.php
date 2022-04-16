<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        \App\Models\SettlementType::factory(1)->create();
        \App\Models\Settlement::factory(1)->create();
        \App\Models\Municipality::factory(1)->create();
        \App\Models\FederalEntity::factory(1)->create();
        \App\Models\City::factory(1)->create();
    }
}
