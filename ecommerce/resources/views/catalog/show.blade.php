@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <a href="{{ route('catalog.index') }}" class="text-blue-600">← Back to Catalog</a>

    <div class="mt-4 border rounded p-6">
        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
        <p class="text-gray-600">{{ $product->category?->name ?? 'Uncategorized' }}</p>
        <p class="mt-4">SKU: {{ $product->sku }}</p>
        <p class="mt-2">In stock: {{ $product->stock }}</p>
        <p class="mt-4 text-xl font-bold">$ {{ number_format($product->price, 2) }}</p>
        <p class="mt-4">{{ $product->description }}</p>
    </div>
</div>
@endsection
