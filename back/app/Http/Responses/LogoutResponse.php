<?php

namespace App\Http\Responses;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LogoutResponse implements LogoutResponseContract
{

    public function toResponse($request)
    {
        //$user = auth()->user();
        //$user->currentAccessToken()>delete();
        //dd($request);
        return new JsonResponse('Bye bye, come back soon!', 200);
    }

}
