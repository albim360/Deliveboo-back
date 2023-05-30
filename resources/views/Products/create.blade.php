@extends('layouts.app')

@section('content')

<div>
  modifica
</div>
<div class="container">
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="description" class="form-label">description</label>
      <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description') }}</textarea>
      @error('description')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="price" class="form-label">price</label>
      <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
      @error('price')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Immagine di copertina</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" id="image" aria-describedby="titleHelp">
        @error('image')
          <div class="invalid-feedback">
              {{ $message }}
          </div>
        @enderror
    </div>

    <input type="hidden" name="restaurant_id" value="{{ Auth::user()->restaurant_id }}">
    <button type="submit" class="btn btn-primary">Salva</button>
  </form>
</div>

@endsection
