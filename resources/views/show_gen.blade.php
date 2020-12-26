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
            <h1> Bus Service</h1>
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
                <h3 class="card-title col-3  d-inline-block">BUS</h3>
      </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="datatable" class="table table-hover text-nowrap text-center">
              
                <form method="post">
	@csrf

                 <thead>
                  <tr>
			<th><input type="checkbox" class="selectall"></th>
      <th>ID</th>
                    <th>Issue Date </th>
                    <th> Refernce </th>
                    <th>Passenger Name</th>
                    <th>Voucher Number </th>
                    <th>Offered Status </th>
                    <th>Service Status </th>
                    <th> Additional Info </th>
                    <th>Supplier</th>
                    <th>Supplier Cost</th>
                    <th>Supplier Cuurency</th>
                    <th>Passenger Cost </th>
                    <th>Passenger Currency </th>
                    <th>Remark</th>
                    <th>Action</th>
                  </tr>
                  </thead>
         <tbody class="row2">
         <?php $i=1 ?>

@forelse($gen as $gens)
<tr>
@if($gens->service_status==1)

<td>
<input type="checkbox" name="ids[]" class="selectbox" value="{{$gens->gen_id }}"></td>
@endif
<input type="hidden" class="delete_id" value="{{$gens->gen_id}}">
<td><?php echo $i;?></td>
  <td>{{$gens->Issue_date }}</td>
  <td> {{$gens->refernce}} </td>
  <td>{{$gens->passenger_name}}</td>

  <td>{{$gens->voucher_number }}</td>
  @if($gens->general_status==1)
  <td>OK</td>
  @endif
  @if($gens->offered_status==1)
  <td>OK</td>
  @endif
  <td>{{$gens->gen_info }}</td>
  <td>{{$gens->sup_name}} </td>
  <td>{{$gens->provider_cost}} </td>
  <td>{{$gens->cur_name}}</td>
  <td>{{$gens->cost}}  </td>
  <td> {{$gens->passnger_currency}} </td>
  <td>{{$gens->remark}} </td>
  <td>
   @if($gens->service_status==1)

  <a type="button" class="btn sendbtn btncolor text-white" ><i class="fa fa-paper-plane" aria-hidden="true"></i></a>
  <a class="btn btncolor" type="button" href="{{ url('/service/update_gen/'.$gens->gen_id) }}"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
  <a type="button" class="btn  deletebtn btncolor text-white" ><i class="fas fa-trash "></i></a>
@endif

                    </td>
                  </tr>
                  <tfoot>
<tr>
@if($gens->service_status==1)
<button  formaction="/deleteallgen" type="submit" class="btn btn-danger">Delete All Selected</button>
	<button formaction="/sendallgen" type="submit" class="btn btn-danger">Send All Selected</button>
  @endif       
</tr>
</tbody>      </tfoot>
                  <?php $i++ ?>

                  @empty
<tr> <td colspan="10" >There is No data  Pleas Add Service <td></tr>
                  @endforelse                 
                 
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            
            {{$gen->links()}}
</form>
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
$('.selectall').click(function(){
		$('.selectbox').prop('checked', $(this).prop('checked'));
		$('.selectall2').prop('checked', $(this).prop('checked'));
	})
	
	$('.selectbox').change(function(){
		var total = $('.selectbox').length;
		var number = $('.selectbox:checked').length;
		if(total == number){
			$('.selectall').prop('checked', true);
			$('.selectall2').prop('checked', true);
		} else{
			$('.selectall').prop('checked', false);
			$('.selectall2').prop('checked', false);
		}
	})
        
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
        text: "Are You  Sure to delete this Service!",
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
              url: '/service/gen_delete/'+ id,
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
        text: "Do you want send this Service!",
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
              url: '/service/send_gen/'+ id,
              data: data,
              success: function (response) {
               // gentdata=response;
                //console.log('gentdata');
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