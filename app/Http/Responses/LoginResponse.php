<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();
        $roleName = $user?->role?->name;

        $redirectTo = match ($roleName) {
            'Administrator' => route('admin.dashboard'),
            'Operator' => route('operator.dashboard'),
            'Tourist / User' => route('tourist.dashboard'),
            default => route('dashboard'),
        };

        return $request->wantsJson()
            ? response()->json(['two_factor' => false])
            : redirect()->intended($redirectTo);
    }
}