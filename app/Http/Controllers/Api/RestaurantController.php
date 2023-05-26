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
}
