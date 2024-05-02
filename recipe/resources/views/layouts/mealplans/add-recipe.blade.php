<main class="page">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1>Add Recipe to Meal Plan</h1>

    <p>Meal Plan: {{ $mealPlan->name }}</p>

    <p>Days of the Week:
        @foreach ($mealPlan->daysOfWeek as $day)
            {{ $day->name }}
            @unless ($loop->last)
                , <!-- Add a comma if it's not the last day -->
            @endunless
        @endforeach
    </p>

    {{-- Your recipe selection form goes here --}}
    <form method="POST" action="{{ route('mealplans.addRecipe', ['mealPlanId' => $mealPlan->id]) }}">
        @csrf
        <label for="recipe_id">Select Recipe:</label>
        <select name="recipe_id">
            @foreach ($recipes as $recipe)
                <option value="{{ $recipe->id }}">{{ $recipe->name }}</option>
            @endforeach
        </select>

        <button type="submit">Add Recipe</button>
    </form>

</main>