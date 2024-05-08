<x-app-layout>
@if(session('cart'))
    <?php $total = 0; ?> 
    <div class="cart">
        @foreach(session('cart') as $id => $details)
            <?php $total += $details['price'] * $details['quantity']; ?> <!-- Calculate total -->
            <div class="item">
                <img src="{{ asset('images/products/image1.jpg') }}" alt="Product Name" style="width: 100px">
                <p>{{ $details['name'] }}</p>
                <p>Price: ${{ number_format($details['price'], 2) }}</p>
                <p>Quantity: {{ $details['quantity'] }}</p>
                <form action="{{ route('update.cart', $id) }}" method="POST">
                    @csrf
                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
                    <button type="submit">Update</button>
                </form>
                <div class="m-2">
                    <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('remove.from.cart', $id) }}">Remove</a>
                </div>
            </div>
        @endforeach
        <div class="total">
            <strong>Total: ${{ number_format($total, 2) }}</strong> <!-- Display total -->
        </div>
    </div>
@else
    <p>Your cart is empty!</p>
@endif
<div class="m-4">
    <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('products.index') }}">Back to Products</a>
</div>
<div class="m-2">
    <form action="{{ route('checkout.show') }}" method="GET">
        <button class="bg-green-500 text-white py-2 px-4 rounded hover:bg-blue-700" type="submit">Proceed to Checkout</button>
    </form>
</div>
</x-app-layout>