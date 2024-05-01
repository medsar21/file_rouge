<main class="page" style="font-family: Arial, sans-serif; max-width: 400px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">

    <form method="POST" action="{{ route('mealplan.store') }}" style="margin-bottom: 20px;">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="name" style="font-size: 16px; margin-bottom: 8px; display: block;">Meal Plan Name:</label>
            <input type="text" name="name" required style="width: 100%; padding: 10px; font-size: 16px; border-radius: 4px; border: 1px solid #ccc;">
        </div>

        <div style="margin-bottom: 20px;">
            <label for="day_of_week_ids" style="font-size: 16px; margin-bottom: 8px; display: block;">Select Days of the Week:</label>
            <select name="day_of_week_ids[]" multiple style="width: 100%; padding: 10px; font-size: 16px; border-radius: 4px; border: 1px solid #ccc;">
                @foreach ($daysOfWeek as $day)
                    <option value="{{ $day->id }}" style="cursor: pointer;">{{ $day->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" style="background-color: #007bff; color: #fff; border: none; padding: 12px 20px; margin-top: 20px; cursor: pointer; border-radius: 4px; font-size: 16px;">Create Meal Plan</button>
    </form>

</main>
