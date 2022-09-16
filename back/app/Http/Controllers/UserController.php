<?php

namespace App\Http\Controllers;

use App\Http\Resources\DroneResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\PlotResource;
use App\Models\DailyEvents;
use App\Models\Drone;
use App\Models\Item;
use App\Models\Plot;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
use App\Models\Region;
use App\Http\Resources\UserResource;

class UserController extends Controller
{

    public function load()
    {
       dd(auth('api')->user());
    }

    public function rewarded(Request $request)
    {
        $user = User::find($request->user_id);
        $event = DailyEvents::find($request->event_id);

        $user->events_done = $user->events_done  ? $user->events_done . ',' . $event->id : $event->id;
        $user->save();

        return $user;

    }


    public function count_steps(Request $request)
    {
        $user = User::find($request->user_id);
        $user->update([
        'steps' => $user->steps + $request->steps,
    ]);
       return $user;
    }

    public function energy_to_money(Request $request)
    {

        $user = User::find($request->user_id);
        $dollars_earned = $request->energy_spent_in_game * $user->dollars_per_step;
//
//        $user->update([
//            'energy' => $user->energy - $request->energy_spent,
//            'dollars_count' => $user->dollars_count + $dollars_earned,
//        ]);

        $energy_spent_in_game = $user->energy - ($user->energy - $request->energy_spent_in_game) - $user->energy_spent_a_day;
       //dd($energy_spent_in_game,$user->energy_spent_a_day);
        $user->update([
            'energy_spent_a_day' => $user->energy_spent_a_day + $energy_spent_in_game,
            'dollars_count' => $user->dollars_count + $dollars_earned,
        ]);

        return response($user, 250);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function get_plots(User $user){

        $user_plots = new JsonResource(Plot::where('user_id', $user->id)->get());
        return $user_plots;
    }

    public function show(User $user)
    {
        $user_plots = new JsonResource(Plot::where('user_id', $user->id)->get());
        $user_items = ItemResource::collection(Item::where('user_id', $user->id)->get());
        $user_drone = DroneResource::collection(Drone::where('user_id', $user->id)->get());
        return response(
            ['user' => $user, 'plots' => $user_plots, 'items' => $user_items, 'drone' => $user_drone]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
