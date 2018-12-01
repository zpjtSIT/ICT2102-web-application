<?php include 'base/authentication.php'; ?>
<?php include 'base/method.php'; ?>
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($login){
   $token_result = json_decode(gettravelplanner($url))->respond;
}
?>
<?php include 'base/head.php'; ?>

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
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="bbox" id="bv">
                <h3 style="background-color:#004d47">Bon Voyage</h3>
                <div class="ldesc">
                  <div class="fcsec">
                    <div class="row">
                      <?php if($login){if(count((array)$token_result)){ foreach ($token_result->bv as $bv) {
                          ?>
                      <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="fc s2">
                          <img src="images\resource\c1.jpeg" alt="">
                          <a href="#" title=""><span class="label label-primary"><?php echo $bv->name ?></span>
                              <i class="flaticon-planet-earth"></i></a>
                        </div>
                      </div>
                      <?php
                        }
                       }
                                      }
                      ?>
                        <!-- Featured Category -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="bbox" id="plan">
                <h3 style="background-color:#004d47">Planning</h3>
                <div class="ldesc">
                  <div class="fcsec">
                    <div class="row">
                      <?php if($login){if(count((array)$token_result)){foreach ($token_result->plan as $plan) {
                          ?>
                      <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="fc s2">
                          <img src="images\resource\c1.jpeg" alt="">
                          <a href="/planner.php?id=<?php echo $plan->id;?>" title=""><span class="label label-default"><?php echo $plan->name ?></span>
                              <i class="flaticon-planet-earth"></i></a>
                        </div>
                      </div>
                      <?php
                      } } }?>
                        <!-- Featured Category -->
                        <div class="col-lg-3 col-md-4 col-sm-6">
                          <div class="fc s2">
                            <img src="images\resource\c4.jpeg" alt="">
                            <?php if($login) { ?> <a href="#" onclick="addnewplan()" href="javascript:void(0);" title="">Add Travel Planner <i class="fa fa-plus"></i></a> <?php } else { ?>
                            <a href="#" onclick="registeruser()" href="javascript:void(0);" title="">Add Travel Planner <i class="fa fa-plus"></i></a>
                            <?php } ?>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="bbox" id="past">
                <h3 style="background-color:#004d47">Past</h3>
                <div class="ldesc">
                  <div class="fcsec">
                    <div class="row">
                      <?php if($login){ if(count((array)$token_result)){foreach ($token_result->past as $past) {
                          ?>
                      <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="fc s2">
                          <img src="images\resource\c1.jpeg" alt="">
                          <a href="#" title="">
                            <?php 
                                    if($past->status === 2){
                                      ?><span class="label label-success"><?php echo $past->name ?></span>
                            <?php
                                    } else {
                                      ?><span class="label label-danger"><?php echo $past->name ?></span>
                              <?php
                                    } 
                                  ?>
                                <i class="flaticon-planet-earth"></i></a>
                        </div>
                      </div>
                      <?php
                      } } } ?>
                        <!-- Featured Category -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'base/footer.php'; ?>
  </div>
  <?php include 'base/loginpop.php'; ?>
  <?php include 'base/javascript.php'; ?>
  <script type="text/javascript" src="js\value.js"></script>
  <script type="text/javascript" src="js\sumoselect.js"></script>
  <script>
    
    function registeruser(){
      $( ".accountbtn" ).trigger( "click" );
    }
    
    function addnewplan() {
      swal({
        title: 'New Travel Planner',
        input: 'text',
        inputAttributes: {
          autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Create',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
          var json = {
            "name": login
          };
          return $.ajax({
            url: url + 'travelgroup',
            type: 'post',
            headers: {
              'token': $.cookie("token")
            },
            data: json,
            success: function(respond) {
              return respond
            }
          });
        },
        allowOutsideClick: () => !swal.isLoading()
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

      })
    }
  </script>
</body>

</html>

</html>