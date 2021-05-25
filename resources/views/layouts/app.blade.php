<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>@yield('title')</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/laravel.png" />
  </head>
  <body>
    <?php if(Session::get('LoggIN')==0) {?>
        <script>
          window.location.href='{{url('')}}';
        </script>
    <?php } ?>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="{{ url('/home')}}">
            <img src="/images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="{{ url('/home')}}">
            <img src="laravel.png" alt="logo" />
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-speech"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                  <span class="badge badge-pill badge-primary float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                    <p class="font-weight-light small-text"> The meeting is cancelled </p>
                  </div>
                </a>
              </div>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <?php if(Session::get('LoggIN')== 1){ ?>
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <img class="img-xs rounded-circle ml-2" src="/images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal"> {{ Session::get('name') }} </span></a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                      <img class="img-md rounded-circle" src="/images/faces/face8.jpg" alt="Profile image">
                      <p class="mb-1 mt-3">{{ Session::get('name') }}</p>
                      <p class="font-weight-light text-muted mb-0">{{ Session::get('email') }}</p>
                    </div>
                    <a class="dropdown-item" href="/profile/{{ Session::get('email') }}"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                    <a class="dropdown-item" href="/logOUT" onclick="return confirm('Are you sure?');"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
                </div>
              <?php } ?>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <?php if(Session::get('LoggIN')== 1){ ?>
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="/images/faces/face8.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Session::get('name') }}</p>
                  <?php if(Session::get('level')== 1){ ?>
                    <p class="designation">Administrator</p>
                  <?php } elseif(Session::get('level')== 0){ ?>
                    <p class="designation">Employee</p>
                  <?php } elseif(Session::get('level')== 2){ ?>
                    <p class="designation">Manager</p>
                  <?php } ?>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
                <?php } ?>
              </a>
            </li>
            <?php if(Session::get('level')== 1){ ?>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/home')}}">
                  <span class="menu-title">Dashboard</span>
                  <i class="icon-screen-desktop menu-icon"></i>
                </a>
              </li>
              @guest
                <?php if ( Session::get('level') == 1){ ?>
                  @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                          <span class="menu-title">{{ __('Register') }}</span>
                          <i class="icon-plus menu-icon"></i>
                        </a>
                    </li>
                  @endif
                <?php } ?>
              @endguest
              <li class="nav-item">
                <a class="nav-link" href="/profile/{{ Session::get('email') }}">
                  <span class="menu-title">Profile</span>
                  <i class="icon-user menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/table')}}">
                  <span class="menu-title">Inventory</span>
                  <i class="icon-folder-alt menu-icon"></i>
                </a>
              </li>
            <?php } elseif(Session::get('level')== 0){ ?>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/home')}}">
                  <span class="menu-title">Dashboard</span>
                  <i class="icon-screen-desktop menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/table')}}">
                  <span class="menu-title">Inventory</span>
                  <i class="icon-folder-alt menu-icon"></i>
                </a>
              </li>
            <?php } elseif(Session::get('level')== 2){ ?>
              <li class="nav-item">
                <a class="nav-link" href="/profile/{{ Session::get('email') }}">
                  <span class="menu-title">Profile</span>
                  <i class="icon-user menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/table')}}">
                  <span class="menu-title">Inventory</span>
                  <i class="icon-folder-alt menu-icon"></i>
                </a>
              </li>
              <li class="nav-item nav-category">
                <span class="nav-link">Dashboard</span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/home')}}">
                  <span class="menu-title">Dashboard</span>
                  <i class="icon-screen-desktop menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/table')}}">
                  <span class="menu-title">Inventory</span>
                  <i class="icon-folder-alt menu-icon"></i>
                </a>
              </li>
              <li class="nav-item nav-category"><span class="nav-link">UI Elements</span></li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">Basic UI Elements</span>
                  <i class="icon-layers menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/icons/simple-line-icons.html">
                  <span class="menu-title">Icons</span>
                  <i class="icon-globe menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/forms/basic_elements.html">
                  <span class="menu-title">Form Elements</span>
                  <i class="icon-book-open menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/charts/chartist.html">
                  <span class="menu-title">Charts</span>
                  <i class="icon-chart menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/tables/basic-table.html">
                  <span class="menu-title">Tables</span>
                  <i class="icon-grid menu-icon"></i>
                </a>
              </li>
              <li class="nav-item nav-category"><span class="nav-link">Sample Pages</span></li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                  <span class="menu-title">General Pages</span>
                  <i class="icon-doc menu-icon"></i>
                </a>
                <div class="collapse" id="auth">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
                  </ul>
                </div>
              </li>
            <?php } ?>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © TUBES_PI.com 2020</span>
              <!-- <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span> -->
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
