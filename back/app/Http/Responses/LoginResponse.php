<?php

namespace App\Http\Responses;

use App\Http\Resources\UserResource;
use App\Http\Resources\ItemResource;
use App\Http\Resources\DroneResource;
use App\Http\Resources\RegionResource;
use App\Models\User;
use App\Models\Item;
use App\Models\Drone;
use App\Models\Region;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{

    public function toResponse($request)
    {
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('api-token')->plainTextToken;
        $user_regions = RegionResource::collection(Region::where('id', $user->id)->get());
        $user_items = ItemResource::collection(Item::where('id',$user->id)->get());
        $user_drone = DroneResource::collection(Drone::where('id', $user->id)->get());
        return response(
            ['user' => $user, 'token'=> $token, 'regions' => $user_regions, 'items' => $user_items, 'drone'=>$user_drone]
        );
    }
}
