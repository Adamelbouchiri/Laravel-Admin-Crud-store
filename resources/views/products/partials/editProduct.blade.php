@extends('layouts.index')

@section('section')
<form action="/product/update/{{ $product->id }}" method="post" class="mt-10 w-3/5 mx-auto flex flex-col space-y-4" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <h1 class="text-3xl font-bold text-center mb-8 font-mono">Editing {{ $product->name }}</h1>
        <label for="fileInput" class="text-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded duration-300">
            Product Image
            <input value="{{ old('image', $product->image) }}" type="file" accept="image/png, image/jpg, image/jpeg" name="image" class="hidden" id="fileInput">
        </label>

        <div class="flex justify-center w-full">
            <img src="{{ asset('images/' . $product->image) }}" alt="Product 1" class="h-full object-cover w-80 text-center">
        </div>

        <label class="text-gray-700">Product Name:</label>
        <input value="{{ old('name', $product->name) }}" type="text" name="name" class="border rounded px-4 py-2">

        <label class="text-gray-700">Quantity in Stock:</label>
        <input value="{{ old('stock', $product->stock) }}" type="number" name="stock" class="border rounded px-4 py-2" min="1">

        <label class="text-gray-700">Price:</label>
        <input value="{{ old('price', $product->price) }}" type="number" name="price" class="border rounded px-4 py-2" min="0">
        <button type="submit" class="w-40 mx-auto bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded duration-300">Add Produt</button>
</form>
@endsection
