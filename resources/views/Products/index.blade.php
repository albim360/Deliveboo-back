@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-column gap-2">
        <div class="d-flex align-items-center justify-content-between py-4">
            <h1>
                Prodotti
            </h1>
            <div>
                <a class="btn btn-primary" href="{{ route('products.create') }}">Nuovo prodotto</a>
            </div>
        </div>

        <div class="container d-flex gap-3 ps-0 flex-wrap align-items-start">

            @forelse ($products as $product)
            
                @if (!$product->trashed()) <!--se il prodotto non è eliminato crea la card-->
                    <div class="card " style="width: 18rem;">
                        @if ($product->img_way)
                            <div class="container px-0 w-100">
                                <img class="card-img-top" src="{{ asset('storage/'.$product->img_way) }}" alt="">
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->id }}. <a
                                    href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h5>
                            <p>{{ $product->description }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Prezzo: €{{ $product->price }}</li>

                        </ul>
                        <div class="card-body d-flex gap-2">
                            <a class="btn btn-success" href="{{ route('products.edit', $product) }}">MODIFICA</a>
                            <form class="card-link ms-0" action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="ELIMINA">
                            </form>
                        </div>
                    </div>
                @endif
            @empty
                <p>Vuoto</p>
            @endforelse
        </div>
    </div>
@endsection
