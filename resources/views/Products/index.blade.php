@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>i prodotti</h1>
            <div>
                <a class="btn" href="{{ route('products.create') }}">Nuovo prodotto</a>
            </div>
        </div>

        @forelse ($products as $product)
            <p>{{ $product->id }}</p>
            <p><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></p>
            <p>{{ $product->name }}</p>
            <p>{{ $product->description }}</p>
            <p>{{ $product->price }}</p>
            <p>{{ $product->trashed() ? $product->deleted_at : '' }}</p>
            <button>
                <a class="btn" href="{{ route('products.edit', $product) }}">MODIFICA</a>
            </button>
            <button>
                <form action="{{ route('products.destroy', $product) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn" type="submit" value="ELIMINA">
                </form>
            </button>
            <button>
                @if ($product->trashed())
                    <form action="{{ route('products.restore', $product) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
                @endif
            </button>
            @if (session()->has('message'))
                <div class="alert alert-primary" role="alert">
                    {{ session('message') }}
                </div>
            @endif
        @empty
            <p>Vuoto</p>
        @endforelse
    </div>
@endsection
