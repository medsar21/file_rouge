<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredient;
use App\Models\Instruction;
use App\Models\Tool;
use Illuminate\Support\Facades\DB;

class Recipes extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    protected $guarded = [];

    protected $casts = [
        'instructions' => 'array',
        'ingredients' => 'array',
        'tools' => 'array',
        'tags' => 'array',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'ingredient_recipe');
    }

    // Define the instructions relationship
    public function instructions()
    {
        return $this->hasMany(Instruction::class);
    }


    // Define the tools relationship
    public function tools()
    {
        return $this->belongsToMany(Tool::class)->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'recipes_tag', 'recipes_id', 'tag_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'recipes_id');
    }

    public function images()
    {
        return $this->hasMany(RecipeImage::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorite_recipes')->withTimestamps();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_recipes', 'recipes_id', 'collection_id');
    }

    public function mealPlans()
    {
        return $this->belongsToMany(MealPlan::class);
    }


    // public function cleanupTags(Recipes $recipe)
    // {
    //     $tagsToDelete = [];

    //     // Loop through the recipe's tags
    //     foreach ($recipe->tags as $tagName) {
    //         // Check if the tag is not associated with any other recipes
    //         if (DB::table('recipes_tag')->where('tag_name', $tagName)->count() === 0) {
    //             // If not, mark it for deletion
    //             $tagsToDelete[] = $tagName;
    //         }
    //     }

    //     // Delete the tags that are no longer associated with any recipes
    //     Tag::whereIn('name', $tagsToDelete)->delete();
    // }



    protected static function boot()
    {
        parent::boot();

        // Listen for the detaching event on the "tags" relationship
        static::deleting(function ($recipe) {
            collect($recipe->tags)->each(function ($tagName) {
                // Find the tag by name
                $tag = Tag::where('name', $tagName)->first();

                if ($tag) {
                    // Check if the tag is not associated with any other recipes
                    if (DB::table('tags')->where('id', $tag->id)->count() === 1) {
                        // If not, delete the tag
                        $tag->delete();
                    }
                }
            });
        });
    }
}
