@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <h1>
                RISTORANTI
            </h1>
            <div>

            </div>
        </div>


        {{-- @dd($restaurants); --}}
        <div class="row">
            <div class="col-3">
                @forelse ($restaurants as $restaurant)
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('storage/' . $restaurant->img_way) }}" alt="">
        
                        <div class="card-body">
                            <h5 class="card-title">{{ $restaurant->id }}: <a
                                    href="{{ route('restaurants.show', $restaurant) }}">{{ $restaurant->company_name }}</a></h5>
                            <p class="card-text">{{ $restaurant->description }}</p>
                            <p>{{ $restaurant->address }}</p>
                            <p>{{ $restaurant->telephone }}</p>
                            <p>{{ $restaurant->vat_number }}</p>
                            <p>
                                @forelse ($restaurant->typologies as $typology)
                                    <span>{{ $typology->category_kitchen }}</span>
                                @empty
                                    <span>-</span>
                                @endforelse
                            </p>
                        </div>
                    </div>
                    {{-- @dd($restaurants); --}}
                    {{-- <img class="card-img-top" src="{{ asset('storage/' . $restaurant->img_way) }}" alt=""> --}}
                    {{-- <p>{{ $restaurant->id }}</p> --}}
                    {{-- <p><a href="{{ route('restaurants.show', $restaurant) }}">{{ $restaurant->company_name }}</a></p> --}}
                    {{-- <p>{{ $restaurant->address }}</p> --}}
                    {{-- <p>{{ $restaurant->description }}</p> --}}
                    {{-- <p>{{ $restaurant->vat_number }}</p> --}}
                    {{-- <p>{{ $restaurant->telephone }}</p> --}}
        
                    {{-- <p>
                        {{ $restaurant->trashed() ? $restaurant->deleted_at : '' }}
                    </p> --}}
        
                    {{-- <p>
                        @forelse ($restaurant->typologies as $typology)
                            <span>{{ $typology->category_kitchen }}</span>
                        @empty
                            <span>-</span>
                        @endforelse
                    </p> --}}
        

                @empty
        
                    <p>Vuoto</p>
                @endforelse
            </div>
        </div>
        </tbody>

        </table>

    </div>

    </div>


@endsection
