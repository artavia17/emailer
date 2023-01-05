@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>API Email</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Api Email</li>
        <li class="breadcrumb-item active">My Api</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Url Api</h5>

            <div class="mb-3">
                <div class="col-sm-12 d-flex">
                  <input type="text" name="" id="info_copy_url_email" class="form-control" value="{{Request::root()}}/api/email/{{$token}}/here-your-content" disabled style="
                  border-top-right-radius: 0px;
                  border-bottom-right-radius: 0px;
                  ">
                  <button class="btn btn-primary" id="copy_api_email" style="
                        border-top-left-radius: 0px;
                        border-bottom-left-radius: 0px;
                    ">
                       <i class="bi bi-clipboard" id="icon_copy"></i>
                  </button>
                </div>
              </div>

              <h5 class="card-title">Setting email</h5>
              <p>Enter the email where you want to receive the information, by not inserting an email you must indicate a new parameter in the API url, example: <br/> <a href="#">{{Request::root()}}/api/email/{{$token}}/here-your-email/here-your-content</a> <br/> If this parameter is not entered, the email address of your user will be used automatically. </p>
              <form action="{{route('send_email_data')}}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label d-flex w-100">Email (Optional)</label>
                    <div class="col-sm-12">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="ejm.ejemplo.com" name="email" value="@if ($email) {{$email}} @endif">
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-block" style="font-size: 14px;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row mb-3">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Save email</button>
                    </div>
                  </div>
                    @if(session('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{session('message')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
              </form>

          </div>
        </div>

      </div>

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Documentation</h5>
            <p class="fw-bold">Parameters:</p>
            <p>
              The "here-your-content" parameter must be separated by the following "&" symbol and must equal "=" for the value type, example:: 
              <br/>
              <a href="#">{{Request::root()}}/api/email/{{$token}}/header=my-title&content=my-content ...</a>
            </p>
            <p>There are 3 types of content:</p>
            <ul>
              <li>header = Email header</li>
              <li>content = Here the content of the email is defined, adams, this space can have tags: br, h2, h3, ul, li, p, span for a better display of email</li>
              <li>footer = Email footer</li>
              <li>email = Sender's email</li>
              <li>subject = Email subject</a></li>
            </ul>

            <p><span class="fw-bold">Note important:</span> The subject, email and content are required.</p>

            <p class="fw-bold">Type response:</p>
            
            <ul>
              <li>201 = Mail sent successfully</li>
              <li>422 = Some parameters are missing</li>
            </ul>

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection