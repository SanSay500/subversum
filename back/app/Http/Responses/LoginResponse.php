<?php

namespace App\Http\Responses;

use App\Http\Resources\UserResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\DroneResource;
use App\Http\Resources\PlotResource;
use App\Models\User;
use App\Models\Item;
use App\Models\Drone;
use App\Models\Plot;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('api-token')->plainTextToken;
        $user_plots = PlotResource::collection(Plot::where('id', $user->id)->get());
        $user_items = ItemResource::collection(Item::where('id',$user->id)->get());
        $user_drone = DroneResource::collection(Drone::where('id', $user->id)->get());
        return response(
            ['user' => $user, 'token'=> $token, 'plots' => $user_plots, 'items' => $user_items, 'drone'=>$user_drone]
        );
    }
}
