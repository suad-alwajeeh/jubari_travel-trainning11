@extends('app_layouts.master')
@section('main_content')



<div class="container">

   
    <div class="row  card  w-50  justify-content-center mx-auto  m-5">
        <!-- left column -->
        <div class="card-header">
            <h3 class="card-title text-center">ADD DEPARTMENT</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="/department/editdepartment">
            @csrf
            @foreach($dept as $depts)
            <div class="card-body">
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Department Name :</label>
                    <div class="col-sm-8">
      <input type="text" hidden=hidden  value="{{$depts->id}}" class="form-control" id="email" placeholder="Enter email" name="id">

                        <input type="text" class="form-control" name="name" required value="{{$depts->name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Create At :</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="date" required name="create_at" value="{{$depts->created_at}}">{{$depts->created_at}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <div class="form-check">
                         <input type="checkbox" value=1 class="form-check-input"  name="is_acive" id="active">
                        
               
<label class="form-check-label" for="exampleCheck2" >Active</label>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">ADD</button>
                <a href="{{url('department')}}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</div>

@endsection