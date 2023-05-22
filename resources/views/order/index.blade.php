@exteds('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>
            i prodotti
        </h1>
        <div>
            <a class="btn" href="{{route('orders.create')}}">Nuovo prodotto</a>
        </div>
    </div>
    
                @forelse ($orders as $order)
                
                    <p>{{$project->date}}</p>
                    <p><a href="{{route('orders.show',$order)}}">{{$order->full_name}}</a></p>
                    <p>{{$order->date}}</p>
                    <p>{{$order->full_name}}</p>
                    <p>{{$order->description}}</p>
                    <p>{{$order->total_payment}}</p>             
                    <p>{{$order->telephone}}</p> 
                    <p>{{$order->address}}</p> 
                    <p>{{$order->email}}</p> 
                    <p>
                        {{ $order->trashed() ? $order->deleted_at : '' }}
                    </p>
                    <botton>
                        <a class="btn " href="{{route('orders.edit',$order)}}">MODIFICA</a>
                        
                    </botton>
                    <botton>
                        <form action="{{ route('orders.destroy', $order) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn" type="submit" value="ELIMINA">
                        </form>
                        
                    </botton>
                    
                        
                    
                    <botton>
                        @if($project->trashed())
                            <form action="{{ route('orders.restore',$project) }}" method="POST">
                                @csrf
                                <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                            </form>
                        @endif
                    </botton>
                
                @empty 
                
                    <p>Vuoto</p>
                
                @endforelse
            </tbody>

        </table>

    </div>

</div>


@endsection