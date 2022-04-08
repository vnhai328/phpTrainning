<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
//    Route::resource('product', ProductController::class)->middleware('permission:product-list');
    Route::post('logout', [RegisterController::class, 'logout']);
    Route::get('product',[ProductController::class,'index'])->middleware('permission:product-list');
    Route::post('product',[ProductController::class,'store'])->middleware('permission:product-create');
    Route::get('product/{id}',[ProductController::class, 'show'])->middleware('permission:product-list');
    Route::put('product/{product}',[ProductController::class, 'update'])->middleware('permission:product-edit');
    Route::delete('product/{product}',[ProductController::class,'destroy'])->middleware('permission:product-delete');
});
