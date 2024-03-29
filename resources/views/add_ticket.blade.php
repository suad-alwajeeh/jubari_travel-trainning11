@extends('app_layouts.master')

@section('main_content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css'>
<link rel='stylesheet' href='https://unpkg.com/filepond/dist/filepond.min.css'><link rel="stylesheet" href="./style.css">

<div class="content-wrapper">

  <div class="main">
  <section class="signup">
        <div class="container">
          <div class="signup-content">
<form method="POST" action="add_ticket" enctype="multipart/form-data" id="form1" class="signup-form">
              @csrf
             
              <div class="around">
                <h2 class="form-title">Ticket Info</h2>

                <div class="form-row col-md-12 col-sm-12 col-xm-12">
                  <div class="form-group col-md-6 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Issued Date: </label>
                    <div class="form-group " data-select2-id="44">

                      <input required type="date" class="form-control "
name="Issue_date" id="date"  />
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-xm-12">REFERENCE </label>
                    <div class="form-group" data-select2-id="44">

                      <input required type="text" class="form-control" name="refernce">
                    </div>
                  </div>
                </div>
                <div class="form-row col-md-12 col-sm-12 col-xm-12">
                  <label class="col-12">Passenger Name : </label>
                  <div class="form-group col-6" data-select2-id="44">

                    <input required type="text" class="form-control select2 select2-hidden-accessible"
                      name="passenger_name" 
                      style="width: 100%;" />
                  </div>
               
                  <div class="form-group col-2">
                    <input type="radio" onchange="hideB(this)" name="aorb" class=" m-2" checked>one Way
                  </div>
                  <div class="form-group col-2">
                    <input type="radio" onchange="hideA(this)" name="aorb" class=" m-2" value="other">RoundTrip
                  </div>

                </div>


                <div class="form-row col-md-12 col-sm-12 col-xm-12">

                  <div class="form-group col-md-3 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Airline :</label>

                    <div class="form-group" data-select2-id="44">
                      <select id="airline" name="airline" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="3" tabindex="0" aria-hidden="true">
                        @foreach($airline as $airs)

                        <option value="{{$airs->id}}">{{$airs->airline_name}}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">code </label>
                    <div class="form-group" data-select2-id="4">
                      <select name="ticket" id="code"
                      class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="4" tabindex="0" aria-hidden="true">
                        @foreach($airline as $airs)

                        <option value="{{$airs->id}}">{{$airs->airline_code}}</option>

                        @endforeach

                      </select>
                    </div>


                  </div>
               
                  <div class="form-group col-md-3 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Ticket Number :</label>
                    <div class="form-group" >

                      <input required class="form-control "
                        style="width: 100%;"  name="ticket_number" id="number" />
                        <small id="helpId2" class="text-muted"></small>

                    </div>
                  </div>
                  <div class="form-group col-md-3 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Ticket Status :</label>


                    <div class="form-group" data-select2-id="44">
                      <select  name="ticket_status" id="code"
                      class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="6" tabindex="0" aria-hidden="true">

                        <option value="1" >OK</option>
                        <option value="2" disabled>Avoid</option>
                        <option value="3" disabled>Refent</option>


                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-row col-md-12 col-sm-12 col-xm-12">

                  <div class="form-group col-md-4 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Dep City </label>
                    <div class="form-group" data-select2-id="44">

                      <input required name="Dep_city1" style="width:100%" onkeyup="addHyphen(this)" id="tbNum"
                        type="text" class="form-control " list="cars" />

                    </div>
                  </div>

                  <div class="form-group col-md-4 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Dep Date </label>
                    <div class="form-group" data-select2-id="44">
                      <input required type="date" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="0" aria-hidden="true" name="dep_date" id="date2" />
                    </div>
                  </div>
                  <div class="form-group col-md-4 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Arr City </label>
                    <div class="form-group" >

                      <input required type="text" style="width:100%" name="arr_city" onkeyup="addHyphen(this)"
                        id="tbNum2" class="form-control " list="cars" />

                    </div>
                  </div>
                </div>

                <div style="display:none;" class="otherAnswer">
                  <div class="form-row col-md-12 col-sm-12 col-xm-12">

                    <div class="form-group col-md-4 col-sm-12 col-xm-12">
                      <label class="col-md-12 col-sm-12 col-xm-12">Dep City </label>
                      <div class="form-group">


                        <input type="text" name="dep_city1" style="width:100%" onkeyup="addHyphen(this)" id="tbNum3"
                          class="form-control " list="cars" />

                      </div>
                    </div>

                    <div class="form-group col-md-4 col-sm-12 col-xm-12">
                      <label class="col-md-12 col-sm-12 col-xm-12">Dep Date </label>
                      <div class="form-group">
                        <input type="date" name="dep_date2" style="width:100%"
                          class="form-control select2 select2-hidden-accessible" id="date2" />
                      </div>
                    </div>
                    <div class="form-group col-md-4 col-sm-12 col-xm-12">
                      <label class="col-md-12 col-sm-12 col-xm-12">Arr City </label>
                      <div class="form-group">

                        <input type="text" name="arr_city1" style="width:100%" onkeyup="addHyphen(this)" id="tbNum4"
                          class="form-control " list="cars" />


                      </div>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <div class="form-group" >

                      <input type="checkbox" id="myCheck" onclick="myFunction()">
                      <label class="col-md-10 col-sm-10 col-xm-10">Bursher Time </label>

                      <div id="text" class="form-group">
                        <input type="date" class="form-control "
                          style="display:none; width:100%" name="bursher_time" id="date3" />
                      </div>
                    </div>

                  </div>
                </div>
              </div>

              <div class="around col-md-12 col-sm-12 col-xm-12 m-3">
                <div class="col-md-5 col-sm-12 col-xm-12 d-inline-block">
                  <h2 class="form-title">Provider Info </h2>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Provider Name </label>


                    <div class="form-group" data-select2-id="44">
                      <select  name="due_to_supp" required
                      class="form-control select2 select2-hidden-accessible provider"
                        style="width: 100%;" data-select2-id="7" tabindex="0" aria-hidden="true">

                        @foreach($suplier as $sup)

                        <option value="{{$sup->s_no}}">{{$sup->supplier_name}}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Cost </label>
                    <div class="form-group" data-select2-id="44">

                      <input type="number" style="width:100%;" required name="provider_cost"
                        class="form-control  curency" />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-4 col-sm-12 col-xm-12">Currency </label>
                    <div class="form-group" data-select2-id="8">

                      <select  name="cur_id" required class="form-control select2 select2-hidden-accessible curency"
                        style="width: 100%;" data-select2-id="9" tabindex="0" aria-hidden="true">
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xm-12 d-inline-block">
                  <h2 class="form-title"> Customer Info</h2>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Customer Name </label>
                    <div class="form-group" data-select2-id="40">

                      <select name="due_to_customer" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="0" aria-hidden="true">

                        @foreach($emp as $emps)

                        <option value="{{$emps->emp_id}}">{{$emps->emp_first_name}} {{$emps->emp_middel_name}}
                          {{$emps->emp_thired_name}} {{$emps->emp_last_name}}</option>
                        @endforeach

                      </select>

                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Cost </label>
                    <div class="form-group" data-select2-id="45">

                      <input required type="number" name="cost" style="width: 100%;"
                        class="form-control " />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Currency </label>
                    <div class="form-group">

                      <select name="passnger_currency" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="2" tabindex="0" aria-hidden="true">

                        <option value="YER">YER</option>
                        <option value="SAR">SAR</option>
                        <option value="USD">USD</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>
             
              <div class="around">
                <div class="form-group col-md-12 col-sm-12 col-xm-12">
                  <h3 class="col-md-12 col-sm-12 col-xm-12">Note </h3>

                  <div class="form-group" data-select2-id="44">

                    <textarea id="form7" class="md-textarea form-control" name="remark" rows="3"></textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xm-12">
                  <h3 class="col-md-12 col-sm-12 col-xm-12">Attachment </h3>
                  <div class="gallery"></div>
                  <div class="form-group" data-select2-id="44">
                  <div id="drop-area">

<input type="file" name="attachment[]" id="fileElem" multiple onchange="handleFiles(this.files)">
<label class="button" for="fileElem">Select some files</label>
<progress id="progress-bar" max=100 value=0></progress>
<div id="gallery" /></div>
</div>
       </div>
       </div>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btncolor text-white m-2 p-2  float-right"  id="sub" >Save Change</button>
          </div>
          </form>

        </div>
    </div>
    </section>

  </div>
  </div>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
  
// ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area")

// Prevent default drag behaviors
;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, preventDefaults, false)   
  document.body.addEventListener(eventName, preventDefaults, false)
})

// Highlight drop area when item is dragged over it
;['dragenter', 'dragover'].forEach(eventName => {
  dropArea.addEventListener(eventName, highlight, false)
})

;['dragleave', 'drop'].forEach(eventName => {
  dropArea.addEventListener(eventName, unhighlight, false)
})

// Handle dropped files
dropArea.addEventListener('drop', handleDrop, false)

function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}

let uploadProgress = []
let progressBar = document.getElementById('progress-bar')

function initializeProgress(numFiles) {
  progressBar.value = 0
  uploadProgress = []

  for(let i = numFiles; i > 0; i--) {
    uploadProgress.push(0)
  }
}

function updateProgress(fileNumber, percent) {
  uploadProgress[fileNumber] = percent
  let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
  console.debug('update', fileNumber, percent, total)
  progressBar.value = total
}

function handleFiles(files) {
  files = [...files]
  initializeProgress(files.length)
  files.forEach(uploadFile)
  files.forEach(previewFile)
}

function previewFile(file) {
  let reader = new FileReader()
  reader.readAsDataURL(file)
  reader.onloadend = function() {
    let img = document.createElement('img')
    img.src = reader.result
    document.getElementById('gallery').appendChild(img)
  }
}

function uploadFile(file, i) {
  var url = 'https://api.cloudinary.com/v1_1/joezimim007/image/upload'
  var xhr = new XMLHttpRequest()
  var formData = new FormData()
  xhr.open('POST', url, true)
  xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')

  // Update progress (can be used to show progress indicator)
  xhr.upload.addEventListener("progress", function(e) {
    updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
  })

  xhr.addEventListener('readystatechange', function(e) {
    if (xhr.readyState == 4 && xhr.status == 200) {
      updateProgress(i, 100) // <- Add this
    }
    else if (xhr.readyState == 4 && xhr.status != 200) {
      // Error. Inform the user
    }
  })

  formData.append('upload_preset', 'ujpu6gyk')
  formData.append('file', file)
  xhr.send(formData)
}
  
  // Get the element with id="defaultOpen" and click on it
  $(document).ready(function () {
    let td = '';
    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear() + "-" + (month) + "-" + (day);

    $('#date').val(today);
    $('#date2').val(today);
    $('#date3').val(today);
    $('#date4').val(today);
    console.log( $('#date').val(today));
    $("input[type='radio']").change(function () {
      if ($(this).val() == "other") {
        $(".otherAnswer").show();
      } else {
        $(".otherAnswer").hide();
      }
    });

    $('#airline').change(function () {
      var id = $('#airline').val();
      console.log('insede airline');
      console.log(id);
      $.ajax({
        url: "{{url('/airline/airline_row')}}",
        data: { id: id },
        success: function (data) {
          console.log('sec');
          console.log(data);
          if (JSON.parse(data) === null)
            $('#code').html('null');

          else {
            $.each(JSON.parse(data), function (key, value) {
              for (var i = 0; i < value.length; i++) {
                console.log('value[i]');
                console.log(value[i]);
                myJSON = JSON.parse(data);

                $('#code').append($('<option >', {
                  value: value[i].id,
                  text: value[i].airline_code,
                  selected: true
                }));
              }
              td = '';


            });
          }
        },
        error: function () {
          console.log('err');
        }
      });

    });


    $('#code').change(function () {
      var id = $('#code').val();
      console.log('insede airline');
      console.log(id);
      $.ajax({
        url: "{{url('/airline/airline_row')}}",
        data: { id: id },
        success: function (data) {
          console.log('sec');
          console.log(data);
          if (JSON.parse(data) === null)
            $('#code').html('null');

          else {
            $.each(JSON.parse(data), function (key, value) {
              for (var i = 0; i < value.length; i++) {
                console.log('value[i]');
                console.log(value[i]);
                myJSON = JSON.parse(data);

                $('#airline').append($('<option >', {
                  value: value[i].id,
                  text: value[i].airline_name,
                  selected: true
                }));
              }
              td = '';


            });
          }
        },
      });

    });
    $('.provider').change(function () {
      var id = $('.provider').val();
      console.log('insede airline');
      console.log(id);
      $.ajax({
        url: "{{url('/suplier/suplier_row')}}",
        data: { id: id },
        success: function (data) {
          console.log('sec');
          console.log(data);
          if (JSON.parse(data) === null)
            $('.curency').html('null');

          else {
            $.each(JSON.parse(data), function (key, value) {
              for (var i = 0; i < value.length; i++) {
                console.log('value[i]');
                console.log(value[i]);
                myJSON = JSON.parse(data);
                td += '<option value="' + value[i].cur_id + '">' + value[i].cur_name + '</option>';

                $('.curency').html(td);
              }
              td = '';
            });
          }
        },
        error: function () {
          console.log('err');
        }
      });

    });


  });
  function myFunction() {
    // Get the checkbox
    var checkBox = document.getElementById("myCheck");
    // Get the output text
    var text = document.getElementById("date3");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }

  function myFunctions() {
    // Get the checkbox
    var checkBox = document.getElementById("myChecks");
    // Get the output text
    var text = document.getElementById("date4");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
      text.style.display = "block";
    } else {
      text.style.display = "none";
    }
  }

  function addHyphen(element) {
    let ele = document.getElementById(element.id);
    ele = ele.value.split('/').join('');    // Remove dash (-) if mistakenly entered.

    let finalVal = ele.match(/.{1,3}/g).join('/');
    document.getElementById(element.id).value = finalVal;
  }
  var form1 = document.getElementById("number");
    var sub = document.getElementById("sub");


    var mass2 = document.getElementById("helpId2");
  
    var phoneNumber = "^[0-9]{10}$";
    var ssnNumber = "^\d{0-9}$";
    form1.addEventListener("keyup", function confirmName() {

        if (form1.value.match(phoneNumber)) {
            form1.style.borderColor = "green";
            return true;
        }
        else {
            mass2.innerHTML = "*Enter 10 number  ";
            form1.style.borderColor = "red";
            return false;
        }
    });
</script>

@endsection