<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\Login;
use App\Http\Requests\Auth\Register;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Register $request)
    {
        $data = $request->validated();
        $user = User::create($data);
        auth('web')->login($user);

        return redirect(route('home'));
    }

    public function login(Login $request)
    {
        $data = $request->validated();
        if(auth('web')->attempt($data)){
            return redirect(route('home'));
        }

        return redirect()->back();
    }
}
