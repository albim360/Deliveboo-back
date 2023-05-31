<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(){
        // TODO: aggiungere paginazione nella query
        $restaurants = Restaurant::all();

        return response()->json([
            'success' => true,
            'results' => $restaurants,
        ]);
    }

    public function show($slug){
        //recupero il primo ristorante dove slug è = al parametro slug
        $restaurant = Restaurant::where('slug', $slug)->first();
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
