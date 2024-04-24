<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recipe()
    {
        return $this->belongsTo(Recipes::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
