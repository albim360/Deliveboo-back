<?php

namespace App\Http\Controllers;

use App\Models\Typology;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $restaurants = Restaurant::with('typologies')->get();
        $user_id = Auth::id();
        
        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typologies = Typology::all();
     
        return view('restaurants.create', compact('typologies'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['company_name']);
        $data ['user_id']= Auth::id();

        $restaurant = Restaurant::create($data);

        if (isset($data['typologies'])) {

            $restaurant->typologies()->attach($data['typologies']);
        }

        return redirect()->route('restaurants.show', $restaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $typologies = Typology::all();

        // $selectedTypologies = $restaurant->typologies->pluck('id')->toArray();

        // 'selectedTypologies'

        return view('restaurants.edit', compact('restaurant', 'typologies')); 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();

        if ($data['company_name'] !== $restaurant->company_name) {

            $data['slug'] = Str::slug($data['company_name']);
        };

        $restaurant->update($data);

        if (isset($data['typologies'])) {

            $restaurant->typologies()->sync($data['typologies']);

        } else {

            $restaurant->typologies()->sync([]);
        }

        return redirect()->route('restaurants.show', $restaurant);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->trashed()) {
            $restaurant->forceDelete();
        } else {
            $restaurant->delete();
        }

        return redirect()->route('restaurants.index');
    }
}
