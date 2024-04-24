<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipes>
 */
class RecipesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'name' => fake()->name(),
            'video_url' => fake()->url,
            'description' => fake()->paragraph,
            'prep_time' => fake()->numberBetween(10, 60),
            'cook_time' => fake()->numberBetween(20, 120),
            'servings' => fake()->numberBetween(1, 10),
            'instructions' => fake()->paragraphs(5),
            'ingredients' => fake()->words(10),
            'tools' => fake()->words(5),
            'tags' => fake()->words(3),
            'image' => fake()->imageUrl,
            'category_id' => 4,
            'average_rating' => fake()->randomFloat(1, 0, 5),
            'review_count' => fake()->numberBetween(0, 100),
            'view_count' => fake()->numberBetween(0, 1000),
            'calories' => fake()->numberBetween(100, 1000),
            'fat' => fake()->numberBetween(0, 50),
            'carbs' => fake()->numberBetween(0, 100),
            'protein' => fake()->numberBetween(0, 50),
        ];
    }
}