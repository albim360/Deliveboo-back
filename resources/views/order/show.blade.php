@extends('layouts.app')


@section('content')
    
<div class="container">
    <div class="d-flex">
        <div >
            <h1 class="full_name">{{$order->full_name}}</h1>
            <p class="description">{{$order->description}}</p>
            <p class="total_payment">{{$order->total_payment}}</p>
            <p class="telephone">{{$order->telephone}}</p>
            <p class="email">{{$order->email}}</p>
            <p class="date">{{$order->date}}</p>
        </div>
        <div>
            <a class="btn" href="{{route('$orders.edit',$order)}}">MODIFICA</a>
            @if($order->trashed())
                    <form action="{{ route('$orders.restore',$order) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
                @endif
        </div>

    </div>
    

</div>

@endsection