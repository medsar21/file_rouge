<div class="comments-section">
    <div class="comments-section">
        <div class="comment">
            <div class="comment-content">
                <p>This is a sample comment. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="comment-meta">
                <span>Posted by John Doe</span>
                <span>2 hours ago</span>
            </div>
            <div class="comment-actions">
                <button class="like-btn">Like</button>
                <button class="reply-btn">Reply</button>
            </div>
            <!-- Reply Form (hidden by default) -->
            <div class="comment-reply-form">
                <input type="text" class="reply-input" placeholder="Write a reply...">
                <button class="submit-reply-btn">Submit Reply</button>
            </div>
        </div>
    </div>
    <script>
        // JavaScript code for toggling reply form visibility
        document.querySelectorAll('.comment').forEach(comment => {
            const replyForm = comment.querySelector('.comment-reply-form');
            const replyButton = comment.querySelector('button:contains("Reply")');

            replyButton.addEventListener('click', () => {
                replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
            });
        });

        // Polyfill for :contains selector
        // Source: https://stackoverflow.com/a/2044623/7075012
        jQuery.expr[':'].contains = function(a, i, m) {
            return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };
    </script>
