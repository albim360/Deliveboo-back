<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Product;
use App\Models\Typology;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        // TODO: aggiungere paginazione nella query
        $restaurants = Restaurant::all()->with('typologies')->get();

        return response()->json([
            'success' => true,
            'results' => $restaurants,
        ]);
    }

    public function show($slug){
        //verificare first() e get()
        $restaurant = Restaurant::where('slug', $slug)->first()->with('products')->get();
        
        if($restaurant){
            return response()->json([
                'success'=> true,
                'results'=> $restaurant,
            ]);
        }else{
            return response()->json([
                'success'=> false,
                'error'=> 'nessun ristorante trovato',
            ]);
        }
    }
}
