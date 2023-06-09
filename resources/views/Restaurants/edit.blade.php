@extends('layouts.app')
@section('content')

  <div class="container">
    <form action="{{ route('restaurants.update',$restaurant) }}" method="POST" enctype="multipart/form-data" class="py-4">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="company_name" class="form-label">name company</label>
        <input type="text" class="form-control @error('company_name') is-invalid @enderror" id="company_name" name="company_name" value="{{ old('company_name',$restaurant->company_name) }}">
        @error('company_name')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="typology" class="form-label">typologies</label>
        <div class="d-flex @error('typologies') is-invalid @enderror flex-wrap gap-3">

          @foreach($typologies as $key => $typology)
            <div class="form-check">
              <input name="typologies[]"  
              class="form-check-input" type="checkbox" value="{{ $typology->id }}" id="flexCheckDefault"
              @checked( in_array($typology->id, old('typologies',$restaurant->getTypologyIds()) ) )>
              <label class="form-check-label" for="flexCheckDefault">
                {{ $typology->category_kitchen }}
              </label>
            </div>
          @endforeach
        </div>

        @error('typologies')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">description</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description',$restaurant->description) }}">
        @error('description')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror

      </div>

      <div class="mb-3">
        <label for="vat_number" class="form-label">vat_number </label>
        <input type="text" class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" name="vat_number" value="{{ old('vat_number',$restaurant->vat_number) }}">
        @error('vat_number')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address',$restaurant->address) }}">
        @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="telephone" class="form-label">telephone</label>
        <input type="number" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone',$restaurant->telephone) }}">
        @error('telephone')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="img_way" class="form-label">Immagine di copertina</label>
        <div class="input-group">
            <input type="file" name="img_way"
                class="form-control @error('img_way') is-invalid @enderror"
                value="{{ old('img_way') }}" id="img_way" aria-describedby="titleHelp">
            <label class="input-group-text" for="img_way">Carica</label>
        </div>
        @error('img_way')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salva</button>
      </div>

    </form>

     @if ($restaurant->img_way)
      <div class="d-flex">
        <div class="upload-img">
          <p>
            <strong>Immagine Caricata:</strong>
            {{ $restaurant->img_name }}
          </p>
          <img style="width: 15%" src="{{ asset('storage/' . $restaurant->img_way) }}" alt="">
        </div>
        <form action="{{ route('restaurants.img', $restaurant) }}" method="POST">
          @csrf
          @method('PATCH')
            <button type="submit" class="btn btn-danger">Elimina</button>
          </form>
      </div>
      @endif
  </div>
@endsection