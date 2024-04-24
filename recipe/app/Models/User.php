<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function isAdmin()
    {
        // Assuming you have an 'admin' column in your users table
        return $this->is_admin === 1;
    }

    public function favoriteRecipes()
    {
        return $this->belongsToMany(Recipes::class, 'favorite_recipes')->withTimestamps();
    }

    public function recipes()
    {
        return $this->hasMany(Recipes::class);
    }

    public function collection()
    {
        return $this->hasMany(Collection::class);
    }

    public function mealPlans()
    {
        return $this->hasMany(MealPlan::class);
    }

    // User.php
    public function shoppingLists()
    {
        return $this->hasMany(ShoppingList::class);
    }
}