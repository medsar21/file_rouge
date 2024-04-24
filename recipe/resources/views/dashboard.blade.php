<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="mt-5">
        <a href="{{ route('starter.index') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            Home
        </a>
        <a href="{{ route('recipes.user.index') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            My Recipes
        </a>
        <a href="{{ route('recipes.index') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            Upload Recipe
        </a>
        <a href="{{ route('recipes.favorites.index') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            Favorite Recipes
        </a>
        <a href="{{ route('profile.edit') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            Edit Profile
        </a>
        <a href="{{ route('profile.collections') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            My Collections
        </a>
        <a href="{{ route('collections.create') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            Create a New Collection
        </a>
        <a href="{{ route('mealplan.showMealPlans') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            My Meal Plans
        </a>
        <a href="{{ route('mealplan.show') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            Create a New Meal Plan
        </a>
        {{-- Add Shopping List Later --}}
        {{-- <a href="{{ route('collections.create') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            My Shopping List
        </a> --}}
        {{-- <a href="{{ route('collections.create') }}"
            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-200 dark:text-gray-300 dark:hover:bg-gray-700">
            Add To Shopping List
        </a> --}}
    </div>
</x-app-layout>
