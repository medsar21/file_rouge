<style>
    :root {
        --background: #ECF0F4;
        --white: white;
        --gray-light: #FAFBFC;
        --gray-borders: #ECF1F4;
        --gray-dark: #AEB7C2;
        --primary: #4D78C9;
    }

    /* CSS reset */
    *,
    *:before,
    *:after {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
        height: 100vh;
        width: 100vw;
        background-color: var(--background);
    }

    .avatar {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        object-fit: cover;
    }

    .discussion {
        background-color: var(--white);
        border-radius: 8px;
        margin: 16px;
        width: 100%;
        min-width: 280px;
        max-width: 400px;
    }

    .discussion__header {
        background-color: var(--gray-light);
        border-bottom: var(--gray-borders);
        display: flex;
        gap: 8px;
        border-radius: 8px 8px 0 0;
        overflow: hidden;
        padding: 16px;
        width: 100%;
    }

    .discussion__header textarea {
        border: 1px solid rgba(0, 0, 255, 0.2);
        padding: 8px;
        border-radius: 4px;
        height: 48px;
        transition: height 0.3s ease-in-out;
        resize: none;
        width: 100%;
    }

    .discussion__header textarea:focus {
        outline: none;
        height: 80px;
        border: 1px solid var(--primary);
    }

    .comment {
        display: flex;
        padding: 16px;
        min-height: 95px;
        gap: 8px;
        border-bottom: 1px solid var(--gray-borders);
    }

    .newcomment__toolbar {
        justify-content: end;
        display: flex;
        gap: 8px;
        padding: 4px;
    }

    .newcomment__toolbar button {
        border: none;
        cursor: pointer;
        padding: 8px;
        border-radius: 8px;
    }

    .button--primary {
        background-color: #3c3799;
        color: var(--white);
        min-width: 80px;
    }

    .comment__text {
        font-size: 12px;
    }

    .comment__author {
        font-size: 14px;
    }

    .comment__date {
        font-size: 12px;
        margin-left: 4px;
        color: var(--gray-dark);
    }
</style>
<div class="discussion">
    <div class="discussion__header">
        <div class="authed-user">
        </div>
        <form id="newcomment__form">
            <textarea tabindex="1" cols="150" rows="4" minlength="5" required placeholder="Write a comment"></textarea>
            <div class="newcomment__toolbar">
                <button id="reset-button" class="button--secondary" tabindex="3" type="button">
                    Reset
                </button>
                <button id="confirm-button" class="button--primary" tabindex="2" type="submit">
                    Comment
                </button>
            </div>
        </form>
    </div>
    <div class="discussion__comments">
        <!-- will be generated -->
    </div>
    <script>
        // slightly modified https://stackoverflow.com/questions/3177836/
        // how-to-format-time-since-xxx-e-g-4-minutes-ago-similar-to-stack-exchange-site
        const timeSince = (date) => {
            const seconds = Math.floor((new Date() - date) / 1000);

            let interval = seconds / 31536000;

            if (interval > 1) {
                return Math.floor(interval) + " years ago";
            }
            interval = seconds / 2592000;
            if (interval > 1) {
                return Math.floor(interval) + " months ago";
            }
            interval = seconds / 86400;
            if (interval > 1) {
                return Math.floor(interval) + " days ago";
            }
            interval = seconds / 3600;
            if (interval > 1) {
                return Math.floor(interval) + " hours ago";
            }
            interval = seconds / 60;
            if (interval > 1) {
                return Math.floor(interval) + " minutes ago";
            }

            if (seconds < 10) {
                return "just now";
            }

            return Math.floor(seconds) + " seconds ago";
        }

        //? In regular app you will fetch these dat from api

        //? defined commenters
        const users = {
            'alex1': {
                name: 'Alex Cooper',
                src: 'assets/alex.jpg'
            },
            'anna1': {
                name: 'Anna Smith',
                src: 'assets/anna.jpg'
            },
            'drew1': {
                name: 'Drew Parker',
                src: 'assets/drew.jpg'
            },
            'liliya': {
                name: 'Liliya Nováková',
                src: 'assets/liliya.jpg'
            }
        };

        //? currently logged user
        const loggedUser = users['alex1'];

        //? defined comments
        let comments = [{
                id: 1,
                text: 'I am on it, will get back to you at the end of the week &#128526.',
                author: users['liliya'],
                createdAt: '2023-09-03 12:00:00',
            },
            {
                id: 2,
                text: 'I will prepare Instagram strategy, Liliya will take care about Facebook.',
                author: users['anna1'],
                createdAt: '2023-09-03 11:00:00',
            },
            {
                id: 3,
                text: 'I would love to get on that marketing campaign &#128522;. What are the next steps?',
                author: users['drew1'],
                createdAt: '2023-09-02 10:00:00',
            }
        ];

        const authedUser = document.querySelector('.authed-user');

        const authorHTML = DOMPurify.sanitize(`<img class="avatar" src="${loggedUser.src}" alt="${loggedUser.name}">`);

        authedUser.innerHTML = authorHTML;

        const commentsWrapper = document.querySelector('.discussion__comments');

        //? generate comment HTML based on comment object
        const createComment = (comment) => {
            const newDate = new Date(comment.createdAt);
            //? sanitize comment HTML
            return DOMPurify.sanitize(`<div class="comment">
                <div class="avatar">
                    <img
                        class="avatar"
                        src="${comment.author.src}"
                        alt="${comment.author.name}"
                    >
                </div>
                <div class="comment__body">
                    <div class="comment__author">
                        ${comment.author.name}
                        <time
                            datetime="${comment.createdAt}"
                            class="comment__date"
                        >
                            ${timeSince(newDate)}
                        </time>
                    </div>
                    <div class="comment__text">
                        <p>${comment.text}</p>
                    </div>
                </div>
            </div>`);
        }

        //? prepare comments to be written to DOM
        const commentsMapped = comments.map(comment =>
            createComment(comment)
        );

        //? write comments to DOM
        const innerComments = commentsMapped.join('');
        commentsWrapper.innerHTML = innerComments;

        const newCommentForm = document.getElementById('newcomment__form');
        const newCommentTextarea = document.querySelector('#newcomment__form textarea');

        document.getElementById('reset-button').addEventListener(
            'click',
            () => {
                newCommentForm.reset();
            }
        );

        newCommentForm.addEventListener(
            'submit',
            (e) => {
                e.stopPropagation();
                e.preventDefault();
                const newCommentTextareaValue = newCommentTextarea.value;

                const newComment = {
                    id: comments.length + 1,
                    text: newCommentTextareaValue,
                    author: loggedUser,
                    createdAt: new Date().toISOString(),
                };

                const comment = document.createElement('div');
                comment.innerHTML = createComment(newComment);

                if (commentsWrapper.hasChildNodes()) {
                    commentsWrapper.insertBefore(comment, commentsWrapper.childNodes[0]);
                } else {
                    commentsWrapper.appendChild(comment);
                }

                //? reset form after submit
                newCommentForm.reset();
            }
        );
    </script>
</div>
