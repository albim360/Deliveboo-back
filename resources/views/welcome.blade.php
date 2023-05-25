@extends('layouts.app')
@section('content')
    <div class="container d-flex gap-2 mt-3">
        <a class="btn btn-primary" href="{{ route('products.store') }}">Prodotti ristoranti</a>
        <a class="btn btn-primary" href="{{ route('orders.index') }}">Ordini</a>
        <a class="btn btn-primary" href="{{ route('restaurants.store')}}">Ristoranti</a>
    </div>

    <div class="row">
        <div class="col">
            <div class="product-link container d-flex align-items-center mt-3 ">
                <a href="{{ route('products.store') }}">
                    <img class="w-100 h-100 img" src="{{ url('img/plates.jpg') }}" alt="Prodotti">
                    <h4 class="section-title">Prodotti</h4>
                </a>
            </div>
        </div>
        <div class="col">
            <div class="product-link container d-flex align-items-center mt-3 ">
                <a href="{{ route('orders.index') }}">
                    <img class="w-100 h-100 img" src="{{ url('img/orders.jpg') }}" alt="Ordini">
                    <h4 class="section-title">Ordini</h4>
                </a>
            </div>
        </div>
        <div class="col h-100">
            <div class="product-link container d-flex align-items-center mt-3 ">
                <a href="{{ route('restaurants.store') }}">
                    <img class="w-100 h-100 img" src="{{ url('img/restaurant.jpg') }}" alt="Ristoranti">
                    <h4 class="section-title">Ristoranti</h4>
                </a>
            </div>
        </div>
    </div>
@endsection
