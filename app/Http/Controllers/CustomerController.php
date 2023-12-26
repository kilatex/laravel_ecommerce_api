<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\User;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::with('user')->get();

        return new CustomerCollection($customers);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $users = Customer::where('user_id',$request->input('user_id'))->get();
        if ( sizeof($users) != 0){
            return response()->json(['message' => 'Admin Already Created','users' => $users],400);
        }
        $customer = Customer::create($request->validated());
        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $address = [
            'address' => $request->input('address')
        ];
        $customer->update($address);
        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $user = User::find($customer->user_id);
        if(!$user) {
            return response()->json(['message' => 'Customer Not Found'],400);
        } 
        $customer->delete();
        return response()->json(['message' => 'CUSTOMER DELETED','users' => $customer],200);

    }
}
