<?php

namespace Database\Seeders;

use App\Models\Graph;
use App\Models\Node;
use App\Models\Edge;
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
        Graph::factory()
            ->count(50)
            ->hasNodes(20)
            ->create();
    }
}
