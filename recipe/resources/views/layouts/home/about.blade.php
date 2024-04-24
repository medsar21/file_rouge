@section('title', 'About Page')
<main class="page">
    <section class="about-page">
        <article>
            <h2>
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
            </h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quis incidunt quia amet, et nostrum excepturi
                reprehenderit quo exercitationem quaerat nesciunt eveniet, ex voluptates vero odit nulla blanditiis
                tenetur ipsum dolorum.</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eveniet, dolore!</p>
            <a href="{{ route('starter.contact') }}" class="btn">Contact</a>
        </article>
        <img src="{{ asset('assets/about.jpeg') }}" alt="pouring salt" class="img about-img">
        <section class="featured-recipes">
            <h5 class="featured-title">Look At This Awesomesouce!</h5>
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
        </section>
    </section>
</main>
