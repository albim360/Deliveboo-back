@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($typologies as $typology)
                <div class="col-3 mb-4">
                    <div class="card h-100">
                        <div class="card-body d-flex align-items-center justify-content-center">
                            <a href="{{ route('restaurants.filterByType', ['type_id' => $typology->id]) }}" class="btn btn-primary">{{ $typology->slug }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
