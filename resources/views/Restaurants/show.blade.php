@extends('layouts.app')


@section('content')
    
<div class="container">
    <div class="d-flex">
        <div>
            <h1 class="title">{{$restaurant->company_name}}
                @forelse ($restaurant->typologies as $typology)
                    <span class="badge rounded-pill bg-warning">{{ $typology->category_kitchen }}</span>
                @empty
                @endforelse
            </h1>
            <p class="address">{{$restaurant->slug}}</p>
            <p class="description">{{$restaurant->description}}</p>
            <p class="date">{{$restaurant->date}}</p>
            <p class="url">{{$restaurant->url}}</p>
            
        </div>
        {{-- <div class="container">
            <h2>Articoli correlati</h2>
            @if($restaurant->typology)
            <ul>
                @foreach($restaurant->typology->restaurants as $typology)
                    <li>
                        <a href="{{ route('restaurants.show',$typology)}}">
                            {{ $typology->company_name }}
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
            {{-- @if($restaurant->trashed()) --}}
                    {{-- <form action="{{ route('restaurants.restore',$restaurant) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form> --}}
                {{-- @endif --}}
        {{-- </div> --}}

    </div>
    

</div>
@endsection