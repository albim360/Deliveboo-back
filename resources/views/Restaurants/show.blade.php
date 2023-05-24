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
        

    </div>
    

</div>
@endsection