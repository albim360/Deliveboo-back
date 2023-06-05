@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="alert alert-danger">
            <h1>Pagina non trovata</h1>
            <p>La pagina che stai cercando non esiste.</p>

            <a class="btn btn-primary" href="{{ route('dashboard') }}">Torna alla home</a>
        </div>
    </div>
@endsection
