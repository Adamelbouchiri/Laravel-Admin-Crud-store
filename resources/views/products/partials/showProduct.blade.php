@extends('layouts.index')

@section('section')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-center mb-8 font-mono">Products</h1>
    <div class="bg-white rounded-lg shadow-md overflow-hidden w-3/5 mx-auto">
        <div class="flex justify-center w-full">
            <img src="{{ asset('images/' . $product->image) }}" alt="Product 1" class="h-full object-cover w-80 text-center">
        </div>
        <div class="p-4">
            <h2 class="text-lg font-semibold font-mono">{{ $product->name }}</h2>
            <p class="text-gray-500 font-mono">Best Items and stuff with the best price</p>
            <p class="text-gray-500 font-mono">You can checkout now to have a discount</p>
            <p class="text-gray-500 mt-2">Stock: {{ $product->stock }}</p>
            <div class="flex justify-between mt-2">
                <p class="font-mono text-green-500 font-bold text-xl mt-2">Price: {{ $product->price }}$</p>
                <a href="/product/edit/{{ $product->id }}" class="font-mono duration-200 block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
