@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="py-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">name</label>
                <input type="text" required class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name', $product->name) }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea required class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            <div class="mb-3">
                <label for="price" class="form-label">price </label>
                <input type="text" required class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $product->price) }}">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <div>
                    <label for="image" class="form-label">Immagine di copertina</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                        id="image" aria-describedby="titleHelp">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>
        </form>

        @if ($product->img_way)
        <div class="d-flex">
            <div class="upload-img">
                <p>
                    <strong>Immagine Caricata:</strong>
                    {{ $product->img_name }}
                </p>
                <img style="width: 15%" src="{{ asset('storage/' . $product->img_way) }}" alt="">
            </div>
            <form action="{{ route('products.img', $product) }}" method="POST">
            @csrf
            @method('PATCH')
                <button type="submit" class="btn btn-danger">Elimina</button>
            </form>
        </div>
        @endif
    </div>
@endsection
