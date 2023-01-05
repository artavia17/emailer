<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Emailer</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('img/favicon.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{asset('css/fonts.css')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
          <a href="{{route('home')}}" class="logo d-flex align-items-center">
            <img src="{{ asset('img/logo.png') }}" alt="">
            <span class="d-none d-lg-block">Emailer</span>
          </a>
          <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
          <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
              <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
              </a>
            </li><!-- End Search Icon-->

            <li class="nav-item dropdown">

              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" id="notify_boton">
                <i class="bi bi-bell"></i>
                <span class="badge bg-primary badge-number count_notify" >0</span>
              </a><!-- End Notification Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications border-0" id="drow_notify_content">
                <li class="dropdown-header">
                  You have <span class="mb-0 count_notify"> 0 </span> new notifications
                  <a href="#" id="limpiar_notificacion"><span class="badge rounded-pill bg-primary p-2 ms-2">Clear</span></a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <div id="notify_items">
                    {{-- Here notification --}}
                </div>
                <li class="dropdown-footer">
                  <a href="#">Show all notifications</a>
                </li>

              </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav -->

            {{-- <li class="nav-item dropdown">

              <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown" id="message_boton">
                <i class="bi bi-chat-left-text"></i>
                <span class="badge bg-success badge-number">3</span>
              </a><!-- End Messages Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages border-0" id="drow_message_content">
                <li class="dropdown-header">
                  You have 3 new messages
                  <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                  <a href="#">
                    <img src="{{asset('img/messages-1.jpg')}}" alt="" class="rounded-circle">
                    <div>
                      <h4>Maria Hudson</h4>
                      <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                      <p>4 hrs. ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                  <a href="#">
                    <img src="{{asset('img/messages-2.jpg')}}" alt="" class="rounded-circle">
                    <div>
                      <h4>Anna Nelson</h4>
                      <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                      <p>6 hrs. ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="message-item">
                  <a href="#">
                    <img src="{{asset('img/messages-3.jpg')}}" alt="" class="rounded-circle">
                    <div>
                      <h4>David Muldon</h4>
                      <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                      <p>8 hrs. ago</p>
                    </div>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li class="dropdown-footer">
                  <a href="#">Show all messages</a>
                </li>

              </ul><!-- End Messages Dropdown Items -->

            </li><!-- End Messages Nav --> --}}

            <li class="nav-item dropdown pe-3">

              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" id="drow_user">
                @if (Auth::user()->photo_profile == '' || Auth::user()->photo_profile == null)
                  <img src="{{asset('img/profile.png')}}" alt="Profile" class="rounded-circle">
                @else
                  <img src="{{Auth::user()->photo_profile}}" alt="Profile" class="rounded">
                @endif
                <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
              </a><!-- End Profile Iamge Icon -->

              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile border-0" id="drow_user_content">
                <li class="dropdown-header">
                  <h6>{{ Auth::user()->name }}</h6>
                  <span>{{ Auth::user()->job }}</span>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="{{route('mi-profile')}}">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                    <i class="bi bi-gear"></i>
                    <span>Account Settings</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                    <i class="bi bi-question-circle"></i>
                    <span>Need Help?</span>
                  </a>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li>
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>{{ __('Sign Out') }}</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </a>
                </li>

              </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

          </ul>
        </nav><!-- End Icons Navigation -->

      </header><!-- End Header -->

      <!-- ======= Sidebar ======= -->
      <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

          <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('home')}}">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          </li><!-- End Dashboard Nav -->

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>API Email</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{route('view_data_email')}}">
                  <i class="bi bi-circle"></i><span>My API</span>
                </a>
              </li>
              <li>
                <a href="{{route('create-api')}}">
                  <i class="bi bi-circle"></i><span>Setting SMTP</span>
                </a>
              </li>
            </ul>
          </li><!-- End Forms Nav -->

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-layout-text-window-reverse"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="{{route('view_messages_post')}}">
                    <i class="bi bi-circle"></i><span>Messages</span>
                  </a>
              </li>
              <li>
                <a href="{{route('my_form')}}">
                  <i class="bi bi-circle"></i><span>My forms</span>
                </a>
              </li>
              <li>
                <a href="{{route('create_form')}}">
                  <i class="bi bi-circle"></i><span>Create new</span>
                </a>
              </li>
            </ul>
          </li><!-- End Tables Nav -->

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-gem"></i><span>Chat box</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="charts-chartjs.html">
                  <i class="bi bi-circle"></i><span>Messages</span>
                </a>
              </li>
              <li>
                <a href="charts-apexcharts.html">
                  <i class="bi bi-circle"></i><span>My chat box</span>
                </a>
              </li>
              <li>
                <a href="charts-echarts.html">
                  <i class="bi bi-circle"></i><span>Create new</span>
                </a>
              </li>
            </ul>
          </li><!-- End Charts Nav -->

          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-person"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="user-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="charts-chartjs.html">
                  <i class="bi bi-circle"></i><span>View</span>
                </a>
              </li>
              <li>
                <a href="charts-apexcharts.html">
                  <i class="bi bi-circle"></i><span>Create new</span>
                </a>
              </li>
            </ul>
          </li><!-- End Charts Nav -->

          <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-in-right"></i>
                <span>{{ __('Sign Out') }}</span>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
          </li><!-- End Login Page Nav -->


        </ul>

      </aside><!-- End Sidebar-->


      <main id="main" class="main">
        @yield('content')
      </main><!-- End #main -->



    <!-- Scripts Template -->
    <script src="{{asset('vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('js/main.js')}}"></script>
    <script src="{{ asset('js/drow.js')}}"></script>
    <script src="{{ asset('js/notify.js')}}"></script>
    <script src="{{ asset('js/validation.js')}}"></script>
    <script src="{{ asset('js/create_file.js')}}"></script>

</body>
</html>
