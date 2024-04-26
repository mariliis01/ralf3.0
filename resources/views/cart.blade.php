<x-app-layout>
@if(session('cart'))
    <div class="cart">
        @foreach(session('cart') as $id => $details)
            <div class="item">
                <img src="{{ asset('images/products/image1.jpg') }}" style="width: 100px" alt="Product Name">
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
        <div class="m-2" >
         <a class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700" href="{{ route('remove.from.cart', $id) }}">Remove</a>
         </div>
        @endforeach

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