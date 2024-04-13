<x-app-layout>
@foreach ($products as $product)
    <div class="product">
        <img src="{{ $product->image }}" alt="{{ $product->name }}">
        <h3>{{ $product->name }}</h3>
        <p>{{ $product->description }}</p>
        <p>${{ number_format($product->price, 2) }}</p>
         <a href="{{ route('add.to.cart', $product->id) }}">Add to Cart</a>
        
    </div>
@endforeach
 <a href="{{ route('cart') }}">To Cart</a>
</x-app-layout>
