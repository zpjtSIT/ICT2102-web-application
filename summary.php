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
     } 
  } else {
    header('Location: '."/travelplanner.php");
  }
}

?>
  <?php include 'base/head.php'; ?>

  <style>
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

            <?php if($status == 2){
              ?><a class="btn btn-success pull-right" style="margin-right:20px" href="travelsummary.php?id=<?php echo $planner_id; ?>">FINALIZE</a>
            <?php
             } ?>
          </div>
        </div>
      </section>
      <?php include 'base/footer.php'; ?>
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
      
    </script>

  </body>

  </html>

  </html>