@extends('app_layouts.master')
@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  <div class="row">
  <div class="col-10">
  <h1 class="text-center">send advertisements to users	</h1>
  </div>
  
</div>
  
<div class="container">            

<div class="opp col-12" for="sel1">employee how send to :
      </br>
      @foreach($data as $item) 
      <input id="gg" hidden="hidden" value="{{$item->id}}">
@endforeach
      @foreach($data1 as $item1) 
        <div style="float:left" id="me{{$item1->au_id}}" class="alert alert-success ">{{$item1->u_name}} <button type="button" class="close" onclick="delete{{$item1->au_id}}()">&times;</button></div> 
       <script>
        function delete{{$item1->au_id}}() {
 
 $.ajax({
       type:'get',
       url:'/adds_user_delete/'+{{$item1->au_id}},
       data:{id:{{$item1->au_id}}},
       success:function(response){console.log(response);
        document.getElementById('me{{$item1->au_id}}').style.display ='none';
       },
       error:function(error){console.log(error);
       alert("ggggg");
       } 
   });
} 
function delete1(tt,oo){
    $.ajax({
       type:'get',
       url:'/adds_user_delete1/'+oo+'/'+tt,
       data:{id:1},
       success:function(response){console.log(response);
        document.getElementById('mee'+tt).style.display ='none';
       },
       error:function(error){console.log(error);
       alert("ggggg");
       } 
   });

}
</script>
        @endforeach  
    </div>
      </br>
    <div class="form-group">
    <label>employees </label>
    @foreach($data2 as $item3) 
    <input hidden="hidden" value="{{$item3->name}}" id="name{{$item3->id}}">
@endforeach
                  <select class="form-control select2" id="empii" name="emp_id" onchange="dep_select2()"  style="width: 100%;">
                  @foreach($data2 as $item3) 
                  <option  class="so_emp1 " id="dep{{$item3->id}}" value="{{$item3->id}}">{{$item3->name}}</option>
                  <script>
     function dep_select2(){
         
        var m= $("#empii").val();
        var m6= $("#gg").val();
      var m2= $("#name"+m).val();
      var m1= $("#empii:contains(is)");
     //alert(m6);
     $.ajax({
       type:'get',
       url:'/adds_user_add/'+m6+'/'+m,
       data:{id:1},
       success:function(response){console.log(response);
        $(".opp").prepend('<div style="float:left" id="mee'+m+'" class="alert alert-success">'+m2+' <button type="button" class="close" onclick="delete1('+m+','+m6+')">&times;</button></div> ');
       },
       error:function(error){console.log(error);
       alert('lll');
       } 
   });
     }
  </script> 
                  @endforeach                    
                  </select>
      
  


</div>
  </div>
  </div>
  </div>
  

  <!-- /.content-wrapper -->
@endsection
