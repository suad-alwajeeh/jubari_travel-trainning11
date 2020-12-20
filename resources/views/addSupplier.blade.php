@extends('app_layouts.master')
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
 <!-- SweetAlert2 -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@section('main_content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <div class="container p-4">
  
<h2>Add Supplier Page</h2>

<form id="supplier_display" method="post" action="/add_supplier"  enctype="multipart/form-data">
    <div class="form-group">
      <label for="supplier_name">Supplier Name</label>
      <input type="text" class="form-control" value="{{old('supplier_name')}}" id="supplier_name" placeholder="supplier_name" name="supplier_name">
        <div class="card-body">
      @if($errors->any('supplier_name'))
      <button type="button" class="btn btn-danger swalDefaultError">
                 {{$errors->first('supplier_name')}}
                </button>
      <span class="text-danger"></span>
      @endif
        </div>
    </div>
    <div class="form-group mb-3">
      <label for="supplier_mobile">Mobile</label>
      <input type="text" class="form-control" value="{{old('supplier_mobile')}}" id="" placeholder="supplier_mobile" name="supplier_mobile">
      @if($errors->any('supplier_mobile'))
      <span class="text-danger">{{$errors->first('supplier_mobile')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="supplier_phone">Phone</label>
      <input type="text" class="form-control" value="{{old('supplier_phone')}}" id="supplier_phone" placeholder="supplier_phone " name="supplier_phone">
      @if($errors->any('supplier_phone'))
      <span class="text-danger">{{$errors->first('supplier_phone')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="supplier_email">Email</label>
      <input type="email" class="form-control" value="{{old('supplier_email')}}" id="supplier_email" placeholder="supplier_email" name="supplier_email">
      @if($errors->any('supplier_email'))
      <span class="text-danger">{{$errors->first('supplier_email')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="supplier_photo">Photo</label>
      <input type="file" class="form-control"  id="supplier_photo" placeholder="supplier_photo" name="supplier_photo">
     @if($errors->any('supplier_photo'))
      <span class="text-danger">{{$errors->first('supplier_photo')}}</span>
      @endif 
    </div>
    <div class="form-group mb-3">
      <label for="supplier_address">Address</label>
      <input type="text" class="form-control" value="{{old('supplier_address')}}" id="supplier_address" placeholder="supplier_address" name="supplier_address">
      @if($errors->any('supplier_address'))
      <span class="text-danger">{{$errors->first('supplier_address')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="supplier_acc_no">Supplier Account No.</label>
      <input type="text" class="form-control" value="{{old('supplier_acc_no')}}" id="supplier_acc_no" placeholder="supplier_acc_no" name="supplier_acc_no">
      @if($errors->any('supplier_acc_no'))
      <span class="text-danger">{{$errors->first('supplier_acc_no')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
      <label for="create_date">Date Added</label>
      <input type="date" class="form-control" value="{{old('create_date')}}" id="create_date" placeholder="create_date" name="create_date">
      @if($errors->any('create_date'))
      <span class="text-danger">{{$errors->first('create_date')}}</span>
      @endif
    </div>
    <div class="form-group mb-3">
    <label for="supplier_service">Service</label>
    <select class="form-control col-2   mx-5 d-inline-block select2" name="supplier_service" multiple="multiple" id="dropselect" placeholder="select service" style="width: 100%;">
    <option value="">select service</option>
                @if(count($services))
                      @foreach($services as $service)

                      <option  value="{{$service->ser_id}}">{{$service->ser_name}}</option>

                      @endforeach
                  @endif
              
                  
                </select>
                </div>
               
                
    <div class="form-group mb-3">
      <label for="supplier_remark">Remark</label>
      <textarea class="form-control" name="supplier_remark" id="supplier_remark"></textarea>
    </div>
    <div class="form-group mb-3">
      <label for="supplier_currency">Select currency</label>
     <select name="supplier_currency" id="">
     <option value="USD">USD</option>
     <option value="SR">SR</option>
     <option value="YR">YR</option>
     </select>
    <!-- @if($errors->any('is_active'))
      <span class="text-danger">{{$errors->first('is_active')}}</span>
      @endif -->
    </div>
    <div class="form-group mb-3">
      <label for="is_active">is_active</label>
     <select name="is_active" id="">
     <option value=1>1</option>
     <option value=0>2</option>
     
     </select>
     @if($errors->any('is_active'))
      <span class="text-danger">{{$errors->first('is_active')}}</span>
      @endif
    </div>
   
    <button type="submit" class="btn btn-primary">send</button>
   
  </form>  
  <script>
    $('#supplier_display').on('submit',function(e){
         e.preventDefault();
         $.ajax({
             type:'post',
             url:'/addSupplier',
             data:$('#supplier_display').serialize(),
             success:function(response){console.log(response);
             alert("data saved");
             },
             error:function(error){console.log(error);
             alert("data dont saved");
             } 
         });

    });
  </script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false;

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template");
  previewNode.id = "";
  var previewTemplate = previewNode.parentNode.innerHTML;
  previewNode.parentNode.removeChild(previewNode);

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  });

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
  });

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
  });

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
  });

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
  });

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
  };
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true);
  };
  // DropzoneJS Demo Code End
</script>
  </div>
  </div>
  @endsection


