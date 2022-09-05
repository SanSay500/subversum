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

Route::resource('workers',\App\Http\Controllers\WorkerController::class)->middleware('auth:sanctum');
Route::resource('users',\App\Http\Controllers\UserController::class);
Route::resource('planets',\App\Http\Controllers\PlanetController::class);
Route::resource('resources',\App\Http\Controllers\ResourceController::class);
Route::resource('buildings',\App\Http\Controllers\BuildingController::class);
Route::resource('regions',\App\Http\Controllers\RegionController::class);
Route::resource('continents',\App\Http\Controllers\ContinentController::class);
Route::resource('res_map',\App\Http\Controllers\ResourceMapController::class);
Route::resource('buildings_map',\App\Http\Controllers\BuildingMapController::class);
Route::resource('workers_map',\App\Http\Controllers\WorkerMapController::class);
Route::resource('items',\App\Http\Controllers\ItemController::class);
Route::resource('drones',\App\Http\Controllers\DroneController::class);
Route::resource('auctions',\App\Http\Controllers\AuctionController::class);
Route::resource('plots',\App\Http\Controllers\PlotController::class);

Route::post('/plots/info', [\App\Http\Controllers\PlotController::class,'show_by_coord']);
Route::post('/buy_region',[\App\Http\Controllers\RegionController::class, 'buy']);
Route::post('/auctions/buy', [\App\Http\Controllers\AuctionController::class,'buy']);
Route::post('/auctions/store', [\App\Http\Controllers\AuctionController::class, 'store']);
Route::post('/craft', [\App\Http\Controllers\ItemController::class, 'craft']);
Route::post('/energy_to_money', [\App\Http\Controllers\UserController::class,'energy_to_money']);


Route::get('/',function(){
    return view ('welcome');
});
