@extends('layouts.app')


@section('content')

<div class="container">
    <div class="d-flex">
        <div >
            <h1 class="title">{{$product->name}}</h1>
            <p class="description">{{$product->description}}</p>
            <p class="price">{{$product->price}}</p>

        </div>
        <div>
            <a class="btn" href="{{route('products.edit',$product)}}">MODIFICA</a>
            <a type="button" class="btn btn-success" href="{{route('products.index')}}">Prodotti</a>
            @if($product->trashed())
                    <form action="{{ route('products.restore',$product) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
            @endif
        </div>

    </div>


</div>

@endsection
