@extends('app_layouts.master')
@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  
<h2>add user page</h2>
<!--form action="airline_display1" method="post"-->
@foreach($errors->all() as $er)
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
{{$er}}
</div>
@endforeach
<form id="" method="post" action="/adduser" >
@csrf
<div class="form-group mb-3">
      <label for="is_active">department</label>
     <select class="form-control" name="dept" onchange="dep_select()" id="department">
     <option class="" >choice department</option>
     @foreach($data1 as $item1)
     <option value="dep{{$item1->id}}">{{$item1->name}}</option>
     <script>
   function dep_select(){
     var m= $("#department").val();
     $('.so_emp').css('display','none');
     $('.'+m).css('display','block');
     }
  </script>
     @endforeach
     </select>
    </div>
    <div class="form-group mb-3">
      <label for="is_active">employee</label>
     <select class="form-control" name="emp_id" id="">
     @foreach($data as $item)
     <option class="so_emp" value="0">choice employee</option>
     <option class="so_emp dep{{$item->dept_id}}" value="{{$item->emp_id}}">{{$item->emp_first_name}} {{$item->emp_middel_name}} {{$item->emp_last_name}}</option>
     @endforeach
     </select>
    </div>
    <div class="form-group mb-3">
      <label for="pwd">user_name</label>
      <input type="text" class="form-control" id="" placeholder="name" name="name">
    </div>
    <div class="form-group mb-3">
      <input type="text" hidden="hidden" value="1" class="form-control" id="how_create_it" placeholder="how_create_it" name="how_create_it">
    </div>
    <div class="form-group mb-3">
      <label for="adds_text">user_email</label>
      <input type="email" class="form-control" id="" placeholder="name" name="email">
    </div>
    <div class="form-group mb-3">
      <label for="adds_type">user_password</label>
      <input type="text" class="form-control" id="" placeholder="name" name="password">
    </div>
    <div class="form-group mb-3">
      <label for="is_active">is_active</label>
     <select class="form-control" name="is_active" id="">
     <option value=1>yes</option>
     <option value=0>no</option>
     </select>
    </div>
   
    <button type="submit" class="btn btn-primary">send</button>
   
  </form>  

  

  </div>
  </div>
  @endsection


