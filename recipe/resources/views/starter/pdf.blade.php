<html>

<head>
    <title>{{ $recipe->name }}</title>
</head>

<body>
    <h1>{{ $recipe->name }}</h1>
    <p>{{ $recipe->description }}</p>
    <p><strong>Author:</strong> {{ \App\Models\User::find($recipe->user_id)->name }}</p>
    <p><strong>Date:</strong> {{ now()->format('F d, Y H:i:s') }}</p>
    <p><strong>Prep Time:</strong> {{ $recipe->prep_time }} min.</p>
    <p><strong>Cook Time:</strong> {{ $recipe->cook_time }} min.</p>

    <h2>Ingredients</h2>
    <ul>
        @foreach ($recipe->ingredients as $ingredient)
            <li>{{ $ingredient }}</li>
        @endforeach
    </ul>

    <h2>Directions</h2>
    <ol>
        @foreach ($recipe->instructions as $instruction)
            <li>{{ $instruction }}</li>
        @endforeach
    </ol>

    <h2>Tools</h2>
    <ul>
        @foreach ($recipe->tools as $tool)
            <li>{{ $tool }}</li>
        @endforeach
    </ul>

    <!-- Check if nutritional facts are not null -->
    @if (!is_null($recipe->calories) || !is_null($recipe->fat) || !is_null($recipe->carbs) || !is_null($recipe->protein))
        <h2>Nutritional Facts (per serving)</h2>
        <ul>
            @if (!is_null($recipe->calories))
                <li>{{ $recipe->calories }} Calories</li>
            @endif
            @if (!is_null($recipe->fat))
                <li>{{ $recipe->fat }}g Fat</li>
            @endif
            @if (!is_null($recipe->carbs))
                <li>{{ $recipe->carbs }}g Carbs</li>
            @endif
            @if (!is_null($recipe->protein))
                <li>{{ $recipe->protein }}g Protein</li>
            @endif
        </ul>
    @endif
</body>

</html>
