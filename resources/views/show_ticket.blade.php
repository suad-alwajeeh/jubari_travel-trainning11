@extends('app_layouts.master')
@section('main_content')

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
p{
    display:inline;
    content:'';
    margin-left:20px;
}
.profile{
    line-height: 30px;
word-spacing: 5px;
margin:auto;
}

</style>
  <!-- Content Wrapper. Contains page content -->
  
  <div class="content-wrapper" >
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Ticket</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
  <div class="row m-2">
  @foreach($ticket as $tickets)

    <div class="wrapp wapper text-center mx-auto">
     

      <div class="profile">
      <input type="hidden" class="delete_id" value="{{$tickets->id}}">
      <img src="{{asset('img/images/20945753.jpg')}}" class="thumbnail">

        <label>Issue Date :</label><p class="description">{{$tickets->Issue_date}} </p><br>
        <label>Refernce :</label><p class="description">{{$tickets->refernce}}</p><br>
        <label>Passenger Name :</label><p class="description">{{$tickets->passenger_name}}</p><br>
        <label>Airline Code :</label><p class="description">{{$tickets->ticket}}</p><br>
        <label>Ticket Number :</label><p class="description">{{$tickets->ticket_number}}</p><br>
        <label>Dept  City :</label><p class="description">{{$tickets->Dep_city}}</p><br>
        <label>Dept Date : </label><p class="description">{{$tickets->dep_date}}</p><br>
        <label>Arr City :</label><p class="description">{{$tickets->arr_city}}</p><br>
        <label>Supplier :</label><p class="description">{{$tickets->sup_name}}</p><br>
        <label>Supplier Cost :</label><p class="description">{{$tickets->provider_cost}}</p><br>
        <label>Supplier Cuurency :</label><p class="description">{{$tickets->cur_name}}</p><br>
        <label>Passenger Cost :</label><p class="description">{{$tickets->cost}}</p><br>
        <label>Passenger Cuurency :</label><p class="description">{{$tickets->passnger_currency}}</p><br>
       @if($tickets->ticket_status==1)
        <label>Ticket Status :</label><p class="description">OK</p><br>
        @elseif($tickets->ticket_status==2)
        <label>Ticket Status :</label><p class="description">Avoid</p><br>
        @else
        <label>Ticket Status :</label><p class="description">Revent</p><br>
        @endif
         
      </div>
      
      <div class="social-icons mx-auto text-center">
       

        <div class="icon mx-auto text-center">
        <input type="hidden" class="delete_id" value="{{$tickets->id}}">
          <a class="sendbtn" ><i class="fa fa-paper-plane" aria-hidden="true"></i></a>

        </div>
        <div class="icon mx-auto text-center">
        <input type="hidden" class="delete_id" value="{{$tickets->id}}">
          <a class="" href="{{ url('/service/update_ticket/'.$tickets->id) }}"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>

        </div>

        <div class="icon  mx-auto text-center">
        <input type="hidden" class="delete_id" value="{{$tickets->id}}">

          <a ><i class="fas fa-trash deletebtn" ></i></a>

        </div>
      </div>
    </div>
    @endforeach

  </div>
{{$ticket->links()}}

</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
  integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
  integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
  integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
                console.log('inseode scripy');

$(document).ready(function(){
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $('.deletebtn').click(function (e) {
      e.preventDefault();
      var id = $(this).closest("div").find('.delete_id').val();
      console.log(id);

      //alert(id);
      swal({
        title: "Are you sure?",
        text: "Are You  Sure to delete this Ticket!",
        icon: "error",
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            var data = {
              '_token': $('input[name=_token]').val(),
              'id': id,
            };

            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: "GET",
              url: '/service/ticket_delete/'+ id,
              data: data,
              success: function (response) {
                console.log(response);
                swal("Delete Successfully", {
                 icon: "success",
                }).then((willDelete) => {
                  location.reload();
                });
              }
            });
          }
          
          
        });
    });

    $('.sendbtn').click(function (e) {
      e.preventDefault();
      var id = $(this).closest("div").find('.delete_id').val();
      console.log(id);

      //alert(id);
      swal({
        title: "Are you sure?",
        text: "Do you want send this Ticket!",
        icon: "success",
        buttons: true,
        dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            var data = {
              '_token': $('input[name=_token]').val(),
              'id': id,
            };

            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              type: "GET",
              url: '/service/ticket_send/'+ id,
              data: data,
              success: function (response) {
               // cartdata=response;
                //console.log('cartdata');
               console.log(response[0]);

               if(response[0]=='<'){
                  swal("Send Successfully", {
                 icon: "success",
                }).then((willDelete) => {
                  location.reload();
                });
                }
                else{
                  swal("upload file before", {
                 icon: "error",
                }).then((willDelete) => {
                  location.reload();
                });
                            
                 
                }
              }
            });
          }
          
          
        });
    });
  let  td='';
  console.log('insede redar');

//var table=$('#datatable').DataTable();
$("#dropselect").change(function () {

  console.log('jbwjebfjw');
  console.log($("#dropselect"));

                var id=$('#dropselect').val();
                console.log(id);
                $.ajax({
        url:"{{url('employees')}}",
        data: {id:id},
        success: function (data) {
          console.log('sec');
          console.log(data);
          if(JSON.parse(data)===null)
          $('.row2').html('null');

          else
         { $.each(JSON.parse(data), function (key, value) {
            for (var i = 0; i < value.length; i++){
              //console.log('value[i]');
              //console.log(value[i]);
myJSON = JSON.parse(data);
td +='<tr><td>'+value[i].emp_id+'</td><td>'+value[i].emp_first_name+' ' +value[i].emp_midel_name +'  ' +value[i].emp_thired_name+' '+value[i].emp_last_name+'</td> <td>'+value[i].emp_mobile+'</td> <td>'+value[i].name+'</td> <td>'+value[i].emp_salary+'</td> <td>'+value[i].emp_hirdate+'</td><td><div class="btn-group btn-group-sm"><a type="button" class="btn btn-success" href="{{ url('department-edit/j') }}"><i class="fas fa-pencil-alt "></i></a><a type="button" class="btn btn-danger" href="{{ url('department-delete/.id') }}"><i class="fas fa-trash "></i></a></div></td></tr>';
$('.row2').html(td);
            }
            td='';


});}


        },
        error:function(){
          console.log('err');


        }
          
            }); 
            });
   
});
</script>
@endsection