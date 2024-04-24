<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Recipes;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function show()
    {
        $collections = auth()->user()->collection; // Assuming the user is logged in
        return view('user.collections', compact('collections'));
    }

    public function createCollection()
    {
        return view('user.create-collections');
    }

    public function storeCollection(Request $request)
    {
        // Validate the request data
        $request->validate([
            'collection_name' => 'required|string|max:255',
        ]);

        // Create a new collection for the authenticated user
        $collection = auth()->user()->collection()->create([
            'name' => $request->input('collection_name'),
        ]);

        // Optionally, you can redirect to the newly created collection or index page
        return redirect()->route('collections.create')->with('success', 'Collection created successfully');
    }

    public function addRecipeToCollection($collectionId, $recipeId)
    {
        // Check if the user is authenticated
        $user = auth()->user();
        if (!$user) {
            session()->flash('error_message', 'User not authenticated');
            return back()->with('error', 'User not authenticated');
        }

        // Find the collection for the authenticated user
        $collection = $user->collection()->find($collectionId);

        if ($collection) {
            // Find the recipe by ID
            $recipe = Recipes::find($recipeId);

            if ($recipe) {
                // Check if the recipe is already attached to the collection
                if ($collection->recipes()->where('recipes_id', $recipeId)->exists()) {
                    // Remove the duplicate entry
                    $collection->recipes()->detach($recipeId);
                    session()->flash('success_message', 'Recipe removed from collection');
                    return back()->with('success', 'Recipe removed from collection');
                }

                // Attach the recipe to the collection
                $collection->recipes()->attach($recipe);

                session()->flash('success_message', 'Recipe added to collection successfully');
                return back()->with('success', 'Recipe added to collection successfully');
            } else {
                session()->flash('error_message', 'Recipe not found');
                return back()->with('error', 'Recipe not found');
            }
        }

        session()->flash('error_message', 'Collection not found');
        return back()->with('error', 'Collection not found');
    }

    public function showCollectionID($id)
    {
        $collections = Collection::findOrFail($id);
        $recipes = $collections->recipes;
        $pageTitle = $collections->name;
        return view('user.collections-post-page', compact('collections', 'recipes', 'pageTitle'));
    }
}