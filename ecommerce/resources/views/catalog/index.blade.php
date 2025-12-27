<x-app-layout>
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Catalog</h1>

    <div class="mb-4">
        <form method="get" action="{{ route('catalog.index') }}" class="flex gap-2">
            <select name="category" class="border rounded p-2">
                <option value="">All Categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->slug }}" {{ $categorySlug === $cat->slug ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Filter</button>
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse($products as $product)
            <div class="border rounded p-4">
                <h2 class="font-semibold">{{ $product->name }}</h2>
                <p class="text-gray-600">{{ $product->category?->name ?? 'Uncategorized' }}</p>
                <p class="mt-2 font-bold">$ {{ number_format($product->price, 2) }}</p>
                <a href="{{ route('catalog.show', $product->slug) }}" class="text-blue-600 mt-2 inline-block">View</a>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
</div>
</x-app-layout>
