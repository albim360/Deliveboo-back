<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        //recupero i prodotti
        $products = Product::all();

        return response()->json([
            'success' => true,
            'results' => $products,
        ]);
    }

    public function show($slug){
        //recupero il primo prodotto dove slug è = al parametro slug
        $products = Product::where('slug', $slug)->first();
        if($products){
            return response()->json([
                'success'=> true,
                'results'=> $products,
            ]);
        }else{
            return response()->json([
                'success'=> false,
                'error'=> 'nessun prodotto trovato',
            ]);
        }
    }
}
