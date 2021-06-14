<?php

namespace App\Http\Controllers;

use App\Http\Requests\GraphRequest;
use App\Http\Resources\EdgeCollection;
use App\Http\Resources\GraphResource;
use App\Models\Edge;
use App\Models\Graph;
use App\Models\Node;
use Illuminate\Http\Request;

class GraphEdgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function index(Graph $graph)
    {
        $edges = $graph->edges()->get();
        return new EdgeCollection($edges);
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
        $data = $request->all();

        $exists = $graph
            ->nodes()
            ->where('id', $data['parent_id'])
            ->orWhere('id', $data['child_id'])
            ->count();

        if ($exists != 2) {
            return response()
                ->json([
                    'message' => 'One or both nodes does not belong to ' . $graph->name . ' graph'
                ], 401);
        }

        $edge = new Edge($data);
        $graph
            ->edges()
            ->save($edge);
        $edges = $graph->edges()->get();
        return new EdgeCollection($edges);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graph  $graph
     * @param  \App\Models\Edge  $edge
     * @return \Illuminate\Http\Response
     */
    public function show(Graph $graph, Edge $edge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graph  $graph
     * @param  \App\Models\Edge  $edge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graph $graph, Edge $edge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graph  $graph
     * @param  \App\Models\Edge  $edge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graph $graph, Edge $edge)
    {
        //
    }
}
