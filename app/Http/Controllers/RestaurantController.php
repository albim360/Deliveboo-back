<?php

namespace App\Http\Controllers;

use App\Models\Typology;
use App\Models\Restaurant;
use App\Http\Requests\StoreRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $restaurants = Restaurant::where('user_id', $user->id)->with('typologies')->get();
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

        //! vista rimanda in register
        return view('auth.register', compact('typologies'));
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
        if ($request->hasFile('image')) {
            $img_way = Storage::put('uploads', $data['image']);
            $data['img_way'] = $img_way;
        }

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
    public function update(UpdateRestaurantRequest $request, Restaurant $restaurant)
    {
        $data = $request->validated();

        if ($data['company_name'] !== $restaurant->company_name) {

            $data['slug'] = Str::slug($data['company_name']);
        };

        if ($request->hasFile('image')) {
            $img_way = Storage::put('uploads', $data['image']);
            $data['img_way'] = $img_way;
        }

        $restaurant->update($data);


        if (isset($data['typologies'])) {

            $restaurant->typologies()->sync($data['typologies']);

        } else {

            $restaurant->typologies()->sync([]);

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
    public function filterByType($type_id) {
        $restaurants = Restaurant::whereHas('typologies', function($query) use ($type_id) {
            $query->where('typology_id', $type_id);
        })->get();
        return view('restaurants.index', compact('restaurants'));
    }


}
