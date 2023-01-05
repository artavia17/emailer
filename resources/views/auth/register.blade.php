@extends('layouts.access')

@section('content')

<div class="container">

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
                  <h5 class="card-title text-center pb-0 fs-3 font-variable text-title blue">Create an Account</h5>
                  <p class="text-center">Enter your personal details to create account</p>
                </div>


                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="col-12">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <div class="input-group has-validation">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <div class="input-group has-validation">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>

                        <div class="input-group has-validation">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="col-12 mt-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>

                        <div class="input-group has-validation">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-check">
                          <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                          <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                          <div class="invalid-feedback">You must agree before submitting.</div>
                        </div>
                      </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary w-100">
                            {{ __('Create Account') }}
                        </button>
                    </div>

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
