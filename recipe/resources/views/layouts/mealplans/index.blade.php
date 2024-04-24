<main class="page">
    <header class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h2>All of Your Meal Plans in One Place</h2>
            </div>
        </div>
    </header>
    @foreach ($mealPlans as $mealPlan)
        <p>
            {{-- <a href="{{ route('mealplan.addRecipeMealPlan', ['mealPlanId' => $mealPlan->id]) }}"> --}}
            {{-- {{ dd($mealPlan->id) }} --}}
            <a href="{{ route('mealplan.post-page', ['id' => $mealPlan->id]) }}">
                {{ $mealPlan->name }}
            </a>
        </p>
        <ul>
            @foreach ($mealPlan->daysOfWeek as $day)
                <li>{{ $day->name }}</li>
            @endforeach
        </ul>
    @endforeach

</main>
