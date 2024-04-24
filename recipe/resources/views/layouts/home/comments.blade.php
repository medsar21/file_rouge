<div class="comment-section">
    <h3>Comments and Reviews</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @auth
        <form action="{{ route('comments-and-reviews.store') }}" method="POST" class="form">
            @csrf
            <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select name="rating" id="rating" class="form-control">
                    <option value="">Select a Rating</option>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea name="comment" id="comment" placeholder="Write your comment here" class="form-control" rows="2"></textarea>
                @error('comment')
                    <p class="form-alert">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-comment">Post Comment and Review</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}">log in</a> to leave a comment and review.</p>
    @endauth

    {{-- Check if there are comments --}}
    @if ($recipe->comments->count() > 0)
        @foreach ($recipe->comments as $comment)
            <div class="comment">
                <small class="comment-meta">By {{ $comment->user->name }} |
                    {{ $comment->created_at->format('F d, Y') }} Helpful ({{ $comment->helpfulnessCount() }})</small>
                <p>{{ $comment->content }}</p>
                <form action="{{ route('comments.mark-helpful', $comment) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-link">
                        @if ($comment->isMarkedHelpfulBy(auth()->user()))
                            Unmark as Helpful
                        @else
                            Mark as Helpful
                        @endif
                    </button>
                </form>
                @auth
                    <form action="{{ route('replies.store') }}" method="POST" class="form-comment">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <textarea name="content" placeholder="Write your reply here" class="form-control"></textarea>
                        @error('reply_content_' . $comment->id)
                            <p class="form-alert">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn btn-primary btn-comment">Reply</button>
                    </form>
                @endauth

                <!-- Show/Hide Replies and Replies Section -->
                <button class="show" onclick="showReplies(this)">Show Replies</button>
                <button class="hide" onclick="hideReplies(this)" style="display: none;">Hide Replies</button>
                <div class="replies">
                    <h4> Replies </h4>
                    <ul>
                        @foreach ($comment->replies as $reply)
                            <li>
                                <div class="comment">
                                    <img src="{{ asset('storage/avatars/avatar-' . $reply->user->id . '.png') }}"
                                        alt="User Avatar" width="40" class="mr-2">
                                    <small class="comment-meta">By {{ $reply->user->name }} |
                                        {{ $reply->created_at->format('F d, Y') }}</small>
                                    <p>{{ $reply->content }}</p>
                                </div>
                                <br>
                            </li>
                        @endforeach
                    </ul>
                    <p class="comment-meta">There are no more replies</p>
                </div>
                <!-- End of Replies Section -->
            </div>
        @endforeach
    @else
        <p class="comment-meta">No comments yet.</p>
    @endif
</div>
