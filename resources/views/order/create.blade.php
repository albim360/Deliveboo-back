@extends('layouts.app')


@section('content')
    
<div>
    modifica
  </div>
  <div class="container">
      <form action="{{ route('orders.store') }}" method="POST">
  
          @csrf
          <div class="mb-3">
            <label for="full_name" class="form-label">name</label>
            <input type="text" class="form-control  @error('full_name') is-invalid @enderror" id="full_name" full_name="full_name"  value="{{ old('full_name') }}">
            @error('full_name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">email</label>
            <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email" email="email"  value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
    
          <div class="mb-3">
            <label for="total_payment" class="form-label">pagamento</label>
            <input type="number" class="form-control  @error('total_payment') is-invalid @enderror" id="total_payment" total_payment="total_payment"  value="{{ old('total_payment') }}">
            @error('total_payment')
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
    
          
    
          <div class="mb-3">
            <label for="date" class="form-label">date</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}">
            @error('date')
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