<?php include 'base/authenticationInner.php'; ?>
<?php include 'base/head.php'; ?>
<?php include 'base/method.php'; ?>
<?php

$options_tab = $_GET['option'];
if($options_tab == "Attractions"){
  $att_css_li = 'class="active"';
  $hotel_css_li = 'class=""';
  $att_css_div = 'class="tab-pane active"';
  $hotel_css_div = 'class="tab-pane"';
} else {
  $att_css_li = 'class=""';
  $hotel_css_li = 'class="active">';
  $att_css_div = 'class="tab-pane "';
  $hotel_css_div = 'class="tab-pane active"';
}

$id_container = $_GET['id'];
$token_result = json_decode(gethotelinit($url , $id_container));
$tokenresult2 = json_decode(getattractioninit($url , $id_container));


?>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    #module {
      font-size: 14px;
      line-height: 1.5;
    }

    #module p.collapse[aria-expanded="false"] {
      height: 42px !important;
      overflow: hidden;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }

    #module p.collapsing[aria-expanded="false"] {
      height: 42px !important;
    }

    #module a.collapsed:after {
      content: '+ Show More';
    }

    #module a:not(.collapsed):after {
      content: '- Show Less';
    }

    .ml-listings {
      padding-left: 10px !important;
    }

    /* Tabs panel */

    .tabbable-panel {
      border: 1px solid #eee;
      padding: 10px;
    }

    /* Default mode */

    .tabbable-line>.nav-tabs {
      border: none;
      margin: 0px;
    }

    .tabbable-line>.nav-tabs>li {
      margin-right: 2px;
    }

    .tabbable-line>.nav-tabs>li>a {
      border: 0;
      margin-right: 0;
      color: #737373;
    }

    .tabbable-line>.nav-tabs>li>a>i {
      color: #a6a6a6;
    }

    .tabbable-line>.nav-tabs>li.open,
    .tabbable-line>.nav-tabs>li:hover {
      border-bottom: 4px solid #fbcdcf;
    }

    .tabbable-line>.nav-tabs>li.open>a,
    .tabbable-line>.nav-tabs>li:hover>a {
      border: 0;
      background: none !important;
      color: #333333;
    }

    .tabbable-line>.nav-tabs>li.open>a>i,
    .tabbable-line>.nav-tabs>li:hover>a>i {
      color: #a6a6a6;
    }

    .tabbable-line>.nav-tabs>li.open .dropdown-menu,
    .tabbable-line>.nav-tabs>li:hover .dropdown-menu {
      margin-top: 0px;
    }

    .tabbable-line>.nav-tabs>li.active {
      border-bottom: 4px solid #f3565d;
      position: relative;
    }

    .tabbable-line>.nav-tabs>li.active>a {
      border: 0;
      color: #333333;
    }

    .tabbable-line>.nav-tabs>li.active>a>i {
      color: #404040;
    }

    .tabbable-line>.tab-content {
      margin-top: -3px;
      background-color: #fff;
      border: 0;
      border-top: 1px solid #eee;
      padding: 15px 0;
    }

    .portlet .tabbable-line>.tab-content {
      padding-bottom: 0;
    }

    .ml-filterbar>ul {
      float: left !important;
      padding-bottom: 10px;
    }

    button:hover {
      background-color: #333333;
    }
  </style>

  </head>

  <body class="full-height" id="scrollup">

    <div class="page-loading">
      <img src="images\loader.gif" alt="">
      <span>Skip Loader</span>
    </div>

    <div class="theme-layout">

      <section>
        <div class="block no-padding">
          <div class="container fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="ml-filterslide">
                  <div class="mlfilter-sec fakeScroll fakeScroll--inside">
                  </div>
                  <div class="ml-listings fakeScroll fakeScrolls">
                    <div class="ml-filterbar">
                      <ul class="nav nav-tabs">
                        <li <?php echo $hotel_css_li; ?>
                          </l>
                          <a href="#tab_default_1" data-toggle="tab">
													Hotels </a>
                        </li>
                        <li <?php echo $att_css_li; ?>
                          </l>
                          <a href="#tab_default_2" data-toggle="tab">
													Attractions </a>
                        </li>
                      </ul>
                      <div class="btn-group pull-right">
                        <button type="button" id="search_btn" style="margin-top:10px !important;" class="btn btn-primary navbar-btn pull-right"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    <div class="ml-placessec">
                      <div class="row">
                        <div class="tab-content">
                          <div <?php echo $hotel_css_div; ?> id="tab_default_1">
                            <?php if($login){if(count((array)$token_result->respond)){foreach ($token_result->respond as $hotel_array) {?>
                            <div class="col-lg-12">
                              <div class="places s2">
                                <div class="placethumb">
                                  <a href="#"><img src="<?php echo $hotel_array->image; ?>" alt=""></a>
                                </div>
                                <div class="boxplaces">
                                  <div class="placeinfos">
                                    <h3 style="padding-bottom:15px"><a href="#" title=""><?php echo $hotel_array->name ?></a>

                                      <?php for($i = 0; $i < $hotel_array->rating; $i++){ ?>
                                      <i class="fa fa-star" style='color:#28b8dc'></i>
                                      <?php } ?>
                                      <i class="pull-right"><?php echo $hotel_array->price ?></i>
                                    </h3>
                                    <hr>
                                    <?php for($i = 0; $i < $hotel_array->pax; $i++){ ?>
                                    <i class="fas fa-male" style='color:#28b8dc'></i>
                                    <?php } ?> |
                                    <?php echo $hotel_array->pax; ?> PAX
                                    <p style="margin-top:20px">
                                      <i class="fa fa-building" style='color:#28b8dc'></i>
                                      <?php echo $hotel_array->address ?>
                                    </p>
                                    <hr>
                                    <ul class="listmetas">
                                      <li><i class="fas fa-globe fa-2x"></i><a style="margin-left:5px" target="_blank" rel="noopener noreferrer" href="<?php echo $hotel_array->website; ?>">Website</a></li>
                                      <li><i class="fas fa-phone fa-2x" style="margin-right:5px"></i>
                                        <?php echo $hotel_array->tel ?>
                                      </li>
                                      <li><i class="fas fa-location-arrow fa-2x" style="margin-right:5px"></i><a href="#" onclick="addmarkerforviewing(<?php echo $hotel_array->lat ." , ". $hotel_array->long ?>)" href="javascript:void(0);">View Map</a></li>
                                    </ul>
                                  </div>
                                  <div class="placedetails">
                                    <span class="pull-left"><i class="flaticon-pin" style='color:#28b8dc'></i><?php echo $hotel_array->country ?></span>
                                    <span class="pull-right"><p class="c-label"><input name="hotel_check" id="h-<?php echo $hotel_array->id; ?>" type="checkbox" <?php echo $hotel_array->selected_hotel; ?> value="<?php echo $hotel_array->id; ?>"><label for="h-<?php echo $hotel_array->id; ?>">Selected</label></p></span>

                                  </div>
                                </div>
                              </div>
                              <!-- Places -->
                            </div>
                            <?php }}}?>
                          </div>
                          <div <?php echo $att_css_div; ?> id="tab_default_2">
                            <?php if($login){if(count((array)$tokenresult2->respond)){foreach ($tokenresult2->respond as $attraction_array) {?>
                            <div class="col-lg-12">
                              <div class="places s2">
                                <div class="placethumb">
                                  <a href="#"><img src="<?php echo $attraction_array->image; ?>" alt=""></a>
                                </div>
                                <div class="boxplaces">
                                  <div class="placeinfos">
                                    <h3 style="padding-bottom:15px"><a href="#" title=""><?php echo $attraction_array->name ?></a>
                                      <i class="pull-right"><?php echo $attraction_array->type ?></i>
                                    </h3>
                                    <hr>
                                    <p style="margin-top:20px">
                                      <i class="fa fa-map-pin" style='color:#28b8dc'></i>
                                      <?php echo $attraction_array->address ?>
                                    </p>
                                    <p style="margin-top:20px">
                                      <!--
                                        <div id="module" class="container">
                                          <h3>Descriptions</h3>
                                          <p class="collapse" id="a_d_<?php echo $attraction_array->id; ?>" aria-expanded="false">
                                            <?php echo  $attraction_array->desc ?>
                                          </p>
                                          <a role="button" class="collapsed" data-toggle="collapse" href="#a_d_<?php echo $attraction_array->id; ?>" aria-expanded="false" aria-controls="collapseExample">
</a>
                                        </div>
                                        -->
                                      <?php echo $attraction_array->desc; ?>
                                    </p>
                                    <hr>
                                    <ul class="listmetas">
                                      <li style="margin-left:50px"><i class="far fa-clock fa-2x"></i>
                                        <?php echo $attraction_array->open ?> -
                                        <?php echo $attraction_array->close ?> </li>
                                      <li><i class="fas fa-location-arrow fa-2x" style="margin-right:5px"></i><a href="#" onclick="addmarkerforviewing(<?php echo $attraction_array->lat ." , ". $attraction_array->long ?>)" href="javascript:void(0);">View Map</a></li>
                                    </ul>
                                  </div>
                                  <div class="placedetails">
                                    <span class="pull-left"><i class="flaticon-pin" style='color:#28b8dc'></i><?php echo $attraction_array->country ?></span>
                                    <span class="pull-right"><p class="c-label"><input name="attraction_check" id="a-<?php echo $attraction_array->id; ?>" type="checkbox" <?php echo $attraction_array->selected_attraction; ?> value="<?php echo $attraction_array->id; ?>"><label for="a-<?php echo $attraction_array->id; ?>">Selected</label></p></span>

                                  </div>
                                </div>
                              </div>
                              <!-- Places -->
                            </div>
                            <?php }}}?>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="half-map">
                  <div id="map_div" class="map">&nbsp;</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>

    <?php include 'base/loginpop.php'; ?>
    <?php include 'base/javascript.php'; ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAC62YfbAg1kBNeNroWBueZivGeaOSqlow"></script>
    <script type="text/javascript" src="js\jq.aminoSlider.js"></script>

    <script>
      var latlng = new google.maps.LatLng(25.041749, 121.54453);

      // Creating an object literal containing the properties we want to pass to the map  
      var options = {
        zoom: 4, // This number can be set to define the initial zoom level of the map
        center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP // This value can be set to define the map type ROADMAP/SATELLITE/HYBRID/TERRAIN
      };

      var map = new google.maps.Map(document.getElementById("map_div"), options);

      <?php if($login){if(count((array)$token_result->map_markers)){foreach ($token_result->map_markers as $map_markers) {?>

      addmarkerformap('<?php echo $map_markers->name ?>', '<?php echo $map_markers->lat ?>', '<?php echo $map_markers->long ?>');

      <?php }}}?>
      
      <?php if($login){if(count((array)$tokenresult2->map_markers)){foreach ($tokenresult2->map_markers as $map_markers_att) {?>

      addmarkerformapattraction('<?php echo $map_markers_att->name ?>', '<?php echo $map_markers_att->lat ?>', '<?php echo $map_markers_att->long ?>');

      <?php }}}?>

      var viewingmarker = null;

      function addmarkerformap(name, lat, long) {
        var latlng = new google.maps.LatLng(lat, long);
        var marker = new google.maps.Marker({
          position: latlng,
          title: name,
          draggable: false,
          map: map,
          icon: '/images/icons8-hotel-building-48.png'
        });
      }

      function addmarkerformapattraction(name, lat, long) {

        var latlng = new google.maps.LatLng(lat, long);
        var marker = new google.maps.Marker({
          position: latlng,
          title: name,
          draggable: false,
          map: map,
          icon: '/images/icons8-restaurant-building-48.png'
        });
      }
      
      function addmarkerforviewing(lat, long) {

        if (viewingmarker != null) {
          viewingmarker.setMap(null);
        }

        var latlng = new google.maps.LatLng(lat, long);
        viewingmarker = new google.maps.Marker({
          position: latlng,
          title: 'new marker',
          draggable: false,
          map: map
        });
        viewingmarker.setAnimation(google.maps.Animation.BOUNCE);
        map.setCenter(viewingmarker.getPosition())
        map.setZoom(19);
      }

      $(".nav-tabs a").click(function() {
        $('#myModalLabel').text("this");
        $(this).tab('show');
      });

      $("#search_btn").click(function() {
        var tab_text = $('.nav-tabs .active').text().trim();
        swal({
          title: 'Search',
          confirmButtonText: '<i class="fa fa-search fa-1x"></i>',
          html: '<input  id="swal-search"  class="swal2-input" placeholder="' + tab_text + ' Search ..." type="text" style="display: flex;">',
          preConfirm: function() {
            var search = $('#swal-search').val()
            var json = {
              search: search
            }
            if (tab_text == 'Hotels') {
              return $.ajax({
                url: url + 'hotel/' + <?php echo $id_container; ?>,
                type: 'POST',
                headers: {
                  'token': $.cookie("token")
                },
                data: json,
                success: function(respond) {
                  return respond
                }
              });
            } else {
              return $.ajax({
                url: url + 'attraction/' + <?php echo $id_container; ?>,
                type: 'POST',
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
        }).then((result) => {

          if (result.hasOwnProperty('value')) {
            if (result.value.errors) {
              swal({
                type: 'error',
                title: result.value.respond
              })
            } else {
              var result_array = result.value.respond;
              if (result_array === undefined || result_array.length == 0) {
                // array empty or does not exist
                swal({
                  type: 'warning',
                  title: 'No result'
                })
              } else {
                if (tab_text == 'Hotels') {
                  $("#tab_default_1").empty();
                  for (var i = 0; i < result_array.length; i++) {
                    var elm = '<div class="col-lg-12">' +
                      '<div class="places s2">' +
                      '<div class="placethumb"><a href="#"><img src="' + result_array[i].image + '" alt=""></a></div>' +
                      '<div class="boxplaces">' +
                      '<div class="placeinfos">' +
                      '<h3 style="padding-bottom:15px"><a href="#" title="">' + result_array[i].name + '</a> ' +
                      result_array[i].hotel_star +
                      '<i class="pull-right">' + result_array[i].price + '</i></h3>' +
                      '<hr>' +
                      result_array[i].hotel_pax + ' | ' + result_array[i].pax + ' PAX' +
                      '<br/><p><i class="fa fa-building" style="margin-top:25px;color:#28b8dc"></i>' + result_array[i].address + '</p><hr>' +
                      '<ul class="listmetas">' +
                      '<li><i class="fas fa-globe fa-2x"></i><a style="margin-left:5px" target="_blank" rel="noopener noreferrer" href="' + result_array[i].website + '">Website</a></li>' +
                      '<li><i class="fas fa-phone fa-2x" style="margin-right:5px"></i> ' + result_array[i].tel + '</li>' +
                      '<li><i class="fas fa-location-arrow fa-2x" style="margin-right:5px"></i><a href="#" onclick="addmarkerforviewing(' + result_array[i].lat + ',' + result_array[i].long + ')" href="javascript:void(0);">View Map</a></li>' +
                      '</ul>' +
                      '</div>' +
                      '<div class="placedetails">' +
                      '<span class="pull-left"><i class="flaticon-pin" style="color:#28b8dc"></i>' + result_array[i].country + '</span>' +
                      '<span class="pull-right"><p class="c-label"><input name="hotel_check" id="h-' + result_array[i].id + '" type="checkbox" ' + result_array[i].selected_hotel + ' disabled value="' + result_array[i].id + '"><label for="h-' + result_array[i].id + '">Selected</label></p></span>' +
                      '</div></div></div></div>';
                    $(elm).appendTo($("#tab_default_1"));
                  }
                } else {
                  $("#tab_default_2").empty();
                  for (var i = 0; i < result_array.length; i++) {
                    var elm = '<div class="col-lg-12">' +
                      '<div class="places s2">' +
                      '<div class="placethumb"><a href="#"><img src="' + result_array[i].image + '" alt=""></a></div>' +
                      '<div class="boxplaces">' +
                      '<div class="placeinfos">' +
                      '<h3 style="padding-bottom:15px"><a href="#" title="">' + result_array[i].name + '</a> ' +
                      '<i class="pull-right">' + result_array[i].type + '</i></h3>' +
                      '<p style="margin-top:20px"><i class="fa fa-map-pin" style="color:#28b8dc"></i> ' + result_array[i].address + '</p>' +
                      '<p style="margin-top:20px">' + result_array[i].desc + '</p>' +
                      '<ul class="listmetas">' +
                      '<li style="margin-left:50px"><i class="far fa-clock fa-2x"></i> ' + result_array[i].open + '  - ' + result_array[i].close + '</li>' +
                      '<li><i class="fas fa-location-arrow fa-2x" style="margin-right:5px"></i><a href="#" onclick="addmarkerforviewing(' + result_array[i].lat + ',' + result_array[i].long + ')" href="javascript:void(0);">View Map</a></li>' +
                      '</ul>' +
                      '</div>' +
                      '<div class="placedetails">' +
                      '<span class="pull-left"><i class="flaticon-pin" style="color:#28b8dc"></i>' + result_array[i].country + '</span>' +
                      '<span class="pull-right"><p class="c-label"><input name="attraction_check" id="a-' + result_array[i].id + '" type="checkbox" ' + result_array[i].selected_attraction + ' disabled value="' + result_array[i].id + '"><label for="a-' + result_array[i].id + '">Selected</label></p></span>' +
                      '</div></div></div></div>';
                    $(elm).appendTo($("#tab_default_2"));
                  }
                }
              }
            }
            reinit();
          }

        }).catch(swal.noop)
      });
      reinit();

      function reinit() {

        $('input[name="attraction_check"]').change(function() {
          if (this.checked) {
            var attraction_value = this.value;
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
                  attractionid: attraction_value
                }
                return $.ajax({
                  url: url + 'itineraryattractions/' + <?php echo $id_container; ?>,
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
                      $("#a-" + attraction_value + "").prop('checked', false);
                    }
                  )
                } else {
                  $("#a-" + attraction_value + "").attr("disabled", true);
                  swal({
                    type: 'success',
                    title: result.value.respond,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function() {
                    var temp_url = "anyhow.php?option=Attractions&id=" + <?php echo $id_container; ?>;
                    window.location.replace(temp_url);
                  })
                }
              } else {
                $("#a-" + attraction_value + "").prop('checked', false);
              }
            });
          }
        });

        $('input[name="hotel_check"]').change(function() {
          if (this.checked) {
            //Do stuff
            var hotel_value = this.value;
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
                  hotelid: hotel_value
                }

                return $.ajax({
                  url: url + 'itineraryhotel/' + <?php echo $id_container; ?>,
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
                      $("#h-" + hotel_value + "").prop('checked', false);
                    }
                  )
                } else {
                  $("#h-" + hotel_value + "").attr("disabled", true);
                  swal({
                    type: 'success',
                    title: result.value.respond,
                    showConfirmButton: false,
                    timer: 1500
                  }).then(function() {
                    var temp_url = "anyhow.php?option=hotel&id=" + <?php echo $id_container; ?>;
                    window.location.replace(temp_url);
                  })
                }
              } else {
                $("#h-" + hotel_value + "").prop('checked', false);
              }
            });
          }
        });
      }
    </script>

  </body>

  </html>