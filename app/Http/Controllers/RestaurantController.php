<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{
    public function index() {
        $restaurant = Restaurant::all();
        return view('restaurants.index', compact('restaurant'));
    }
    public function create()
    {
        return view('restaurants.create');
    }
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            // TODO: completare validazione
            'company_name'=>'required|max:255|min:4',
            'address'=>'required|integer|min:10',
            'vat_number'=>'required|integer|min:1',
            'telephone'=>'required|integer|min:1',
            'description'=>'required|integer|min:1',
            'image'=>'required|integer|min:1'
        ]);
        $data = $request->all();
        $new_restaurant = new Restaurant();
        $new_restaurant->company_name = $data['company_name'];
        $new_restaurant->address = $data['address'];
        $new_restaurant->vat_number = $data['vat_number'];
        $new_restaurant->telephone = $data['telephone'];
        $new_restaurant->description = $data['description'];
        $new_restaurant->image = $data['image'];
        $new_restaurant->save();
        return to_route('restaurant.show', $new_restaurant);
    }
    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', compact('restaurant'));
    }
    public function update(Request $request, Restaurant $restaurant)
    {
        $data = $request->validate([
            // TODO: completare validazione
            'company_name'=>'required|max:255|min:4',
            'address'=>'required|integer|min:10',
            'vat_number'=>'required|integer|min:1',
            'telephone'=>'required|integer|min:1',
            'description'=>'required|integer|min:1',
            'image'=>'required|integer|min:1'
        ]);
        $data = $request->all();
        $new_restaurant = new Restaurant();
        $new_restaurant->company_name = $data['company_name'];
        $new_restaurant->address = $data['address'];
        $new_restaurant->vat_number = $data['vat_number'];
        $new_restaurant->telephone = $data['telephone'];
        $new_restaurant->description = $data['description'];
        $new_restaurant->image = $data['image'];
        $new_restaurant->save();
        return to_route('restaurants.show', $restaurant);
    }
    public function restore(Request $request, Restaurant $restaurant)
    {
        if ($restaurant->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        if ($restaurant->trashed()) {
            $restaurant->restore();
            $request->session()->flash('message', 'Il post è stato ripristinato.');
        }
        return back();
    }
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return to_route('restaurants.index');
    }
}
