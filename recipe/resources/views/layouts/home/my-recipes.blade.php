@section('title', 'My Recipes')
<main class="page">
    <div class="container">
        <h2>My Recipes</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{ dd($recipes) }} --}}
                @if ($recipes)
                    @foreach ($recipes as $recipe)
                        <tr>
                            <td>{{ $recipe->name }}</td>
                            <td>
                                <a href="{{ route('recipes.single-recipe', $recipe) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('recipes.edit-recipe', $recipe) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('recipes.delete', $recipe->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="confirmDelete('{{ route('recipes.delete', $recipe->id) }}')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <p>No recipes found.</p>
                @endif
            </tbody>
        </table>
    </div>
</main>

<script>
    function confirmDelete(url) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>
