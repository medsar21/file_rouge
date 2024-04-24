<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipes()
    {
        return $this->belongsToMany(Recipes::class);
    }

    public function getRecipesCountAttribute()
    {
        return $this->recipes->count();
    }
}
