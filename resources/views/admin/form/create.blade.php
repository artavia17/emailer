@extends('layouts.app')

@section('content')




<div class="pagetitle">
    <h1>Create new form</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Create new</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            @if (session('warning'))
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session('warning')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            <h5 class="card-title">Name Form</h5>
            <!-- General Form Elements -->
            <form method="POST" action="{{route('create_form_post')}}" id="form_smtp">
              @csrf

                <div class="row mb-3 container_data">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10 d-flex">
                    <input type="text" class="form-control " id="name" name="name_form" placeholder="" value="">
                  </div>
                  <div class="invalid-feedback d-none" id="required_name" style="font-size: 14px;">The name is required</div>
                </div>


              <h5 class="card-title">Add File</h5>
              <input type="hidden" id="array_data" name="array_data">
              <div class="add_data">
                <div class="row mb-3 container_data">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Field Name</label>
                  <div class="col-sm-10 d-flex">
                    <input type="text" class="form-control field_value" name="name" placeholder="Insert the name fiel" value="">
                  </div>
                  <div class="invalid-feedback d-none required" style="font-size: 14px;">The field name is required</div>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-10">
                  <a class="btn btn-primary" id="create_new_file">Add new</a>
                  <button type="submit" class="btn btn-primary">Save settings</button>
                </div>
              </div>

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
