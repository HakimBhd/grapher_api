<?php

namespace App\Console\Commands;

use App\Models\Graph;
use App\Models\Node;
use Illuminate\Console\Command;

class ClearEmptyGraph extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all empty graphs';

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
        $graphIds = Node::groupBy('graph_id')->pluck('graph_id');
        $emptyGraphs = Graph::whereNotIn('id', $graphIds);

        $count = $emptyGraphs->count();
        $confirmed = $this->confirm('Do you wish to delete '.$count.' graph(s)?');
        if ( $confirmed && $count > 0 ) {
            $emptyGraphs->delete();
            $this->info($count.' empty graph found and cleared.');
        }
    }
}
