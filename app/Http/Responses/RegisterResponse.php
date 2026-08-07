<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        // All new registrations are Tourist / User (per CreateNewUser action)
        return $request->wantsJson()
            ? response()->json(['status' => true])
            : redirect()->route('tourist.dashboard');
    }
}