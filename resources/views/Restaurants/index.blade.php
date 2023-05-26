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
        @forelse ($restaurants as $restaurant)
            {{-- @dd($restaurants); --}}
            <img src="{{ asset('storage/' . $restaurant->img_way) }}" alt="">
            <p>{{ $restaurant->id }}</p>
            <p><a href="{{ route('restaurants.show', $restaurant) }}">{{ $restaurant->company_name }}</a></p>
            <p>{{ $restaurant->address }}</p>
            <p>{{ $restaurant->description }}</p>
            <p>{{ $restaurant->vat_number }}</p>
            <p>{{ $restaurant->telephone }}</p>

            <p>
                {{-- {{ $restaurant->trashed() ? $restaurant->deleted_at : '' }} --}}
            </p>

            <p>
                @forelse ($restaurant->typologies as $typology)
                    <span>{{ $typology->category_kitchen }}</span>
                @empty
                    <span>-</span>
                @endforelse
            </p>

        @empty

            <p>Vuoto</p>
        @endforelse
        </tbody>

        </table>

    </div>

    </div>


@endsection
