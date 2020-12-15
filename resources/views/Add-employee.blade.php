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
            <h3 class="card-title text-center">ADD Employee</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" id="form1" method="POST" action="saved" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Firest Name :</label>
                    <div class="col-sm-8">
                    <input type="text"class="form-control" id="user" name="emp_first_name" placeholder="First_name">
					<small id="helpId1" class="text-muted"></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Middel Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="emp_middel_name" name="emp_medil_name" required placeholder="Middel Name ">
                        <small id="helpId2" class="text-muted"></small> 
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Thired Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="emp_thired_name" name="emp_thired_name" required placeholder="Thired Name ">
                        <small id="helpId3" class="text-muted"></small> 
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">last Name :</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control"  id="emp_last_name" name="emp_last_name" required placeholder="last Name ">
                        <small id="helpId4" class="text-muted"></small> 
                    </div>
                </div>

                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label"> Identity number:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" name="emp_ssn" required placeholder=" Identity number ">
                        <small id="helpId5" class="text-muted"></small> 
                   
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label"> Photo of Proof of identity :</label>
                    <div class="col-sm-8">
        
            
                <img id="image1" name="emp_photo" style="border:1px solid #CC8B79; width:150px; height:150px"  alt="" height="200px" width="200px" name="main_img" class="img-fluid rounded shadow-sm mx-auto d-block">
   

         <div class="input-group ">
             <label for="upload" class=" p-2 mt-3 mx-auto  bg-primary"  >Chose Image:</label>
             <input id="upload"  type="file" name="emp_photo" onchange="onFilePicked(event)"  accept="image/*"  style="display: none;">
             
         </div>
     </div>
 </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Dpartment :</label>
                    <div class="form-group col-sm-8" data-select2-id="29">
                  <select name="dept_id" class="form-control col-sm-12 select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                   @foreach($emps as $emp)
                    <option value="{{$emp->id}}">{{$emp->name}}</option>
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
                    <input type="text" id="emp_mobile"  name="emp_mobile"class="form-control"  placeholder="123456789"  required>
                    <small id="helpId6" class="text-muted">Mobile Number</small> 
              
                </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Salary :</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control"   name="emp_salary" required placeholder=" Salary ">
                        <small id="helpId7" class="text-muted">accept only number</small> 
                   
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">Email :</label>
                    <div class="col-sm-8">
                    <input type='email' class="form-control"  name="emp_email"id="email"/>
                    <small id="helpId8" class="text-muted"></small> 
					                   </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-4 col-form-label">CV :</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" accept=".pdf" name="attchment" required placeholder="  ">
                   <small> Only Accept Pdf File</small>
                      </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-4 col-sm-8">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" name="is_acive" id="active">
                            <label class="form-check-label" for="exampleCheck2">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info"  id="submit" >ADD</button>
                <a href="{{url('employees')}}" class="btn btn-default float-right">Cancel</a>
            </div>
            <!-- /.card-footer -->
        </form>
        
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script>
/*form validation*/
var form1=document.getElementById("form1");
var sub=document.getElementById("sub");


var mass1=document.getElementById("helpId1");
var mass2=document.getElementById("helpId2");
var mass3=document.getElementById("helpId3");
var mass4=document.getElementById("helpId4");
var mass5=document.getElementById("helpId5");
var mass6=document.getElementById("helpId6");
var mass7=document.getElementById("helpId7");
var mass8=document.getElementById("helpId8");

var nameFormat= /^[A-Za-z ]+$/;
var phoneNumber= "^[0-9]{9}$";
var ssnNumber= "^\d{0-9}$";
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;






form1[0].addEventListener("keyup",function confirmName() 
{ 
    
if(form1[0].value.match(nameFormat))
{
    form1[0].style.borderColor="green";
return true;
}
else
{
    mass2.innerHTML = "*Enter field Name ";
    form1[0].style.borderColor="red";
return false;
}
});
form1[1].addEventListener("keyup",function confirmName() 
{ 
    
if(form1[1].value.match(nameFormat))
{
    form1[1].style.borderColor="green";
return true;
}
else
{
    mass2.innerHTML = "*Enter field Name ";
    form1[1].style.borderColor="red";
return false;
}
});

form1[3].addEventListener("keyup",function confirmName() 
{ 
    
if(form1[3].value.match(nameFormat))
{
    form1[3].style.borderColor="green";
return true;
}
else
{
    mass3.innerHTML = "*Enter field Name ";
    form1[3].style.borderColor="red";
return false;
}
});
form1[4].addEventListener("keyup",function confirmName() 
{ 
    
if(form1[4].value.match(nameFormat))
{
    form1[4].style.borderColor="green";
return true;
}
else
{
    mass4.innerHTML = "*Enter field Name ";
    form1[4].style.borderColor="red";
return false;
}
});
form1[5].addEventListener("keyup",function confirmName() 
{ 
    
if(form1[5].value.length==11)
{
    form1[5].style.borderColor="green";
return true;
}
else
{
    mass5.innerHTML = "*Enter 11 Degit";
    form1[5].style.borderColor="red";
return false;
}
});
form1[9].addEventListener("keyup",function confirmName() 
{ 
    
if(form1[9].value.match(phoneNumber))
{
    form1[9].style.borderColor="green";
return true;
}
else
{
    mass6.innerHTML = "*Enter pattern 00697-777777777";
    form1[9].style.borderColor="red";
return false;
}
});
form1[11].addEventListener("keyup",function confirmEmail() 
{ 
if(form1[11].value.match(mailformat))
{
    form1[11].style.borderColor="green";
return true;
}
else
{
    mass8.innerHTML = "*Enter Field Email ";
    form1[11].style.borderColor="red";
return false;
}
});






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
</script>
@endsection