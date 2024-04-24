<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentHelpfulness;
use App\Models\CommentReply;
use App\Models\Recipes;
use App\Models\Reviews;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function storeCommentAndReview(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:500',
            'rating' => 'required|integer|between:1,5',
            'recipe_id' => 'required|exists:recipes,id',
        ], [
            'comment.required' => 'Comment content is required.',
            'comment.max' => 'Max characters allowed for a comment is 500.',
            'rating.required' => 'Rating is required.',
            'rating.integer' => 'Rating must be an integer.',
            'rating.between' => 'Rating must be between 1 and 5.',
            'recipe_id.required' => 'Valid recipe ID is required.',
            'recipe_id.exists' => 'The selected recipe does not exist.',
        ]);

        try {
            // Create a new Comment
            $comment = new Comment();
            $comment->user_id = auth()->id();
            $comment->recipes_id = $request->recipe_id;
            $comment->content = $request->comment;
            $comment->save();

            // Create a new Review
            $review = new Reviews();
            $review->user_id = auth()->id();
            $review->recipes_id = $request->recipe_id;
            $review->rating = $request->rating;
            $review->save();

            // Recalculate and update $totalReviews and $averageRating
            $recipe = Recipes::with('instructions')->findOrFail($request->recipe_id);
            $recipe->average_rating = Reviews::where('recipes_id', $recipe->id)->avg('rating');
            $recipe->review_count = Reviews::where('recipes_id', $recipe->id)->count();
            $recipe->save();
            $totalReviews = Reviews::where('recipes_id', $recipe->id)->count();
            $averageRating = Reviews::where('recipes_id', $recipe->id)->avg('rating');

            // Redirect with success message and updated values
            return redirect()->view('starter.single-recipe')
                ->with('success', 'Comment and review posted successfully!');
        } catch (\Exception $e) {
            // Handle any exceptions here
            return redirect()->back();
        }
    }

    public function storeReply(Request $request)
    {
        $request->validate([
            'content' => 'required|max:500',
            'comment_id' => 'required|exists:comments,id',
        ], [
            'content.required' => 'Reply content is required.',
            'content.max' => 'Max characters allowed for a reply is 500.',
            'comment_id.required' => 'Comment ID is required.',
            'comment_id.exists' => 'The selected comment does not exist.',
        ]);

        $reply = new CommentReply();
        $reply->user_id = auth()->id();
        $reply->comment_id = $request->comment_id;
        $reply->content = $request->content;
        $reply->save();

        return redirect()->back()->with('success', 'Reply posted successfully!');
    }

    public function markHelpful(Comment $comment)
    {
        $user = auth()->user();

        // Check if the user has already marked the comment as helpful
        $helpfulness = CommentHelpfulness::where('user_id', $user->id)
            ->where('comment_id', $comment->id)
            ->first();

        if ($helpfulness) {
            // User has already marked it as helpful, so unmark it
            $helpfulness->delete();
        } else {
            // User hasn't marked it as helpful, so mark it
            CommentHelpfulness::create([
                'user_id' => $user->id,
                'comment_id' => $comment->id,
                'helpful' => true,
            ]);
        }

        return back();
    }
}
