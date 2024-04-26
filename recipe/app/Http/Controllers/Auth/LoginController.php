<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index () {
        return view("auth.login");
    }

    public function handle(Request $request)
    {
        $request->validate([
            "email"=> "required|string|max:200",
            "password"=> "required|string"
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // if (Auth::user()->is_admin) {
            //     return redirect('/dashboard');
            // }
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->with('error', 'Invalid credentials');
    }
}
