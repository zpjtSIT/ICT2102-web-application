<?php include 'base/authentication.php'; ?>
<?php include 'base/head.php'; ?>
</head>

<body class="full-height" id="scrollup">

  <div class="page-loading">
    <img src="images\loader.gif" alt="">
  </div>

  <div class="theme-layout">

    <div class="responsiveheader">
      <div class="rheader">
        <span><img src="images/ricon.png" alt=""></span>
        <div class="logo">
          <a href="#" title=""><img src="images/resource/logo.png" alt=""></a>
        </div>
        <div class="extras">
          <span class="accountbtn"><i class="flaticon-avatar"></i></span>
        </div>
      </div>
      <div class="rnaver">
        <span class="closeresmenu"><i>x</i>Close</span>
        <div class="logo"><a href="#" title=""><img src="images\PATdotcom.png" alt=""></a></div>
        <div class="extras">
          <a href="add-listing.html" title=""><img src="images/icon1.png" alt=""> Add Listing</a>
        </div>
        <ul>
          <li class="menu-item-has-children">
            <a href="#" title="">Home</a>
            <ul>
              <li><a href="index.html" title="">Home 1</a></li>
              <li><a href="index2.html" title="">Home 2</a></li>
              <li><a href="index3.html" title="">Home 3</a></li>
              <li><a href="index4.html" title="">Home 4</a></li>
              <li><a href="index5.html" title="">Home 5</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <header class="sticktop">
      <div class="logo">
        <a href="index.php" title=""><img src="images\PATdotcom.png" alt=""></a>
      </div>
      <nav>
        <ul>
          <?php 
          if($login){ ?>
          <li>
            <a href="travelplanner.php" title="">My Travel Planner</a>
          </li>
          <li class="menu-item-has-children">
            <a href="#" style="font-size:24px" title=""><span class="accountbtn1"><i class="flaticon-avatar"></i></span></a>
            <ul>
              <li><a href="#" title="">PROFILE</a></li>
              <li><a href="logout.php" title="">LOGOUT</a></li>
            </ul>
          </li>
          <?php  } else { ?>
          <a href="#" title=""><span class="accountbtn"><i style="margin-top:30px" class="flaticon-avatar"></i></span></a>
          <?php } ?>
        </ul>
      </nav>
    </header>

    <section>
      <div class="block no-padding">
        <div class="layer blackish">
          <div data-velocity="-.1" style="background: url(images/resource/p1.jpeg) repeat scroll 50% 422.28px transparent;" class="no-parallax parallax scrolly-invisible"></div>
          <!-- PARALLAX BACKGROUND IMAGE -->
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="listingsf">
                  <h3>Explore This City</h3>
                  <p>Let's uncover the best places to eat, drink, and shop nearest to you.</p>
                  <div class="listingform">
                    <form>
                      <div class="fieldform line">
                        <div id="myDropdown"></div>
                      </div>
                      <div class="fieldform">
                        <div id="myDropdowns" class="s2"></div>
                        <i class="flaticon-pin"></i>
                      </div>
                      <div class="fieldbtn">
                        <button type="submit">Search <i class="flaticon-magnifying-glass"></i></button>
                      </div>
                    </form>
                  </div>
                  <div class="formcat">
                    <span>Popular Searches</span>
                    <a href="#" title="">Food & Drink</a>
                    <a href="#" title="">Hotel & Hostel</a>
                    <a href="#" title="">Shop & Store</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block">
        <div class="row">
          <div class="col-lg-12">
            <div class="heading">
              <h2>See How It Works</h2>
              <span>Discover & Plan With your friends </span>
            </div>
            <!-- Heading -->
            <div class="howworksec">
              <div class="row">
                <div class="col-lg-2">
                  <div class="howwork">
                    <i class="flaticon-share"></i>
                    <h3>Invite Your Friends</h3>
                    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="howwork">
                    <i class="flaticon-map"></i>
                    <h3>Find What You Want</h3>
                    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="howwork">
                    <i class="flaticon-note"></i>
                    <h3>Add to Plan List</h3>
                    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="howwork">
                    <i class="flaticon-thumb-up"></i>
                    <h3>Vote</h3>
                    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="howwork">
                    <i class="flaticon-booked"></i>
                    <h3>Finalize</h3>
                    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                  </div>
                </div>
                <div class="col-lg-2">
                  <div class="howwork">
                    <i class="flaticon-planet-earth"></i>
                    <h3>Bon Voyage</h3>
                    <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat Phasellus viverra nulla ut metus varius laoreet.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block no-padding">
        <div class="container fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="singleline"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block less-bottom">
        <div class="container fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="heading">
                <h2>Happening Cities</h2>
                <span>Cities you must explore this summer</span>
              </div>
              <!-- Heading -->
              <ul class="citieslists">
                <li>
                  <div class="cities">
                    <a href="#" title=""><img src="images\resource\hp1.jpeg" alt=""></a>
                    <div class="cities-title">
                      <h3><a href="#" title="">Hong Kong</a></h3><span>7 listings</span></div>
                  </div>
                  <!-- Cities -->
                  <div class="cities">
                    <a href="#" title=""><img src="images\resource\hp2.jpeg" alt=""></a>
                    <div class="cities-title">
                      <h3><a href="#" title="">China</a></h3><span>7 listings</span></div>
                  </div>
                  <!-- Cities -->
                  <div class="cities">
                    <a href="#" title=""><img src="images\resource\hp3.jpeg" alt=""></a>
                    <div class="cities-title">
                      <h3><a href="#" title="">Malaysia</a></h3><span>7 listings</span></div>
                  </div>
                  <!-- Cities -->
                  <div class="cities">
                    <a href="#" title=""><img src="images\resource\hp4.jpeg" alt=""></a>
                    <div class="cities-title">
                      <h3><a href="#" title="">Singapore</a></h3><span>7 listings</span></div>
                  </div>
                  <!-- Cities -->
                </li>
                <li>
                  <div class="cities">
                    <a href="#" title=""><img src="images\resource\hp5.jpeg" alt=""></a>
                    <div class="cities-title">
                      <h3><a href="#" title="">Pakistan</a></h3><span>7 listings</span></div>
                  </div>
                  <!-- Cities -->
                  <div class="cities">
                    <a href="#" title=""><img src="images\resource\hp6.jpeg" alt=""></a>
                    <div class="cities-title">
                      <h3><a href="#" title="">Turkey</a></h3><span>7 listings</span></div>
                  </div>
                  <!-- Cities -->
                  <div class="cities">
                    <a href="#" title=""><img src="images\resource\hp4.jpeg" alt=""></a>
                    <div class="cities-title">
                      <h3><a href="#" title="">Japan</a></h3><span>7 listings</span></div>
                  </div>
                  <!-- Cities -->
                  <div class="cities">
                    <a href="#" title=""><img src="images\resource\hp5.jpeg" alt=""></a>
                    <div class="cities-title">
                      <h3><a href="#" title="">Australia</a></h3><span>7 listings</span></div>
                  </div>
                  <!-- Cities -->
                </li>
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
              <div class="heading">
                <h2>Most Visited Places</h2>
                <span>Explore the greates places in the city. You won’t be disappointed.</span>
              </div>
              <!-- Heading -->
              <div class="carouselplaces">
                <ul id="carouselsec">
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r1.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Hills Restaurant</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r2.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Urban Hotels</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r3.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Liberty Club</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r4.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Blansa Restaurant</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r5.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Liberty Club</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r5.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Liberty Club</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="block no-padding">
        <div class="container fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="singleline"></div>
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
              <div class="heading">
                <h2>Popular Airlines</h2>
                <span>Travel comfortable with us . You won’t be disappointed.</span>
              </div>
              <!-- Heading -->
              <div class="carouselplaces">
                <ul id="carouselsecs">
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r1.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Hills Restaurant</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r2.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Urban Hotels</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r3.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Liberty Club</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r4.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Blansa Restaurant</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r5.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Liberty Club</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                  <li>
                    <div class="places">
                      <div class="placethumb">
                        <img src="images\resource\r5.jpeg" alt="">
                        <div class="placeoptions">
                          <span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
                          <span class="pull-right"> <i class="flaticon-heart"></i> Save </span>
                        </div>
                      </div>
                      <div class="placeinfos">
                        <h3><a href="#" title="">Liberty Club</a></h3>
                        <span>Delicious, luxury food for you</span>
                        <ul class="listmetas">
                          <li><span class="rated">3.5</span>3 Ratings</li>
                          <li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
                          <li>Open</li>
                        </ul>
                      </div>
                      <div class="placedetails">
                        <span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
                        <span class="pull-right"><i class="flaticon-phone-call"></i>+ 44 20 456 823</span>
                      </div>
                    </div>
                    <!-- Places -->
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include 'base/footer.php'; ?>
  </div>
  <?php include 'base/loginpop.php'; ?>
  
  <script src="js/jquery.min.js" type="text/javascript"></script>
  <script src="js/modernizr.js" type="text/javascript"></script>
  <script src="js/script.js" type="text/javascript"></script>
  <script src="js/bootstrap.min.js" type="text/javascript"></script>
  <script src="js/wow.min.js" type="text/javascript"></script>
  <script src="js/slick.min.js" type="text/javascript"></script>
  <script src="js/dropdown.js" type="text/javascript"></script>
  <script src="js/isotop.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.5/sweetalert2.all.min.js"></script>
<script>
 
  
var url = 'http://ict2102group8.tk:3000/';
  
$('#login_form').validate({ // initialize the plugin
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            }
        },
        submitHandler: function(form) { // for demo
          $.ajax({
            type: 'post',
            url: url + 'login',
            data: $('#login_form').serialize(),
            success: function (respond) {
              console.log(respond)
              if(!respond.error){
                $.cookie("token", respond.token);
                window.location.reload(true);
              } else {
                swal('Any fool can use a computer');
              }
            },
            error: function(respond) {
              console.log(respond)
               swal({
                  type: 'error',
                  title: 'Oops...',
                  text: respond.responseJSON.respond
                })
            }
          });   
          
        }
    });
$('#register_form').validate({ // initialize the plugin
        rules: {
            username: {
                required: true,
                minlength: 5
            },
            password: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            fullname: {
                required: true,
                maxlength: 15
            }
        },
        submitHandler: function(form) { // for demo
          $.ajax({
            type: 'put',
            url: url + 'login',
            data: $('#register_form').serialize(),
            success: function (respond) {
              if(!respond.errors){
                 swal(respond.success);
                 $('#register_form').trigger("reset");
              } else {
                swal(respond.respond);
              }
            },
            error: function(respond) {
               swal({
                  type: 'error',
                  title: 'Oops...',
                  text: respond.responseJSON.respond
                })
            }
          });   
          
        }
    });
</script>
</body>

</html>