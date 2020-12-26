@extends('app_layouts.master')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  <div class="row">
  <div class="col-10">
  <h1 class="text-center">display user roles</h1>
  </div>
  <div class="col-2">
  <a type="button" href="/add_role_user" class="btn btn-secondary">add role to user</a>
</div>
  </div>
  
<div class="container">            
  <table class="table table-striped" >
    <thead>
      <tr>
        <th>#</th>
        <th>user_name</th>
        <th>roles</th>
        <th>opration</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
      <tr id="tr{{$item->u_id}}{{$item->r_id}}" >
      <td>{{$item->u_id}}</td>
      <td>{{$item->u_name}}</td>
      <td>
     {{$item->r_name}}
      </td>
        <td>
        <div class="btn-group btn-group-sm">
  <a type="button" class="btn btn-danger"  onclick="delete{{$item->u_id}}{{$item->r_id}}()" ><i class="fas fa-trash "></i></a>
</div>
        </td>
      </tr>
      <script>


function delete{{$item->u_id}}{{$item->r_id}}() {
 
       $.ajax({
             type:'get',
             url:'/user_role_delete/'+{{$item->u_id}}+'/'+{{$item->r_id}},
             data:{u_id:{{$item->u_id}},r_id:{{$item->r_id}}},
             success:function(response){console.log(response);
              document.getElementById('tr{{$item->u_id}}{{$item->r_id}}').style.display ='none';
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
