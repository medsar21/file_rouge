@section('title', $pageTitle)
<main class="page">
    <header class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1>{{ $collections->name }}</h1>
                {{-- <p>Made by {{ $collections->auth()->name }}</p> --}}
            </div>
        </div>
    </header>
    <div>
        <h4>{{ $collections->name }}</h4> {{-- Tag Name --}}
        <p>Recipes Count: {{ $recipes->count() }}</p>
        {{-- Recipes List --}}
        <div class="recipes-list">
            {{-- Single Recipe --}}
            @foreach ($recipes as $recipe)
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
