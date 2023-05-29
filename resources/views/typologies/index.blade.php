@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <div class="row">
            @foreach($typologies as $typology)
                <div class="col-3 mb-4">
                    <div class="card-body d-flex align-items-center justify-content-center">
                        <a href="{{ route('restaurants.filterByType', ['type_id' => $typology->id]) }}" class="btn btn-primary w-50">{{ $typology->category_kitchen }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
