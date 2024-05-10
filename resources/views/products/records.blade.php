<x-app-layout>
    <!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-shop</title>
    <!-- Include Tailwind CSS from CDN for quick setup -->
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
</head>
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3">Product</th>
            <th scope="col" class="px-6 py-3">Image</th>
            <th scope="col" class="px-6 py-3">Author</th>
            <th scope="col" class="px-6 py-3">Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    {{ $product['name'] }}
                </td>
                <td class="px-6 py-4">
                   <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-image hover:scale-150" width="50" height="50">
                </td>
                <td class="px-6 py-4">
                    {{ $product['author'] }}
                </td>
                <td class="px-6 py-4">
                    ${{ number_format($product['price']) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</x-app-layout>
