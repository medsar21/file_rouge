<main class="page">
    <form method="POST" action="{{ route('mealplan.store') }}">
        @csrf
        <label for="name">Meal Plan Name:</label>
        <input type="text" name="name" required>

        <label for="day_of_week_ids">Select Days of the Week:</label>
        <select name="day_of_week_ids[]" multiple>
            @foreach ($daysOfWeek as $day)
                <option value="{{ $day->id }}">{{ $day->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create Meal Plan</button>
    </form>
</main>
