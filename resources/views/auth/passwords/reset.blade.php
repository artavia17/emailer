@extends('layouts.access')

@section('content')




<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

          <div class="d-flex justify-content-center py-4">
            <a href="{{route('inicio')}}" class="logo d-flex align-items-center w-auto link">
              <img class="icon mx-2" src="{{asset('/img/logo.png')}}" alt="">
              <span class="d-none d-lg-block font-variable text-title blue">Emailer</span>
            </a>
          </div><!-- End Logo -->

          <div class="card mb-3 w-100">

            <div class="card-body">

              <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-3 font-variable text-title blue">{{ __('Reset Password') }}</h5>
                <p class="text-center">Insert the email and password of your account.</p>
              </div>

              <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label ">{{ __('Email Address') }}</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-12 col-form-label ">{{ __('Confirm Password') }}</label>

                    <div class="col-md-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>

                @if (session('status'))
                    <div class="alert alert-success mt-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="col-12 mt-3">
                    <p class="mb-0">Already have an account? <a href="/login">Log in</a></p>
                </div>

            </form>



            </div>
          </div>
        </div>
      </div>
    </div>

@endsection
