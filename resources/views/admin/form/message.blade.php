@extends('layouts.app')

@section('content')


<div class="pagetitle">
  <h1>Messages</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Messages</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">

    <div class="col-lg-4">

      <div class="card mt-4">
        <div class="card-body">
          <h5 class="card-title">Select Form</h5>
          <!-- Vertical Pills Tabs -->
          <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3 w-100" id="" style="" aria-orientation="vertical">
              @foreach  ($name_form as $value)
              <a href="{{route('view_individual_post', $value->id)}}" style="border-radius: 0px !important;" class="nav-link d-flex justify-content-between border-bottom" id="v-pills-profile-tab">
                {{$value->name}}
                <i class="bi bi-chevron-right"></i>
              </a>
              @endforeach
            </div>
          </div>
          <!-- End Vertical Pills Tabs -->
        </div>
      </div>

    </div>


    <div class="col-lg-8">

      <div class=" mt-4">
        <div class="card-body">

          <!-- Vertical Pills Tabs -->
          <div class="d-flex align-items-start">
            <div class="tab-content w-100" id="v-pills-tabContent">
              <div class="tab-pane fade show active d-flex flex-column justify-content-center w-100" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                @if (session('delete'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('delete')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                <h1 class="text-center opacity-50 form_select">Select Your Form</h1>
              </div>
            </div>
          </div>
          <!-- End Vertical Pills Tabs -->

        </div>
      </div>

    </div>

  </div>
</section>









@endsection
