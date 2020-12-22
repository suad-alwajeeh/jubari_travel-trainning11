@extends('app_layouts.master')
@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  
<h2>add advertisement page</h2>
<!--form action="airline_display1" method="post"-->
@foreach($errors->all() as $er)
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
{{$er}}
</div>
@endforeach
<form id="" method="post" action="/editadds" >
@csrf
@foreach($data as $item)

    <div class="form-group mb-3">
      <label for="pwd">advertisements_title</label>
      <input type="text" class="form-control" value="{{$item->adds_name}}" placeholder="adds_name" name="adds_name">
    </div>
    <div class="form-group mb-3">
    <input type="text" hidden="hidden" value="{{$item->how_create_it}}" class="form-control" id="how_create_it" placeholder="how_create_it" name="how_create_it">
    <input type="text" hidden="hidden" value="{{$item->id}}" class="form-control" id="id" placeholder="id" name="id">
    </div>
    <div class="form-group mb-3">
      <label for="adds_text">advertisements_content</label>
      <textarea class="form-control" name="adds_text" id="adds_text">
      {{$item->adds_text}}
      </textarea>
    </div>
    <div class="form-group mb-3">
      <label for="adds_type">advertisements_type</label>
     <select class="form-control" name="adds_type" id="">
     <option value=1>for all</option>
     <option value=2>special users</option>
     </select>
    </div>
    <div class="form-group mb-3">
      <label for="is_active">is_active</label>
     <select class="form-control" name="is_active" id="">
     <option value=1>yes</option>
     <option value=0>no</option>
     </select>
    </div>
   
    <button type="submit" class="btn btn-primary">send</button>
    @endforeach

  </form>  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

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

  </div>
  </div>
  @endsection