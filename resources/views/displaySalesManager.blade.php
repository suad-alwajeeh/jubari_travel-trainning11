@extends('app_layouts.master')
@section('main_content')





  <!-- Content Wrapper. Contains page content// -->
  <div class="content-wrapper">
  <div class="container p-4">
  <div class="row">
  <div class="col-12">
  <h1 class="text-center"></h1>
</div>
 
<div class="card card-primary card-outline col-12">
          
          <div class="card-body">
            
          <!--  <h4 class="mt-5 ">Custom Content Above</h4> -->
            <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist">
  <li class="nav-item">
                <a class="nav-link active" id="custom-content-above-ticket-tab" data-toggle="pill" href="#custom-content-above-ticket" role="tab" aria-controls="custom-content-above-ticket" aria-selected="true">Ticket</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-bus-tab" data-toggle="pill" href="#custom-content-above-bus" role="tab" aria-controls="custom-content-above-bus" aria-selected="false">Bus</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-hotels-tab" data-toggle="pill" href="#custom-content-above-hotels" role="tab" aria-controls="custom-content-above-hotels" aria-selected="false">Hotels</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-visa-tab" data-toggle="pill" href="#custom-content-above-visa" role="tab" aria-controls="custom-content-above-visa" aria-selected="false">Visa</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-car-tab" data-toggle="pill" href="#custom-content-above-car" role="tab" aria-controls="custom-content-above-car" aria-selected="false">Car</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-medical-tab" data-toggle="pill" href="#custom-content-above-medical" role="tab" aria-controls="custom-content-above-medical" aria-selected="false">Medical</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-above-general-tab" data-toggle="pill" href="#custom-content-above-general" role="tab" aria-controls="custom-content-above-general" aria-selected="false">General</a>
              </li>
            </ul>
            <div class="tab-custom-content">
              <p class="lead mb-0">Services and its Status</p>
            </div>
            <div class="tab-content" id="custom-content-above-tabContent">
              <div class="tab-pane fade show active" id="custom-content-above-ticket" role="tabpanel" aria-labelledby="custom-content-above-ticket-tab">
              <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Employee Name</th>
        <th>Status</th>
        <th> Remark</th>
       
      </tr>
    </thead>
    <tbody>
    
    @foreach($data as $item)
    <tr>
        <th>{{$item->id}}</th>
        <th>{{$item->emp_first_name}} {{$item->emp_last_name}}</th>
        <th>
          @if($item->ticket_status==1)
            <small class="badge badge-danger"><i class="far fa-clock"></i> in sales executive</small>
          
                    @elseif($item->ticket_status==2)
                      <small class="badge badge-warning"><i class="far fa-clock"></i> in manager executive</small>   
                    
                    @elseif($item->ticket_status==3)
                      <small class="badge badge-primary"><i class="far fa-clock"></i> in accountant</small>
                    
                    @else($item->ticket_status==4)
                      <small class="badge badge-success"> archived</small>
                     
                    @endif
                    
              </th>
        <th>{{$item->remark}}</th>
      </tr>
      <tr>
       
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
</div>

              <div class="tab-pane fade" id="custom-content-above-bus" role="tabpanel" aria-labelledby="custom-content-above-bus-tab">
              <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Employee Name</th>
        <th>Status</th>
        <th> Remark</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($data1 as $item)
    <tr>
        <th>{{$item->bus_id}}</th>
        <th>{{$item->emp_first_name}} {{$item->emp_last_name}}</th>
        <th>
          @if($item->bus_status==1)
            <small class="badge badge-danger"><i class="far fa-clock"></i> in sales executive</small>
          
                    @elseif($item->bus_status==2)
                      <small class="badge badge-warning"><i class="far fa-clock"></i> in manager executive</small>   
                    
                    @elseif($item->bus_status==3)
                      <small class="badge badge-primary"><i class="far fa-clock"></i> in accountant</small>
                    
                    @else($item->bus_status==4)
                      <small class="badge badge-success"> archived</small>
                     
                    @endif
                    
              </th>
        <th>{{$item->remark}}</th>
      </tr>
      <tr>
       
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
              </div>
              <div class="tab-pane fade" id="custom-content-above-hotels" role="tabpanel" aria-labelledby="custom-content-above-hotels-tab">
              <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Employee Name</th>
        <th>Status</th>
        <th> Remark</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($data2 as $item)
    <tr>
        <th>{{$item->hotel_id}}</th>
        <th>{{$item->emp_first_name}} {{$item->emp_last_name}}</th>
        <th>
          @if($item->hotel_status==1)
            <small class="badge badge-danger"><i class="far fa-clock"></i> in sales executive</small>
          
                    @elseif($item->hotel_status==2)
                      <small class="badge badge-warning"><i class="far fa-clock"></i> in manager executive</small>   
                    
                    @elseif($item->hotel_status==3)
                      <small class="badge badge-primary"><i class="far fa-clock"></i> in accountant</small>
                    
                    @else($item->hotel_status==4)
                      <small class="badge badge-success"> archived</small>
                      
                    @endif
                    
              </th>
        <th>{{$item->remark}}</th>
      </tr>
      <tr>
       
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}

              </div>
              <div class="tab-pane fade" id="custom-content-above-visa" role="tabpanel" aria-labelledby="custom-content-above-visa-tab">
              <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Employee Name</th>
        <th>Status</th>
        <th> Remark</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($data3 as $item)
    <tr>
        <th>{{$item->visa_id}}</th>
        <th>{{$item->emp_first_name}} {{$item->emp_last_name}}</th>
        <th>
          @if($item->visa_status==1)
            <small class="badge badge-danger"><i class="far fa-clock"></i> in sales executive</small>
          
                    @elseif($item->visa_status==2)
                      <small class="badge badge-warning"><i class="far fa-clock"></i> in manager executive</small>   
                    
                    @elseif($item->visa_status==3)
                      <small class="badge badge-primary"><i class="far fa-clock"></i> in accountant</small>
                    
                    @else($item->visa_status==4)
                      <small class="badge badge-success"> archived</small>
                    
                    @endif
                    
              </th>
        <th>{{$item->remark}}</th>
      </tr>
      <tr>
       
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
              </div>
              <div class="tab-pane fade" id="custom-content-above-car" role="tabpanel" aria-labelledby="custom-content-above-car-tab">
              <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Employee Name</th>
        <th>Status</th>
        <th> Remark</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($data4 as $item)
    <tr>
        <th>{{$item->car_id}}</th>
        <th>{{$item->emp_first_name}} {{$item->emp_last_name}}</th>
        <th>
          @if($item->car_status==1)
            <small class="badge badge-danger"><i class="far fa-clock"></i> in sales executive</small>
          
                    @elseif($item->car_status==2)
                      <small class="badge badge-warning"><i class="far fa-clock"></i> in manager executive</small>   
                    
                    @elseif($item->car_status==3)
                      <small class="badge badge-primary"><i class="far fa-clock"></i> in accountant</small>
                    
                    @else($item->car_status==4)
                      <small class="badge badge-success"> archived</small>
                      
                    @endif
                    
              </th>
        <th>{{$item->remark}}</th>
      </tr>
      <tr>
       
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
              </div>
              <div class="tab-pane fade" id="custom-content-above-medical" role="tabpanel" aria-labelledby="custom-content-above-medical-tab">
              <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Employee Name</th>
        <th>Status</th>
        <th> Remark</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($data5 as $item)
    <tr>
        <th>{{$item->med_id}}</th>
        <th>{{$item->emp_first_name}} {{$item->emp_last_name}}</th>
        <th>
          @if($item->medical_status==1)
            <small class="badge badge-danger"><i class="far fa-clock"></i> in sales executive</small>
          
                    @elseif($item->medical_status==2)
                      <small class="badge badge-warning"><i class="far fa-clock"></i> in manager executive</small>   
                    
                    @elseif($item->medical_status==3)
                      <small class="badge badge-primary"><i class="far fa-clock"></i> in accountant</small>
                    
                    @else($item->medical_status==4)
                      <small class="badge badge-success"> archived</small>
                      
                    @endif
                    
              </th>
        <th>{{$item->remark}}</th>
      </tr>
      <tr>
       
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
              </div>
              <div class="tab-pane fade" id="custom-content-above-general" role="tabpanel" aria-labelledby="custom-content-above-general-tab">
              <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Employee Name</th>
        <th>Status</th>
        <th> Remark</th>
       
      </tr>
    </thead>
    <tbody>
    @foreach($data6 as $item)
    <tr>
        <th>{{$item->gen_id}}</th>
        <th>{{$item->emp_first_name}} {{$item->emp_last_name}}</th>
        <th>
          @if($item->general_status==1)
            <small class="badge badge-danger"><i class="far fa-clock"></i> in sales executive</small>
          
                    @elseif($item->general_status==2)
                      <small class="badge badge-warning"><i class="far fa-clock"></i> in manager executive</small>   
                    
                    @elseif($item->general_status==3)
                      <small class="badge badge-primary"><i class="far fa-clock"></i> in accountant</small>
                    
                    @else($item->general_status==4)
                      <small class="badge badge-success"> archived</small>
                      
                    @endif
                    
              </th>
        <th>{{$item->remark}}</th>
      </tr>
      <tr>
       
      @endforeach
    </tbody>
  </table>
  {{$data->links()}}
              </div>


            </div>
  </div>
  <!-- /.content-wrapper -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
@endsection
