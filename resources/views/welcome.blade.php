@extends('layouts.app')
@section('content')

<a class="btn" href="{{route('products.store')}}">Prodotti ristoranti</a>
<a class="btn" href="{{route('orders.store')}}">Ordini</a>
<a class="btn" href="{{route('restaurants.store')}}">Ristoranti</a>

@endsection