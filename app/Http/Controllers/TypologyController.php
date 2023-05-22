<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typology;
use App\Http\Requests\StoreTypologyRequest;
use App\Http\Requests\UpdateTypologyRequest;
use Illuminate\validation\Rule;
use Illuminate\Support\Str;

class TypologyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typologies = Typology::withTrashed()->get();

        return view('typologies.index', compact('typologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typologies.create',compact('typologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validated();

        $typology = Typology::create($data);    

        return to_route('typologies.show', $typology);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('typologies.show',compact('typology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('typologies.edit', compact('typology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validated();
        $typology->update($data);
        return to_route('typologies.show', $typology);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($product->trashed()) {
            $product->forceDelete(); 
        } else {
            $product->delete(); 
        }

        return to_route('typologies.index');
    }
}