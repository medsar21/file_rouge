<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mealPlans()
    {
        return $this->belongsToMany(MealPlan::class, 'meal_plan_days');
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipes::class);
    }

    public function daysOfWeek()
    {
        return $this->belongsToMany(DayOfWeek::class, 'meal_plan_days', 'meal_plan_id', 'day_of_week_id');
    }
}
