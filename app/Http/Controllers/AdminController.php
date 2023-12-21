<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Http\Resources\AdminCollection;
use App\Http\Resources\AdminResource;
use App\Models\Admin;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::with('user')->get();

        return new AdminCollection($admins);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $users = Admin::where('user_id',$request->input('user_id'))->get();
        if ( sizeof($users) != 0){
            return response()->json(['message' => 'Admin Already Created','users' => $users],400);
        }
        $admin = Admin::create($request->validated());
        return new AdminResource($admin);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        return new AdminResource($admin);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        $role = [ 'role' => $request->input('role') ];
        $admin->update($role);
        return new AdminResource($admin);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $user = User::find($admin->user_id);
        if(!$user) {
            return response()->json(['message' => 'Admin Not Found'],400);
        } 
        $admin->delete();
        return response()->json(['message' => 'CUSTOMER DELETED','users' => $admin],200);
    }
}

