<main class="page">
    <form action="{{ route('shopping-list.store') }}" method="post">
        @csrf
        <input type="text" name="item_name" placeholder="Item Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="number" name="price" placeholder="Price" step="0.01" required>
        <button type="submit">Add to Shopping List</button>
    </form>
</main>
