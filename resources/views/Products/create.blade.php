
@extends('layouts.app')


@section('content')
    
<div>
    modifica
  </div>
  <div class="container">
      <form action="{{ route('products.store') }}" method="POST">
  
          @csrf
    
          <div class="mb-3">
            <label for="name" class="form-label">Titolo</label>
            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name"  value="{{ old('name') }}">
            @error('name')
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
            <label for="price" class="form-label">price</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
    
          
            
            
    
        </div>
    
          <button type="submit" class="btn btn-primary">Salva</button>
      </form>
      
    
  
  </div>

@endsection