@section('title', 'Search Results')
<main class="page">
    <header class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1>Search Results</h1>
            </div>
        </div>
    </header>
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <section class="{{ $searchResults->isEmpty() ? '' : 'recipes-container' }}">
        {{-- Tags Container --}}
        @if ($searchResults->isEmpty())
            <div class="search-text">
                <h3>No results found for "{{ request('query') }}".</h3>
            </div>
        @else
            <div class="tags-container">
                <h4>Recipes</h4>
                <div class="tags-list">
                    @foreach ($tags as $tag)
                        <a href="{{ route('recipes.tag-template', ['tag' => $tag->name]) }}">{{ $tag->name }}
                            ({{ $tag->recipes->count() }})
                        </a>
                    @endforeach
                </div>
            </div>
            {{-- End Tags Container --}}

            {{-- Recipes List --}}
            <div class="recipes-list">
                {{-- Single Recipe --}}
                @foreach ($searchResults as $recipe)
                    <a href="{{ route('recipes.single-recipe', ['id' => $recipe->id]) }}" class="recipe">
                        <img src="{{ asset($recipe->image) }}" alt="food" class="img recipe-img">
                        <h5>{{ $recipe->name }}</h5>
                        <p>Prep: {{ $recipe->prep_time }} min | Cook: {{ $recipe->cook_time }} min</p>
                    </a>
                @endforeach
                {{-- End of Single Recipe --}}

            </div>
            {{-- End Recipes List --}}
        @endif
    </section>
</main>
