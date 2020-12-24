@extends('app_layouts.master')
@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  
<h2>Add Supplier Page</h2>

<form id="supplier_display" method="post" action="/add_supplier"  enctype="multipart/form-data">
    <div class="form-group">
      <label for="supplier_name">Supplier Name</label>
      <input type="text" class="form-control" value="{{old('supplier_name')}}" id="supplier_name" placeholder="supplier_name" name="supplier_name">
        <div class="card-body">
      @if($errors->any('supplier_name'))
      <button type="button" class="btn btn-danger swalDefaultError">
                 {{$errors->first('supplier_name')}}
                </button>
      <span class="text-danger"></span>
      @endif
        </div>
    </div>
    <div class="form-group mb-3">
      <label for="supplier_mobile">Mobile</label>
      <input type="text" class="form-control" value="{{old('supplier_mobile')}}" id="" placeholder="supplier_mobile" name="supplier_mobile">
      @if($errors->any('supplier_mobile'))
      <span class="text-danger">{{$errors->first('supplier_mobile')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="supplier_phone">Phone</label>
      <input type="text" class="form-control" value="{{old('supplier_phone')}}" id="supplier_phone" placeholder="supplier_phone " name="supplier_phone">
      @if($errors->any('supplier_phone'))
      <span class="text-danger">{{$errors->first('supplier_phone')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="supplier_email">Email</label>
      <input type="email" class="form-control" value="{{old('supplier_email')}}" id="supplier_email" placeholder="supplier_email" name="supplier_email">
      @if($errors->any('supplier_email'))
      <span class="text-danger">{{$errors->first('supplier_email')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="supplier_photo">Photo</label>
      <input type="file" class="form-control"  id="supplier_photo" placeholder="supplier_photo" name="supplier_photo">
     @if($errors->any('supplier_photo'))
      <span class="text-danger">{{$errors->first('supplier_photo')}}</span>
      @endif 
    </div>
    <div class="form-group mb-3">
      <label for="supplier_address">Address</label>
      <input type="text" class="form-control" value="{{old('supplier_address')}}" id="supplier_address" placeholder="supplier_address" name="supplier_address">
      @if($errors->any('supplier_address'))
      <span class="text-danger">{{$errors->first('supplier_address')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="supplier_acc_no">Supplier Account No.</label>
      <input type="text" class="form-control" value="{{old('supplier_acc_no')}}" id="supplier_acc_no" placeholder="supplier_acc_no" name="supplier_acc_no">
      @if($errors->any('supplier_acc_no'))
      <span class="text-danger">{{$errors->first('supplier_acc_no')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="create_date">Date Added</label>
      <input type="date" class="form-control" value="{{old('create_date')}}" id="create_date" placeholder="create_date" name="create_date">
      @if($errors->any('create_date'))
      <span class="text-danger">{{$errors->first('create_date')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
    <label for="supplier_service">Service</label>
    <select class="form-control col-2   mx-5 d-inline-block select2" name="supplier_service" multiple="multiple" id="dropselect" placeholder="select service" style="width: 100%;">
    <option value="">select service</option>
                @if(count($services))
                      @foreach($services as $service)

                      <option  value="{{$service->ser_id}}">{{$service->ser_name}}</option>

                      @endforeach
                  @endif
              
                  
                </select>
                </div>
               
                
    <div class="form-group mb-3">
      <label for="supplier_remark">Remark</label>
      <textarea class="form-control" name="supplier_remark" id="supplier_remark"></textarea>
    </div>
    <div class="form-group mb-3">
      <label for="supplier_currency">Select currency</label>
     <select name="supplier_currency" id="">
     <option value="USD">USD</option>
     <option value="SR">SR</option>
     <option value="YR">YR</option>
     </select>
    <!-- @if($errors->any('is_active'))
      <span class="text-danger">{{$errors->first('is_active')}}</span>
      @endif -->
    </div>
    <div class="form-group mb-3">
      <label for="is_active">is_active</label>
     <select name="is_active" id="">
     <option value=1>1</option>
     <option value=0>2</option>
     
     </select>
     @if($errors->any('is_active'))
      <span class="text-danger">{{$errors->first('is_active')}}</span>
      @endif
    </div>
   
    <button type="submit" class="btn btn-primary">send</button>
   
  </form>  
  <script>
    $('#supplier_display').on('submit',function(e){
         e.preventDefault();
         $.ajax({
             type:'post',
             url:'/addSupplier',
             data:$('#supplier_display').serialize(),
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


