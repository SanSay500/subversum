<?php

namespace App\Http\Responses;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{

    public function toResponse($request)
    {
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('api-token')->plainTextToken;
        $user_regions = new UserResource(User::find($user->id));
        return response(['data' => $user, 'token'=> $token, $user_regions]);
    }


}
