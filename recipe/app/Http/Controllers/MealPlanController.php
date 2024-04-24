<?php

namespace App\Http\Controllers;

use App\Models\DayOfWeek;
use App\Models\MealPlan;
use App\Models\Recipes;
use Illuminate\Http\Request;

class MealPlanController extends Controller
{
    public function show()
    {
        $daysOfWeek = DayOfWeek::all();
        return view('mealplans.create', compact('daysOfWeek'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'day_of_week_ids' => 'required|array', // Assuming 'day_of_week_ids' is the name of the input field
            'day_of_week_ids.*' => 'exists:day_of_weeks,id', // Validate that each selected day of the week exists
        ]);

        $user = auth()->user();

        $mealPlan = $user->mealPlans()->create([
            'name' => $request->input('name'),
        ]);

        // Attach selected days of the week to the meal plan
        $mealPlan->daysOfWeek()->attach($request->input('day_of_week_ids'));

        return back()->with('success', 'Meal plan created successfully');
    }

    public function addRecipeMealPlan($mealPlanId)
    {
        $mealPlan = MealPlan::findOrFail($mealPlanId);

        // Make sure the authenticated user owns the meal plan
        if (!auth()->user()->mealPlans->contains($mealPlan)) {
            abort(403, 'Unauthorized access'); // Or redirect to an error page
        }

        // Load the daysOfWeek relationship
        $mealPlan->load('daysOfWeek');

        $recipes = Recipes::all(); // You need to adjust this based on how recipes are stored

        return view('mealplans.add-recipe', compact('mealPlan', 'recipes'));
    }


    public function showMealPlans()
    {
        $mealPlans = auth()->user()->mealPlans()->with('recipes')->get();

        return view('mealplans.index', compact('mealPlans'));
    }

    public function addRecipe(Request $request, $mealPlanId)
    {
        // Validate the request
        $request->validate([
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        // Find the meal plan
        $mealPlan = MealPlan::findOrFail($mealPlanId);

        // Check if the recipe is already in the meal plan
        if ($mealPlan->recipes()->where('recipes.id', $request->input('recipe_id'))->exists()) {
            // Recipe is already in the meal plan, remove it
            $mealPlan->recipes()->detach($request->input('recipe_id'));
            $action = 'removed from';
        } else {
            // Recipe is not in the meal plan, add it
            $mealPlan->recipes()->attach($request->input('recipe_id'));
            $action = 'added to';
        }

        // Redirect or respond as needed
        return redirect()->route('mealplan.showMealPlans')->with('success', "Recipe $action meal plan successfully");
    }

    public function showPost($id)
    {
        $mealPlan = MealPlan::findOrFail($id);
        $pageTitle = $mealPlan->name;
        // Check if the authenticated user owns the meal plan
        if (!auth()->user()->mealPlans->contains($mealPlan)) {
            abort(403, 'Unauthorized access'); // Or redirect to an error page
        }

        // Load the relationships you need
        $mealPlan->load('recipes');

        return view('mealplans.post-page ', compact('mealPlan', 'pageTitle'));
    }
}