<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typology;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Str;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::withTrashed()->get();
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
    public function store(StorerestaurantRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['company_name']);
        $data ['user_id']= Auth::id();

        $restaurant = Restaurant::create($data);

        //se al ristorante è collegata una tipologia attaccala
        if (isset($data['tipologies'])) {
            $restaurant->tipologies()->attach($data['tipologies']);
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
        $typologies = Typology::all(); //prendo typologies

        return view('restaurants.edit', compact('restaurant,typologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdaterestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['company_name']);

        $restaurant->update($data);

        //aggiorno le tipologie se ci sono
        if (isset($data['typologies'])) {
            $restaurant->typologies()->sync($data['typologies']);
        }else{
            $restaurant->typologies()->sync([]);
            //alternativa usare detach()
        }

        return redirect()->route('restaurants.show', $restaurant);
    }

    //funzione per ripristinare
    public function restore(Request $request, Restaurant $restaurant)
    {

        if ($restaurant->trashed()) {
            $restaurant->restore();

            $restaurant->session()->flash('message', 'Il ristorante è stato ripristinato.');
        }

        return back();
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
            $restaurant->typologies()->detach(); //elimino i collegamenti con la tabella ponte. Alternativa sulla migration modificare restric
            //forse va eliminato anche il collegamento con products
            $restaurant->forceDelete();
        } else {
            $restaurant->delete();
        }

        return redirect()->route('restaurants.index');
    }
}
