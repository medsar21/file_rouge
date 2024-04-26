<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .dashboard-links {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .dashboard-link {
            display: block;
            padding: 10px 20px;
            font-size: 16px;
            color: #4a5568;
            transition: background-color 0.3s;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .dashboard-link:hover {
            background-color: #edf2f7;
            color: #2d3748;
        }
    </style>

    <div class="mt-5 dashboard-links">
        <a href="{{ route('starter.index') }}" class="dashboard-link">Home</a>
        <a href="{{ route('recipes.user.index') }}" class="dashboard-link">My Recipes</a>
        <a href="{{ route('recipes.index') }}" class="dashboard-link">Upload Recipe</a>
        <a href="{{ route('recipes.favorites.index') }}" class="dashboard-link">Favorite Recipes</a>
        <a href="{{ route('profile.edit') }}" class="dashboard-link">Edit Profile</a>
        <a href="{{ route('profile.collections') }}" class="dashboard-link">My Collections</a>
        <a href="{{ route('collections.create') }}" class="dashboard-link">Create a New Collection</a>
        <a href="{{ route('mealplan.showMealPlans') }}" class="dashboard-link">My Meal Plans</a>
        <a href="{{ route('mealplan.show') }}" class="dashboard-link">Create a New Meal Plan</a>
    </div>
</x-app-layout>
