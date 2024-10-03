@extends('layouts.index')

@section('section')
<form action="/product/store" method="post" class="mt-10 w-3/5 mx-auto flex flex-col space-y-4" enctype="multipart/form-data">
    @csrf

        <label for="fileInput" class="text-center bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded duration-300">
            Product Image
            <input type="file" accept="image/png, image/jpg, image/jpeg" name="image" class="hidden" id="fileInput">
        </label>

        <label class="text-gray-700">Product Name:</label>
        <input type="text" name="name" class="border rounded px-4 py-2">

        <label class="text-gray-700">Quantity in Stock:</label>
        <input type="number" name="stock" class="border rounded px-4 py-2" min="1">

        <label class="text-gray-700">Price:</label>
        <input type="number" name="price" class="border rounded px-4 py-2" min="0">
        <button type="submit" class="w-40 mx-auto bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded duration-300">Add Produt</button>
</form>
@endsection
