<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.css"/>
    <link rel="stylesheet" href="/css/material-dashboard.css"/>

    <!-- Bootstrap Js -->
    <script src="/js/bootstrap.js"></script>

  </head>
  <body>
    <!-- biarin saja -->
    <?php
    if(Session::get('LoggIN')==0)
    {?>
      <script>
        window.location.href='{{url('')}}';
      </script>
    <?php } ?>
    <!-- sampai sne -->
    <body class="">
      <!-- Extra details for Live View on GitHub Pages -->
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->
      <div class="wrapper ">
        <?php if(Session::get('level')== 1){ ?>
          <div class="sidebar" data-color="purple" data-background-color="white" data-image="/img/sidebar-1.jpg">
          <div class="logo"><a href="{{ url('/home')}}" class="simple-text logo-normal">
              Administrator
          </a></div>
        <?php } elseif(Session::get('level')== 0){ ?>
          <div class="sidebar" data-color="purple" data-background-color="white" data-image="/img/sidebar-2.jpg">
          <div class="logo"><a href="{{ url('/home')}}" class="simple-text logo-normal">
              Employee
          </a></div>
        <?php } elseif(Session::get('level')== 2){ ?>
          <div class="sidebar" data-color="purple" data-background-color="white" data-image="/img/sidebar-3.jpg">
          <div class="logo"><a href="{{ url('/home')}}" class="simple-text logo-normal">
              Manager
          </a></div>
        <?php } ?>
        <?php if(Session::get('level')== 1){ ?>
          <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y">
            <ul class="nav">
              <li class="nav-item active  ">
                <a class="nav-link" href="{{ url('/home')}}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/profile/{{ Session::get('email') }}">
                  <i class="material-icons">person</i>
                  <p>User Profile</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{ url('/table')}}">
                  <i class="material-icons">content_paste</i>
                  <p>Table List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./typography.html">
                  <i class="material-icons">library_books</i>
                  <p>Typography</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./icons.html">
                  <i class="material-icons">bubble_chart</i>
                  <p>Icons</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./map.html">
                  <i class="material-icons">location_ons</i>
                  <p>Maps</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./notifications.html">
                  <i class="material-icons">notifications</i>
                  <p>Notifications</p>
                </a>
              </li>
            </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
              <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 425px; right: 0px;">
              <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 368px;"></div></div>
          </div></div>
          <div class="main-panel ps-container ps-theme-default">
        <?php } elseif(Session::get('level')== 0){ ?>
          <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y">
            <ul class="nav">
              <li class="nav-item active  ">
                <a class="nav-link" href="{{ url('/home')}}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/profile/{{ Session::get('email') }}">
                  <i class="material-icons">person</i>
                  <p>User Profile</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{ url('/table')}}">
                  <i class="material-icons">content_paste</i>
                  <p>Table List</p>
                </a>
              </li>
            </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
              <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 425px; right: 0px;">
              <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 368px;"></div></div>
          </div></div>
          <div class="main-panel ps-container ps-theme-default">
        <?php } elseif(Session::get('level') == 2){ ?>
          <div class="sidebar-wrapper ps-container ps-theme-default ps-active-y">
            <ul class="nav">
              <li class="nav-item active  ">
                <a class="nav-link" href="{{ url('/home')}}">
                  <i class="material-icons">dashboard</i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="/profile/{{ Session::get('email') }}">
                  <i class="material-icons">person</i>
                  <p>User Profile</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{ url('/table')}}">
                  <i class="material-icons">content_paste</i>
                  <p>Table List</p>
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="./typography.html">
                  <i class="material-icons">library_books</i>
                  <p>Typography</p>
                </a>
              </li>
            </ul>
            <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
              <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>
            <div class="ps-scrollbar-y-rail" style="top: 0px; height: 425px; right: 0px;">
              <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 368px;"></div></div>
          </div></div>
          <div class="main-panel ps-container ps-theme-default">
        <?php } ?>
          <!-- Navbar -->
          <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                <a class="navbar-brand" href="javascript:;">Dashboard<div class="ripple-container"></div></a>
              </div>
              <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                  <!-- <li class="nav-item">
                    <a class="nav-link" href="javascript:;">
                      <i class="material-icons">dashboard</i>
                      <p class="d-lg-none d-md-block">
                        Stats
                      </p>
                    </a>
                  </li> -->
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">notifications</i>
                      <span class="notification">5</span>
                      <p class="d-lg-none d-md-block">
                        Some Actions
                      </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="#">Mike John responded to your email</a>
                      <a class="dropdown-item" href="#">You have 5 new tasks</a>
                      <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                      <a class="dropdown-item" href="#">Another Notification</a>
                      <a class="dropdown-item" href="#">Another One</a>
                    </div>
                  </li>
                  <?php if(Session::get('LoggIN')== 1){ ?>
                  <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="material-icons">person</i>
                      <p class="d-lg-none d-md-block">
                        Account
                      </p>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                      <a class="dropdown-item" href="#">{{ Session::get('name') }}</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/logOUT">Log out</a>
                    </div>
                  </li>
                  <?php } ?>
                  <form class="navbar-form">
                    <span class="bmd-form-group"><div class="input-group no-border">
                      <input type="text" value="" class="form-control" placeholder="Search...">
                      <button type="submit" class="btn btn-white btn-round btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                      </button>
                    </div></span>
                  </form>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                  @guest
                    <?php if ( Session::get('level') == 1){ ?>
                      @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                      @endif
                    <?php } ?>
                  @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                  @endguest
                </ul>
              </div>
            </div>
          </nav>
          <!-- End Navbar -->
          <div class="content">
            <div class="container-fluid">
              <!-- <div class="alert alert-success" role="alert">
                @yield('content_data')
              </div> -->
              @yield('content')
            </div>
          </div>

          <footer class="footer">
            <div class="container-fluid">
            <nav class="float-left">
              <ul>
                <li>
                  <a href="#">
                    Testing Footer
                  </a>
                </li>
                <li>
                  <a href="#">
                    About Us
                  </a>
                </li>
                <li>
                  <a href="#">
                    Blog
                  </a>
                </li>
                <li>
                  <a href="#">
                    Licences
                  </a>
                </li>
              </ul>
            </nav>
            <div class="copyright float-right">
              ©
              <script>
                document.write(new Date().getFullYear())
              </script>-2021, made with <i class="material-icons">favorite</i> by
              <a href="#" target="_blank">Laravel</a> for a better web.
            </div>
            </div>
          </footer>
          <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
        </div>

  <!--   Core JS Files   -->
  <script src="/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="/js/core/popper.min.js" type="text/javascript"></script>
  <script src="/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <!-- Plugin for the Perfect Scrollbar -->
  <script src="/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="/js/plugins/jquery.validate.min.js"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="/js/plugins/bootstrap-selectpicker.js" ></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="/js/plugins/jquery.datatables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="/js/plugins/nouislider.min.js" ></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script  src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/js/material-dashboard.min.js?v=2.1.2" type="text/javascript"></script>

  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  -->

  </body>
</html>
