@extends('layouts.app')
@section('content')
<div class="row py-4 ">
    <div class="col-md-3 container d-flex align-items-center mt-3 ">
        <a href="{{ route('restaurants.index') }}" class="product-link">
            <img src="{{ url('img/restaurant.jpg') }}" alt="Ristoranti">
            <h4 class="section-title">Il tuo ristorante</h4>
        </a>
    </div>
    
    <div class="col-md-3 container d-flex align-items-center mt-3 ">
        <a href="{{ route('products.store') }}" class="product-link w-100">
            <img src="{{ url('img/plates.jpg') }}" alt="Prodotti">
            <h4 class="section-title">I tuoi prodotti</h4>
        </a>
    </div>

    <div class="col-md-3 container d-flex align-items-center mt-3 ">
        <a href="{{ route('orders.index') }}" class="product-link">
            <img src="{{ url('img/orders.jpg') }}" alt="Ordini">
            <h4 class="section-title">Lista ordini</h4>
        </a>
    </div>
    <div class="col-md-3 container d-flex align-items-center mt-3 ">
        <a href="#" class="product-link">  <!--aggiungere rotta Statistiche -->
            <img src="{{ url('img/grapich.png') }}" alt="Statistiche">
            <h4 class="section-title">Statistiche</h4>
        </a>
    </div>
</div>
@endsection
