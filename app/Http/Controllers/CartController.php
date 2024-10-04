<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = cart::all();
        return view("cart.cart", compact("carts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd();
        $productId = $request->product;
        $product=Product::find($productId);

        $cartItem = cart::where("product_id", $productId)->first();
        if ($cartItem) {

            $cartItem->quantity++;
            $cartItem->save();
        } else {

            cart::create([
                'product_id' => $productId, 
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ]);
        }

        $product->stock -= 1;
        $product->save();
        
        return redirect()->route("showProduct");
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart $cart)
    {
        $cart->delete();
        return back();
    }
}
