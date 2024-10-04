@extends('layouts.index')

@section('section')

<div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8 font-mono">Available carts</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($carts as $cart)
            <div class="relative bg-white rounded-lg shadow-md overflow-hidden">
                <img src="{{ asset('images/' . $cart->image) }}" alt="cart 1" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold font-mono">{{ $cart->name }}</h2>
                    <p class="text-gray-500 font-mono">Best Items and stuff with the best price</p>
                    <p class="text-gray-500 mt-2">Quantity: {{ $cart->quantity }}</p>
                    <div class="flex justify-between mt-2">
                        <p class="font-mono text-green-500 font-bold text-xl mt-2">Price: {{ $cart->price }}$</p>
                        <form action="/cart/destroy/{{ $cart->id }}" method="post" class="cursor-pointer ms-10 font-mono duration-200 block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                        {{-- <a href="/cart/show/{{ $cart->id }}" class="font-mono duration-200 block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Show</a> --}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

