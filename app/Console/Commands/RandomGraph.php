<?php

namespace App\Console\Commands;

use App\Models\Graph;
use Illuminate\Console\Command;

class RandomGraph extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:gen {nbNodes=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate random graph';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $count = $this->argument('nbNodes');

        Graph::factory(1)
            ->hasNodes($count)
            ->create();
            
        $this->info('Generated graph with '.$count.' nodes.');
    }
}
