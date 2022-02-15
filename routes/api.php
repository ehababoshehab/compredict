<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\VehiclesController;

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


Route::get('vehicles', [VehiclesController::class, 'index']);
Route::post('vehicles', [VehiclesController::class, 'create']);

Route::get('vehicles/{id}/trips-plot', [VehiclesController::class, 'vehiclesTrip']);
