<?php

namespace App\Http\Controllers;

use App\Http\Resources\GraphResource;
use App\Http\Resources\NodeCollection;
use App\Http\Resources\NodeResource;
use App\Models\Graph;
use App\Models\Node;
use Illuminate\Http\Request;

class GraphNodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function index(Graph $graph)
    {
        $nodes = $graph->nodes()->get();
        return new NodeCollection($nodes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Graph $graph)
    {
        $node = new Node;
        $graph
            ->nodes()
            ->save($node);
        
        $nodes = $graph->nodes()->get();
        return new NodeCollection($nodes);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graph  $graph
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function show(Graph $graph, Node $node)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graph  $graph
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graph $graph, Node $node)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graph  $graph
     * @param  \App\Models\Node  $node
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graph $graph, Node $node)
    {
        return $node->delete();
    }
}
