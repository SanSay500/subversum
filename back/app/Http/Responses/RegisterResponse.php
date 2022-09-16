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
        return response(['user' => $user, 'token'=> $token, 'items' => [], 'drone'=>[]]);
    }
}
