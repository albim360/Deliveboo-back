@extends('layouts.app')
@section('content')
    <!-- <div class="container d-flex gap-2 mt-3">
        <a class="btn btn-primary" href="{{ route('products.store') }}">Prodotti ristoranti</a>
        <a class="btn btn-primary" href="{{ route('orders.index') }}">Ordini</a>
        <a class="btn btn-primary" href="{{ route('restaurants.store')}}">Ristoranti</a>
    </div> -->

    <div class="row py-4">
    <div class="col h-100">
            <div class="container d-flex align-items-center mt-3 ">
                <a href="{{ route('restaurants.store') }}" class="product-link">
                    <img class="w-100 h-100 img" src="{{ url('img/restaurant.jpg') }}" alt="Ristoranti">
                    <h4 class="section-title">Il tuo ristorante</h4>
                </a>
                <!-- <a class="btn" href="{{route('typologies.index')}}">Categorie</a> -->
            </div>
        </div>
        <div class="col">
            <div class="container d-flex align-items-center mt-3 ">
                <a href="{{ route('products.store') }}" class="product-link">
                    <img class="w-100 h-100 img" src="{{ url('img/plates.jpg') }}" alt="Prodotti">
                    <h4 class="section-title">I tuoi prodotti</h4>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="container d-flex align-items-center mt-3 ">
                <a href="{{ route('orders.index') }}" class="product-link">
                    <img class="w-100 h-100 img" src="{{ url('img/orders.jpg') }}" alt="Ordini">
                    <h4 class="section-title">Lista ordini</h4>
                </a>
            </div>
        </div>
    </div>
@endsection