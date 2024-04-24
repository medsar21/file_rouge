@section('title', 'Favourite Recipes')
<main class="page">
    {{-- Header --}}
    <header class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1>Favourite Recipes</h1>
                <p>All of your favourite recipes in one place</p>
            </div>
        </div>
    </header>
    {{-- End Header --}}

    {{-- Recipes Container --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <section class="recipes-container">
        {{-- Tags Container --}}

        <div class="tags-container">
            <h4>Recipes</h4>
            <div class="tags-list">
                {{-- @foreach ($tags as $tag)
                    <a href="{{ route('recipes.tag-template', ['tag' => $tag->name]) }}">{{ $tag->name }}
                        ({{ $tag->recipes->count() }})
                    </a>
                @endforeach --}}
            </div>
        </div>
        {{-- End Tags Container --}}

        {{-- Recipes List --}}
        <div class="recipes-list">
            {{-- Single Recipe --}}
            @foreach ($favoriteRecipes as $recipe)
                <a href="{{ route('recipes.single-recipe', ['id' => $recipe->id]) }}" class="recipe">
                    <img src="{{ asset($recipe->image) }}" alt="food" class="img recipe-img">
                    <h5>{{ $recipe->name }}</h5>
                    <p>Prep: {{ $recipe->prep_time }} min | Cook: {{ $recipe->cook_time }} min</p>
                </a>
            @endforeach
            {{-- End of Single Recipe --}}

        </div>
        {{-- End Recipes List --}}
    </section>

    {{-- End of Recipes Container --}}

</main>
