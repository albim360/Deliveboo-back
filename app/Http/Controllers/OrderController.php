<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orders = DB::table('users')
        ->join('restaurants', 'users.id', '=', 'restaurants.user_id')
        ->join('products', 'restaurants.id', '=', 'products.restaurant_id')
        ->join('order_product', 'products.id', '=', 'order_product.product_id')
        ->join('orders', 'order_product.order_id', '=', 'orders.id')
        ->select('orders.*', 'products.id')
        ->get();

        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::orderBy('name', 'asc')->get();

        return view('order.create', compact('products'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
{
    $data = $request->validated();
    $data['quantity'] = 1; // Imposta il valore predefinito di 'quantity' a 1
    
    $order = Order::create($data);
    
    if (isset($data['products'])) {
        $products = [];
        foreach ($data['products'] as $product) {
            $products[$product] = ['quantity' => $data['quantity']];
        }
        $order->products()->attach($products);
    }
    
    return redirect()->route('orders.show', $order);
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $data = $request->validated();
        $order->update($data);

        if (isset($data['products'])) {
            $order->products()->sync($data['products']);
        }else{
            $order->products()->sync([]);
            //alternativa usare detach()
        }
        
        return to_route('order.show', $order);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($product->trashed()) {
            $product->forceDelete(); 
        } else {
            $product->delete(); 
        }

        return to_route('order.index');
    }
}
