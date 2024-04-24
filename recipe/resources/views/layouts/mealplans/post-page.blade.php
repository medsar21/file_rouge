@section('title', $pageTitle)
<main class="page">
    <header class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1>{{ $mealPlan->name }}</h1>
                <p>
                    <a href="{{ route('mealplan.addRecipeMealPlan', ['mealPlanId' => $mealPlan->id]) }}">
                        <button class="btn btn-primary">Add Recipes To Meal Plan</button>
                    </a>
                </p>
            </div>
        </div>
    </header>
    <div>
        <h4>{{ $mealPlan->name }}</h4> {{-- Meal Plan Name --}}
        <p>Recipes Count: {{ $mealPlan->recipes->count() }}</p>
        {{-- Recipes List --}}
        <div class="recipes-list">
            {{-- Single Recipe --}}
            @foreach ($mealPlan->recipes as $recipe)
                <a href="{{ route('recipes.single-recipe', ['id' => $recipe->id]) }}" class="recipe">
                    <img src="{{ asset($recipe->image) }}" alt="food" class="img recipe-img">
                    <h5>{{ $recipe->name }}</h5>
                    <p>Prep: {{ $recipe->prep_time }} min | Cook: {{ $recipe->cook_time }} min</p>
                </a>
            @endforeach
            {{-- End of Single Recipe --}}
        </div>
        {{-- End Recipes List --}}
    </div>
</main>
