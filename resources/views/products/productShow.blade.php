@extends('layouts.index')

@section('section')

<div class="container mx-auto px-4 py-8">
    
    <form action="/product/filter" method="post" class="flex">
        @csrf
        <select name="price" class="w-52 cursor-pointer appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-700 focus:outline-none focus:border-blue-500">
            <option selected disabled value="">Select price under</option>
            <option selected value="all">All</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select>

        <select name="dateSort" class="ms-5 w-52 cursor-pointer appearance-none rounded-lg border border-gray-300 bg-white px-4 py-2 text-gray-700 focus:outline-none focus:border-blue-500">
            <option disabled value="">Select date</option>
            <option value="latestFirst">Latest First</option>
            <option selected value="oldestFirst">Oldest First</option>
        </select>
        <button type="submit" class="ms-2 font-mono duration-200 block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Filter</button>
    </form>
        
        <h1 class="text-3xl font-bold text-center mb-8 font-mono">Available Products</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
            <div class="relative bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/' . $product->image) }}" alt="Product 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold font-mono">{{ $product->name }}</h2>
                    <p class="text-gray-500 font-mono">Best Items and stuff with the best price</p>
                    <p class="text-gray-500 mt-2">Stock: {{ $product->stock }}</p>
                    <div class="flex justify-between mt-2">
                        <p class="font-mono text-green-500 font-bold text-xl mt-2">Price: {{ $product->price }}$</p>
                        <form action="/product/destroy/{{ $product->id }}" method="post" class="cursor-pointer ms-10 font-mono duration-200 block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        <a href="/product/show/{{ $product->id }}" class="font-mono duration-200 block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Show</a>
                    </div>
                </div>
                <form action="/cart/store" method="post" class="absolute top-2 right-2 cursor-pointer ms-10 font-mono duration-200 block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    @csrf
                    <input type="text" class="hidden" value="{{ $product->id }}" name="product">
                    <button type="submit">Add To Cart</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
@endsection
