@extends('app_layouts.master')
@section('main_content')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('status') }}
    </div>
    @elseif(session('failed'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('failed') }}
    </div>
    @endif
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Ticket Service</h1>
          </div>
          <div class="col-sm-6">
           
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
   
    <!-- /.content -->
 
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        
          <div class="col-sm-6">
            
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
         
            <div class="card">
              <div class="card-header">
                <h3 class="card-title col-3  d-inline-block">Ticket</h3>
      </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="datatable" class="table table-hover text-nowrap text-center">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Issue Date </th>
                    <th> Refernce </th>
                    <th>Passenger Name</th>
                    <th>Airline Code</th>
                    <th>Ticket Number </th>
                    <th>Dept  City </th>
                    <th> Dept Date </th>
                    <th> Arr City </th>
                    <th>Supplier</th>
                    <th>Supplier Cost</th>
                    <th>Supplier Cuurency</th>
                    <th>Passenger Cost </th>
                    <th>Passenger Currency </th>
                    <th>Ticket Status </th>
                    <th>Remark</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="row2">
                  <?php $i=1 ?>
                 @forelse($ticket as $tickets)
                  <tr>
                  <input type="hidden" class="delete_id" value="{{$tickets->id}}">
                  <td><?php echo $i;?></td>
                    <td>{{$tickets->Issue_date }}</td>
                    <td> {{$tickets->refernce}} </td>
                    <td>{{$tickets->passenger_name}}</td>
                    <td>{{$tickets->ticket}}</td>
                    <td>{{$tickets->ticket_number}} </td>
                    <td>{{$tickets->Dep_city}} </td>
                    <td> {{$tickets->dep_date}} </td>
                    <td> {{$tickets->arr_city}} </td>
                    <td>{{$tickets->sup_name}} </td>
                    <td>{{$tickets->provider_cost}} </td>
                    <td>{{$tickets->cur_name}}</td>
                    <td>{{$tickets->cost}}  </td>
                    <td> {{$tickets->passnger_currency}} </td>
                    @if($tickets->ticket_status==1)
                    <td>OK</td>
                    @endif
                    <td>{{$tickets->remark}} </td>
                    <td>
                    @if($tickets->service_status==1)
                    <a type="button" class="btn sendbtn btncolor text-white" ><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
                  @endif 
                  
                    <a class="btn btncolor" type="button" href="{{ url('/service/update_ticket/'.$tickets->id) }}"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                    @if($tickets->service_status==1||$tickets->service_status==2)

                    <a type="button" class="btn  deletebtn btncolor text-white" ><i class="fas fa-trash "></i></a>
@endif
                  </td>
                  </tr>
                  <?php $i++ ?>

                  @empty
<tr> <td colspan="10" >There is No data  Pleas Add Service <td></tr>
                  @endforelse                  </tbody>
                  <tfoot>
                  <tr>
                  
                  </tr>
                  </tfoot>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            {{$ticket->links()}}

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      </div>
      <!-- /.container-fluid -->
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
      var id = $(this).closest("tr").find('.delete_id').val();
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
      var id = $(this).closest("tr").find('.delete_id').val();
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