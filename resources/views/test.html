@extends('app_layouts.master')
@section('main_content')

<div class="container">

   
    <div class="row  card  w-50  justify-content-center mx-auto  m-5">
        <!-- left column -->
        <div class="card-header">
            <h3 class="card-title text-center">Update Employee</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="/employees/editemployee" method="POST"  enctype="multipart/form-data">
        @foreach($emps as $emp )
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Firest Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="emp_first_name"   value="{{$emp->emp_first_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Middel Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="emp_medil_name"   value="{{$emp->emp_middel_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Thired Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="emp_thired_name"   value="{{$emp->emp_thired_name}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">last Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="emp_last_name"   value="{{$emp->emp_last_name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label"> Identity number:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="emp_ssn"   value="{{$emp->emp_ssn}}">
                        <small id="helpId5" class="text-muted"></small> 
                   
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label"> Photo of Proof of identity :</label>
                    <div class="col-sm-8">
        
            
                <img id="image1"  src="{{asset('img/users/'.$emp->emp_photo)}}" name="emp_photo" style="border:1px solid #CC8B79; width:150px; height:150px"  alt="" height="200px" width="200px" name="main_img" class="img-fluid rounded shadow-sm mx-auto d-block img">
   

         <div class="input-group ">
         <input type="hidden"  class="form-check-input" name="emp_photo1" value="{{$emp->emp_photo}}">

             <label for="upload" class=" p-2 mt-3 mx-auto  btncolor"  >Chose Image:</label>
             <input id="upload"  type="file" name="emp_photo" onchange="onFilePicked(event)"  accept="image/*"  style="display: none;">
             
         </div>
     </div>
 </div>
           
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Dpartment :</label>
                    <div class="form-group col-sm-8" data-select2-id="29">
                  <select name="dept_id" class="form-control col-sm-12 select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  @foreach($dept as $depts)
@if($depts->id==$emp->dept_id)
<option selected value="{{$depts->id}}">{{$depts->name}}</option>
@else
<option  value="{{$depts->id}}">{{$depts->name}}</option>
@endif
@endforeach
                  </select>
                </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-4 col-form-label">Hire Date :</label>
                    <div class="col-sm-8">
                        <input type="date" value="{{ \Carbon\Carbon::createFromDate($emp->hirdate)->format('Y-m-d')}}" class="form-control" id="start-date"   name="emp_hirdate">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Mobile :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control"   name="emp_mobile"   value="{{$emp->emp_mobile}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Salary :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control"   name="emp_salary"   value="{{$emp->emp_salary}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Email :</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" name="emp_email"   value="{{$emp->emp_email}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">CV :</label>
                    <div class="col-sm-8">
                    <a href="{{asset('img/attchment/'.$emp->attchment)}}"><img src="{{asset('assets/img/pdf.jpg')}}"  class="text-center" width="80px"></a>
                    <input type="hidden"  class="form-check-input" name="attchment1" value="{{$emp->attchment}}">
                       
                        <input type="file" class="form-control" value="{{asset('img/attchment/'.$emp->attchment)}}" accept=".pdf" name="attchment"   placeholder="  ">
                   <small> Only Accept Pdf File</small>
                      </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <div class="form-check">
                        @if($emp->is_active==1)
                            <input type="checkbox" checked class="form-check-input" name="is_acive" id="active">
                            <label class="form-check-label" for="exampleCheck2">Active</label>
                       @else
                       <input type="checkbox"  class="form-check-input" name="is_acive" id="active">
                            <label class="form-check-label" for="exampleCheck2">Active</label>
                      @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="">
                <a href="{{url('employees')}}" class="btn btn-default  m-2 p-2 float-left col-3">Cancel</a>
                <button type="submit" class="btn btncolor text-white m-2 p-2 float-right col-3">Update</button>
           
            </div>
            <!-- /.card-footer -->
            @endforeach
        </form>
    </div>
</div>
<script src="{{ asset('assets/plugins/dropzone/min/dropzone.min.js')}}"></script>

<script>
function  onFilePicked (event) {
    
    const files = event.target.files
    console.log(files)
    let filename = files[0].name
    if (filename.lastIndexOf('.') <= 0) {
      return alert('not image')
    }
    let filesize = files[0].size
    console.log(filesize)
    
    let fileType = files[0].type
    console.log(fileType)

    if (fileType !== 'image/png') {
      if (fileType !== 'image/jpeg') {
        return alert('image type not supported')
      }
    }
    const fileReder = new FileReader()
    let formData = new FormData()
    formData.append('file', files[0])
    fileReder.addEventListener('load', () => {
      let dataURI = fileReder.result
      if (dataURI) {
      document.getElementById('image1').src = dataURI
         
      }
    })
    fileReder.readAsDataURL(files[0])
    console.log(this.image)
  }
 $(document).ready(function(){
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
});
</script>
@endsection