@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form id="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span id="password-error" style="color: red;"></span>
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" id="register-button">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <form action="{{ route('restaurants.store') }}" method="POST">

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
                                <input name="typologies[]" @checked( in_array($typology->id, old('typologies',[]) ) ) class="form-check-input" type="checkbox" value="{{ $typology->id }}" id="flexCheckDefault">
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
                          <label for="telephone" class="form-label">url project</label>
                          <input type="number" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone"  value="{{ old('telephone') }}">
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
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#register-button').click(function(e) {
            e.preventDefault();

            var password = $('#password').val();
            var passwordConfirmation = $('#password-confirm').val();

            if (password !== passwordConfirmation) {
                $('#password-error').text('Le password non corrispondono.');
                return false;
            }

            $('#register-form').submit();
        });
    });
</script>
@endsection
