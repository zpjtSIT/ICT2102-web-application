<?php include 'base/authenticationInner.php'; ?>
<?php include 'base/method.php'; ?>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$status = 0;

if($login){
  if(isset($_GET['id'])){
     $planner_id = $_GET['id'];
     $token_result = json_decode(getplanner($url , $planner_id));
     $hotelresult = json_decode(gethotelbasedoncontainer($url , $planner_id));
     $attractionresult = json_decode(getattractionbasedoncontainer($url , $planner_id));
     $flightresult = json_decode(getflightbasedoncontainer($url , $planner_id));
     if($token_result->errors){
       header('Location: '."/travelplanner.php");
     } else {
       $travel_container_id = $token_result->respond->id;
       $status = $token_result->respond->type;
       $owner = $token_result->respond->owner;
       $container_owner = $token_result->respond->container_owner;
       $country = $token_result->respond->country;
       $startdate = $token_result->respond->startdate;
       $enddate = $token_result->respond->enddate;
       $title = $token_result->respond->title;
       if($country){
        $flightstart =  $token_result->respond->flightstart;
        $flightend =  $token_result->respond->flightend;
        $hotelarray = $hotelresult->respond;
        $hotel_array_count = $hotelresult->count;
        $attractionarray = $attractionresult->respond;
        $attraction_array_count = $attractionresult->count;
        $flightarray = $flightresult->respond;
        if(isset($flightresult->count)){
          $flight_array_count = $flightresult->count;
        } else {
          $flight_array_count = 1;
        }
        
       }
     } 
  } else {
    header('Location: '."/travelplanner.php");
  }
}

?>
  <?php include 'base/head.php'; ?>

  <style>
    a{
      color:white;
    }
    a:hover{
      color:#337ab7;
    }
    
    .btn-sq-lg {
      width: 150px !important;
      height: 150px !important;
    }

    .btn-sq {
      width: 100px !important;
      height: 100px !important;
      font-size: 10px;
    }

    .btn-sq-sm {
      width: 80px !important;
    }

    .btn-sq-xs {
      width: 25px !important;
      height: 25px !important;
      padding: 2px;
    }

    .custom1 {
      margin-top: 20px;
    }

    .dashnum+.tooltip>.tooltip-inner {
      background-color: #73AD21;
      color: #FFFFFF;
      border: 1px solid green;
      padding: 15px;
      font-size: 20px;
    }

    .tooltip.bottom {
      margin-top: -20px;
      margin-left: 10px
    }

    .col-md-12 {
      background-color: white;
    }

    .checkbox label,
    .radio label {
      padding-left: 0px
    }

    .checkbox label:after,
    .radio label:after {
      content: '';
      display: table;
      clear: both;
    }

    .checkbox .cr,
    .radio .cr {
      position: relative;
      display: inline-block;
      border: 1px solid #a9a9a9;
      border-radius: .25em;
      width: 1.3em;
      height: 1.3em;
      float: left;
      margin-right: .5em;
    }

    .radio .cr {
      border-radius: 50%;
    }

    .checkbox .cr .cr-icon,
    .radio .cr .cr-icon {
      position: absolute;
      font-size: .8em;
      line-height: 0;
      top: 50%;
      left: 20%;
    }

    .radio .cr .cr-icon {
      margin-left: 0.04em;
    }

    .checkbox label input[type="checkbox"],
    .radio label input[type="radio"] {
      display: none;
    }

    .checkbox label input[type="checkbox"]+.cr>.cr-icon,
    .radio label input[type="radio"]+.cr>.cr-icon {
      transform: scale(3) rotateZ(-20deg);
      opacity: 0;
      transition: all .3s ease-in;
    }

    .checkbox label input[type="checkbox"]:checked+.cr>.cr-icon,
    .radio label input[type="radio"]:checked+.cr>.cr-icon {
      transform: scale(1) rotateZ(0deg);
      opacity: 1;
    }

    .checkbox label input[type="checkbox"]:disabled+.cr,
    .radio label input[type="radio"]:disabled+.cr {
      opacity: .5;
    }

    label::before,
    label::after {
      display: none;
    }

    th.dt-center,
    td.dt-center {
      text-align: center;
    }

    tbody,
    thead {
      text-align: center;
    }

    .dataTables_wrapper .dataTables_paginate {
      margin-top: 20px;
    }

    .modal-dialog {
      min-height: 800px;
      width: 90%;
      height: 90%;
      padding: 0;
      background-color: white;
    }

    .modal-content {
      height: 100%;
      border-radius: 0;
    }

    .datepicker-switch,
    .prev,
    .next,
    .dow {
      background-color: white;
    }
  </style>
  </head>

  <body class="full-height" id="scrollup">

    <div class="page-loading">
      <img src="images\loader.gif" alt="">
      <span>Skip Loader</span>
    </div>

    <div class="theme-layout">

      <?php include 'base/navbar.php'; ?>

      <section>
        <div class="block gray less-top less-bottom">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="innertitle">
                  <h2>Travel Planner</h2>
                  <span></span>
                </div>
              </div>
              <div class="col-lg-6">
                <ul class="breadcrumbs">
                  <li><a href="index.php" title="">Home</a></li>
                  <li><a href="#" title="">Travel Planner</a></li>
                  <li><a href="#" title="">Planner</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

      <div class="heading">
        <h2>
          <?php echo $title; ?>
        </h2>
        <h3 style="text-transform: uppercase;">
          <?php echo "(".$country.")" ?>
        </h3>
        <span><?php echo $startdate ?> - <?php echo $enddate ?></span>
      </div>

      <section>
        <div class="block">
          <div class="container">
            <div class="row">
              <div class="bbox">
                <h3 style="background-color:#004d47">FRIENDS</h3>
                <div class="">
                  <?php if($login){if(count((array)$token_result->respond->members)){foreach ($token_result->respond->members as $travel_members) {?>
                  <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="dashbadge white" style="text-transform: capitalize;">
                      <?php if($travel_members->id == $container_owner){ ?>
                      <a href="#" data-toggle="tooltip" data-placement="bottom" title="Host" class="dashnum"> <span><i><?php echo ($travel_members->name){0} ?></i></span><strong><?php echo $travel_members->name; ?></strong></a>
                      <?php } else { ?>
                      <a href="#" data-toggle="tooltip" data-placement="bottom" title="Participant" class="dashnum"> <span><i><?php echo ($travel_members->name){0} ?></i></span><strong><?php 
                                   
                                   if (filter_var($travel_members->name, FILTER_VALIDATE_EMAIL)) {
                                    echo substr($travel_members->name, 0, 7) . "..."; 
                                   } else {
                                     echo $travel_members->name;
                                   }?>
                            
                            </strong></a>


                      <?php }?>
                    </div>
                  </div>
                  <?php } } }?>
                  <?php if($status == 2){ ?>
                  <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="dashbadge white">
                      <a href="#" title="" onclick="invitefriends()" href="javascript:void(0);" class="dashnum"> <span><i>+</i></span> <strong>Add New</strong></a>
                    </div>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="bbox">
                <h3 style="background-color:#0e5f57">FLIGHT<a class="pull-right" href="#" data-toggle="modal" data-target="#flightmodal"><i class="fa fa-plus"></i></a></h3>
                <div class="reviewssec" style="padding:25px">
                  <table id="flight_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Airline</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Depart</th>
                        <th>Arrival</th>
                        <th>Cost</th>
                        <th>Transfer</th>
                        <th>Vote Exclude Host</th>
                        <?php if($status != 2){ ?>
                        <th>Vote</th>
                        <?php } ?>
                        <th>Misc</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 0; if($login){if(count((array)$flightarray)){foreach ($flightarray as $flightarray_loop) {?>
                      <tr>
                        <td>
                          <?php echo $flightarray_loop->airline ?>
                        </td>
                        <td>
                          <?php echo $flightarray_loop->origin ?>
                        </td>
                        <td>
                          <?php echo $flightarray_loop->destination ?>
                        </td>
                        <td>
                          <?php echo $flightarray_loop->departure_date ?>
                        </td>
                        <td>
                          <?php echo $flightarray_loop->arrival ?>
                        </td>
                        <td>
                          $
                          <?php echo $flightarray_loop->cost ?>
                        </td>
                        <td>
                          <?php echo $flightarray_loop->transfer ?>
                        </td>
                        <td>
                          <?php echo $flight_array_count[$count]; ?>%</td>
                        <?php if($status != 2){ ?>
                        <td><a href="javascript:void(0);" onclick="confirm_flight_vote('<?php echo $flightarray_loop->id ?>','1')" href="javascript:void(0);" class="btn btn-sq-sm btn-success">
                          YES</a> <a href="javascript:void(0);" onclick="confirm_flight_vote('<?php echo $flightarray_loop->id ?>','0')" href="javascript:void(0);" class="btn btn-sq-sm btn-danger">
                          NO</a></td>
                        <?php } ?>
                        <td><a href="javascript:void(0);" class="btn btn-sq-sm btn-info">View</a></td>
                      </tr>
                      <?php $count++; } } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="bbox">
                <h3 style="background-color:#0e5f57">Hotel<a class="pull-right" href="#" data-toggle="modal" data-target="#hotelmodal"><i class="fa fa-plus"></i></a></h3>
                <div class="reviewssec" style="padding:25px">
                  <table id="hotel_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Pax</th>
                        <th>Hotel Start</th>
                        <th>Hotel Pax</th>
                        <th>Vote Result Exclude Host</th>
                        <?php if($status != 2){ ?>
                        <th>Vote</th>
                        <?php } ?>
                        <th>Misc</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 0; if($login){if(count((array)$hotelarray)){foreach ($hotelarray as $hotelarray_loop) {?>
                      <tr>
                        <td>
                          <?php echo $hotelarray_loop->name ?>
                        </td>
                        <td>
                          <?php echo $hotelarray_loop->price;?>
                        </td>
                        <td>
                          <?php echo $hotelarray_loop->pax ?>
                        </td>
                        <td>
                          <?php echo $hotelarray_loop->hotel_star ?>
                        </td>
                        <td>
                          <?php echo $hotelarray_loop->hotel_pax ?>
                        </td>
                        <td>
                          <?php echo $hotel_array_count[$count]; ?>%</td>
                        <?php if($status != 2){ ?>
                        <td><a href="javascript:void(0);" onclick="confirm_hotel_vote('<?php echo $hotelarray_loop->id ?>','1')" href="javascript:void(0);" class="btn btn-sq-sm btn-success">
                          YES</a> <a href="javascript:void(0);" onclick="confirm_hotel_vote('<?php echo $hotelarray_loop->id ?>','0')" href="javascript:void(0);" class="btn btn-sq-sm btn-danger">
                          NO</a></td>
                        <?php } ?>
                        <td><a href="javascript:void(0);" class="btn btn-sq-sm btn-info" onclick="hoteltiming('<?php echo $hotelarray_loop->tich ?>','<?php echo $hotelarray_loop->id ?>')">View Timing</a> <a href="javascript:void(0);" class="btn btn-sq-sm btn-info">View</a></td>
                      </tr>
                      <?php $count++; } } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="bbox">
                <h3 style="background-color:#0e5f57">Attraction<a class="pull-right" href="javascript:void(0);" data-toggle="modal" data-target="#attractionmodal"><i class="fa fa-plus"></i></a></h3>
                <div class="reviewssec" style="padding:25px">
                  <table id="attraction_table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Rating</th>
                        <th>Type</th>
                        <th>Vote Result Exclude Host</th>
                        <?php if($status != 2){ ?>
                        <th>Vote</th>
                        <?php } ?>
                        <th>Misc</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $count = 0; if($login){if(count((array)$attractionarray)){foreach ($attractionarray as $attractionarray_loop) {?>
                      <tr>
                        <td>
                          <?php echo $attractionarray_loop->name ?>
                        </td>
                        <td>
                          <?php echo $attractionarray_loop->rating ?>
                        </td>
                        <td>
                          <?php echo $attractionarray_loop->type ?>
                        </td>
                        <td>
                          <?php echo $attraction_array_count[$count]; ?>%</td>
                        <?php if($status != 2){ ?>
                        <td><a href="javascript:void(0);" onclick="confirm_attraction_vote('<?php echo $attractionarray_loop->id ?>','1')" href="javascript:void(0);" class="btn btn-sq-sm btn-success">
                          YES</a> <a href="javascript:void(0);" onclick="confirm_attraction_vote('<?php echo $attractionarray_loop->id ?>','0')" href="javascript:void(0);" class="btn btn-sq-sm btn-danger">
                          NO</a></td>
                        <?php } ?>
                        <td><a href="javascript:void(0);" class="btn btn-sq-sm btn-info" onclick="attractiontiming('<?php echo $attractionarray_loop->ticatt ?>','<?php echo $attractionarray_loop->id ?>')">View Timing</a> <a href="#" class="btn btn-sq-sm btn-info">View</a></td>
                      </tr>
                      <?php $count++; } } } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <?php if($status == 2){
              ?><a class="btn btn-success pull-right" style="margin-right:20px" href="travelsummary.php?id=<?php echo $planner_id; ?>">FINALIZE</a>
            <?php
             } ?>
          </div>
        </div>
      </section>
      <?php include 'base/footer.php'; ?>
    </div>

    <div class="modal fade" id="flightmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Available Flights</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                <h2 class="">
                  <a style="font-size:25px" onclick="searchbtnflight()" href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-search"></i> <b>Search</b></a>
                </h2>
                <div id="flightmodal_inner">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="attractionmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style=" min-height: 900px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Available Attractions</h4>
          </div>
          <div class="modal-body">
            <iframe src="anyhow.php?option=Attractions&id=<?php echo $travel_container_id; ?>" id="iframesss" width="100%" height="700px"></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="hotelmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style=" min-height: 900px;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Available Hotels</h4>
          </div>
          <div class="modal-body">
            <iframe src="anyhow.php?option=hotel&id=<?php echo $travel_container_id; ?>" id="hoteliframe" width="100%" height="800px"></iframe>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="attraction_view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Attraction Timing</h4>
          </div>
          <div class="modal-body">
            <h2 class="" id="attraction_view_button">

            </h2>
            <table id="attraction_view_table" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Start</th>
                  <th>End</th>
                  <th>Suggested By</th>
                  <th>Vote Exclude Host</th>
                  <?php if($status != 2){ ?>
                  <th>Vote</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody id="attraction_table">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="hotel_view_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Hotel Timing</h4>
          </div>
          <div class="modal-body">
            <h2 class="" id="hotel_view_button">

            </h2>
            <table id="hotel_view_table" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Start</th>
                  <th>End</th>
                  <th>Suggested By</th>
                  <th>Vote Exclude Host</th>
                  <?php if($status != 2){ ?>
                  <th>Vote</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody id="hotel_table">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <?php include 'base/loginpop.php'; ?>
    <?php include 'base/javascript.php'; ?>
    <script type="text/javascript" src="js\value.js"></script>
    <script type="text/javascript" src="js\sumoselect.js"></script>
    <script type="text/javascript" src="js\jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js\dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="js\bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="js\jquery.quickfit.js"></script>
    <script>
      $(document).ready(function() {
        //Call your function here
        $('#flight_table').DataTable();
        $('#attraction_table').DataTable();
        $('#hotel_table').DataTable();
      });

      $(function() {
        $('#flightmodal').on('shown.bs.modal', function() {
          $(document).off('focusin.modal');
        });

        $('#attractionmodal').on('show.bs.modal', function() {
          document.getElementById('iframesss').contentWindow.location.reload();
        });

        $('#attraction_view_modal').on('shown.bs.modal', function() {
          $(document).off('focusin.modal');
        });

        $('#hotelmodal').on('show.bs.modal', function() {
          document.getElementById('hoteliframe').contentWindow.location.reload();
        })

        $('#flightmodal').on('hidden.bs.modal', function() {
          // do something…
          window.location.reload(true)
        });
        $('#attractionmodal').on('hidden.bs.modal', function() {
          // do something…
          window.location.reload(true)
        });
        $('#hotelmodal').on('hidden.bs.modal', function() {
          // do something…
          window.location.reload(true)
        });

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
          dd = '0' + dd
        }

        if (mm < 10) {
          mm = '0' + mm
        }

        today = dd + '-' + mm + '-' + yyyy;

        $("#startdate").val(today);
        $("#enddate").val(today);

        $('.input-daterange , .swal2-input').datepicker({
          format: "dd/mm/yyyy",
          startDate: today,
          autoclose: true,
          todayHighlight: true
        });
        <?php if(isset($country)){ ?>
        flightsearch('<?php echo $country ?>', '<?php echo $flightstart; ?>', '<?php echo $flightend; ?>', 1, 0);
        <?php } ?>
      });
      <?php if($login){ ?>

      function invitefriends() {
        swal({
          title: 'Invite Your Friends',
          confirmButtonText: '<i class="far fa-paper-plane fa-1x"></i>',
          html: '<input id="swal-email" class="swal2-input" placeholder="Email Address">' +
            '<input id="swal-note" class="swal2-textarea" placeholder="Remarks">',
          preConfirm: function() {
            var email = $('#swal-email').val();
            var note = $('#swal-note').val()
            var json = {
              "tgid": <?php echo $planner_id; ?>,
              "email": email,
              "note": note
            };
            return $.ajax({
              url: url + 'travelmember',
              type: 'put',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });
          }
        }).then((result) => {
          if (result.hasOwnProperty('value')) {
            if (result.value.errors) {
              swal({
                type: 'error',
                title: result.value.respond
              })
            } else {
              swal({
                type: 'success',
                title: result.value.respond,
                showConfirmButton: false,
                timer: 1500
              }).then(
                function() {
                  window.location.reload(true)
                }
              )
            }
          }
        }).catch(swal.noop)
      }
      <?php } ?>

      <?php if(!isset($country)){ ?>
      noisepopup();

      <?php } ?>

      $('[data-toggle="tooltip"]').tooltip();
      $('.dashnum').quickfit();

      function activatedate() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
          dd = '0' + dd
        }

        if (mm < 10) {
          mm = '0' + mm
        }

        today = dd + '-' + mm + '-' + yyyy;
        $('.swal2-input').datepicker({
          format: "dd/mm/yyyy",
          startDate: today,
          autoclose: true,
          todayHighlight: true
        });
      }

      function confirm_flight_vote(id, vote) {
        swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Add it!',
          preConfirm: function() {
            var json = {
              airID: id,
              vote: vote
            };
            return $.ajax({
              url: url + 'airlinepolling/' + <?php echo $planner_id; ?>,
              type: 'put',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });
          }
        }).then((respond) => {
          if (respond.hasOwnProperty('value')) {
            if (respond.value.errors) {
              swal({
                type: 'error',
                title: respond.value.respond
              })
            } else {
              if (respond.hasOwnProperty('value')) {
                if (respond.value.errors) {
                  swal({
                    type: 'error',
                    title: respond.value.respond
                  })
                } else {
                  swal({
                    type: 'success',
                    title: respond.value.respond,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    window.location.reload(true);
                  })
                }
              }
            }
          };
        });
      }

      function confirm_attraction_vote(id, vote) {
        swal({
          title: 'Are you sure?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Add it!',
          preConfirm: function() {
            var json = {
              attractionid: id,
              vote: vote
            };
            return $.ajax({
              url: url + 'attractionpolling/' + <?php echo $planner_id; ?>,
              type: 'put',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });
          }
        }).then((respond) => {
          if (respond.hasOwnProperty('value')) {
            if (respond.value.errors) {
              swal({
                type: 'error',
                title: respond.value.respond
              })
            } else {
              if (respond.hasOwnProperty('value')) {
                if (respond.value.errors) {
                  swal({
                    type: 'error',
                    title: respond.value.respond
                  })
                } else {
                  swal({
                    type: 'success',
                    title: respond.value.respond,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    window.location.reload(true);
                  })
                }
              }
            }
          };
        });
      }

      function confirm_hotel_vote(id, vote) {
        swal({
          title: 'Are you sure?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Add it!',
          preConfirm: function() {
            var json = {
              hotelid: id,
              vote: vote
            };
            return $.ajax({
              url: url + 'hotelpolling/' + <?php echo $planner_id; ?>,
              type: 'put',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });
          }
        }).then((respond) => {
          if (respond.hasOwnProperty('value')) {
            if (respond.value.errors) {
              swal({
                type: 'error',
                title: respond.value.respond
              })
            } else {
              if (respond.hasOwnProperty('value')) {
                if (respond.value.errors) {
                  swal({
                    type: 'error',
                    title: respond.value.respond
                  })
                } else {
                  swal({
                    type: 'success',
                    title: respond.value.respond,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    window.location.reload(true);
                  })
                }
              }
            }
          };
        });


      }

      function searchbtnflight() {
        swal({
          title: 'Trip Details',
          confirmButtonText: 'Submit',
          html: '<div class="row"><div class="col-md-6">Orgin</div><div class="col-md-6">Destination</div><div class="col-md-6"><select id="swal-orgin" class="swal2-select" style="display: flex;"><option value="" disabled="" selected>Select a Country</option><option value="singapore">Singapore</option></select></div> ' +
            '<div class="col-md-6"><select id="swal-dest" class="swal2-select" style="display: flex;"><option value="" disabled="" selected>Select a Country</option><option value="taiwan">Taiwan</option><option value="bangkok">Bangkok</option></select></div></div><br /><div class="row"><div class="col-md-6">Travel Start Date</div><div class="col-md-6">Travel End Date</div>' +
            '<div class="col-md-6"><input  id="swal-travel-start"  class="swal2-input date_one" placeholder="Start Date" type="text" style="display: flex;text-align:center;"></div><div class="col-md-6"><input  id="swal-travel-end"  class="swal2-input date_two" placeholder="End Date" type="text" style="display: flex;text-align:center;"></div>' +
            '<div class="col-md-6">Adult</div><div class="col-md-6">Child</div>' +
            '<div class="col-md-6"><select id="swal-adult" class="swal2-select" style="display: flex;"><option value="" disabled="" selected>Number of Adult</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div>' +
            '<div class="col-md-6"><select id="swal-child" class="swal2-select" style="display: flex;"><option value="" disabled="" selected>Number of Child</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option></select></div></div>',
          showLoaderOnConfirm: true,
          preConfirm: function() {
            var orgin_country = $('#swal-orgin').val();
            var dest_country = $('#swal-dest').val();
            var start_date = $('#swal-travel-start').val();
            var end_date = $('#swal-travel-end').val();
            var adult = $('#swal-adult').val();
            var child = $('#swal-child').val();

            var new_start_date = start_date.split("-").reverse().join("-");
            var new_end_date = end_date.split("-").reverse().join("-");

            var country, departDate, returnDate, adult, children;

            var json = {
              country: dest_country,
              departDate: new_start_date,
              returnDate: new_end_date,
              adult: adult,
              children: child
            }
            return $.ajax({
              url: url + 'flight',
              type: 'POST',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond;
              }
            });
          }
        }).then((respond) => {
          if (respond.hasOwnProperty('value')) {
            if (respond.value.errors) {
              swal({
                type: 'error',
                title: respond.value.respond
              })
            } else {
              var respond = respond.value;
              if (!respond.errors) {
                var result_airline_object = respond.respond;
                var result_airline_array = result_airline_object.itineraries;
                window.flight_store = result_airline_object;
                var length = 10;
                if (result_airline_array.length < 11) {
                  length = result_airline_array.length;
                }
                $("#flightmodal_inner").empty();
                for (var i = 0; i < length; i++) {
                  var odoList = result_airline_array[i].odoList;

                  var elm = '<div class="bbox">';
                  var count = 0;
                  for (var z = 0; z < (odoList).length; z++) {
                    for (var c = 0; c < (odoList[z].segments).length; c++) {

                      var origcode = odoList[z].segments[c].origCode;
                      var destcode = odoList[z].segments[c].destCode;
                      var origcountry = "";
                      var destcountry = "";

                      var orignal_depart_date = odoList[z].segments[c].departureDateTime;

                      var depart_array = orignal_depart_date.split("T");

                      var depart_time = depart_array[1].slice(0, depart_array[1].length - 3);

                      var depart_orignal_arrival_date = odoList[z].segments[c].arrivalDateTime;

                      var depart_arrival_array = depart_orignal_arrival_date.split("T");

                      var depart_arrival_time = depart_arrival_array[1].slice(0, depart_arrival_array[1].length - 3);

                      var body = "";
                      var airlinecode = odoList[z].segments[c].airlineCode;
                      var airlinename = result_airline_object.airlineNames;
                      var locationname = result_airline_object.locationName;
                      var airline_converted_name, children = "";

                      var adult = result_airline_array[i].fareBreakdown.adults.qty;

                      if (result_airline_array[i].fareBreakdown.children != null) {
                        children = result_airline_array[i].fareBreakdown.children.qty;
                      } else {
                        children = 0;
                      }

                      var keys = Object.keys(airlinename);
                      for (var f = 0; f < keys.length; f++) {
                        var key = keys[f];
                        if (key === airlinecode) {
                          airline_converted_name = airlinename[key];
                        }
                      }

                      var countrykeys = Object.keys(locationname);
                      for (var f = 0; f < countrykeys.length; f++) {
                        var key = countrykeys[f];
                        if (key === origcode) {
                          origcountry = locationname[key].a;
                        }
                        if (key === destcode) {
                          destcountry = locationname[key].a;
                        }
                      }

                      var cost = 0;

                      if ((result_airline_array[i].currencyCode) == "ZAR") {
                        cost = Math.round(result_airline_array[i].amount * 0.094);
                      }

                      var flightlogo = "";
                      if (z == 1) {
                        flightlogo = '<h3 class="custom1"><span class="fas fa-plane-arrival"></span></h3>'
                      } else {
                        flightlogo = '<h3 class="custom1"><span class="fas fa-plane-departure"></span></h3>'
                      }
                      if (count == 0) {
                        body = '<div class="dishlist" style="margin-top:25px;margin-bottom:25px">' +
                          '<div class="dishlisthumb"><img src="images/resource/rl1.jpg" alt=""></div>' +
                          '<div class="dishlistinfo">' +
                          ' <div class="col-md-1">' +
                          '<div class="checkbox">' +
                          '<label style="font-size: 2em">' +
                          '<input type="checkbox" name="flight_check" value="' + i + '">' +
                          '<span class="cr"><i class="cr-icon fa fa-check"></i></span></label>' +
                          '</div>' +
                          '</div>' +
                          '<div class="col-md-8">' +
                          '<div class="col-md-2" style="text-align:right">' +
                          '<h3 class="custom1" style="font-size:26px"><b><u>Orgin</u></b></h3>' +
                          '<h3 class="custom1">' + odoList[z].segments[c].origCode + ' ' + depart_time + '</h3>' +
                          '<p><span style="font-size:16px">' + origcountry + '</span></p>' +
                          '<p><span style="font-size:16px">' + depart_array[0] + '</span></p>' +
                          '</div>' +
                          '<div class="col-md-2 text-center">' +
                          '<h3 class="custom1">--------</h3>' +
                          flightlogo +
                          '</div>' +
                          '<div class="col-md-3">' +
                          '<h3 class="custom1" style="font-size:26px"><b><u>Destination</u></b></h3>' +
                          '<h3 class="custom1">' + odoList[z].segments[c].destCode + ' ' + depart_arrival_time + '</h3>' +
                          '<p><span style="font-size:16px">' + destcountry + '</span></p>' +
                          '<p><span style="font-size:16px">' + depart_arrival_array[0] + '</span></p>' +
                          '</div>' +
                          '<div class="col-md-5">' +
                          '<h3 class="custom1"  style="font-size:26px"><u>Airline</u></h3>' +
                          '<h3 class="custom1"><span>' + airline_converted_name + '• ' + odoList[z].segments[c].flightNumber + '</span></h3>' +
                          '<p><span style="margin-left:5px;"><i class="fas fa-user-tie fa-2x"></i> Adult X ' + adult + '</span><span><i class="fas fa-child fa-2x"></i>  Child  X ' + children + '</span></p>' +
                          '<p><span style="font-weight:900;font-size:20px;margin-left:5px;">Total : </span><span style="font-weight:900;font-size:20px">$SGD ' + cost + '</span></p>' +
                          '</div></div></div></div>';
                        count++;
                      } else {
                        body = '<div class="dishlist" style="margin-top:25px;margin-bottom:25px">' +
                          '<div class="dishlisthumb"><img src="images/resource/rl1.jpg" alt=""></div>' +
                          '<div class="dishlistinfo">' +
                          ' <div class="col-md-1">' +
                          '</div>' +
                          '<div class="col-md-8">' +
                          '<div class="col-md-2" style="text-align:right">' +
                          '<h3 class="custom1">' + odoList[z].segments[c].origCode + ' ' + depart_time + '</h3>' +
                          '<p><span style="font-size:16px">' + origcountry + '</span></p>' +
                          '<p><span style="font-size:16px">' + depart_array[0] + '</span></p>' +
                          '</div>' +
                          '<div class="col-md-2 text-center">' +
                          flightlogo +
                          '</div>' +
                          '<div class="col-md-3">' +
                          '<h3 class="custom1">' + odoList[z].segments[c].destCode + ' ' + depart_arrival_time + '</h3>' +
                          '<p><span style="font-size:16px">' + destcountry + '</span></p>' +
                          '<p><spa style="font-size:16px"n>' + depart_arrival_array[0] + '</span></p>' +
                          '</div>' +
                          '<div class="col-md-5">' +
                          '<h3 class="custom1"><span>' + airline_converted_name + '• ' + odoList[z].segments[c].flightNumber + '</span></h3>' +
                          '<p><span style="margin-left:5px;"><i class="fas fa-user-tie fa-2x"></i> Adult X ' + adult + '</span><span><i class="fas fa-child fa-2x"></i>  Child  X ' + children + '</span></p>' +
                          '<p><span style="font-weight:900;font-size:20px;margin-left:5px;">Total : </span><span style="font-weight:900;font-size:20px">Included</span></p>' +
                          '</div></div></div></div>';
                      }
                      elm += body;
                    }
                  }
                  var end = '</div>';
                  elm += end;
                  $(elm).appendTo($("#flightmodal_inner"));
                  callbackflight();
                }
              }

            }
          }
        });


        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
          dd = '0' + dd
        }

        if (mm < 10) {
          mm = '0' + mm
        }

        $("#swal-travel-start").val('<?php echo $startdate ?>');
        $("#swal-travel-end").val('<?php echo $enddate ?>');

        today = dd + '-' + mm + '-' + yyyy;
        $('.swal2-input').datepicker({
          format: "dd-mm-yyyy",
          startDate: today,
          autoclose: true,
          todayHighlight: true
        });
      }

      function noisepopup() {
        swal({
          title: 'Trip Details',
          confirmButtonText: 'Submit',
          html: '<select id="swal-country" class="swal2-select" style="display: flex;"><option value="" disabled="" selected>Select a Country</option><option value="taiwan">Taiwan</option><option value="bangkok">Bangkok</option></select>' +
            '<div class="col-md-6"><input  id="swal-start_date"  class="swal2-input date_one" placeholder="Start Date" type="text" style="display: flex;text-align:center;"></div><div class="col-md-6"><input  id="swal-end_date"  class="swal2-input date_two" placeholder="End Date" type="text" style="display: flex;text-align:center"></div>',
          preConfirm: function() {
            var country = $('#swal-country').val();
            var start_date = $('.date_one').val()
            var end_date = $('.date_two').val()
            var json = {
              country: country,
              startdate: start_date,
              enddate: end_date
            }
            return $.ajax({
              url: url + 'travelgroup/' + <?php echo $travel_container_id; ?>,
              type: 'put',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });
          }
        }).then((result) => {
          if (result.hasOwnProperty('value')) {
            if (result.value.errors) {
              swal({
                type: 'error',
                title: result.value.respond
              }).then(
                function() {
                  noisepopup()
                  activatedate()
                }
              )
            } else {
              swal({
                type: 'success',
                title: result.value.respond,
                showConfirmButton: false,
                timer: 1500
              }).then(
                function() {
                  window.location.reload(true)
                }
              )
            }
          } else if (result.hasOwnProperty('dismiss')) {
            swal({
              type: 'error',
              title: 'Oops...',
              text: 'Please select Country and Dates',
            }).then(
              function() {
                noisepopup()
                activatedate()
              }
            )
          }
        });
      }

      function flightsearch(country, departDate, returnDate, adult, children) {
        var country, departDate, returnDate, adult, children;
        var json = {
          country: country,
          departDate: departDate,
          returnDate: returnDate,
          adult: adult,
          children: children
        }
        $.ajax({
          url: url + 'flight',
          type: 'POST',
          headers: {
            'token': $.cookie("token")
          },
          data: json,
          success: function(respond) {
            if (!respond.error) {
              var result_airline_object = respond.respond;
              var result_airline_array = result_airline_object.itineraries;
              window.flight_store = result_airline_object;
              var length = 10;
              if (result_airline_array.length < 11) {
                length = result_airline_array.length;
              }
              $("#flightmodal_inner").empty();
              for (var i = 0; i < length; i++) {
                var odoList = result_airline_array[i].odoList;
                var elm = '<div class="bbox">';
                var count = 0;
                for (var z = 0; z < (odoList).length; z++) {
                  for (var c = 0; c < (odoList[z].segments).length; c++) {

                    var origcode = odoList[z].segments[c].origCode;
                    var destcode = odoList[z].segments[c].destCode;
                    var origcountry = "";
                    var destcountry = "";

                    var orignal_depart_date = odoList[z].segments[c].departureDateTime;

                    var depart_array = orignal_depart_date.split("T");

                    var depart_time = depart_array[1].slice(0, depart_array[1].length - 3);

                    var depart_orignal_arrival_date = odoList[z].segments[c].arrivalDateTime;

                    var depart_arrival_array = depart_orignal_arrival_date.split("T");

                    var depart_arrival_time = depart_arrival_array[1].slice(0, depart_arrival_array[1].length - 3);

                    var body = "";
                    var airlinecode = odoList[z].segments[c].airlineCode;
                    var airlinename = result_airline_object.airlineNames;
                    var locationname = result_airline_object.locationName;
                    var airline_converted_name = "";


                    var adult = result_airline_array[i].fareBreakdown.adults.qty;

                    if (result_airline_array[i].fareBreakdown.children != null) {
                      children = result_airline_array[i].fareBreakdown.children.qty;
                    } else {
                      children = 0;
                    }

                    var keys = Object.keys(airlinename);
                    for (var f = 0; f < keys.length; f++) {
                      var key = keys[f];
                      if (key === airlinecode) {
                        airline_converted_name = airlinename[key];
                      }
                    }

                    var countrykeys = Object.keys(locationname);
                    for (var f = 0; f < countrykeys.length; f++) {
                      var key = countrykeys[f];
                      if (key === origcode) {
                        origcountry = locationname[key].a;
                      }
                      if (key === destcode) {
                        destcountry = locationname[key].a;
                      }
                    }

                    var cost = 0;

                    if ((result_airline_array[i].currencyCode) == "ZAR") {
                      cost = Math.round(result_airline_array[i].amount * 0.094);
                    }

                    var flightlogo = "";
                    if (z == 1) {
                      flightlogo = '<h3 class="custom1"><span class="fas fa-plane-arrival"></span></h3>'
                    } else {
                      flightlogo = '<h3 class="custom1"><span class="fas fa-plane-departure"></span></h3>'
                    }
                    if (count == 0) {
                      body = '<div class="dishlist" style="margin-top:25px;margin-bottom:25px">' +
                        '<div class="dishlisthumb"><img src="images/resource/rl1.jpg" alt=""></div>' +
                        '<div class="dishlistinfo">' +
                        ' <div class="col-md-1">' +
                        '<div class="checkbox">' +
                        '<label style="font-size: 2em">' +
                        '<input type="checkbox" name="flight_check" value="' + i + '">' +
                        '<span class="cr"><i class="cr-icon fa fa-check"></i></span></label>' +
                        '</div>' +
                        '</div>' +
                        '<div class="col-md-8">' +
                        '<div class="col-md-2" style="text-align:right">' +
                        '<h3 class="custom1" style="font-size:26px"><b><u>Orgin</u></b></h3>' +
                        '<h3 class="custom1">' + odoList[z].segments[c].origCode + ' ' + depart_time + '</h3>' +
                        '<p><span style="font-size:16px">' + origcountry + '</span></p>' +
                        '<p><span style="font-size:16px">' + depart_array[0] + '</span></p>' +
                        '</div>' +
                        '<div class="col-md-2 text-center">' +
                        '<h3 class="custom1">--------</h3>' +
                        flightlogo +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<h3 class="custom1" style="font-size:26px"><b><u>Destination</u></b></h3>' +
                        '<h3 class="custom1">' + odoList[z].segments[c].destCode + ' ' + depart_arrival_time + '</h3>' +
                        '<p><span style="font-size:16px">' + destcountry + '</span></p>' +
                        '<p><span style="font-size:16px">' + depart_arrival_array[0] + '</span></p>' +
                        '</div>' +
                        '<div class="col-md-5">' +
                        '<h3 class="custom1"  style="font-size:26px"><u>Airline</u></h3>' +
                        '<h3 class="custom1"><span>' + airline_converted_name + '• ' + odoList[z].segments[c].flightNumber + '</span></h3>' +
                        '<p><span style="margin-left:5px;"><i class="fas fa-user-tie fa-2x"></i> Adult X ' + adult + '</span><span><i class="fas fa-child fa-2x"></i>  Child  X ' + children + '</span></p>' +
                        '<p><span style="font-weight:900;font-size:20px;margin-left:5px;">Total : </span><span style="font-weight:900;font-size:20px">$SGD ' + cost + '</span></p>' +
                        '</div></div></div></div>';
                      count++;
                    } else {
                      body = '<div class="dishlist" style="margin-top:25px;margin-bottom:25px">' +
                        '<div class="dishlisthumb"><img src="images/resource/rl1.jpg" alt=""></div>' +
                        '<div class="dishlistinfo">' +
                        ' <div class="col-md-1">' +
                        '</div>' +
                        '<div class="col-md-8">' +
                        '<div class="col-md-2" style="text-align:right">' +
                        '<h3 class="custom1">' + odoList[z].segments[c].origCode + ' ' + depart_time + '</h3>' +
                        '<p><span style="font-size:16px">' + origcountry + '</span></p>' +
                        '<p><span style="font-size:16px">' + depart_array[0] + '</span></p>' +
                        '</div>' +
                        '<div class="col-md-2 text-center">' +
                        flightlogo +
                        '</div>' +
                        '<div class="col-md-3">' +
                        '<h3 class="custom1">' + odoList[z].segments[c].destCode + ' ' + depart_arrival_time + '</h3>' +
                        '<p><span style="font-size:16px">' + destcountry + '</span></p>' +
                        '<p><spa style="font-size:16px"n>' + depart_arrival_array[0] + '</span></p>' +
                        '</div>' +
                        '<div class="col-md-5">' +
                        '<h3 class="custom1"><span>' + airline_converted_name + '• ' + odoList[z].segments[c].flightNumber + '</span></h3>' +
                        '<p><span style="margin-left:5px;"><i class="fas fa-user-tie fa-2x"></i> Adult X ' + adult + '</span><span><i class="fas fa-child fa-2x"></i>  Child  X ' + children + '</span></p>' +
                        '<p><span style="font-weight:900;font-size:20px;margin-left:5px;">Total : </span><span style="font-weight:900;font-size:20px">Included</span></p>' +
                        '</div></div></div></div>';
                    }
                    elm += body;
                  }
                }
                var end = '</div>';
                elm += end;
                $(elm).appendTo($("#flightmodal_inner"));
                callbackflight();
              }
            }
          }
        });
      }

      function callbackflight() {
        $('input[name="flight_check"]').change(function() {
          if (this.checked) {
            var flight_value = this.value;

            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, Add it!',
              preConfirm: function() {

                var first = JSON.stringify(window.flight_store.itineraries[flight_value]);
                var second = JSON.stringify(window.flight_store.airlineNames);
                var third = JSON.stringify(window.flight_store.locationName);

                var json = {
                  airline_info: first,
                  airline_name: second,
                  airline_location: third
                }

                $.ajax({
                  url: url + 'flight',
                  type: 'put',
                  headers: {
                    'token': $.cookie("token")
                  },
                  data: json,
                  success: function(respond) {
                    if (respond.errors) {

                    } else {
                      var json = {
                        airlineid: respond.respond
                      }
                      return $.ajax({
                        url: url + 'Itineraryairline/' + <?php echo $planner_id; ?>,
                        type: 'put',
                        headers: {
                          'token': $.cookie("token")
                        },
                        data: json,
                        success: function(respond) {
                          return respond
                        }
                      });
                    }
                  }
                });
              }
            }).then((result) => {
              if (result.hasOwnProperty('value')) {
                if (result.value.errors) {
                  swal({
                    type: 'error',
                    title: result.value.respond
                  })
                } else {
                  console.log(result);
                  // $("#h-" + hotel_value + "").attr("disabled", true);
                  swal({
                    type: 'success',
                    title: "Successfully Added into Travel group",
                    showConfirmButton: false,
                    timer: 1500
                  }).then((result) => {
                    $('#flightmodal').modal('toggle');
                  });
                }
              }
            });
          }
        });
      }

      function attractiontiming(ticatt , attractionid) {
        $("#attraction_view_button").empty();
        $.ajax({
          url: url + 'attractionstiming/retrieve/' + ticatt,
          type: 'get',
          headers: {
            'token': $.cookie("token")
          },
          success: function(respond) {
            if (respond.errors) {
              swal({
                type: 'error',
                title: respond.respond
              })
            } else {
              var array = respond.respond;

              var new_array = [];

              for (var z = 0; z < array.length; z++) {

                var start_object = array[z].start;

                var start_array = start_object.split("T");

                var start_final = start_array[1].slice(0, start_array[1].length - 3);

                var end_object = array[z].end;

                var end_array = end_object.split("T");

                var end_final = end_array[1].slice(0, end_array[1].length - 3);

                var new_start_final = start_array[0] + " " + start_final;
                var end_start_final = end_array[0] + " " + end_final;

                var count = respond.count[z] + "%";

                var json = {
                  id: array[z].id,
                  start: new_start_final,
                  end: end_start_final,
                  suggested: array[z].suggested,
                  ticid: array[z].ticid,
                  ticaid: array[z].ticaid,
                  count: count
                }
                new_array.push(json);

              }

              var oTblReport = $("#attraction_view_table");
              oTblReport.DataTable({
                "destroy": true,
                "data": new_array,
                "columns": [{
                    "data": "start"
                  },
                  {
                    "data": "end"
                  },
                  {
                    "data": "suggested"
                  },
                  {
                    "data": "count"
                  }<?php if($status != 2){ ?>,
                  {
                    "data": "id",
                    "render": function(data) {
                      return '<a onclick="vote_timing(' + data + ' , 1 , ' + ticatt + ')" href="javascript:void(0);" class="btn btn-sq-sm btn-success">YES</a> <a onclick="vote_timing(' + data + ' , 0 , ' + ticatt + ' )" href="javascript:void(0);" class="btn btn-sq-sm btn-danger">NO</a>'
                    }
                  }<?php } ?>
                ]
              });

              var but = '<a style="font-size:25px" onclick="addattractiontiming('+attractionid+',' + ticatt + ')" href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-plus"> Add Timing</i></a>';
              $(but).appendTo($("#attraction_view_button"));

              $('#attraction_view_modal').modal('show');
            }
          }
        });
      }

      function regenattractiontiming(ticatt) {
        $.ajax({
          url: url + 'attractionstiming/retrieve/' + ticatt,
          type: 'get',
          headers: {
            'token': $.cookie("token")
          },
          success: function(respond) {
            if (respond.errors) {
              swal({
                type: 'error',
                title: respond.respond
              })
            } else {
              var array = respond.respond;

              var new_array = [];

              for (var z = 0; z < array.length; z++) {

                var start_object = array[z].start;

                var start_array = start_object.split("T");

                var start_final = start_array[1].slice(0, start_array[1].length - 3);

                var end_object = array[z].end;

                var end_array = end_object.split("T");

                var end_final = end_array[1].slice(0, end_array[1].length - 3);

                var new_start_final = start_array[0] + " " + start_final;
                var end_start_final = end_array[0] + " " + end_final;

                var count = respond.count[z] + "%";

                var json = {
                  id: array[z].id,
                  start: new_start_final,
                  end: end_start_final,
                  suggested: array[z].suggested,
                  ticid: array[z].ticid,
                  ticaid: array[z].ticaid,
                  count: count
                }
                new_array.push(json);
              }
              var oTblReport = $("#attraction_view_table");
              oTblReport.DataTable({
                "destroy": true,
                "data": new_array,
                "columns": [{
                    "data": "start"
                  },
                  {
                    "data": "end"
                  },
                  {
                    "data": "suggested"
                  },
                  {
                    "data": "count"
                  }<?php if($status != 2){ ?>,
                  {
                    "data": "id",
                    "render": function(data) {
                      return '<a onclick="vote_timing(' + data + ' , 1 , ' + ticatt + ')" href="javascript:void(0);" class="btn btn-sq-sm btn-success">YES</a> <a onclick="vote_timing(' + data + ' , 0 , ' + ticatt + ' )" href="javascript:void(0);" class="btn btn-sq-sm btn-danger">NO</a>'
                    }
                  }
                 <?php } ?>
                ]
              });
            }
          }
        });
      }

      function hoteltiming(tichid ,hotelid) {
        $("#hotel_view_button").empty();
        $.ajax({
          url: url + 'hoteltiming/retrieve/' + tichid,
          type: 'get',
          headers: {
            'token': $.cookie("token")
          },
          success: function(respond) {
            if (respond.errors) {
              swal({
                type: 'error',
                title: respond.respond
              })
            } else {
              var array = respond.respond;

              var new_array = [];

              for (var z = 0; z < array.length; z++) {

                var start_object = array[z].start;

                var start_array = start_object.split("T");

                var start_final = start_array[1].slice(0, start_array[1].length - 3);

                var end_object = array[z].end;

                var end_array = end_object.split("T");

                var end_final = end_array[1].slice(0, end_array[1].length - 3);

                var new_start_final = start_array[0] + " " + start_final;
                var end_start_final = end_array[0] + " " + end_final;

                var count = respond.count[z] + "%";

                var json = {
                  id: array[z].id,
                  start: new_start_final,
                  end: end_start_final,
                  suggested: array[z].suggested,
                  ticid: array[z].ticid,
                  tichid : array[z].tichid,
                  count: count
                }
                new_array.push(json);
              }

              var oTblReport = $("#hotel_view_table");
              oTblReport.DataTable({
                "destroy": true,
                "data": new_array,
                "columns": [{
                    "data": "start"
                  },
                  {
                    "data": "end"
                  },
                  {
                    "data": "suggested"
                  },
                  {
                    "data": "count"
                  } <?php if($status != 2){ ?>,
                  {
                    "data": "id",
                    "render": function(data) {
                      return '<a onclick="hotel_vote_timing(' + data + ' , 1 , ' + tichid + ')" href="javascript:void(0);" class="btn btn-sq-sm btn-success">YES</a> <a onclick="hotel_vote_timing(' + data + ' , 0 , ' + tichid + ' )" href="javascript:void(0);" class="btn btn-sq-sm btn-danger">NO</a>'
                    }
                  }
                  <?php } ?>           
                ]
              });
              var but = '<a style="font-size:25px" onclick="addhoteltiming('+hotelid+',' + tichid + ')" href="javascript:void(0);" class="btn btn-primary"><i class="fa fa-plus"> Add Timing</i></a>';
              $(but).appendTo($("#hotel_view_button"));
              $('#hotel_view_modal').modal('show');
            }
          }
        });
      }

      function regenhoteltiming(tichid) {
        $.ajax({
          url: url + 'hoteltiming/retrieve/' + tichid,
          type: 'get',
          headers: {
            'token': $.cookie("token")
          },
          success: function(respond) {
            if (respond.errors) {
              swal({
                type: 'error',
                title: respond.respond
              })
            } else {
              var array = respond.respond;

              var new_array = [];

              for (var z = 0; z < array.length; z++) {

                var start_object = array[z].start;

                var start_array = start_object.split("T");

                var start_final = start_array[1].slice(0, start_array[1].length - 3);

                var end_object = array[z].end;

                var end_array = end_object.split("T");

                var end_final = end_array[1].slice(0, end_array[1].length - 3);

                var new_start_final = start_array[0] + " " + start_final;
                var end_start_final = end_array[0] + " " + end_final;

                var count = respond.count[z] + "%";

                var json = {
                  id: array[z].id,
                  start: new_start_final,
                  end: end_start_final,
                  suggested: array[z].suggested,
                  ticid: array[z].ticid,
                  tichid : array[z].tichid,
                  count: count
                }
                new_array.push(json);
              }

              var oTblReport = $("#hotel_view_table");
              oTblReport.DataTable({
                "destroy": true,
                "data": new_array,
                "columns": [{
                    "data": "start"
                  },
                  {
                    "data": "end"
                  },
                  {
                    "data": "suggested"
                  },
                  {
                    "data": "count"
                  }<?php if($status != 2){ ?>,
                  {
                    "data": "id",
                    "render": function(data) {
                      return '<a onclick="hotel_vote_timing(' + data + ' , 1 , ' + tichid + ')" href="javascript:void(0);" class="btn btn-sq-sm btn-success">YES</a> <a onclick="hotel_vote_timing(' + data + ' , 0 , ' + tichid + ' )" href="javascript:void(0);" class="btn btn-sq-sm btn-danger">NO</a>'
                    }
                  }<?php } ?>
                ]
              });
            }
          }
        });
      }

      function vote_timing(id, vote, attractionid) {
        swal({
          title: 'Are you sure?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Add it!',
          preConfirm: function() {
            var json = {
              attractiontimingpollingid: id,
              vote: vote
            };
            return $.ajax({
              url: url + 'attractiontimingpolling/' + <?php echo $planner_id; ?>,
              type: 'put',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });
          }
        }).then((respond) => {
          if (respond.hasOwnProperty('value')) {
            if (respond.value.errors) {
              swal({
                type: 'error',
                title: respond.value.respond
              })
            } else {
              if (respond.hasOwnProperty('value')) {
                if (respond.value.errors) {
                  swal({
                    type: 'error',
                    title: respond.value.respond
                  })
                } else {
                  swal({
                    type: 'success',
                    title: respond.value.respond,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    regenattractiontiming(attractionid);
                  })
                }
              }
            }
          };
        });
      }

      function hotel_vote_timing(id, vote, tichid) {
        swal({
          title: 'Are you sure?',
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Add it!',
          preConfirm: function() {
            var json = {
              hotelpollingid: id,
              vote: vote
            };
            return $.ajax({
              url: url + 'hoteltimingpolling/' + <?php echo $planner_id; ?>,
              type: 'put',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });
          }
        }).then((respond) => {
          if (respond.hasOwnProperty('value')) {
            if (respond.value.errors) {
              swal({
                type: 'error',
                title: respond.value.respond
              })
            } else {
              if (respond.hasOwnProperty('value')) {
                if (respond.value.errors) {
                  swal({
                    type: 'error',
                    title: respond.value.respond
                  })
                } else {
                  swal({
                    type: 'success',
                    title: respond.value.respond,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    regenhoteltiming(tichid);
                  })
                }
              }
            }
          };
        });
      }

      function addattractiontiming(attractionid,ticaid) {
        swal({
          title: 'Attraction New Date / Time',
          confirmButtonText: 'Submit',
          html: '<div class="row"><div class="col-md-6">Start Date</div><div class="col-md-6">End Date</div>' +
            '<div class="col-md-6"><input id="swal-attraction-start_date"  class="swal2-input date_one" placeholder="Start Date" type="text" value="<?php echo $startdate ?>" style="display: flex;text-align:center;"></div><div class="col-md-6"><input  id="swal-attraction-end_date"  class="swal2-input date_two" placeholder="End Date" value="<?php echo $enddate ?>" type="text" style="display: flex;text-align:center;"></div>' +
            '<div class="col-md-6">Start Time</div><div class="col-md-6">End Time</div>' +
            '<div class="col-md-6"><input id="swal-attraction-start_time"  class="swal2-input" placeholder="Start Date" type="text" style="display: flex;text-align:center;"></div><div class="col-md-6"><input  id="swal-attraction-end_time"  class="swal2-input clockpicker" placeholder="End Date" type="text" style="display: flex;text-align:center;"></div></div>',
          showLoaderOnConfirm: true,
          preConfirm: function() {
            var start_date = $('#swal-attraction-start_date').val();
            var end_date = $('#swal-attraction-end_date').val();
            var start_time = $('#swal-attraction-start_time').val();
            var end_time = $('#swal-attraction-end_time').val();
            
            var new_start_date = start_date.split("-").reverse().join("-");
            var new_end_date = end_date.split("-").reverse().join("-");

            var json = {
              startdate: new_start_date,
              enddate: new_end_date,
              starttime:start_time,
              endtime:end_time
            };
            return $.ajax({
              url: url + 'attractionstiming/' + ticaid,
              type: 'post',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });

          }
        }).then((respond) => {
          if (respond.hasOwnProperty('value')) {
            if (respond.value.errors) {
              swal({
                type: 'error',
                title: respond.value.respond
              })
            } else {
              swal({
                type: 'success',
                title: respond.value.respond,
                showConfirmButton: false,
                timer: 1500
              }).then(() => {
                regenattractiontiming(ticaid);
              })
            }
          }
        });
        $('#swal-attraction-start_date').datepicker({
          format: "dd-mm-yyyy",
          startDate: '<?php echo $startdate ?>',
          autoclose: true,
          todayHighlight: true
        });

        $('#swal-attraction-end_date').datepicker({
          format: "dd-mm-yyyy",
          endDate: '<?php echo $enddate ?>',
          autoclose: true,
          todayHighlight: true
        });

        $('#swal-attraction-start_time').timepicker({
          'timeFormat': 'H:i'
        });
        $('#swal-attraction-end_time').timepicker({
          'timeFormat': 'H:i'
        });

      }
      
      function addhoteltiming(hotelid,tichid) {
        swal({
          title: 'Attraction New Date / Time',
          confirmButtonText: 'Submit',
          html: '<div class="row"><div class="col-md-6">Start Date</div><div class="col-md-6">End Date</div>' +
            '<div class="col-md-6"><input id="swal-hotel-start_date"  class="swal2-input date_one" placeholder="Start Date" type="text" value="<?php echo $startdate ?>" style="display: flex;text-align:center;"></div><div class="col-md-6"><input  id="swal-hotel-end_date"  class="swal2-input date_two" placeholder="End Date" value="<?php echo $enddate ?>" type="text" style="display: flex;text-align:center;"></div>' +
            '<div class="col-md-6">Start Time</div><div class="col-md-6">End Time</div>' +
            '<div class="col-md-6"><input id="swal-hotel-start_time"  class="swal2-input" placeholder="Start Time" type="text" style="display: flex;text-align:center;"></div><div class="col-md-6"><input  id="swal-hotel-end_time"  class="swal2-input clockpicker" placeholder="End Time" type="text" style="display: flex;text-align:center;"></div></div>',
          showLoaderOnConfirm: true,
          preConfirm: function() {
            var start_date = $('#swal-hotel-start_date').val();
            var end_date = $('#swal-hotel-end_date').val();
            var start_time = $('#swal-hotel-start_time').val();
            var end_time = $('#swal-hotel-end_time').val();
            
            var new_start_date = start_date.split("-").reverse().join("-");
            var new_end_date = end_date.split("-").reverse().join("-");

            var json = {
              startdate: new_start_date,
              enddate: new_end_date,
              starttime:start_time,
              endtime:end_time
            };
            return $.ajax({
              url: url + 'hoteltiming/' + tichid,
              type: 'post',
              headers: {
                'token': $.cookie("token")
              },
              data: json,
              success: function(respond) {
                return respond
              }
            });

          }
        }).then((respond) => {
          if (respond.hasOwnProperty('value')) {
            if (respond.value.errors) {
              swal({
                type: 'error',
                title: respond.value.respond
              })
            } else {
              swal({
                type: 'success',
                title: respond.value.respond,
                showConfirmButton: false,
                timer: 1500
              }).then(() => {
                regenhoteltiming(tichid);
              })
            }
          }
        });
        $('#swal-hotel-start_date').datepicker({
          format: "dd-mm-yyyy",
          startDate: '<?php echo $startdate ?>',
          autoclose: true,
          todayHighlight: true
        });

        $('#swal-hotel-end_date').datepicker({
          format: "dd-mm-yyyy",
          endDate: '<?php echo $enddate ?>',
          autoclose: true,
          todayHighlight: true
        });

        $('#swal-hotel-start_time').timepicker({
          'timeFormat': 'H:i'
        });
        $('#swal-hotel-end_time').timepicker({
          'timeFormat': 'H:i'
        });

      }
      
    </script>

  </body>

  </html>

  </html>