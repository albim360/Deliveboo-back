<?php

use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TypologyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [RestaurantController::class, 'index']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{slug}', [ProductController::class, 'show']);
Route::get('/typologies', [TypologyController::class, 'index']);
//rotta parametrica per tipologie
Route::get('/typologies/{id}', [TypologyController::class, 'show']);
Route::get('/restaurants/{slug}', [RestaurantController::class, 'show']);