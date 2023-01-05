@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Setting Api SMTP</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Api Email</li>
        <li class="breadcrumb-item active">Setting SMTP</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">SMTP Data</h5>
            @if(session('message_error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('message_error')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            @endif
            <!-- General Form Elements -->
            <form action="{{route('send_data_smtp')}}" method="POST" id="form_smtp">
              @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Transport</label>
                <div class="col-sm-10">
                  <select type="text" class="form-control @error('transport') is-invalid @enderror " name="transport">
                    <option>Select type transport</option>
                    <option value="smtp" @if ($transport == 'smtp') selected @endif>SMTP</option>
                  </select>
                </div>
                @error('transport')
                        <div class="invalid-feedback d-block" style="font-size: 14px;">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Host</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('host') is-invalid @enderror " placeholder="test.com" name="host" value="{{$host}}">
                </div>
                @error('host')
                        <div class="invalid-feedback d-block" style="font-size: 14px;">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Port</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control @error('port') is-invalid @enderror" placeholder="8080" name="port" value="{{$port}}">
                </div>
                @error('port')
                        <div class="invalid-feedback d-block" style="font-size: 14px;">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Encryption</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('encryption') is-invalid @enderror" placeholder="TLS" name="encryption" value="{{$encryption}}">
                </div>
                @error('encryption')
                        <div class="invalid-feedback d-block" style="font-size: 14px;">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label" >Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="ad925ff6d6b8cf8" name="username" value="{{$username}}">
                </div>
                @error('username')
                  <div class="invalid-feedback d-block" style="font-size: 14px;">{{ $message }}</div>
                @enderror
              </div>
              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10 d-flex">
                  <input type="password"
                  style="
                        border-top-right-radius: 0px;
                        border-bottom-right-radius: 0px;
                    "
                   class="form-control @error('password') is-invalid @enderror" placeholder="b45e7b340d306075" id="input_password" name="password" value="{{$password}}">
                  <button id="view_password" class="btn btn-primary"
                    style="
                        border-top-left-radius: 0px;
                        border-bottom-left-radius: 0px;
                    "
                  >
                    <i class="bi bi-eye-slash" id="view_icon"></i>
                  </button>
                </div>
                @error('password')
                  <div class="invalid-feedback d-block" style="font-size: 14px;">{{ $message }}</div>
                @enderror
              </div>

              <div class="row mb-3">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Save settings</button>
                </div>
              </div>
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Documentation</h5>

            <p>
                To generate the smtp data, you must first redirect to your email settings. This STMP key can be obtained for any email. You must take into account that to obtain this data you must have access to all your email data.
            </p>
            <p>
                <span class="fw-bold">Important note:</span>
                The username and password are not the login data of your email, this username and password must be generated when requesting your STMP data
            </p>
            <img src="{{asset('img/ejemplo.png')}}" class="w-100" alt="">
          </div>
        </div>

      </div>
    </div>
  </section>

@endsection