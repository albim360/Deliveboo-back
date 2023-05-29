<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Typology;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class TypologyController extends Controller
{
    public function index(){
        $typology = Typology::all();

        return response()->json([
            'success' => true,
            'results' => $typology,
        ]);
    }

    public function show($id)
    {
        $typology = Typology::find($id);
         
        $RestaurantRecords = $typology->restaurants;

        return response()->json([
            'success' => true,
            'results' => $RestaurantRecords,
        ]);
    }
}
