@extends('app_layouts.master')
@section('main_content')


<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none !important;
  margin: 0 !important;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield !important;
}
  </style>
<div class="container">

   
    <div class="row  card  w-50  justify-content-center mx-auto  m-5">
        <!-- left column -->
        <div class="card-header">
            <h3 class="card-title text-center">Update Employee</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="/employees/editemployee">
        @foreach($emps as $emp )
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Firest Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="emp_first_name" required value="{{$emp->emp_first_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Middel Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="emp_medil_name" required value="{{$emp->emp_middel_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Thired Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="emp_thired_name" required value="{{$emp->emp_thired_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">last Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="emp_last_name" required value="{{$emp->emp_last_name}}">
                    </div>
                </div>

              
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Dpartment :</label>
                    <div class="form-group col-sm-8" data-select2-id="29">
                  <select name="dept_id" class="form-control col-sm-12 select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  @foreach($dept as $depts)

<option value="{{$emp->dept}}">{{$depts->name}}</option>
<option value="{{$depts->id}}">{{$depts->name}}</option>
@endforeach
                  </select>
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Hire Date :</label>
                    <div class="col-sm-8">
                        <input type="date" value="YYYY-MM-DD" class="form-control" id="start-date" required name="emp_hirdate">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Mobile :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control"   name="emp_mobile" required value="{{$emp->emp_mobile}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Salary :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control"   name="emp_salary" required value="{{$emp->emp_salary}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Email :</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="emp_email" required alue="{{$emp->emp_email}}">
                    </div>
                </div>
              
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <div class="form-check">
                            <input type="checkbox"  class="form-check-input" name="is_acive" id="active">
                            <label class="form-check-label" for="exampleCheck2">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">ADD</button>
                <a href="{{url('employees')}}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
            @endforeach
        </form>
    </div>
</div>
<script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>

<script> $(document).ready(function(){
            $(function () {
    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
});

function imageIsLoaded(e) {
    $('#myImg').attr('src', e.target.result);
};
var imagesPreview = function(input, placeToInsertImagePreview) {

if (input.files) {
    var filesAmount = input.files.length;

    for (i = 0; i < filesAmount; i++) {
        var reader = new FileReader();

        reader.onload = function(event) {
            $('.img').hide();
            $($.parseHTML('<img width="100px" height="100px"  class="img-fluid rounded shadow-sm mx-auto ">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
        }

        reader.readAsDataURL(input.files[i]);
    }
}

};

$('#gallery-photo-add').on('change', function() {
    let filesize =this.size
    console.log(filesize)
   
      imagesPreview(this, 'div.gallery'); 
}); var maxGroup = 10;
</script>
@endsection