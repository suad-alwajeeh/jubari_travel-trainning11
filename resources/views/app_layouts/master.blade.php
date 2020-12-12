<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>JUBARI_TRAVEL SYSTEM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/css/adminlte.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/ourstyle.css")}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('includes.header')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('includes.sidebar')



  @yield('main_content')

  @include('includes.footer')



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="{{asset("assets/plugins/jquery/jquery.min.js")}}"></script>
<script src="{{asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("assets/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("assets/js/demo.js")}}"></script>
</body>
</html>
