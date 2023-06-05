<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $orders = DB::table('users')
            ->join('restaurants', 'users.id', '=', 'restaurants.user_id')
            ->join('products', 'restaurants.id', '=', 'products.restaurant_id')
            ->join('order_product', 'products.id', '=', 'order_product.product_id')
            ->join('orders', 'order_product.order_id', '=', 'orders.id')
            ->distinct('orders.*', 'products.id')
            ->orderBy('date', 'desc')
            ->get();

        return view('statistics.index', compact('orders'));
    }
}
