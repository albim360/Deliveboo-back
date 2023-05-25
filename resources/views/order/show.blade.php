@extends('layouts.app')

@section('content')
@if (request()->session()->exists('message'))
    <div class="alert alert-primary" role="alert">
        {{ request()->session()->pull('message') }}
    </div>
@endif

<div class="container py-5">
    <div class="d-flex align-items-center">
        <div class="me-auto">
            <h1>{{ $order->full_name }}</h1>
            <ul class="ps-0 d-flex gap-1">
                @forelse ($order->products as $product)
                    <span class="badge rounded-pill text-bg-light">{{ $product->name }}</span>
                @empty
                    <span class="badge rounded-pill text-bg-light">-</span>
                @endforelse
            </ul>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h5>Data:</h5>
            <p>{{ $order->date }}</p>
        </div>
        <div class="col-md-6">
            <h5>Pagamento:</h5>
            <p>{{ $order->total_payment }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5>Indirizzo:</h5>
            <p>{{ $order->address }}</p>
        </div>
        <div class="col-md-6">
            <h5>Telefono:</h5>
            <p>{{ $order->telephone }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h5>Email:</h5>
            <p>{{ $order->email }}</p>
        </div>
        <div class="col-md-6">
            <h5>Descrizione:</h5>
            <p>{{ $order->description }}</p>
        </div>
    </div>
    
    <div class="mt-4">
        <a href="{{ route('orders.index') }}" class="btn btn-secondary">Torna a tutti gli ordini</a>
    </div>
</div>
@endsection
