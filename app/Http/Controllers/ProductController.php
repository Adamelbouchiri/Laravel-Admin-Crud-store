<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("products.productCreate");
    }

    public function showProduct()
    {
        $products = Product::all();
        return view("products.productShow", compact("products"));
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
        
        request()->validate([
            "name" => "required",
            "price" => "required",
            "stock" => "required",
            "image" => "required|mimes:png,jpg,jpeg|max:10280",
        ]);

        $imageFile = $request->image;

        $fileName = hash("sha256", file_get_contents($imageFile)) . "." . $imageFile->getClientOriginalExtension();

        $imageFile->move(public_path("images"), $fileName);

        Product::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
            "image" => $fileName
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("products.partials.showProduct", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("products.partials.editProduct", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $path = "images/" . $product->image;
        $storage = public_path($path);
        
        if ($storage) {
            File::delete($storage);
        }

        request()->validate([
            "name" => "required",
            "price" => "required",
            "stock" => "required",
            "image" => "required|mimes:png,jpg,jpeg|max:10280",
        ]);
        
        $imageFile = $request->image;
        
        $fileName = hash("sha256", file_get_contents($imageFile)) . "." . $imageFile->getClientOriginalExtension();
        $imageFile->move(public_path("images"), $fileName);

        $product->update([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
            "image" => $fileName,
        ]);

        return back();
    }

    public function filter(Request $request)
    {

        $filtredPrice = $request->price;

        $query = Product::query();


        if ($filtredPrice != "all") {
            $query->where("price", "<", $filtredPrice);
        }

        $products = $query->get();


        return view("products.partials.showFiltredProducts", compact("products"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $path = "images/" . $product->image;
        $storage = public_path($path);
        
        if ($storage) {
            File::delete($storage);
        }

        $product->delete();
        return redirect()->route("showProduct") ;
    }
}
