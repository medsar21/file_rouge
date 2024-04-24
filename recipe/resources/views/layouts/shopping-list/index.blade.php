<main class="page">
    <table>
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shoppingLists as $list)
                <tr>
                    <td>{{ $list->item_name }}</td>
                    <td>{{ $list->quantity }}</td>
                    <td>${{ $list->price }}</td>
                    <td>
                        <form action="{{ route('shopping-list.destroy', $list->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>Total Price: ${{ $totalPrice }}</p>

    <form action="{{ route('shopping-list.store') }}" method="post">
        @csrf
        <input type="text" name="item_name" placeholder="Item Name" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="number" name="price" placeholder="Price" step="0.01" required>
        <button type="submit">Add to Shopping List</button>
    </form>
</main>
