<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function registerH()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $fields = $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string|confirmed',
            ]
        );

        $user = User::create(
            [
                'name' => $fields['name'],
                'email' => $fields['email'],
                'user_id' => md5($request['email'] . time()),
                'password' => bcrypt($fields['password']),
            ]
        );

        event(new Registered($user));

        Session::put('user', $user);
        return redirect('/');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }
}
