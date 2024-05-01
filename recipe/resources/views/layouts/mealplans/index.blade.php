<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <main class="max-w-4xl mx-auto p-6">
        <header class="bg-blue-500 text-white rounded-lg p-8 mb-6">
            <h2 class="text-3xl font-semibold">All of Your Meal Plans in One Place</h2>
        </header>
        @foreach ($mealPlans as $mealPlan)
        <div class="bg-white rounded-lg p-6 mb-6">
            <p>
            <a href="{{ route('mealplan.post-page', ['id' => $mealPlan->id]) }}" class="text-blue-500 font-semibold hover:bg-blue-500 hover:text-white hover:no-underline rounded-lg px-2 py-1">
    {{ $mealPlan->name }}
</a>
            </p>
            <ul class="mt-2">
                @foreach ($mealPlan->daysOfWeek as $day)
                <li class="text-gray-600">{{ $day->name }}</li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </main>

</body>

</html>
