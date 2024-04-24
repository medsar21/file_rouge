@section('title', 'Tags')
<main class="page">
    <section class="tags-wrapper">
        {{-- single tag --}}
        @foreach ($tags as $tag)
            <a class="tag" href="{{ route('recipes.tag-template', ['tag' => $tag->name]) }}">{{ $tag->name }}
                ({{ $tag->recipes->count() }})
            </a>
        @endforeach
    </section>
</main>
