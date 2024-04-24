<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recipes()
    {
        return $this->belongsTo(Recipes::class, 'recipes_id');
    }

    public function replies()
    {
        return $this->hasMany(CommentReply::class);
    }

    public function helpfulness()
    {
        return $this->hasMany(CommentHelpfulness::class);
    }

    public function isMarkedHelpfulBy(?User $user)
    {
        if ($user === null) {
            // Handle the case when the user is not logged in
            return false;
        }

        return $this->helpfulness()
            ->where('user_id', $user->id)
            ->where('helpful', true)
            ->exists();
    }

    public function helpfulnessCount()
    {
        return $this->helpfulness()->where('helpful', true)->count();
    }
}
