@section('title', $pageTitle)
<!-- Add Fancybox CSS -->
<link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />

<!-- Add Fancybox JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

<style>
    .delete-button {
        background-color: red;
    }

    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        /* 16:9 aspect ratio */
        height: 0;
        overflow: hidden;
    }

    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
</style>
<main class="page">
    <div class="recipe-page">
        <section class="recipe-hero">

            <div class="recipe-images">
                <!-- Main Image -->
                <a data-fancybox="recipe-gallery" href="{{ asset($recipe->image) }}">
                    <img src="{{ asset($recipe->image) }}" class="img recipe-hero-img" alt="Recipe Image">
                    {{ asset( $recipe->image) }}
                </a>
                @if ($recipe->video_url)
                    <div class="video-container">
                        <iframe width="560" height="315" src="{{ $recipe->video_url }}" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                @endif

                <!-- Thumbnail Carousel -->
                <div class="thumbnail-carousel" style="display: none;">
                    @foreach ($recipe->images as $image)
                        <a data-fancybox="recipe-gallery" href="{{ asset('storage/' . $image->path) }}"
                            class="thumbnail">
                            <img src="{{ asset('storage/' . $image->path) }}" alt="Recipe Image">
                        </a>
                    @endforeach
                </div>

                {{-- @if (Auth::check() && $recipe->user_id == Auth::user()->id) --}}
                @if (Auth::check())
                    <div class="add-photo">
                        <form action="{{ route('recipes.uploadImage', $recipe->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label for="recipe-photo-upload" class="btn mt-1">Add Photo</label>
                            <input type="file" accept=".jpg, .jpeg, .png" id="recipe-photo-upload"
                                name="recipe_image" style="display: none;">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                @endif
            </div>


            <article class="recipe-info">
                <h2>{{ $recipe->name }} </h2>
                <p><strong>Category:</strong> {{ $recipe->category->name }}</p>
                <p style="font-weight: bold;">Recipe by: {{ \App\Models\User::find($recipe->user_id)->name }}</p>
                @auth
                    <button id="favorite-button" class="btn btn-primary" data-recipe-id="{{ $recipe->id }}"
                        data-favorited="{{ auth()->user()->favoriteRecipes->contains($recipe)? 'true': 'false' }}">
                        {{ auth()->user()->favoriteRecipes->contains($recipe)? 'Remove from Favorites': 'Add to Favorites' }}
                    </button>
                @endauth
                <a href="{{ route('recipes.print', ['recipe' => $recipe->id]) }}" class="btn btn-primary"
                    target="_blank">
                    Print Recipe
                </a>
                <p>
                    {{ $recipe->description }}
                </p>
                <div class="recipe-icons">
                    @php
                        function formatTime($time)
                        {
                            if ($time >= 60) {
                                $hours = floor($time / 60);
                                $minutes = $time % 60;

                                $formattedTime = $hours . 'h';

                                if ($minutes > 0) {
                                    $formattedTime .= ' ' . $minutes . 'm';
                                }

                                return $formattedTime;
                            } else {
                                return $time . ' min.';
                            }
                        }
                    @endphp

                    <article>
                        <i class="fas fa-clock"></i>
                        <h5>prep time</h5>
                        <p>@php echo formatTime($recipe->prep_time); @endphp</p>
                    </article>

                    <article>
                        <i class="far fa-clock"></i>
                        <h5>cook time</h5>
                        <p>@php echo formatTime($recipe->cook_time); @endphp</p>
                    </article>
                    {{-- <article>
                        <i class="far fa-clock"></i>
                        <h5>Total Time</h5>
                        <p>{{ $recipe->cook_time + $recipe->prep_time }} min.</p>
                    </article> --}}
                    <article>
                        <i class="fas fa-user-friends"></i>
                        <h5>servings</h5>
                        <p>
                            @if ($recipe->servings == 1)
                                {{ $recipe->servings }} serving
                            @else
                                {{ $recipe->servings }} servings
                            @endif
                        </p>
                    </article>
                </div>
                <p class="recipe-tags">
                    Tags :
                    @foreach ($recipe->tags as $tag)
                        <a href="{{ route('recipes.tag-template', ['tag' => $tag]) }}">{{ $tag }}</a>
                    @endforeach
                </p>
                <div class="average-rating">
                    Average rating: {{ number_format($averageRating, 1) }} ({{ $totalReviews }})
                    <!-- Display average rating with half stars -->
                    @php
                        $wholeStars = floor($averageRating); // Get the integer part of the average rating
                        $decimalPart = $averageRating - $wholeStars; // Get the decimal part of the average rating
                        $hasHalfStar = $decimalPart >= 0.5 && $decimalPart <= 0.9; // Check if there is a half star
                    @endphp
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $wholeStars)
                            <i class="fa fa-star" aria-hidden="true"></i>
                        @elseif ($i == $wholeStars + 1 && $hasHalfStar)
                            <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-star-o" aria-hidden="true"></i>
                        @endif
                    @endfor
                </div>
                @auth
                    <div>
                        <h3>Your Collections</h3>
                        <ul>
                            @foreach ($collection as $collectionItem)
                                <li>
                                    {{ $collectionItem->name }}
                                    <form class="addToCollectionForm" method="POST"
                                        action="{{ route('collections.addRecipeToCollection', ['collectionId' => $collectionItem->id, 'recipeId' => $recipe->id]) }}">
                                        @csrf
                                        @if ($collectionItem->recipes->contains($recipe->id))
                                            <button type="submit">Remove from Collection</button>
                                        @else
                                            <button type="submit">Add to Collection</button>
                                        @endif
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endauth
            </article>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </section>
        <!-- content -->
        <section class="recipe-content">
            <article>
                <h4>instructions</h4>
                <!-- single instruction -->
                @foreach ($recipe->instructions as $instruction)
                    <div class="single-instruction">
                        <header>
                            <p>Step {{ $loop->iteration }}</p>
                            <div></div>
                        </header>
                        <p>{{ $instruction }}</p>
                    </div>
                @endforeach
                {{-- end of single instruction --}}

            </article>
            <article class="second-column">
                <div>
                    <h4>ingredients</h4>
                    @foreach ($recipe->ingredients as $ingredient)
                        <p class="single-ingredient">{{ $ingredient }}</p>
                    @endforeach
                </div>
                <div>
                    <h4>tools</h4>
                    @foreach ($recipe->tools as $tool)
                        <p class="single-tool">{{ $tool }}</p>
                    @endforeach
                </div>
            </article>
        </section>
        <!-- Social Media Share Button -->
        <button id="share-button-twitter" class="btn btn-primary">Share on Twitter</button>
        <button id="share-button-facebook" class="btn btn-primary">Share on Facebook</button>
        <button id="share-button-linkedin" class="btn btn-primary">Share on LinkedIn</button>
        <!-- Copy Link Button -->
        <button id="copy-link-button" class="btn btn-primary">Copy Recipe Link</button>
        <section class="recipe-nutrition">
            <h2 style="display: inline;">Nutrition Facts </h2> <span>(per serving)</span>
            <div class="nutritional-facts">
                <table class="nutritional-facts-table">
                    <tbody class="nutritonal-facts-tbody">
                        @if (!is_null($recipe->calories))
                            <tr class="nutritional-facts-summary">
                                <td class="td-bold">{{ $recipe->calories }} Calories</td>
                            </tr>
                        @endif
                        @if (!is_null($recipe->fat))
                            <tr class="nutritional-facts-summary">
                                <td class="td-bold">{{ $recipe->fat }}g Fat</td>
                            </tr>
                        @endif
                        @if (!is_null($recipe->carbs))
                            <tr class="nutritional-facts-summary">
                                <td class="td-bold">{{ $recipe->carbs }}g Carbs</td>
                            </tr>
                        @endif
                        @if (!is_null($recipe->protein))
                            <tr class="nutritional-facts-summary">
                                <td class="td-bold">{{ $recipe->protein }}g Protein</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <script>
        // Social Media Share
        document.getElementById('share-button-twitter').addEventListener('click', function() {
            // Replace 'YourRecipeUrl' with the actual URL of your recipe page
            const recipeUrl = window.location.href;
            const socialMediaUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(recipeUrl)}`;

            // Open a new window or tab for sharing on social media
            window.open(socialMediaUrl, '_blank');
        });

        document.getElementById('share-button-facebook').addEventListener('click', function() {
            const recipeUrl = window.location.href;
            const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(recipeUrl)}`;

            window.open(facebookUrl, '_blank');
        });

        document.getElementById('share-button-linkedin').addEventListener('click', function() {
            const recipeUrl = window.location.href;
            const linkedInUrl =
                `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(recipeUrl)}`;

            window.open(linkedInUrl, '_blank');
        });



        // Copy Link to Clipboard
        document.getElementById('copy-link-button').addEventListener('click', function() {
            const recipeUrl = window.location.href;

            // Create a temporary input element to copy the URL
            const tempInput = document.createElement('input');
            tempInput.value = recipeUrl;
            document.body.appendChild(tempInput);

            // Select the input field and copy the text
            tempInput.select();
            document.execCommand('copy');

            // Remove the temporary input element
            document.body.removeChild(tempInput);

            // Optionally, provide feedback to the user
            alert('Recipe link copied to clipboard!');
        });
        $(document).ready(function() {
            // Initialize Fancybox for thumbnails
            $(".thumbnail-carousel a").fancybox({
                thumbs: {
                    autoStart: true, // Show thumbnails by default
                },
            });

            // Automatic Image Slideshow
            let currentIndex = 0;
            const images = {!! json_encode($recipe->images) !!}; // Convert PHP array to JavaScript

            function changeImage() {
                currentIndex = (currentIndex + 1) % images.length;
                const imageUrl = "{{ asset('storage/') }}/" + images[currentIndex].path;
                $(".recipe-hero-img").attr("src", imageUrl);

                // Set a timeout to call the function again after 5 seconds
                setTimeout(changeImage, 5000);
            }

            // Start the automatic slideshow
            setTimeout(changeImage, 5000);

            $('#favorite-button').click(function() {
                const recipeId = $(this).data('recipe-id');
                const favorited = $(this).data('favorited');

                $.ajax({
                    url: `/recipes/${recipeId}/favorite`,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (favorited === 'true') {
                            $('#favorite-button').text('Add to Favorites');
                            $('#favorite-button').data('favorited', 'false');
                        } else {
                            $('#favorite-button').text('Remove from Favorites');
                            $('#favorite-button').data('favorited', 'true');
                        }

                        // Display a message or handle success as needed
                        // alert(response.message);
                    },
                    error: function(error) {
                        // Handle errors if any
                        console.error(error);
                    },
                });
            });
        });
    </script>
</main>
