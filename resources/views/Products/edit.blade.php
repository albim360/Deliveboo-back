@extends('layouts.app')


@section('content')
    

  <div class="container">
      <form action="{{ route('producuts.update',$product)t }}" method="POST">
  
          @csrf
          @method('PUT')
    
          <div class="mb-3">
            <label for="name" class="form-label">name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name',$product->name) }}">
            @error('name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>

  
          
    
          <div class="mb-3">
            <label for="description" class="form-label">description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description',$product->description) }}">
            @error('description')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
            
          </div>
    
          
    
          <div class="mb-3">
            <label for="price" class="form-label">price </label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price',$product->price) }}">
            @error('price')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>

         
          <div class="mb-3">
            
            <button type="submit" class="btn btn-primary">Salva</button>
          </div>
    
          
      </form>
    
  
  </div>

@endsection