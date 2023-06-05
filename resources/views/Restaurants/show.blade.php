@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-center">

            <div class="card mb-3 col-md-5">
                @if ($restaurant->img_way)
                    <img src="{{ asset('storage/' . $restaurant->img_way) }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <div class="card-title text-center text-capitalize">
                        <h1 class="title ">{{ $restaurant->company_name }}</h1>
                        <p> 
                            @forelse ($restaurant->typologies as $typology)
                            <span class="badge rounded-pill bg-warning">{{ $typology->category_kitchen }}</span>
                            @empty
                                <span>-</span>
                            @endforelse
                        </p>
                    </div>
                    <div class="card-descrition">
                        <p class="card-text">Descrizione: {{ $restaurant->description }}</p>
                        <p>Via: {{ $restaurant->address }}</p>
                        <p>Telefono: {{ $restaurant->telephone }}</p>
                        <p>P.iva: {{ $restaurant->vat_number }}</p>
                    </div>
                    <a href="{{ route('restaurants.edit', $restaurant) }}" class="btn btn-success align-self-center">Modifica</a>
                </div>
            </div>
        </div>
    </div>
@endsection