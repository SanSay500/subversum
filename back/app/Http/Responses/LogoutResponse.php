<?php

namespace App\Http\Responses;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{

    public function toResponse($request)
    {
        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        return response('Bye bye, come back soon!', 200);

    }

}
