@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuovo ordine</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="full_name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('full_name') is-invalid @enderror" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
            @error('full_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="telephone" class="form-label">Telefono</label>
            <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
            @error('telephone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="products" class="form-label">Prodotti</label>
            <div class="d-flex flex-wrap gap-3">
                @foreach($products as $key => $product)
                <div class="form-check">
                    <input name="products[]" class="form-check-input" type="checkbox" value="{{ $product->id }}" id="product_{{ $product->id }}">
                    <label class="form-check-label" for="product_{{ $product->id }}">{{ $product->name }}</label>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="total_payment" class="form-label">Pagamento</label>
            <div class="input-group">
                <span class="input-group-text">€</span>
                <input type="number" class="form-control @error('total_payment') is-invalid @enderror" id="total_payment" name="total_payment" value="{{ old('total_payment') }}" required>
            </div>
            @error('total_payment')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') }}" required>
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') }}" required>
            @error('date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
</div>
@endsection


<style>
.form-label {
    font-weight: bold;
    font-size: 16px;
}

</style>