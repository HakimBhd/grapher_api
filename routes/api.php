<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\GraphNodeController;
use App\Http\Controllers\GraphEdgeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::apiResource('graphs', GraphController::class);
Route::apiResource('graphs.nodes', GraphNodeController::class);
Route::apiResource('graphs.edges', GraphEdgeController::class);

