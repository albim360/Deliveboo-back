<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Typology;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;


// TODO: controllare le rule
use Illuminate\Validation\Rule;
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
        //dd($products);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $data['slug'] = Str::slug($data['name']);
        $data['restaurant_id'] = Auth::user()->restaurant->id;
        //dd(Auth::user()->restaurant->id);
        $product = Product::create($data);

        return redirect()->route('products.show', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        // TODO : verificare a cosa serve la condizione
        //if ($product->restaurant_id !== Auth::user()->restaurant->address) {
        //    //abort(403); // Unauthorized access
        //    $data = $request->validated();
        //    dd($data);
        //}
        $data = $request->validated();
        $product->update($data);
        //dd($product);
        $data['slug'] = Str::slug($data['name']);

        return redirect()->route('products.show', $product);
    }

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
     * @param  int  $id
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


