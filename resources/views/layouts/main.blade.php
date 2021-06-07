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
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="/laravel.png" />
  </head>
  <body>
    <?php if(Session::get('LoggIN')==1)
      Session::flush();
    ?>
    <div class="container-scroller bgmain">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- container-scroller -->
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script src="/vendors/js/vendor.bundle.base.js"></script>
  	<script src="/vendors/tilt/tilt.jquery.min.js"></script>
  	<script>
  		$('.js-tilt').tilt({
  			scale: 1.1
  		})
  	</script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="/js/off-canvas.js"></script>
    <script src="/js/rememberme.js"></script>
    <script src="/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
