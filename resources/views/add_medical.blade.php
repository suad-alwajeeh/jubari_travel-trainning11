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
          <form method="POST" id="signup-form" action="add_medical" enctype="multipart/form-data" class="signup-form">
          @csrf
            <div class="around">
              <h2 class="form-title">Medical Report Info</h2>
              <div class="form-row col-md-12 col-sm-12 col-xm-12">
                  <div class="form-group col-md-6 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Issued Date: </label>
                    <div class="form-group "     >

                      <input required type="date" class="form-control     "
                        name="Issue_date" id="date"  />
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-xm-12">Reference </label>
                    <div class="form-group"     >

                      <input required type="text" class="form-control     " name="refernce">
                    </div>
                  </div>
                </div>
                <div class="form-group clo-12">
                  <label class="col-12">Passenger Name : </label>
                  <div class="form-group"     >

                    <input required type="text" class="form-control     "
                      name="passenger_name" class="form-control     "
                      style="width: 100%;" />
                  </div>
                </div>
              <div class="form-row col-md-12 col-sm-12 col-xm-12">

                <div class="form-group col-md-4 col-sm-12 col-xm-12">
                  <label class="col-md-12 col-sm-12 col-xm-12">Document Number :</label>
                  <div class="form-group"     >

                    <input type="number" class="form-control" name="document_number" />
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-12 col-xm-12">
                  <label class="col-md-12 col-sm-12 col-xm-12">Report Status :</label>
                  <div class="form-group"     >

                  <select name="report_status" class="form-control select2 select2-hidden-accessible"
                      style="width: 100%;" data-select2-id="1" tabindex="0" aria-hidden="true">


                      <option value="1" >OK</option>
                      <option value="2">Avoid</option>
                      <option value="3">Refent</option>

                    </select>
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-12 col-xm-12">
                  <label class="col-md-12 col-sm-12 col-xm-12">From city </label>
                  <div class="form-group"     >

                    <input type="text" name="from_city"class="form-control     " list="cars" />
                  </div>
                </div>
              </div>
              <div class="form-row col-md-12 col-sm-12 col-xm-12">
               <div class="form-group col-12">
                  <label>Additional Info </label>
                  <div class="form-group"     >
                    <input type="text" class="form-control     " name="med_info">
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

                        <option value="{{$sup->s_no}}">{{$sup->supplier_name}}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Cost </label>
                    <div class="form-group"     >

                      <input type="number" style="width:100%;" required name="provider_cost"
                        class="form-control     " />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-4 col-sm-12 col-xm-12">Currency </label>
                    <div class="form-group curency"     >

                      <select  name="cur_id"  class="form-control select2 select2-hidden-accessible curency"
                        style="width: 100%;" data-select2-id="3" tabindex="0" aria-hidden="true">

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

                        <option value="{{$emps->emp_id}}">{{$emps->emp_first_name}} {{$emps->emp_middel_name}}
                          {{$emps->emp_thired_name}} {{$emps->emp_last_name}}</option>
                        @endforeach

                      </select>

                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Cost </label>
                    <div class="form-group"     >

                      <input required type="number" name="cost" style="width: 100%;"
                        class="form-control     " />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Currency </label>
                    <div class="form-group"     >

                      <select name="passnger_currency" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="5" tabindex="0" aria-hidden="true">

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

                  <div class="form-group"     >

                    <textarea id="form7" class="md-textarea form-control" name="remark" rows="3"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xm-12">
                  <h3 class="col-md-12 col-sm-12 col-xm-12">Attachment </h3>
                  <div class="gallery"></div>
                  <div class="form-group"     >
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
          <button type="submit" class="btn btncolor text-white m-2 p-2  float-right"  id="submit" >Save Change</button>
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
  
  $(document).ready(function () {
    let td = '';
    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear() + "-" + (month) + "-" + (day);

    $('#date').val(today);
    $("input[type='radio']").change(function () {
      if ($(this).val() == "other") {
        $(".otherAnswer").show();
      } else {
        $(".otherAnswer").hide();
      }
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

  function addHyphen(element) {
    let ele = document.getElementById(element.id);
    ele = ele.value.split('/').join('');    // Remove dash (-) if mistakenly entered.

    let finalVal = ele.match(/.{1,3}/g).join('/');
    document.getElementById(element.id).value = finalVal;
  }
</script>

@endsection