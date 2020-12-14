@extends('app_layouts.master')
@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  <div class="row">
  <div class="col-10">
  <h1 class="text-center">display advertisements	</h1>
  </div>
  <div class="col-2">
  <div class="dropdown">
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      status 
    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="/adds_display">all</a>
      <a class="dropdown-item " href="/adds_display/1"> Active</a>
      <a class="dropdown-item " href="/adds_display/0">No Active</a>
    </div>
  </div>
</div>
  
<div class="container">            
  <table class="table table-striped" id="table">
    <thead>
      <tr>
        <th>#</th>
        <th>adds_name</th>
        <th>adds_type</th>
        <th>created_date</th>
        <th>adds_status</th>
        <th>opration</th>
      </tr>
    </thead>
    <tbody id="pp">
    @foreach($data as $item)
      <tr id="tr{{$item->id}}" class="status{{$item->is_active}}" >
      <td>{{$item->id}}</td>
      <td>{{$item->adds_name}}</td>
      <td>
      @if($item->adds_type == 1)
        <p class="">public</p>
        @elseif($item->adds_type ==2)
        <p class="">private</p>
      @endif
      </td>
      <td>{{$item->created_at}}</td>

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
        <td>
        @if($item->adds_type == 1)
        <div class="btn-group btn-group-sm">
  <a type="button" class="btn btn-success" href="{{ url('adds_edit/'.$item->id) }}"><i class="fas fa-pencil-alt "></i></a>
  <a type="button" class="btn btn-danger"  onclick="delete{{$item->id}}()" ><i class="fas fa-trash "></i></a>
</div>
@elseif($item->adds_type == 2)
<div class="btn-group btn-group-sm">
  <a type="button" class="btn btn-success" href="{{ url('adds_edit/'.$item->id) }}"><i class="fas fa-pencil-alt "></i></a>
  <a type="button" class="btn btn-danger"  onclick="delete{{$item->id}}()" ><i class="fas fa-trash "></i></a>
  <a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#myModal"><i class="fas fa-paper-plane "></i></a>
</div>
@endif
        </td>
      </tr>
      <!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">choiese users</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="form-group">
  <label for="sel1">department filter:</label>
  <select class="form-control" onchange="dep_select()" id="selectdep">
    <option>all</option>
    @foreach($data1 as $item2) 
    <option value="{{$item2->id}}">{{$item2->name}}</option>
    @endforeach
    </select>
    <div class="">
    <div class="form-group border-1">
                    <div  class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger dep4">
                      <input onclick="myFunction{{$item->id}}()" checked type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}">
                      <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                    </div>
                    <div  class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger dep4">
                      <input onclick="myFunction{{$item->id}}()" checked type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}">
                      <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                    </div>
                    <div  class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger dep2">
                      <input onclick="myFunction{{$item->id}}()" checked type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}">
                      <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                    </div>
                    <div  class="custom-control custom-switch custom-switch-on-success custom-switch-off-danger dep4">
                      <input onclick="myFunction{{$item->id}}()" checked type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}">
                      <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                    </div>
                  </div>

    </div>
    
      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

      </div>
   </div>
  </div>
</div>

      <script>
     function dep_select(){
     var m= $("#selectdep").val();
     if(m==1){
      $('.dep4').css('display','none');
        }
     }
function myFunction{{$item->id}}() {
  var checkBox{{$item->id}} = document.getElementById("customSwitch{{$item->id}}");
  
  if (checkBox{{$item->id}}.checked == true){
    $.ajax({
             type:'get',
             url:'/is_active_adds/'+{{$item->id}},
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
             url:'/no_active_adds/'+{{$item->id}},
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
             url:'/adds_delete/'+{{$item->id}},
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
