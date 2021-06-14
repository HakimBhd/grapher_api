<?php

namespace App\Console\Commands;

use App\Models\Graph;
use Illuminate\Console\Command;

class GraphStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:stats {gid}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $graphId = $this->argument('gid');
        $graph = Graph::find($graphId);

        if (empty($graph))
            return $this->error('No graph found with id ' . $graphId);

        $this->newLine();
        $this->line('Name:              ' . $graph->name);
        $this->line('Description:       ' . $graph->description);
        $this->newLine();
        $this->line('Nodes number:      ' . $graph->nodes()->count());        
        $this->line('Relations number:  ' . $graph->edges()->count());
        
    }
}
