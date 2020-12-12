@extends('app_layouts.master')
@section('main_content')





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  <div class="row">
  <div class="col-12">
  <h1 class="text-center">display airline</h1>
  </div>
  
<div class="container">            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>airline_code</th>
        <th>name</th>
        <th>country</th>
        <th>opration</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
      <tr>
      <td>{{$item->airline_code}}</td>
      <td>{{$item->airline_name}}</td>
      <td>{{$item->country}}</td>
        <td>
        <div class="btn-group btn-group-sm">
  <a type="button" class="btn btn-success" href="{{ url('airline_edit/'.$item->id) }}"><i class="fas fa-pencil-alt "></i></a>
  <a type="button" class="btn btn-danger" href="{{ url('airline_delete/'.$item->id) }}"><i class="fas fa-trash "></i></a>
</div>
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>
  </div>
  </div>
  </div>
  <!-- /.content-wrapper -->
@endsection
