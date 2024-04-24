@section('title', 'Contact Us')
<main class="page">
    <section class="contact-container">
        <article class="contact-info">
            <h3>Want To Get In Touch?</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta expedita ipsa iste amet dolores minima
                numquam suscipit perferendis, eligendi vero hic similique libero sint. Ipsa impedit deserunt aliquam
                tempore nemo.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta expedita ipsa iste amet dolores minima
                numquam suscipit perferendis, eligendi vero hic similique libero sint. Ipsa impedit deserunt aliquam
                tempore nemo.</p>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta expedita ipsa iste amet dolores minima
                numquam suscipit perferendis, eligendi vero hic similique libero sint. Ipsa impedit deserunt aliquam
                tempore nemo.</p>
        </article>
        <article>
            <form class="form contact-form" method="POST" action="{{ route('contact.send') }}">
                @csrf
                {{-- Single Form Row --}}
                @if (session('success'))
                    <div class="alert alert-success px-5 w-100">
                        {{ session('success') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-row">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" name="name" id="name" class="form-input">
                </div>
                {{-- End Single Row --}}
                {{-- Single Form Row --}}
                <div class="form-row">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-input">
                </div>
                {{-- End Single Row --}}
                {{-- Single Form Row --}}
                <div class="form-row">
                    <label for="message" class="form-label">Message</label>
                    <textarea name="message" id="message" class="form-textarea"></textarea>
                </div>
                <button type="submit" class="btn btn-block">Send</button>
                {{-- End Single Row --}}
            </form>
        </article>
    </section>
    <section class="featured-recipes">
        <h5 class="featured-title">Look At This Awesomesouce!</h5>
        {{-- Recipes List --}}
        <div class="recipes-list">
            {{-- Single Recipe --}}
            @php $count = 0; @endphp

            @foreach ($recipes as $recipe)
                @while ($count < 3)
                    <a href="{{ route('recipes.single-recipe', ['id' => $recipe->id]) }}" class="recipe">
                        <img src="{{ asset($recipe->image) }}" alt="food" class="img recipe-img">
                        <h5>{{ $recipe->name }}</h5>
                        <p>Prep: {{ $recipe->prep_time }} min | Cook: {{ $recipe->cook_time }} min</p>
                    </a>
                    @php $count++; @endphp
                @endwhile
            @endforeach

            {{-- End of Single Recipe --}}

        </div>
        {{-- End Recipes List --}}
    </section>
</main>
