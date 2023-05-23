<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/restaurant', [RestaurantController::class, 'index'])->name('restaurants.index');
    Route::post('/restaurants/{restaurant:slug}/restore', [RestaurantController::class, 'restore'])->name('restaunts.restore')->withTrashed();
    Route::post('/products/{product:slug}/restore', [ProductController::class, 'restore'])->name('products.restore')->withTrashed();
    Route::post('/orders/{order}/restore', [OrderController::class, 'restore'])->name('orders.restore')->withTrashed();
    Route::resource('products', ProductController::class)->parameters([
        'products' =>'product:slug'
    ])->withTrashed(['show', 'edit', 'update', 'destroy']);

    Route::post('register/with/restaurant', [RestaurantController::class, 'registerWithRestaurant'])->name('register.with.restaurant');


    Route::resource('orders', OrderController::class)->parameters([

        'orders' =>'order'
    ])->withTrashed(['show', 'edit', 'update', 'destroy']);
   
    Route::resource('restaurants', RestaurantController::class)->parameters([
        'restaurants' =>'restaurant:slug'
    ])->withTrashed(['show', 'edit', 'update', 'destroy']);

    Route::post('/password/check', function () {
        $password = request('password');
        $passwordConfirmation = request('password_confirmation');
    
        if ($password !== $passwordConfirmation) {
            return response()->json(['message' => 'Le password non corrispondono.'], 422);
        }
    
        return response()->json(['message' => 'Le password corrispondono.'], 200);
    })->name('password.check');
    
});

require __DIR__.'/auth.php';
