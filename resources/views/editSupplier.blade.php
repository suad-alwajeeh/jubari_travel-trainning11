@extends('app_layouts.master')
@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  
<h2>edit airline page</h2>
<!--form action="airline_display1" method="post"-->
<form id="supplier_edit" method="post" action="/edit_supplier"  enctype="multipart/form-data">
@foreach($data as $item)

    <div class="form-group">
      <label for="supplier_name">Supplier Name</label>
      <input type="text" value="{{$item->supplier_name}}" class="form-control" id="supplier_name" placeholder="Enter Supplier Name:" name="supplier_name">
    </div>
    <div class="form-group mb-3">
    <label for="supplier_mobile">Mobile</label>
      <input type="number" value="{{$item->supplier_mobile}}"  class="form-control" id="" placeholder="supplier_mobile" name="supplier_mobile">
    </div>
    <div class="form-group mb-3">
    <label for="supplier_phone">Phone</label>
      <input type="number" value="{{$item->supplier_phone}}"  class="form-control" id="supplier_phone" placeholder="supplier_phone" name="supplier_phone">
    </div>
    <div class="form-group mb-3">
      <input type="hidden" value="{{$item->s_no}}"  class="form-control" id="s_no" placeholder="s_no" name="s_no">
    </div>
    <div class="form-group mb-3">
      <label for="supplier_email">Email</label>
      <input type="email" value="{{$item->supplier_email}}"  class="form-control" id="supplier_email" placeholder="supplier_email" name="supplier_email">
    </div>
    <div class="form-group mb-3">
      <label for="supplier_photo">Photo</label>
      <input type="file" value="{{$item->supplier_photo}}"  class="form-control" id="supplier_photo" placeholder="supplier_photo" name="supplier_photo">
    </div>
    <div class="form-group mb-3">
      <label for="supplier_address">Address</label>
      <input type="text" value="{{$item->supplier_address}}"  class="form-control" id="supplier_address" placeholder="supplier_address" name="supplier_address">
    </div>
    <div class="form-group mb-3">
      <label for="supplier_acc_no">Supplier Account No.</label>
      <input type="number" value="{{$item->supplier_acc_no}}"  class="form-control" id="supplier_acc_no" placeholder="supplier_acc_no" name="supplier_acc_no">
    </div>
    <div class="form-group mb-3">
      <label for="create_date">Date Added</label>
      <input type="date" value="{{$item->create_date}}"  class="form-control" id="create_date" placeholder="create_date" name="create_date">
    </div>
    <div class="form-group mb-3">
      <label for="supplier_remark">Remark</label>
      <textarea class="form-control" name="supplier_remark" id="supplier_remark"> 
      {{$item->supplier_remark}}
      </textarea>
    </div>
    <div class="form-group mb-3">
      <label for="is_active">is_active</label>
     <select name="is_active" id="">
     <option value=1>1</option>
     <option value=0>2</option>
     </select>
    </div>
   
    <button type="submit" class="btn btn-primary">send</button>
    @endforeach

  </form>  
  <script>
    $('#supplier_display1').on('submit',function(e){
         e.preventDefault();
         $.ajax({
             type:'post',
             url:'/addsupplier',
             data:$('#supplier_display1').serialize(),
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


