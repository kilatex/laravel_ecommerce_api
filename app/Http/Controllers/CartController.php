<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Http\Resources\CartCollection;
use App\Http\Resources\CartResource;
use App\Models\Cart;

class CartController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carts = Cart::all();
        return new CartCollection($carts);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        $cart = Cart::create($request->all());
        return new CartResource($cart);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        return new CartResource($cart);
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
       $cart->delete();
       return response()->json(['message' => 'CART DELETED','users' => $cart],200);
    }
}
