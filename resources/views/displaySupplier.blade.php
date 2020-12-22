@extends('app_layouts.master')
@section('main_content')





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  <div class="row">
  <div class="col-12">
  <h1 class="text-center">Display Suppliers</h1>
</div>
 
<div class="col-10">
  <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      Filter 
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/displaySupplier">all</a>
      <a class="dropdown-item " href="/displaySupplier/1"> Active</a>
      <a class="dropdown-item " href="/displaySupplier/0">No Active</a>
    </div>

  </div>
 
 
  
    
 
</div>
<div class="col-2">
<a type="button" class="btn btn-success" href="{{ url('/addSupplier') }}"> Add Supplier</a>
  
    
    
</div>
  </div>
  <br>
<div class="container">            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Supplier Name</th>
        <th>Mobile</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Photo</th>
        
        <th>Account No.</th>
        <th>Operations</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
      <tr>
      <td>{{$item->s_no}}</td>
      <td>{{$item->supplier_name}}</td>
      <td>{{$item->supplier_mobile}}</td>
      <td>{{$item->supplier_phone}}</td>
      <td>{{$item->supplier_email}}</td>
      <td>{{$item->supplier_photo}}</td>
      
      <td>{{$item->supplier_acc_no}}</td>
        <td>
        <div class="btn-group btn-group-sm">
  <a type="button" class="btn btn-success" href="{{ url('editSupplier/'.$item->s_no) }}"><i class="fas fa-pencil-alt "></i></a>
  <a type="button" class="btn btn-danger" href="{{ url('deleteSupplier/'.$item->s_no) }}"><i class="fas fa-trash "></i></a>
</div>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
  {{$data->links()}}

  
</div>
  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
