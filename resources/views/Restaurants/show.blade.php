@extends('layouts.app')


@section('content')
    <div class="container mt-3">
        <div class="d-flex justify-content-center">

            <div class="card mb-3">
                @if ($restaurant->img_way)
                    <img src="{{ asset('storage/' . $restaurant->img_way) }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body">
                    <h1 class="title card-title d-flex justify-content-center align-items-center gap-2">{{ $restaurant->company_name }}
                        @forelse ($restaurant->typologies as $typology)
                            <span class="badge rounded-pill bg-warning">{{ $typology->category_kitchen }}</span>
                        @empty
                        @endforelse
                    </h1>
                    <p class="card-text">{{ $restaurant->description }}</p>
                    <p class="address">{{ $restaurant->address }}</p>
                    <p class="date">{{ $restaurant->date }}</p>
                    <p class="url">{{ $restaurant->url }}</p>

                </div>
            </div>

            {{-- <div>
                @if ($restaurant->img_way)
                    <div class="container py-5">
                        <img src="{{ asset('storage/' . $restaurant->img_way) }}" alt="">
                    </div>
                @endif
                <h1 class="title">{{ $restaurant->company_name }}
                    @forelse ($restaurant->typologies as $typology)
                        <span class="badge rounded-pill bg-warning">{{ $typology->category_kitchen }}</span>
                    @empty
                    @endforelse
                </h1>
                <p class="address">{{ $restaurant->address }}</p>
                <p class="description">{{ $restaurant->description }}</p>
                <p class="date">{{ $restaurant->date }}</p>
                <p class="url">{{ $restaurant->url }}</p>

            </div> --}}


        </div>


    </div>
@endsection
