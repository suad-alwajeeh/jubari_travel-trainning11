@extends('app_layouts.master')
@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  
<h2>add airline Form</h2>
<!--form action="airline_display1" method="post"-->
<form id="airline_display" method="post" action="/addairline" >
    <div class="form-group">
      <label for="email">code</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="airline_code">
    </div>
    <div class="form-group mb-3">
      <label for="pwd">airline</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="airline">
    </div>
    <div class="form-group mb-3">
      <label for="pwd">country</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="country">
    </div>
    <div class="form-group mb-3">
      <label for="pwd">carrier_code</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="carrier_code">
    </div>
    <div class="form-group mb-3">
      <label for="pwd">code</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="code">
    </div>
    <div class="form-group mb-3">
      <label for="pwd">IATA</label>
      <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="IATA">
    </div>
    <div class="form-group mb-3">
      <label for="pwd">	remark</label>
      <textarea name="remark" id="" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group mb-3">
      <label for="pwd">is active</label>
     <select name="is_active" id="">
     <option value=1>1</option>
     <option value=0>2</option>
     </select>
    </div>
   
    <button type="submit" class="btn btn-primary">send</button>
   
  </form>  
  <script>
    $('#airline_display1').on('submit',function(e){
         e.preventDefault();
         $.ajax({
             type:'post',
             url:'/addairline',
             data:$('#airline_display1').serialize(),
             success:function(response){console.log(response);
             alert("data saved");
             },
             error:function(error){console.log(error);
             alert("data dont saved");
             } 
         });

    });
  </script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

  </div>
  </div>
  @endsection


