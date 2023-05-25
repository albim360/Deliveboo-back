<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Typology;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


// TODO: controllare le rule
//use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        //dd($request->all());
        $data = $request->validated();


        $data['slug'] = Str::slug($data['name']);
        $data['restaurant_id'] = Auth::user()->restaurant->id;
        //dd($data['restaurant_id']);
        if ($request->hasFile('image')) {
            $img_way = Storage::put('uploads', $data['image']);
            $data['img_way'] = $img_way;
        }

        $product = Product::create($data);

        return redirect()->route('products.index')->with('success', 'Il prodotto è stato salvato con successo.');
    }

 /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $user = Auth::user();

        if ($product->restaurant_id !== $user->restaurant->id) {
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
        //dd($product);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $this->authorize('update', $product);
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $cover_path = Storage::put('uploads', $data['image']);
            $data['cover_image'] = $cover_path;

            if ($product->cover_image && Storage::exists($product->cover_image)) {
                // eliminare l'immagine $post->cover_image
                Storage::delete($product->cover_image);
            }
        }

        $product->update($data);
        //dd($product);
        $data['slug'] = Str::slug($data['name']);

        return redirect()->route('products.index')->with('success', 'Il prodotto è stato aggiornato con successo.');
    }

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
