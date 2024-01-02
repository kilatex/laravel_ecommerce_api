<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Admin;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    
        $products = Product::with('category')->get();
        return new ProductCollection($products);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $admin =  Admin::where('user_id', Auth::user()->id)->first();
        if(empty($admin)){
         return response()->json(['message' => 'NO AUTHENTICATED'],201);
        }
        $product = Product::create($request->validated());
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $admin =  Admin::where('user_id', Auth::user()->id)->first();
        if(empty($admin)){
         return response()->json(['message' => 'NO AUTHENTICATED'],201);
        }
        $product->update($request->all());
        return response()->json(['message' => 'Product Updated Successfully','post' => $product],201);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $admin =  Admin::where('user_id', Auth::user()->id)->first();
        if(empty($admin)){
         return response()->json(['message' => 'NO AUTHENTICATED'],201);
        }
        $product->delete();
        return response()->json(['message' => 'Product DELETED Successfully','post' => $product],201);
    }
}
