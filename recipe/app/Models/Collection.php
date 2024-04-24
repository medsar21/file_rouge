<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'collection';
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipes()
    {
        return $this->belongsToMany(Recipes::class, 'collection_recipes', 'collection_id', 'recipes_id');
    }
}
