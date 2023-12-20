<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       return new UserCollection(User::all());
    }

    public function store(StoreUserRequest $request){
        $product = User::create($request->validated());
        return new UserResource($product);
    }

    public function show(User $user){
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user){
        $user->update($request->all());

        return new UserResource($user);
    }

      /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'Product DELETED Successfully','post' => $user],201);
    }

}
