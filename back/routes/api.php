<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

//Route::middleware('auth:sanctum')->
Route::get('/users', function (Request $request) {
     return User::get();
});
Route::resource('workers',\App\Http\Controllers\WorkerController::class);
Route::resource('planets',\App\Http\Controllers\PlanetController::class);
Route::resource('resources',\App\Http\Controllers\ResourceController::class);
Route::resource('buildings',\App\Http\Controllers\BuildingController::class);
Route::resource('regions',\App\Http\Controllers\RegionController::class);
Route::resource('continents',\App\Http\Controllers\ContinentController::class);
Route::resource('res_map',\App\Http\Controllers\ResourceMapController::class);
Route::resource('buildings_map',\App\Http\Controllers\BuildingMapController::class);
Route::resource('workers_map',\App\Http\Controllers\WorkerMapController::class);
