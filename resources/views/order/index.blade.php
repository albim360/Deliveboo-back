@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>
            ordini
        </h1>
        <div>
            <a class="btn" href="{{ route('orders.create') }}">Nuovo ordine</a>
        </div>
    </div>
    
                @forelse ($orders as $order)
                
                    <p>{{$order->date}}</p>
                    <p><a href="{{route('orders.show',$order)}}">{{$order->full_name}}</a></p>
                    <p>{{$order->date}}</p>
                    <p>{{$order->full_name}}</p>
                    <p>{{$order->description}}</p>
                    <p>{{$order->total_payment}}</p>             
                    <p>{{$order->telephone}}</p> 
                    <p>{{$order->address}}</p> 
                    <p>{{$order->email}}</p>               
                
                @empty 
                
                    <p>Vuoto</p>
                
                @endforelse
            </tbody>

        </table>

    </div>

</div>


@endsection