<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\API\AuthController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
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
    Route::get('/orders/{order}', 'App\Http\Controllers\OrderController@show');    
    Route::delete('/orders/{order}', 'App\Http\Controllers\OrderController@destroy');    
    /* CART ROUTES */
    Route::post('/cart','App\Http\Controllers\CartController@store');
    Route::get('/cart', 'App\Http\Controllers\CartController@index');   
    Route::get('/cart/{cart}', 'App\Http\Controllers\CartController@show');    
    Route::delete('/cart/{cart}', 'App\Http\Controllers\CartController@destroy');    

});

Route::apiResource('customers', CustomerController::class);


Route::apiResource('categories', CategoryController::class);
