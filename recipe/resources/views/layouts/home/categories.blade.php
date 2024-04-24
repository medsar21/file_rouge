@section('title', 'Categories')
<main class="page">
    <section class="tags-wrapper">
        @foreach ($categories as $category)
            <a class="tag" href="{{ route('recipes.category-list', ['category' => $category->name]) }}">
                {{ $category->name }}
                ({{ $category->recipes_count }})
            </a>
        @endforeach
    </section>
</main>
