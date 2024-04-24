<?php

namespace App\Http\Middleware;

use App\Models\Recipes;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRecipeOwnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next): Response
    {
        $recipeId = $request->route('id');
        $recipe = Recipes::find($recipeId);

        // Check if the user is an admin
        if (Auth::user()->isAdmin()) {
            return $next($request);
        }

        // Check if the recipe exists
        if (!$recipe) {
            return redirect()->route('starter.index')->with('error', 'Recipe not found.');
        }

        // Check ownership for delete requests
        if ($request->isMethod('delete') && Auth::id() === $recipe->user_id) {
            return $next($request);
        }

        // Check if the authenticated user is the owner of the recipe
        if (Auth::id() === $recipe->user_id) {
            return $next($request);
        }

        // If not an admin and not the owner, deny access or redirect as needed
        return redirect()->route('starter.index')->with('error', 'You do not have permission to access this page.');
    }
}
