@extends('layouts.app')

@section('content')

<div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
            @if (!Auth::user()->photo_profile)
                <img src="{{asset('img/profile.png')}}" alt="Profile" class="rounded-circle">
            @else
                <img src="{{Auth::user()->photo_profile}}" alt="Profile" class="rounded">
            @endif
            <h2>{{ Auth::user()->name }}</h2>
            <h3 class="mt-2">{{ Auth::user()->job }}</h3>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class="nav-link @if(!session('message_user') && !session('message_notify')  && !session('message_password') && !session('error')) active @endif" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
              </li>

              <li class="nav-item">
                <button class="nav-link @if(session('message_user')) active @endif" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>

              <li class="nav-item">
                <button class="nav-link @if(session('message_notify')) active @endif" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
              </li>

              <li class="nav-item">
                <button class="nav-link @if(session('message_password') || session('error')) show active @endif" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
              </li>

            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade  @if(!session('message_user') && !session('message_notify')  && !session('message_password') && !session('error')) show active @endif profile-overview" id="profile-overview">
                @if (Auth::user()->about != null)
                    <h5 class="card-title">About</h5>
                    <p class="small fst-italic">{{Auth::user()->about}}</p>    
                @endif
                

                <h5 class="card-title">Profile Details</h5>

                @if (Auth::user()->name)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label ">Full Name</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->name}}</div>
                    </div>
                @endif

                @if (Auth::user()->company)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Company</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->company}}</div>
                    </div>
                @endif

                @if (Auth::user()->job)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Job</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->job}}</div>
                    </div>
                @endif


                @if (Auth::user()->country)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Country</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->country}}</div>
                    </div>
                @endif

                @if (Auth::user()->address)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Address</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->address}}</div>
                    </div>
                @endif

                @if (Auth::user()->phone)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Phone</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->phone}}</div>
                    </div>
                @endif

                @if (Auth::user()->email)
                    <div class="row">
                        <div class="col-lg-3 col-md-4 label">Email</div>
                        <div class="col-lg-9 col-md-8">{{Auth::user()->email}}</div>
                    </div>
                @endif


              </div>

              <div class="tab-pane @if(session('message_user')) show active @endif  fade profile-edit pt-3" id="profile-edit">

                <!-- Profile Edit Form -->
                <form method="POST" action="{{route('update_user')}}" enctype="multipart/form-data">
                    @csrf
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label" for="image_profile">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                        @if (Auth::user()->photo_profile)
                            <img src="{{Auth::user()->photo_profile}}" alt="Profile" class="rounded">
                        @endif
                      <input type="file" accept="image/*" style="display: none" id="image_profile" name="avatar">
                      <div class="pt-2">
                        <label for="image_profile" class="btn btn-primary btn-sm text-light" title="Upload new profile image"><i class="bi bi-upload"></i></label>
                        @if (Auth::user()->photo_profile)
                            <a href="{{route('delete_profile')}}" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        @endif
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                        @if (Auth::user()->name)
                            <input name="fullName" type="text" class="form-control" id="fullName" value="{{Auth::user()->name}}">
                        @else
                            <input name="fullName" type="text" class="form-control @error('name') is-invalid @enderror" id="fullName">
                        @endif
                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                    <div class="col-md-8 col-lg-9">
                        @if (Auth::user()->about)
                            <textarea name="about" class="form-control" id="about" style="height: 100px">{{Auth::user()->about}}</textarea>
                        @else
                            <textarea name="about" class="form-control" id="about" style="height: 100px"></textarea>
                        @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Company</label>
                    <div class="col-md-8 col-lg-9">
                        @if (Auth::user()->company)
                            <input name="company" type="text" class="form-control" id="company" value="{{Auth::user()->company}}">
                        @else
                            <input name="company" type="text" class="form-control" id="company">
                        @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Job</label>
                    <div class="col-md-8 col-lg-9">
                        @if (Auth::user()->job)
                            <input name="job" type="text" class="form-control" id="Job" value="{{Auth::user()->job}}">
                        @else
                            <input name="job" type="text" class="form-control" id="Job">
                        @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                    <div class="col-md-8 col-lg-9">
                        @if (Auth::user()->country)
                            <input name="country" type="text" class="form-control" id="Country" value="{{Auth::user()->country}}">
                        @else
                            <input name="country" type="text" class="form-control" id="Country">
                        @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                    <div class="col-md-8 col-lg-9">
                        @if (Auth::user()->address)
                            <input name="address" type="text" class="form-control" id="Address" value="{{Auth::user()->address}}">
                        @else
                            <input name="address" type="text" class="form-control" id="Address">
                        @endif
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                    <div class="col-md-8 col-lg-9">
                        @if (Auth::user()->phone)
                            <input name="phone" type="text" class="form-control" id="Phone" value="{{Auth::user()->phone}}">
                        @else
                            <input name="phone" type="text" class="form-control" id="Phone">
                        @endif

                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror

                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Phone" class="col-md-4 col-lg-3 col-form-label"></label>
                    <div class="col-md-8 col-lg-9">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </div>
                </form><!-- End Profile Edit Form -->

                @if(session('message_user'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('message_user')}}
                    </div>
                @endif

              </div>

              <div class="tab-pane @if(session('message_notify')) show active @endif fade pt-3" id="profile-settings">

                <!-- Settings Form -->
                <form method="POST" action="{{route('update_notify')}}">
                    @csrf
                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                    <div class="col-md-8 col-lg-9">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="newProducts" value="yes" name="new_product" @if (Auth::user()->product_notifycation) checked @endif>
                        <label class="form-check-label" for="newProducts">
                          Information on new products and services
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="proOffers" value="yes" name="new_promo" @if (Auth::user()->promo_notifycation) checked @endif >
                        <label class="form-check-label" for="proOffers">
                          Marketing and promo offers
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="securityNotify" value="yes" name="segurity" @if (Auth::user()->securiry_notifycation) checked @endif>
                        <label class="form-check-label" for="securityNotify">
                          Security alerts
                        </label>
                      </div>
                      <div class="mt-4">
                        <label class="" for="securityNotify"></label>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </div>
                  </div>

                  <div class="text-center">
                    
                  </div>
                </form><!-- End settings Form -->
                @if(session('message_notify'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('message_notify')}}
                    </div>
                @endif
              </div>

              <div class="tab-pane fade pt-3 @if(session('message_password') || session('error')) show active @endif" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="POST" action="{{route('update_password')}}" id="cambiar_contraseña">
                    @csrf

                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label" required>Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="view_password" type="password" class="form-control" id="currentPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label" required>New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="newPassword">
                    </div>
                  </div>

                    <div class="invalid-feedback d-block mb-4" id="validation_error" style="font-size: 14px;"></div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="password_confirmation" type="password" class="form-control" id="renewPassword">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label"></label>
                    <div class="col-md-8 col-lg-9">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </div>

                </form><!-- End Change Password Form -->
                @if(session('message_password'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('message_password')}}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('error')}}
                    </div>
                @endif
              </div>
            

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>

@endsection