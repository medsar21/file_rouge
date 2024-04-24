<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayOfWeek extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'day_of_weeks';

    public function mealPlans()
    {
        return $this->belongsToMany(MealPlan::class, 'meal_plan_days', 'day_of_week_id', 'meal_plan_id');
    }
}
