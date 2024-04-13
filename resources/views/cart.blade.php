<x-app-layout>
@if(session('cart'))
    <div class="cart">
        @foreach(session('cart') as $id => $details)
            <div class="item">
                <img src="{{ $details['image'] }}" width="100" height="100" alt="">
                <p>{{ $details['name'] }}</p>
                <p>Price: ${{ $details['price'] }}</p>
                <p>Quantity: {{ $details['quantity'] }}</p>
                <a href="{{ route('update.cart', $id) }}">Update</a>
                <a href="{{ route('remove.from.cart', $id) }}">Remove</a>
            </div>
             <form action="{{ route('update.cart', $id) }}" method="POST">
            @csrf
            <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1">
            <button type="submit">Update</button>
        </form>
         <a href="{{ route('remove.from.cart', $id) }}">Remove</a>
        @endforeach

    </div>
@else
    <p>Your cart is empty!</p>
@endif

<a href="{{ route('products.index') }}">Back to Products</a>

<form action="{{ route('checkout.show') }}" method="GET">
    <button type="submit">Proceed to Checkout</button>
</form>

</x-app-layout>