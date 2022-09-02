<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use App\Http\Resources\ItemResource;
use App\Models\User;
use Illuminate\Http\Request;
use Faker\Factory as Faker;


class ItemController extends Controller
{

    protected function randomFloat($min = 0, $max = 1): array|float|int
    {
        return $min + mt_rand() / mt_getrandmax() * ($max - $min);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function craft(Request $request){
         $faker = Faker::create();
         $items_arr = [$request->item_1_id, $request->item_1_id, $request->item_1_id];

         $items_delete = Item::whereIn('id', $items_arr )->get();

         dd($items_delete);
//         ->delete();

         $new_item = Item::create([
             'name' => ucfirst($faker->word()).' '.ucfirst($faker->word()),
             'slot' => $faker->randomElement(['aiChip','scanner','core', 'data_storage', '']),
             'for_drone' => $faker->boolean(70),
             'is_nft' => $faker->boolean(50),
             'rarity' => random_int(1,10),
             'user_id' => $request->user_id,
             'primary_max_dollars' => random_int(1500,224000),
             'image' => $faker->filePath(),
             'primary_critical_step_chance' => round($this->randomFloat(0.002, 0.20),4),
             'primary_critical_step_force' => round($this->randomFloat(0.011, 0.029),4),
             'primary_dollars_per_step' => random_int(1500, 15000),
             'secondary_max_dollars' =>random_int(300,44800),
             'secondary_critical_step_chance' => round($this->randomFloat(0.0004, 0.04),4),
             'secondary_critical_step_force' => round($this->randomFloat(0.0022, 0.0058),4),
             'secondary_dollars_per_step' =>random_int(300, 3000),
         ]);
     return response($new_item);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ItemResource::collection(Item::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
