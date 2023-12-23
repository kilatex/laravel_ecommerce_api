<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ProductController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('admins', AdminController::class);

// User Routes
Route::group([
    'middleware' => 'api',

], function ($router) {
    Route::post('/orders','App\Http\Controllers\OrderController@store');
    Route::get('/orders', 'App\Http\Controllers\OrderController@index');    
});

Route::apiResource('customers', CustomerController::class);


Route::apiResource('categories', CategoryController::class);
