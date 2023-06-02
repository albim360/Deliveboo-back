@extends('layouts.app')
@section('content')
    <div class="row py-4">
    <div class="col h-100">
            <div class="container d-flex align-items-center mt-3 ">
                <a href="{{ route('restaurants.index') }}" class="product-link">
                    <img class="w-100 h-100 img" src="{{ url('img/restaurant.jpg') }}" alt="Ristoranti">
                    <h4 class="section-title">Il tuo ristorante</h4>
                </a>
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