<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get("/", [ProductController::class, "index"])->name("createProduct");
Route::get("/products", [ProductController::class, "showProduct"])->name("showProduct");
Route::post("/product/store", [ProductController::class, "store"])->name("Product.store");
Route::get("/product/show/{product}", [ProductController::class, "show"])->name("Product.show");
Route::delete("/product/destroy/{product}", [ProductController::class, "destroy"])->name("Product.delete");
Route::get("/product/edit/{product}", [ProductController::class, "edit"])->name("Product.edit");
Route::put("/product/update/{product}", [ProductController::class, "update"])->name("Product.update");
Route::post("/product/filter", [ProductController::class, "filter"])->name("Product.filter");


//cart routes
Route::get("/cart", [CartController::class, "index"])->name("cart");
Route::post("/cart/store", [CartController::class, "store"])->name("cart.store");
Route::delete("/cart/destroy/{cart}", [CartController::class, "destroy"])->name("cart.delete");