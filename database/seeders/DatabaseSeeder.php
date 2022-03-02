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
         \App\Models\User::factory(10)->create();
         \App\Models\Bill::factory(10)->create();
         \App\Models\Drug_prescription::factory(10)->create();
         \App\Models\Patient::factory(10)->create();
         \App\Models\Procedure::factory(10)->create();
         \App\Models\Red_test::factory(10)->create();
         \App\Models\Visit::factory(10)->create();
         \App\Models\Diagnosi::factory(10)->create();
    }
}
