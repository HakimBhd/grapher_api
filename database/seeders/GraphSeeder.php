<?php

namespace Database\Seeders;

use App\Models\Graph;
use Illuminate\Database\Seeder;

class GraphSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Graph::factory()
            ->count(50)
            ->create();
    }
}
