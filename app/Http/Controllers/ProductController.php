<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Typology;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $products = Product::where('restaurant_id', $user->restaurant->id)->withTrashed()->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typologies = Typology::all();
        $products = Product::where('restaurant_id', Auth::user()->restaurant_id)->get();
        return view('products.create', compact('products', 'typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $data['restaurant_id'] = Auth::user()->restaurant->id;

        $product = Product::create($data);

        return redirect()->route('products.index')->with('success', 'Il prodotto è stato salvato con successo.');
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        if ($product->restaurant_id !== Auth::user()->restaurant->id) {
            abort(403); // Unauthorized access
        }
    
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
    
        $product->fill($data); 
    
        $product->save(); 
    
        return redirect()->route('products.index')->with('success', 'Il prodotto è stato aggiornato con successo.');
    }
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product->restaurant_id !== Auth::user()->restaurant->id) {
            abort(403); // Unauthorized access
        }

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if ($product->restaurant_id !== Auth::user()->restaurant->id) {
            abort(403); // Unauthorized access
        }

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    /**
     * Restore the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, Product $product)
    {
        if ($product->trashed()) {
            $product->restore();
            $request->session()->flash('message', 'Il prodotto è stato ripristinato.');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->restaurant_id !== Auth::user()->restaurant->id) {
            abort(403); // Unauthorized access
        }

        if ($product->trashed()) {
            $product->forceDelete();
        } else {
            $product->delete();
        }

        return redirect()->route('products.index');
    }
}
