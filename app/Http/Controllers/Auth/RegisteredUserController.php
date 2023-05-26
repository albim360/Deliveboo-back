<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;


// ! add restaurant and typology
use App\Models\Typology;
use App\Models\Restaurant;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */

    public function create(): View
    {
        $typologies = Typology::orderBy('category_kitchen')->get();
        return view('auth.register', compact('typologies'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        //! add object restaurant::create
        $restaurant = Restaurant::create([
            'company_name' => $request['company_name'], // 'restaurant_name' is the name of the input in the form 'register.blade.php
            'address' => $request['address'],
            'vat_number' => $request['vat_number'],
            'telephone' => $request['telephone'],
            'description' => $request['description'],
            'image' => $request['image'],
            'slug' => Str::slug($request['company_name']),
            'img_way' => $request['img_way'],
            'img_name' => $request['img_name'],

            'user_id' => $user->id,
        ]);
        //dd($restaurant);
        if (isset($request['typologies'])) {
            $restaurant->typologies()->attach($request['typologies']);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
