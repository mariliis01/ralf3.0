<x-app-layout>
<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Description</th>
            <th>Price</th>
            <th>Brand</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product['title'] }}</td>
                <td><img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['title'] }}" height="100"></td>
                <td>{{ $product['description'] }}</td>
                <td>${{ $product['price'] }}</td>
                <td>{{ $product['brand'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</x-app-layout>