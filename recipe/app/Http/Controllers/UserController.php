<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function favoriteRecipes()
    {
        $user = auth()->user();
        $favoriteRecipes = $user->favoriteRecipes;

        return view('starter.favorites', compact('favoriteRecipes'));
    }
}
