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
          <form method="POST" id="signup-form" action="/service/updateHotel" class="signup-form" enctype="multipart/form-data">
          @csrf
@foreach($hotels as $hotel)

            <div class="around">
              <h2 class="form-title">Hotel Info</h2>

              <input type="hidden" value="{{$hotel->hotel_id}}" name="id">

              <div class="form-row col-md-12 col-sm-12 col-xm-12">
                  <div class="form-group col-md-6 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Issued Date: </label>
                    <div class="form-group "     >

                      <input required type="date" class="form-control     "
                        name="Issue_date" id="date" value="{{ \Carbon\Carbon::createFromDate($hotel->Issue_date)->format('Y-m-d')}}" />
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-xm-12">Reference </label>
                    <div class="form-group"     >

                      <input required type="text" class="form-control select2 select2-hidden-accessible" value="{{$hotel->refernce}}"  name="refernce">
                    </div>
                  </div>
                </div>
                <div class="form-row col-md-12 col-sm-12 col-xm-12">
                <div class="form-group col-md-6 col-sm-12 col-xm-12">

                  <label class="col-12">Passenger Name : </label>

                    <input required type="text" class="form-control  "
                      name="passenger_name" class="form-control "
                      style="width: 100%;"  value="{{$hotel->passenger_name}}" />
                  </div>
               
                <div class="form-group col-md-3 col-sm-12 col-xm-12">
                  <label class="col-md-12 col-sm-12 col-xm-12">Voucher Number :</label>
                  <div class="form-group"     >
                    <input type="number" class="form-control " value="{{$hotel->voucher_number}}" name="voucher_number" />
                  </div>
                </div>
                <div class="form-group col-md-3 col-sm-12 col-xm-12">
                  <label class="col-md-12 col-sm-12 col-xm-12">Hotel Status :</label>
                  <div class="form-group"     >

                  <select class="form-control select2 select2-hidden-accessible" name="hotel_status" id="code"
                      style="width: 100%;" data-select2-id="1" tabindex="0" aria-hidden="true">


                      @if($hotel->hotel_status==1)
                        <option value="1" >OK</option>
                        <option value="2" disabled>Avoid</option>
                        <option value="3" disabled>Refent</option>
                       
                        @endif


                    </select>
                  </div>
                </div>
              </div>
              <div class="form-row col-md-12 col-sm-12 col-xm-12">

                <div class="form-group col-md-2 col-sm-12 col-xm-12">
                  <label class="col-12">Country </label>
                  <div class="form-group"     >

                    <input required name="country" style="width:100%"  id="tbNum7" type="text"
                      class="form-control" list="cars"  value="{{$hotel->country}}"/>

                  </div>
                </div>

              
                <div class="form-group col-md-2 col-sm-12 col-xm-12">
                  <label class="col-12">City </label>
                  <div class="form-group"     >

                    <input required type="text" style="width:100%" name="city"  id="tbNum8"
                      class="form-control " list="cars" value="{{$hotel->city}}" />

                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-12 col-xm-12">
                  <label class="col-12">Hotel Name </label>
                  <div class="form-group"     >

                    <input required type="text" style="width:100%" name="hotel_name"  id="tbNum8"
                      class="form-control " list="cars" value="{{$hotel->hotel_name}}"/>

                  </div>
                </div>
             
              <div class="form-group col-md-2 col-sm-12 col-xm-12">
                  <label class="col-12">Check In Date </label>
                  <div class="form-group"     >
                    <input required type="date" style="width:100%"
                      class="form-control" name="check_in" id="date2"value="{{ \Carbon\Carbon::createFromDate($hotel->check_in)->format('Y-m-d')}}" />
                  </div>
                </div>
                <div class="form-group col-md-2 col-sm-12 col-xm-12">
                  <label class="col-12">Check Out Date </label>
                  <div class="form-group"     >
                    <input required type="date" style="width:100%"
                      class="form-control" value="{{ \Carbon\Carbon::createFromDate($hotel->check_out)->format('Y-m-d')}}" name="check_out" id="date4" />
                  </div>
                </div>
                </div>
              </div>
              <div class="around col-md-12 col-sm-12 col-xm-12 m-3">
                <div class="col-md-5 col-sm-12 col-xm-12 d-inline-block">
                  <h2 class="form-title">Provider Info </h2>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Provider Name </label>


                    <div class="form-group"     >
                      <select  name="due_to_supp" required
                        class="form-control select2 select2-hidden-accessible provider" style="width: 100%;" data-select2-id="2"
                        tabindex="0" aria-hidden="true">
                        @foreach($suplier as $sup)

@if($hotel->due_to_supp==$sup->s_no)


<option value="{{$sup->s_no}}" selected>{{$sup->supplier_name}}</option>
@else
<option value="{{$sup->s_no}}" >{{$sup->supplier_name}}</option>

@endif                        @endforeach

                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Cost </label>
                    <div class="form-group"     >

                      <input type="number" style="width:100%;" required name="provider_cost"
                        class="form-control " value="{{ $hotel->provider_cost}}"/>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-4 col-sm-12 col-xm-12">Currency </label>
                    <div class="form-group"     >

                      <select  name="cur_id" required class="form-control select2 select2-hidden-accessible curency"
                        style="width: 100%;" data-select2-id="3" tabindex="0" aria-hidden="true">
                        <option value="{{$hotel->cur_id}}" selected> {{$hotel->cur_name}}</option>

                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xm-12 d-inline-block">
                  <h2 class="form-title"> Customer Info</h2>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Customer Name </label>
                    <div class="form-group"     >

                      <select name="due_to_customer" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="4" tabindex="0" aria-hidden="true">

                        @foreach($emp as $emps)
                        @if($hotel->due_to_customer==$emps->emp_id)


                        <option selected value="{{$emps->emp_id}}">{{$emps->emp_first_name}} {{$emps->emp_middel_name}}
                          {{$emps->emp_thired_name}} {{$emps->emp_last_name}}</option>@else
<option value="{{$emps->emp_id}}">{{$emps->emp_first_name}} {{$emps->emp_middel_name}}
                          {{$emps->emp_thired_name}} {{$emps->emp_last_name}}</option>
@endif
                        
                        @endforeach

                      </select>

                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Cost </label>
                    <div class="form-group"  value="{{ $hotel->cost}}"   >

                      <input required type="number" name="cost" style="width: 100%;"
                        class="form-control     " />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Currency </label>
                    <div class="form-group"     >

                      <select name="passnger_currency" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="6" tabindex="0" aria-hidden="true">

                        <option value="{{$hotel->passnger_currency}}" selected>{{$hotel->passnger_currency}}</option>

                        <option value="YER" selected>YER</option>
                        <option value="SAR">SAR</option>
                        <option value="USD">USD</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="around">
                <div class="form-group col-md-12 col-sm-12 col-xm-12">
                  <h3 class="col-md-12 col-sm-12 col-xm-12">Remark </h3>

                  <div class="form-group" data-select2-id="44">

                    <textarea id="form7" class="md-textarea form-control" name="remark" rows="3">{{$hotel->remark}}</textarea>
                  </div>
                </div>
              </div>
              <div class="form-group col-md-12 col-sm-12 col-xm-12">
                  <h3 class="col-md-12 col-sm-12 col-xm-12">Attachment </h3>
                  <div class="gallery"></div>
                  <div class="form-group" data-select2-id="44">
                  @if($hotel->attachment=='null')
                  <div id="drop-area">

<input type="file" name="attachment[]" id="fileElem" multiple onchange="handleFiles(this.files)">
<label class="button" for="fileElem">Select some files</label>
<progress id="progress-bar" max=100 value=0></progress>
<div id="gallery" /></div>
@else

<div class="images text-center mx-auto">
@foreach(explode(',', $hotel->attachment) as $img) 
<img class="" src="{{asset('img/user_attchment/'.$img)}}" alt="  ">
@endforeach
</div>
<div id="drop-area">

<input type="file" name="attachment[]" id="fileElem" multiple onchange="handleFiles(this.files)">
<label class="button" for="fileElem">Select some files</label>
<progress id="progress-bar" max=100 value=0></progress>
<div id="gallery" /></div>
@endif
</div>
       </div>
       </div>
          </div>
          <div class="form-group">
          <button type="submit" class="btn btncolor text-white m-2 p-2  float-right"  id="submit" >Save Change</button>
          </div>
          </form>
@endforeach
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
</script>

@endsection