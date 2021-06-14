<?php

namespace App\Http\Controllers;

use App\Http\Requests\GraphRequest;
use App\Http\Resources\GraphCollection;
use App\Http\Resources\GraphResource;
use App\Models\Graph;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graphs = Graph::all();
        return new GraphCollection($graphs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GraphRequest $request)
    {
        $data = $request->all();
        $graph = Graph::create($data);
        return new GraphResource($graph);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function show(Graph $graph)
    {
        $graph = $graph->load(['nodes', 'edges']);
        return new GraphResource($graph);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function update(GraphRequest $request, Graph $graph)
    {
        $data = $request->all();
        $graph->update($data);
        return new GraphResource($graph);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graph $graph)
    {
        return $graph->delete();
    }
}
