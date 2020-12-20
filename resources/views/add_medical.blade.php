@extends('app_layouts.master')
@section('main_content')
<style>
  /* @extend display-flex; */
  display-flex,
  .display-flex,
  .display-flex-center {
    display: flex;
  }

  a:focus,
  a:active {
    text-decoration: none;
    outline: none;
    transition: all 300ms ease 0s;

  }

  input,
  select,
  textarea {
    outline: none;
    appearance: unset !important;
  }



  input:focus,
  select:focus,
  textarea:focus {
    outline: none;
    box-shadow: none !important;
  }



  input[type=radio] {
    appearance: radio !important;
  }

  input[type=checkbox] {
    appearance: checkbox !important;
  }


  figure {
    margin: 0;
  }

  p {
    margin-bottom: 0px;
    font-size: 15px;
    color: #777;
  }

  h2 {
    line-height: 1.66;
    margin: 0;
    padding: 0;
    font-weight: 900;
    color: #222;
    font-family: 'Montserrat';
    font-size: 24px;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 40px;
  }

  .clear {
    clear: both;
  }


  body {}

  .container {

    position: relative;
    margin: 0 auto;
  }

  .display-flex {
    justify-content: space-between;

    align-items: center;
  }

  .display-flex-center {
    justify-content: center;

    align-items: center;
  }

  .position-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .signup-content {
    background: #fff;
    border-radius: 10px;

    padding: 50px 85px;
  }

  .form-group {
    overflow: hidden;
    margin-bottom: 20px;
  }

  .form-input {
    border: 1px solid #ebebeb;
    border-radius: 5px;

    padding: 17px 20px;
    box-sizing: border-box;
    font-size: 14px;
    font-weight: 500;
    color: #222;
  }

  .form-input:focus {
    border: 1px solid transparent;
    border-image-source: linear-gradient(to right, #9face6, #74ebd5);

    border-image-slice: 1;
    border-radius: 5px;
    background-origin: border-box;
    background-clip: content-box, border-box;
  }


  .form-submit {
    border-radius: 5px;

    padding: 17px 20px;
    box-sizing: border-box;
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    text-transform: uppercase;
    border: none;
    float: right;
    background-image: linear-gradient(to left, #74ebd5, #9face6);
  }





  .label-agree-term {
    font-size: 12px;
    font-weight: 600;
    color: #555;
  }

  .term-service {
    color: #555;
  }

  .around {
    border-bottom: rgb(189, 184, 184) 1px solid;
  }

  .around2 {
    border-right: rgb(189, 184, 184) 1px solid;
  }

  .tab {
    overflow: hidden;
    border: 1px solid #fff;
    background-color: #fff;
  }

  /* Style the buttons inside the tab */
  .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab button:hover {
    background-color: #ABD2EA;
  }

  /* Create an active/current tablink class */
  .tab button.active {
    background-color: #ABD2EA;
  }

  /* Style the tab content */
  .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #000;
    border-top: none;
  }

  /* Style the close button */
  .topright {
    float: right;
    cursor: pointer;
    font-size: 28px;
  }

  .topright:hover {
    color: red;
  }
</style>
<div class="content-wrapper">

  <div class="main">
  <section class="signup">
      <div class="container">
        <div class="signup-content">
          <form method="POST" id="signup-form" action="add_medical" class="signup-form">
          @csrf
            <div class="around">
              <h2 class="form-title">Medical Report Info</h2>
              <div class="form-row col-md-12 col-sm-12 col-xm-12">
                  <div class="form-group col-md-6 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Issued Date: </label>
                    <div class="form-group " data-select2-id="44">

                      <input required type="date" class="form-control select2 select2-hidden-accessible"
                        name="Issue_date" id="date"  />
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-xm-12">Reference </label>
                    <div class="form-group" data-select2-id="44">

                      <input required type="text" class="form-control select2 select2-hidden-accessible" name="refernce">
                    </div>
                  </div>
                </div>
                <div class="form-group clo-12">
                  <label class="col-12">Passenger Name : </label>
                  <div class="form-group" data-select2-id="44">

                    <input required type="text" class="form-control select2 select2-hidden-accessible"
                      name="passenger_name" class="form-control select2 select2-hidden-accessible"
                      style="width: 100%;" />
                  </div>
                </div>
              <div class="form-row col-md-12 col-sm-12 col-xm-12">

                <div class="form-group col-md-4 col-sm-12 col-xm-12">
                  <label class="col-md-12 col-sm-12 col-xm-12">Document Number :</label>
                  <div class="form-group" data-select2-id="44">

                    <input type="text" class="form-control select2 select2-hidden-accessible" name="document_number" />
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-12 col-xm-12">
                  <label class="col-md-12 col-sm-12 col-xm-12">Report Status :</label>
                  <div class="form-group" data-select2-id="44">

                  <select name="report_status" class="form-control select2 select2-hidden-accessible"
                      style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">


                      <option value="1" selected>OK</option>
                      <option value="2">Avoid</option>
                      <option value="3">Refent</option>

                    </select>
                  </div>
                </div>
                <div class="form-group col-md-4 col-sm-12 col-xm-12">
                  <label class="col-md-12 col-sm-12 col-xm-12">From city </label>
                  <div class="form-group" data-select2-id="44">

                    <input type="text" name="from_city"class="form-control select2 select2-hidden-accessible" list="cars" />
                  </div>
                </div>
              </div>
              <div class="form-row col-md-12 col-sm-12 col-xm-12">
               <div class="form-group col-12">
                  <label>Additional Info </label>
                  <div class="form-group" data-select2-id="44">
                    <input type="text" class="form-control select2 select2-hidden-accessible" name="med_info">
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
                        class="form-control select2 select2-hidden-accessible provider" style="width: 100%;" data-select2-id="1"
                        tabindex="-1" aria-hidden="true">

                        @foreach($suplier as $sup)

                        <option value="{{$sup->sup_id}}">{{$sup->sup_name}}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Cost </label>
                    <div class="form-group" data-select2-id="44">

                      <input type="text" style="width:100%;" required name="provider_cost"
                        class="form-control select2 select2-hidden-accessible" />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-4 col-sm-12 col-xm-12">Currency </label>
                    <div class="form-group" data-select2-id="44">

                      <select  name="cur_id" required class="form-control select2 select2-hidden-accessible curency"
                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-5 col-sm-12 col-xm-12 d-inline-block">
                  <h2 class="form-title"> Customer Info</h2>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Customer Name </label>
                    <div class="form-group" data-select2-id="44">

                      <select name="due_to_customer" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                        @foreach($emp as $emps)

                        <option value="{{$emps->emp_id}}">{{$emps->emp_first_name}} {{$emps->emp_middel_name}}
                          {{$emps->emp_thired_name}} {{$emps->emp_last_name}}</option>
                        @endforeach

                      </select>

                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Cost </label>
                    <div class="form-group" data-select2-id="44">

                      <input required type="text" name="cost" style="width: 100%;"
                        class="form-control select2 select2-hidden-accessible" />
                    </div>
                  </div>
                  <div class="form-group col-md-12 col-sm-12 col-xm-12">
                    <label class="col-md-12 col-sm-12 col-xm-12">Currency </label>
                    <div class="form-group" data-select2-id="44">

                      <select name="passnger_currency2" class="form-control select2 select2-hidden-accessible"
                        style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">


                        <option value="" selected>YER</option>
                        <option value="">SAR</option>
                        <option value="">USD</option>

                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="around">
                <div class="form-group col-md-12 col-sm-12 col-xm-12">
                  <h3 class="col-md-12 col-sm-12 col-xm-12">Remark </h3>

                  <div class="form-group" data-select2-id="44">

                    <textarea id="form7" class="md-textarea form-control" name="remark" rows="3"></textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" name="submit" id="submit" class="form-submit" value="Save" />
            </div>
          </form>

        </div>
      </div>
    </section>

  </div>
  <!-- end bus info-->
  </div>


   
    

  <script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  // Get the element with id="defaultOpen" and click on it
  document.getElementById("defaultOpen").click();
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