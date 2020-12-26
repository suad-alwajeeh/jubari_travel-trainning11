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
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset("assets/plugins/select2/css/select2.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
 
  <link rel="stylesheet" href="{{asset("assets/css/adminlte.min.css")}}">
  <link rel="stylesheet" href="{{asset("assets/css/ourstyle.css")}}">
</head>
<body class="hold-transition sidebar-mini" onload="test()">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('includes.header')

  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('includes.sidebar')



  @yield('main_content')

  @include('includes.footer')
 



  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="{{asset("assets/plugins/jquery/jquery.min.js")}}"></script>

<script src="{{asset("assets/js/pages/dashboard2.js")}}"></script>
<script src="{{asset("assets/plugins/select2/js/select2.full.min.js")}}"></script>
<script src="{{asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>

<!-- AdminLTE App -->
<script src="{{asset("assets/js/adminlte.min.js")}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset("assets/js/demo.js")}}"></script>
<script>
$(document).ready(function(){
  var get_image={{ Auth::user()->id }};
  
  $.ajax({
url:'/user_profile/'+get_image,
type:'get',
dataType:'json',
success:function(response){
  
  if(response.length==0){
    console.log("not found thing");
  }else{
    console.log(response[0]);
   // alert(response[0].e_photo);
    var img=response[0].e_photo;
    var name=response[0].ef_name +' '+response[0].em_name;
   $('#su_user_image').html('<img src="img/users/'+img+'"  class="img-circle elevation-2" alt="User Image">');
   $('#su_user_name').text(name);}
}
});
})
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
    </script>
       
</body>
</html>
