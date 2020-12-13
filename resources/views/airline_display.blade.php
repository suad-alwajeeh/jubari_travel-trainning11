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
      <tr id="tr{{$item->id}}" >
      <td>{{$item->airline_code}}</td>
      <td>{{$item->airline_name}}</td>
      <td>{{$item->country}}</td>
        <td>
        <div class="btn-group btn-group-sm">
  <a type="button" class="btn btn-success" href="{{ url('airline_edit/'.$item->id) }}"><i class="fas fa-pencil-alt "></i></a>
  <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" ><i class="fas fa-trash "></i></a>
</div>
     <!-- The Modal -->
     <div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <h4 class="modal-title">are you sure ,you want delete row?</h4>

      <a onclick="delete{{$item->id}}()" type="button" class="btn btn-danger" data-dismiss="modal">yes</a>
      </div>
   </div>
  </div>
</div>
        </td>
      </tr>
      <script>
      
function delete{{$item->id}}() {
 
 $.ajax({
       type:'get',
       url:'/airline_delete/'+{{$item->id}},
       data:{id:{{$item->id}}},
       success:function(response){console.log(response);
        document.getElementById('tr{{$item->id}}').style.display ='none';
       },
       error:function(error){console.log(error);
       } 
   });
} 

</script>
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
