<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Infra\Models\Movement;

class MovementsTableSeeder extends Seeder
{
    public function run()
    {
        Movement::factory()
            ->count(600)
            ->create();
    }
}
