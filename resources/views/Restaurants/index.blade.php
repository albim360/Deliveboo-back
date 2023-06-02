@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="py-5">
            <h1> Dettaglio ristorante:</h1>
        </div>

        <div class="row">
            <div class="d-flex justify-content-center">
                @forelse ($restaurants as $restaurant)
                    <div class="card mb-3 col-4">
                        @if ($restaurant->img_way)
                            <img src="{{ asset('storage/' . $restaurant->img_way) }}" class="card-img-top" alt="img restaurant">
                        @endif

                        <div class="card-body">
                            <div class="card-title text-center text-capitalize">
                                <h1 class="title ">
                                    <a href="{{ route('restaurants.show', $restaurant) }}">{{ $restaurant->company_name }}</a>
                                </h1>
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
                @empty
                    <p>Vuoto</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection