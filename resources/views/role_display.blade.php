@extends('app_layouts.master')
@section('main_content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  <div class="row">
  <div class="col-12">
  <h1 class="text-center">display roles</h1>
  </div>
  
<div class="container">            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>role_name</th>
        <th>role_status</th>
        <th>created_date</th>
        <th>opration</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
      <tr id="tr{{$item->id}}" >
      <td>{{$item->id}}</td>
      <td>{{$item->display_name}}</td>
      <td>
      @if($item->is_active == 0)
      
      <div class="form-group">
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                      <input onclick="myFunction{{$item->id}}()" type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}">
                      <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                      
                    </div>
                  </div>
                  @elseif($item->is_active == 1)
                  <div class="form-group">
                    <div  class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger ">
                      <input onclick="myFunction{{$item->id}}()" checked type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}">
                      <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                    </div>
                  </div>

@endif

      </td>
      <td>{{$item->created_at}}</td>
        <td>
        <div class="btn-group btn-group-sm">
  <a type="button" class="btn btn-success" href="{{ url('role_edit/'.$item->id) }}"><i class="fas fa-pencil-alt "></i></a>
  <a type="button" class="btn btn-danger"  onclick="delete{{$item->id}}()" ><i class="fas fa-trash "></i></a>
</div>
        </td>
      </tr>
      <script>
function myFunction{{$item->id}}() {
  var checkBox{{$item->id}} = document.getElementById("customSwitch{{$item->id}}");
  
  if (checkBox{{$item->id}}.checked == true){
    $.ajax({
             type:'get',
             url:'/is_active/'+{{$item->id}},
             data:{id:{{$item->id}}},
             success:function(response){console.log(response);
            // alert("data saved");
             },
             error:function(error){console.log(error);
            // alert("data dont saved");
             } 
         });
  } else{
    $.ajax({
             type:'get',
             url:'/no_active/'+{{$item->id}},
             data:{id:{{$item->id}}},
             success:function(response){console.log(response);
            // alert("data saved");
             },
             error:function(error){console.log(error);
            // alert("data dont saved");
             } 
         });
}
}

function delete{{$item->id}}() {
 
       $.ajax({
             type:'get',
             url:'/role_delete/'+{{$item->id}},
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
