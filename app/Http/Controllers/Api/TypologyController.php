<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Typology;
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
}
