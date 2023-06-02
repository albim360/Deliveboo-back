@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-uppercase">
        <h1>ordini</h1>
        <!-- <a class="btn btn-primary" href="{{ route('orders.create') }}">Nuovo ordine</a> -->
    </div>
    
    @forelse ($orders as $order)
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">{{ $order->full_name }}</h5>
                    <p><strong>Data:</strong> {{ $order->date }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-end"><strong>Pagamento:</strong> {{ $order->total_payment }} €</p>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Telefono:</strong> {{ $order->telephone }}</p>
                    <p><strong>Indirizzo:</strong> {{ $order->address }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Descrizione:</strong> {{ $order->description }}</p>
                </div>
            </div>
            <div class="mt-3 text-end">
                <a href="{{ route('orders.show', $order) }}" class="btn btn-primary">Dettagli</a>
            </div>
        </div>
    </div>
    @empty
    <p>Vuoto</p>
    @endforelse

</div>
@endsection
