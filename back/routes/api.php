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
Route::resource('planets',\App\Http\Controllers\PlanetController::class);
Route::resource('resources',\App\Http\Controllers\ResourceController::class);
Route::resource('regions',\App\Http\Controllers\RegionController::class);
Route::resource('continents',\App\Http\Controllers\ContinentController::class);
Route::resource('res_map',\App\Http\Controllers\ResourceMapController::class);
Route::resource('workers_map',\App\Http\Controllers\WorkerMapController::class);
Route::resource('drones',\App\Http\Controllers\DroneController::class);
Route::resource('daily_events',\App\Http\Controllers\DailyEventsController::class);


//BUILDINGS
Route::resource('buildings',\App\Http\Controllers\BuildingController::class);
Route::resource('buildings_map',\App\Http\Controllers\BuildingMapController::class);
Route::post('plots/upgrade_building',[\App\Http\Controllers\BuildingMapController::class, 'upgrade_building']);
Route::post('plots/build',[\App\Http\Controllers\BuildingMapController::class, 'build']);


//PLOT
Route::post('/plots/info', [\App\Http\Controllers\PlotController::class,'show_by_coord']);
Route::post('/buy_plot',[\App\Http\Controllers\PlotController::class, 'buy']);
Route::post('/plots/save',[\App\Http\Controllers\PlotController::class, 'save']);
Route::post('/plots/init',[\App\Http\Controllers\PlotController::class, 'initialize']);
Route::resource('plots',\App\Http\Controllers\PlotController::class);


//AUCTIONS
Route::post('/auctions/buy', [\App\Http\Controllers\AuctionController::class,'buy']);
Route::post('/auctions/store', [\App\Http\Controllers\AuctionController::class, 'store']);
Route::resource('auctions',\App\Http\Controllers\AuctionController::class);
Route::get('/auctions/show/{source}',[\App\Http\Controllers\AuctionController::class,'show_lots']);

//ITEM
Route::post('/craft', [\App\Http\Controllers\ItemController::class, 'craft']);
Route::post('/generate_item', [\App\Http\Controllers\ItemController::class, 'generate_item']);
Route::resource('items',\App\Http\Controllers\ItemController::class);


//USER
Route::post('/energy_to_money', [\App\Http\Controllers\UserController::class,'energy_to_money']);
Route::post('/load', [\App\Http\Controllers\UserController::class,'load'])->middleware(['auth:sanctum']);
Route::post('/users/count_steps', [\App\Http\Controllers\UserController::class,'count_steps'])->middleware(['throttle:steps']);
Route::post('/users/rewarded', [\App\Http\Controllers\UserController::class,'rewarded']);
Route::get('/users/{user}/get_plots', [\App\Http\Controllers\UserController::class,'get_plots']);
Route::resource('users',\App\Http\Controllers\UserController::class);


Route::get('/',function(){
    return view ('welcome');
});
