@extends('layouts.app')
@section('content')
  <div class="container">
    <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="mb-3">
        <label for="company_name" class="form-label">Titolo</label>
        <input type="text" class="form-control  @error('company_name') is-invalid @enderror" id="company_name" name="company_name"  value="{{ old('company_name') }}">
        @error('company_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="typologies" class="form-label">tipi</label>
        <div class="d-flex @error('typologies') is-invalid @enderror flex-wrap gap-3">

          @foreach($typologies as $key => $typology)
            <div class="form-check">
              <input name="typologies[]" class="form-check-input @error('typologies') is-invalid @enderror" type="checkbox" value="{{ $typology->id }}" id="flexCheckDefault" @checked( in_array($typology->id, old('typologies',[]) ) )>
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
        <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="vat_number" class="form-label">vat_number</label>
        <input type="text" class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" name="vat_number" value="{{ old('vat_number') }}">
        @error('vat_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="telephone" class="form-label">Telephone</label>
        <input type="text" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone"  value="{{ old('telephone') }}">
        @error('telephone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>
      
      <div class="mb-3">
        <label for="address" class="form-label">address</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}">
        @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Salva</button>
    </form>
  </div>
@endsection