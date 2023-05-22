@extends('layouts.app')


@section('content')
    
<div class="container">
    <div class="d-flex">
        <div>
            <h1 class="title">{{$restaurant->company_name}}
                @if($restaurant->type)
                <span class="badge rounded-pill bg-warning">{{ $restaurant->typology->compan_name }}</span>
                @else
                    <span class="badge rounded-pill bg-secondary">Nessuna tipo trovato</span>
                @endif
        </h1></h1>
            <p class="address">{{$restaurant->slug}}</p>
            <p class="description">{{$restaurant->description}}</p>
            <p class="date">{{$restaurant->date}}</p>
            <p class="url">{{$restaurant->url}}</p>
            
        </div>
        <div class="container">
            <h2>Articoli correlati</h2>
            @if($restaurant->type)
            <ul>
                @foreach($restaurant->type->restaurants as $type)
                    <li>
                        <a href="{{ route('restaurants.show',$type)}}">
                            {{ $type->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
            @else
                nessun articolo correlato
            @endif
        </div>
        <div>
            <a class="btn" href="{{route('restaurants.edit',$restaurant)}}">MODIFICA</a>
            @if($restaurant->trashed())
                    <form action="{{ route('restaurants.restore',$restaurant) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
                @endif
        </div>

    </div>
    

</div>

@endsection