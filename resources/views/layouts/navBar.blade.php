
<nav class="bg-gray-800 text-white h-16 flex justify-between items-center px-4">
    <div class="flex items-center">
        <h1 class="text-2xl font-bold mr-4 font-mono">Your Store</h1>
    </div>
    <ul class="flex space-x-4">
        <li><a href="{{ route('createProduct') }}" class="hover:text-gray-400 duration-300 font-mono">Create Product</a></li>
        <li><a href="{{ route('showProduct') }}" class="hover:text-gray-400 duration-300 font-mono">Show Products</a></li>
        <li><a href="{{ route('cart') }}" class="hover:text-gray-400 duration-300 font-mono">My Cart</a></li>
    </ul>
</nav>
