<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use DateTime;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return new OrderCollection($orders);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {   
        $date = new DateTime('now');
        $date->modify('last day of +1 month');
        $order = new Order();
        $order->customer_id = $request->input('customer_id');
        $order->product_id = $request->input('product_id');
        $order->delivery_date = $date;
        $order->save();
        return new OrderResource($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return new OrderResource($order);
    } 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
       $order->delete();

       return response()->json(['message' => 'ORDER DELETED','users' => $order],200);
    }
}
