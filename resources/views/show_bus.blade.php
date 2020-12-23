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
            <h1> Bus</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
  <div class="row m-2">
  @foreach($bus as $buss)

    <div class="wrapp wapper text-center mx-auto">
     

      <div class="profile">
      <input type="hidden" class="delete_id" value="{{$buss->id}}">
      <img src="{{asset('img/images/5282.jpg')}}" class="thumbnail">

        <label>Issue Date :</label><p class="description">{{$buss->Issue_date}} </p><br>
        <label>Refernce :</label><p class="description">{{$buss->refernce}}</p><br>
        <label>Passenger Name :</label><p class="description">{{$buss->passenger_name}}</p><br>
        <label>Bus Name :</label><p class="description">{{$buss->bus_name}}</p><br>
        <label>Bus Number :</label><p class="description">{{$buss->bus_number}}</p><br>
        @if($buss->bus_status==1)
        <label>Bus Status :</label><p class="description">OK</p><br>
        @elseif($buss->bus_status==2)
        <label>Bus Status :</label><p class="description">Avoid</p><br>
        @else
        <label>Bus Status :</label><p class="description">Revent</p><br>
        @endif
        <label>Dept  City :</label><p class="description">{{$buss->Dep_city}}</p><br>
        <label>Dept Date : </label><p class="description">{{$buss->dep_date}}</p><br>
        <label>Arr City :</label><p class="description">{{$buss->arr_city}}</p><br>
        <label>Supplier :</label><p class="description">{{$buss->sup_name}}</p><br>
        <label>Supplier Cost :</label><p class="description">{{$buss->provider_cost}}</p><br>
        <label>Supplier Cuurency :</label><p class="description">{{$buss->cur_name}}</p><br>
        <label>Passenger Cost :</label><p class="description">{{$buss->cost}}</p><br>
        <label>Passenger Cuurency :</label><p class="description">{{$buss->passnger_currency}}</p><br>
      
         
      </div>
      
      <div class="social-icons mx-auto text-center">
       

        <div class="icon mx-auto text-center">
        <input type="hidden" class="delete_id" value="{{$buss->bus_id}}">
          <a class="sendbtn" ><i class="fa fa-paper-plane" aria-hidden="true"></i></a>

        </div>
        <div class="icon mx-auto text-center">
        <input type="hidden" class="delete_id" value="{{$buss->bus_id}}">
          <a class="" href="{{ url('/service/update_bus/'.$buss->bus_id) }}"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>

        </div>

        <div class="icon  mx-auto text-center">
        <input type="hidden" class="delete_id" value="{{$buss->bus_id}}">

          <a ><i class="fas fa-trash deletebtn" ></i></a>

        </div>
      </div>
    </div>
    @endforeach

  </div>
{{$bus->links()}}

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
        text: "Are You  Sure to delete this Bus!",
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
              url: '/service/bus_delete/'+ id,
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
        text: "Do you want send this Bus!",
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
              url: '/service/bus_send/'+ id,
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
 
});
</script>
@endsection