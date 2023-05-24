@extends('layouts.app')

@section('content')
@if(request()->session()->exists('message'))

<div class="alert alert-primary" role="alert">
    {{ request()->session()->pull('message') }}
</div>
@endif
<div class="container py-5">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <h1>{{ $order->full_name }}</h1>
                
                <ul class="ps-0 d-flex gap-1">
                @forelse($order->products as $product )
                    <span class="badge rounded-pill text-bg-light">{{ $product->name }}</span>
                @empty
                    -
                @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <h5>date: </h5>
            <p>{{ $order->date }}</p>
        </div>
        <div>
            <h5>address: </h5>
            <p>{{ $order->address }}</p>
        </div>
        <div>
            <h5>pagamento: </h5>
            <p>{{ $order->total_payment }}</p>
        </div>
        <div>
            <h5>telephone: </h5>
            <p>{{ $order->telephone }}</p>
        </div>
        <div>
            <h5>email: </h5>
            <p>{{ $order->email }}</p>
        </div>
    </div>
@endsection