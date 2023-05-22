@extends('layouts.app')


@section('content')
    

  <div class="container">
      <form action="{{ route('orders.update',$product)t }}" method="POST">
  
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
            <label for="telephone" class="form-label">telephone</label>
            <input type="number" class="form-control @error('telephone') is-invalid @enderror" id="telephone" telephone="telephone" value="{{ old('telephone',$product->telephone) }}">
            @error('telephone')
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
            <label for="total_payment" class="form-label">total_payment </label>
            <input type="text" class="form-control @error('total_payment') is-invalid @enderror" id="total_payment" name="total_payment" value="{{ old('total_payment',$product->total_payment) }}">
            @error('total_payment')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="full_name" class="form-label">full_name </label>
            <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name',$product->full_name) }}">
            @error('full_name')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">email </label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$product->email) }}">
            @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="date" class="form-label">date </label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date',$product->date) }}">
            @error('date')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
            <div class="mb-3">
              <label for="address" class="form-label">address </label>
              <input type="tect" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address',$product->address) }}">
              @error('address')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
              @enderror
            </div></div>


         
          <div class="mb-3">
            
            <button type="submit" class="btn btn-primary">Salva</button>
          </div>
    
          
      </form>
    
  
  </div>

@endsection