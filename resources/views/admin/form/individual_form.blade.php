@extends('layouts.app')

@section('content')


<div class="pagetitle">
  <h1>{{$form_data->name}}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item"><a href="{{route('my_form')}}">My forms</a></li>
      <li class="breadcrumb-item active">{{$form_data->name}}</li>
    </ol>
    <h5 class="card-title">Token data</h5>
    <div class="col-lg-12 d-flex">
      <div class="col-sm-12 d-flex">
        <input type="text" name="" id="info_copy_url_email" class="form-control" value="{{Request::root()}}/api/form/{{$form_data->token}}" disabled style="
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
              @foreach  ($data_name as $value)
              <a href="{{route('form_indivudual', $value->id)}}" style="border-radius: 0px !important;" class="nav-link d-flex @if($form_data->id == $value->id) active @endif justify-content-between border-bottom" id="v-pills-profile-tab">
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
                    <h5 class="card-title m-0 p-0">Form Data</h5>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Delete
                    </button>


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete {{$form_data->name}}</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to eliminate {{$form_data->name}}? If you delete this form you will not be able to recover the data
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form method="POST" action="{{route('form_indivudual_delete', $form_data->id )}}">
                              @csrf
                              <button type="submit" class="btn btn-danger">Accept and Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <form class="mt-4" method="POST" id="update_data" action="{{route('update_form', $id)}}">
                  @csrf
                  <input type="hidden" name="update_array" id="actualizar_data">
                  <div id="content_add_update">
                  @foreach ($data as $value)
                    @if ($value)
                      <div class="mb-4 d-flex align-items-center justify-content-center form_update">
                        <input type="text" class="form-control"  value="{{$value}}" style="border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                        <a class="h-100 btn btn-primary" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px;">
                          <i class="bi bi-dash-lg"></i>
                        </a>
                        <div class="invalid-feedback d-none w-100" style="font-size: 14px;">
                          This file is required
                      </div>
                      </div>
                    @endif
                  @endforeach
                  </div>
                  <div class="d-flex">
                    <a class="btn btn-primary me-3" id="add_new_file_update">Add File</a>
                    <button class="btn btn-primary">Save Changes</button>
                  </div>
                  @if (session('updated'))
                    <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                      {{session('updated')}}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  @endif
                </form>
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