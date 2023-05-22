@extends('layouts.app')

@section('content')
<div class="container">
    <div>
        <h1>
            i ristoranti
        </h1>
        <div>
            <a class="btn" href="{{route('restaurants.create')}}">Nuovo progetto</a>
        </div>
    </div>
    
                @forelse ($restaurants as $restaurant)
                
                    <p>{{$project->id}}</p>
                    <p><a href="{{route('restaurants.show',$restaurant)}}">{{$restaurant->company_name}}</a></p>
                    <p>{{$restaurant->address}}</p>
                    <p>{{$restaurant->description}}</p>
                    <p>{{$restaurant->vat_number}}</p>
                    <p>{{$restaurant->telephone}}</p>
                    
                    <p>
                        {{ $restaurant->trashed() ? $restaurant->deleted_at : '' }}
                    </p>
                    <p> {{ $restaurant->typology ? $restaurant->typology->category_kitchen : '-' }} </p>
                    <botton>
                        <a class="btn " href="{{route('restaurants.edit',$restaurant)}}">MODIFICA</a>
                        
                    </botton>
                    <botton>
                        <form action="{{ route('restaurants.destroy', $restaurant) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="btn" type="submit" value="ELIMINA">
                        </form>
                        
                    </botton>
                    
                        
                    
                    <botton>
                        @if($project->trashed())
                            <form action="{{ route('restaurants.restore',$project) }}" method="POST">
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