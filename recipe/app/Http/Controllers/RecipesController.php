<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\RecipeImage;
use App\Models\Recipes;
use App\Models\Reviews;
use App\Models\Tag;
use App\Models\Tool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PDF;

class RecipesController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        $recipes = Recipes::all();
        $categories = Category::all();
        return view('uploads.upload-recipes', compact('tags', 'recipes', 'categories'));
    }

    public function main()
    {
        $tags = Tag::all();
        $recipes = Recipes::paginate(12); // Paginate with 12 items per page
        return view('starter.index', compact('tags', 'recipes'));
    }

    public function show_list($tagName)
    {
        // $tags = Tag::findOrFail($tagName);
        // $recipes = Recipes::whereHas('tags', function ($query) use ($tagName) {
        //     $query->where('name', $tagName);
        // })->get();
        $tag = Tag::where('name', $tagName)->firstOrFail();
        $recipes = $tag->recipes;
        $pageTitle = 'Tags | ' . $tag->name;

        return view('starter.tag-template', compact('tag', 'recipes', 'pageTitle'));
    }

    public function show_category_list($categoryName)
    {
        $category = Category::where('name', $categoryName)->firstOrFail();
        $recipes = $category->recipes;
        $pageTitle = 'Category | ' . $category->name;

        return view('starter.category-template', compact('category', 'recipes', 'pageTitle'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Perform a search query on your database using the $query variable
        // You can use Eloquent or any other method to fetch search results
        $searchResults = Recipes::where('name', 'like', '%' . $query . '%')->get();
        $tags = Tag::all();
        // Pass the search results to a view for display
        return view('starter.search', compact('searchResults', 'tags'));
    }


    public function show($id)
    {
        // $recipes = Recipes::findOrFail($id);
        $recipe = Recipes::with('instructions')->findOrFail($id);
        $totalReviews = Reviews::where('recipes_id', $recipe->id)->count();
        $averageRating = Reviews::where('recipes_id', $recipe->id)->avg('rating');
        $pageTitle = $recipe->name;
        $recipe->increment('view_count');
        if (auth()->check()) {
            // Retrieve the authenticated user's collection
            $collection = auth()->user()->collection;
        } else {
            $collection = null; // User is not authenticated, handle accordingly
        }
        return view('starter.single-recipe', ['recipe' => $recipe, 'totalReviews' => $totalReviews, 'averageRating' => $averageRating, 'pageTitle' => $pageTitle, 'collection' => $collection]);
    }

    public function edit($id)
    {
        $recipe = Recipes::findOrFail($id);
        $ingredients = Ingredient::all();
        $instructions = Instruction::all();
        $tools = Tool::all();
        $tags = Tag::all();
        $categories = Category::all();
        $selectedCategoryId = $recipe->category_id;
        return view('uploads.edit-recipes', compact('recipe', 'tags', 'ingredients', 'tools', 'tags', 'categories', 'selectedCategoryId'));
    }

    public function destroy($id)
    {
        $recipe = Recipes::findOrFail($id);

        // Detach related records from the 'instructions' table
        $recipe->instructions()->delete();
        $recipe->ingredients()->detach();

        // Delete the recipe
        $recipe->delete();

        return redirect()->route('starter.index')->with('success', 'Recipe deleted successfully.');
    }
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'prep_time' => 'required|integer|min:1',
            'cook_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'ingredients' => 'required|array',
            'ingredients.*' => 'string|max:255', // Validate individual ingredients
            'instructions' => 'required|array',
            'instructions.*' => 'string', // Validate individual instructions
            'tools' => 'required|array',
            'tools.*' => 'string|max:255', // Validate individual tools
            'tags' => 'required|array', // Validate that 'tags' is an array
            'tags.*' => 'string|max:255', // Validate individual tags as strings
            'calories' => 'nullable|integer',
            'fat' => 'nullable|integer',
            'carbs' => 'nullable|integer',
            'protein' => 'nullable|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
            'video_url' => 'nullable|url',
        ]);

        // dd($request->all());

        // Handle image upload and store the image path
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads/recipe_images'), $imageName);
            $imageFilePath = 'uploads/recipe_images/' . $imageName;
            $validatedData['image'] = $imageFilePath;
        }
        

        $userId = auth()->id();

        // Add the user_id to the validated data
        $validatedData['user_id'] = $userId;
        $validatedData['category_id'] = $request->input('category_id');

        // Create a new recipe using mass assignment
        $recipe = Recipes::create($validatedData);

        // Prepare related data (ingredients, instructions, tools) for mass assignment
        $ingredientsData = collect($validatedData['ingredients'])->map(function ($ingredient) {
            return ['name' => $ingredient];
        });

        $instructionsData = collect($validatedData['instructions'])->map(function ($instruction) {
            return ['step' => $instruction];
        });

        $toolsData = collect($validatedData['tools'])->map(function ($tool) {
            return ['name' => $tool];
        });

        // Use mass assignment to create related records
        $recipe->ingredients()->createMany($ingredientsData);
        $recipe->instructions()->createMany($instructionsData);
        $recipe->tools()->createMany($toolsData);

        $tagNames = $request->input('tags', []);
        $tagIds = [];
        foreach ($tagNames as $tagName) {
            // Find the tag by name or create it if it doesn't exist
            $tag = Tag::firstOrCreate(['name' => $tagName]);

            // Add the tag ID to the list
            $tagIds[] = $tag->id;
        }

        // Sync the tag IDs with the recipe
        $recipe->tags()->sync($tagIds);
        // dd($tagIds);


        // Redirect to the desired route or page after successful submission
        return redirect()->route('starter.index');
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'prep_time' => 'required|integer|min:1',
            'cook_time' => 'required|integer|min:1',
            'servings' => 'required|integer|min:1',
            'ingredients' => 'required|array',
            'ingredients.*' => 'string|max:255', // Validate individual ingredients
            'instructions' => 'required|array',
            'instructions.*' => 'string', // Validate individual instructions
            'tools' => 'required|array',
            'tools.*' => 'string|max:255', // Validate individual tools
            'tags' => 'required|array', // Validate that 'tags' is an array
            'tags.*' => 'string|max:255', // Validate individual tags as strings
            'calories' => 'nullable|integer',
            'fat' => 'nullable|integer',
            'carbs' => 'nullable|integer',
            'protein' => 'nullable|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|integer|exists:categories,id',
        ]);

        // Find the recipe by ID
        $recipe = Recipes::findOrFail($id);

        // Handle image upload and update the image path if a new image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('public/recipe_images');

            // Get the actual file name (without the directory path)
            $imageFileName = Str::afterLast($imagePath, '/');
            $imageFilePath = 'storage/recipe_images/' . $imageFileName;

            // Update the image path in the validated data
            $validatedData['image'] = $imageFilePath;
        }

        $category_id = $request->input('category_id');
        // Update the recipe with the validated data
        $recipe->update($validatedData);
        $recipe->update(['category_id' => $category_id]);
        // Update related data (ingredients, instructions, tools)
        $recipe->ingredients()->detach();
        $recipe->ingredients()->delete(); // Delete existing ingredients
        $recipe->instructions()->delete(); // Delete existing instructions
        $recipe->tools()->delete(); // Delete existing tools

        $ingredientsData = collect($validatedData['ingredients'])->map(function ($ingredient) {
            return ['name' => $ingredient];
        });

        $instructionsData = collect($validatedData['instructions'])->map(function ($instruction) {
            return ['step' => $instruction];
        });

        $toolsData = collect($validatedData['tools'])->map(function ($tool) {
            return ['name' => $tool];
        });

        // Use mass assignment to create related records
        $recipe->ingredients()->createMany($ingredientsData);
        $recipe->instructions()->createMany($instructionsData);
        $recipe->tools()->createMany($toolsData);

        // Update tags
        $tags = $request->input('tags', []);
        $recipe->tags()->detach(); // Detach existing tags

        foreach ($tags as $tag) {
            // Check if the tag already exists by name
            $existingTag = Tag::where('name', $tag)->first();

            if (!$existingTag) {
                // If the tag doesn't exist, create it
                $existingTag = Tag::create(['name' => $tag]);
            }

            // Attach the tag to the recipe
            $recipe->tags()->attach($existingTag);
        }


        // $recipe->cleanupTags($recipe);

        // Redirect to the desired route or page after successful update
        return redirect()->route('recipes.single-recipe', ['id' => $recipe->id]);
    }

    public function uploadImage(Request $request, $recipe_id)
    {
        $recipe = Recipes::findOrFail($recipe_id);

        // Validate the uploaded image
        $request->validate([
            'recipe_image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Juster valideringsreglene etter behov.
        ]);

        // Store the uploaded image
        if ($request->hasFile('recipe_image')) {
            $imagePath = $request->file('recipe_image')->store('recipe_images-users', 'public');

            // Save the image information in the database
            $recipeImage = new RecipeImage([
                'path' => $imagePath,
            ]);
            $recipeImage->user()->associate(Auth::user());
            $recipe->images()->save($recipeImage);

            return redirect()->route('recipes.single-recipe', ['id' => $recipe->id])
                ->with('success', 'Image uploaded successfully.');
        }

        return redirect()->route('recipes.single-recipe', ['id' => $recipe->id])
            ->with('error', 'Image upload failed.');
    }

    public function toggleFavorite(Recipes $recipe)
    {
        $user = auth()->user();

        if ($user->favoriteRecipes->contains($recipe)) {
            $user->favoriteRecipes()->detach($recipe);
            $message = 'Recipe removed from favorites.';
        } else {
            $user->favoriteRecipes()->attach($recipe);
            $message = 'Recipe added to favorites.';
        }

        return response()->json(['message' => $message]);
    }

    public function print(Recipes $recipe)
    {
        $pdf = PDF::loadView('starter.pdf', ['recipe' => $recipe]);

        return $pdf->stream(); // Display the PDF in the browser
    }

    public function userRecipes()
    {
        $user = auth()->user();
        $recipes = $user->recipes;

        return view('user.my-recipes', compact('recipes'));
    }
}