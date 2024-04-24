<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipes;
use App\Models\Tag;
use Illuminate\Http\Request;

class StarterController extends Controller
{
    public function index()
    {
        $recipe = Recipes::all();
        return view('starter.index', compact('recipe'));
    }

    public function about()
    {
        $recipes = Recipes::all();
        return view('starter.about', compact('recipes'));
    }

    public function recipes()
    {
        $tags = Tag::all();
        $recipes = Recipes::all();
        return view('starter.recipes', compact('tags', 'recipes'));
    }

    public function contact()
    {
        $recipes = Recipes::all();
        return view('starter.contact', compact('recipes'));
    }

    public function page404()
    {
        return view('starter.404');
    }

    public function tags()
    {
        $tags = Tag::all();
        return view('starter.tags', compact('tags'));
    }

    public function categories()
    {
        $categories = Category::withCount('recipes')->get();

        // Calculate the total recipe count
        $totalRecipeCount = $categories->sum('recipes_count');

        return view('starter.categories', compact('categories', 'totalRecipeCount'));
    }
}
