<main class="page">
    <div class="title">
        <h2>Create a New Collection</h2>
        <div class="title-underline"></div>
    </div>

    <form action="{{ route('collections.store') }}" method="post">
        @csrf
        <label for="collection_name">Collection Name:</label>
        <input type="text" name="collection_name" required>

        <button type="submit" class="btn btn-primary">Create Collection</button>
    </form>
</main>
