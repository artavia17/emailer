@extends('layouts.app')

@section('content')


<div class="pagetitle">
  <h1>{{$form_indivual->name}}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item"><a href="{{route('view_messages_post')}}">Messages</a></li>
      <li class="breadcrumb-item active">{{$form_indivual->name}}</li>
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
            <div class="nav flex-column nav-pills me-3 w-100" id="vertical" style="" aria-orientation="vertical">
              @foreach  ($name_form as $value)
              <a href="{{route('view_individual_post', $value->id)}}" style="border-radius: 0px !important;" class="nav-link d-flex @if($form_indivual->id == $value->id) active @endif justify-content-between border-bottom" id="v-pills-profile-tab">
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

      <div class="card mt-4">
        <div class="card-body">


          <!-- Vertical Pills Tabs -->
          <div class="d-flex align-items-start">
            <div class="tab-content w-100" id="v-pills-tabContent">
              <div class="tab-pane fade show active w-100 pt-3" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="w-100 d-flex justify-content-between">
                    <h5 class="card-title m-0 p-0 mx-5">Messages</h5>
                </div>
                <div class="mt-4" method="POST" id="update_data">
                  @csrf
                  <input type="hidden" name="update_array" id="actualizar_data">


                  <div class="container">
                    <div class="row justify-content-around">
                        @foreach ($message as $value_message)
                            @php
                                $data_explode = explode(';', $value_message->data);
                            @endphp
                            <div class="card col-12 col-lg-5">
                                <div class="card-body">
                                <h5 class="card-title">Data Form</h5>
                                <p class="card-text">This information is encrypted for the security of your data and your users...</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    @foreach($data_array as $value => $key)
                                        <li class="list-group-item">{{$key}}: {{$data_explode[$value]}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                  </div>




                  @if (session('updated'))
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                      {{session('updated')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                </div>
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
