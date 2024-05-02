<main class="page">
    <div class="title">
        <h2>User Recipe Collections</h2>
        <div class="title-underline"></div>
    </div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" area-hidden="true">X</button>
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="collections-container">
        {{-- {{ dd($collections) }} --}}
        @if ($collections)
            @foreach ($collections as $collection)
                
                <div class="collection">
                    <h3><a
                            class="collection-name"
                            href="{{ route('collections.showCollectionID', ['id' => $collection->id]) }}">{{ $collection->name }}</a>
                    </h3>
                    <div class="created">
                    <p>Created by: </p>
                    <p class="collection-createBy">{{ $collection->user->name }}</p>
                    </div>

                    {{-- <ul>
                        @foreach ($collection->recipes as $recipe)
                            <li><a
                                    href="{{ route('recipes.single-recipe', ['id' => $recipe->id]) }}">{{ $recipe->name }}</a>
                            </li>
                        @endforeach
                    </ul> --}}
                </div>
            @endforeach
        @else
            <p>No collections available</p>
        @endif
    </div>
</main>
