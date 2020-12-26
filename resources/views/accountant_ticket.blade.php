@extends('app_layouts.master')
@section('main_content')

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
    <!-- Main content -->
    <section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="info-box">
            <div class='row'>
                <div class='col-4'>
                <div class='row'>
              <div class='col-6'>
                <button class="btn btn-primary"></button>
                <button class="btn btn-danger"></button>
                <button class="btn btn-warning"></button>
              </div>
              <div class='col-6'>
                <button class="btn btn-info"></button>
                <button class="btn btn-secondary"></button>
                <button class="btn btn-success"></button>
              </div>
              </div>
                </div>
                <div class='col-4'>
                <div class='row'>
              <div class='col-6'>
                <button class="btn btn-primary"></button>
                <button class="btn btn-danger"></button>
                <button class="btn btn-warning"></button>
              </div>
              <div class='col-6'>
                <button class="btn btn-info"></button>
                <button class="btn btn-secondary"></button>
                <button class="btn btn-success"></button>
              </div>
              </div>
                </div>

            </div>
            
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12">

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest ticket</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>service </th>
                      <th>bill num</th>
                      <th>passenger</th>
                      <th>provider</th>
                      <th>cost</th>
                      <th>custumer</th>
                      <th>cost</th>
                      <th>c</th>
                      <th>status</th>
                      <th>opration</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      
                      <td><a href="pages/examples/invoice.html">OR9842</a></td>
                      <td>Call of Duty IV</td>
                      <td><span class="badge badge-success">Shipped</span></td>
                      <td><span class="badge badge-success"><button class="btn btn-success"></button></span></td>
                    </tr>                     
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
</section>
</div>
</div>

  
  
  
  
  @endsection


