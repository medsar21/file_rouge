<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }

    public function handle(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:4|max:30',
            'email' => 'required|email|unique:users|max:255|ends_with:gmail.com',
            'password' => 'required|string|min:8',
        ]);
        $usrCount = count(User::all());
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        Auth::login($user);

        $user->avatar = 'images/default_avatar.png';
        $user->save();
        if ($usrCount === 0) {
            $user->is_admin = true;
            $user->save();
            return redirect('/dashboard');
        } else {
            $user->is_admin = false;
            $user->save();
            return redirect('/');
        }
    }
}
