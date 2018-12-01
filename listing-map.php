<?php include 'base/authentication.php'; ?>
<?php include 'base/head.php'; ?>
<style>
		.ml-listings {
    padding-left: 10px !important;
	}
	/* Tabs panel */
.tabbable-panel {
  border:1px solid #eee;
  padding: 10px;
}

/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
  border-bottom: 4px solid #fbcdcf;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 4px solid #f3565d;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -3px;
  background-color: #fff;
  border: 0;
  border-top: 1px solid #eee;
  padding: 15px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}
	.ml-filterbar > ul{float:left !important;padding-bottom: 10px;}

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

		<?php include 'base/navbar.php'; ?>

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
											<button style="font-size:18px;margin-top:4px" class="pull-left link"><i style="color:white;" class="fa fa-chevron-left"></i></button>

										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#tab_default_1" data-toggle="tab">
													Hotels </a>
											</li>
											<li>
												<a href="#tab_default_2" data-toggle="tab">
													Attractions </a>
											</li>
										</ul>
										
										

									</div>
									<div class="ml-placessec">
										<div class="row">
											<div class="tab-content">

												<div class="tab-content">
													<div class="tab-pane active" id="tab_default_1">
														<div class="col-lg-12">
															<div class="places s2">
																<div class="placethumb">
																	<img src="images\resource\r1.jpeg" alt="">
																	<div class="placeoptions">
																		<span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
																	</div>
																</div>
																<div class="boxplaces">
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
																		<span class="pull-right"><p class="c-label"><input name="cb" id="8" type="checkbox"><label for="8">Selected</label></p></span>

																	</div>
																</div>
															</div><!-- Places -->
														</div>
														<div class="col-lg-12">
															<div class="places s2">
																<div class="placethumb">
																	<img src="images\resource\r4.jpeg" alt="">
																	<div class="placeoptions">
																		<span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
																	</div>
																</div>
																<div class="boxplaces">
																	<div class="placeinfos">
																		<h3><a href="#" title="">Balara Cinemas</a></h3>
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
															</div><!-- Places -->
														</div>
														<div class="col-lg-12">
																<div class="places s2">
																	<div class="placethumb">
																		<img src="images\resource\r1.jpeg" alt="">
																		<div class="placeoptions">
																			<span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
																		</div>
																	</div>
																	<div class="boxplaces">
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
																			<span class="pull-right"><p class="c-label"><input name="cb" id="8" type="checkbox"><label for="8">Selected</label></p></span>
																		</div>
																	</div>
																</div><!-- Places -->
															</div>
															<div class="col-lg-12">
																<div class="places s2">
																	<div class="placethumb">
																		<img src="images\resource\r4.jpeg" alt="">
																		<div class="placeoptions">
																			<span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
																		</div>
																	</div>
																	<div class="boxplaces">
																		<div class="placeinfos">
																			<h3><a href="#" title="">Balara Cinemas</a></h3>
																			<span>Delicious, luxury food for you</span>
																			<ul class="listmetas">
																				<li><span class="rated">3.5</span>3 Ratings</li>
																				<li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
																				<li>Open</li>
																			</ul>
																		</div>
																		<div class="placedetails">
																			<span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
																			<span class="pull-right"><p class="c-label"><input name="cb" id="8" type="checkbox"><label for="8">Selected</label></p></span>
																		</div>
																	</div>
																</div><!-- Places -->
															</div>
													</div>
													<div class="tab-pane" id="tab_default_2">
														<div class="col-lg-12">
															<div class="places s2">
																<div class="placethumb">
																	<img src="images\resource\r2.jpeg" alt="">
																	<div class="placeoptions">
																		<span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
																	</div>
																</div>
																<div class="boxplaces">
																	<div class="placeinfos">
																		<h3><a href="#" title="">Balara Cinemas</a></h3>
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
															</div><!-- Places -->
														</div>
														<div class="col-lg-12">
															<div class="places s2">
																<div class="placethumb">
																	<img src="images\resource\r3.jpeg" alt="">
																	<div class="placeoptions">
																		<span class="pull-left"> <i class="flaticon-eye"></i> Preview </span>
																	</div>
																</div>
																<div class="boxplaces">
																	<div class="placeinfos">
																		<h3><a href="#" title="">Balara Cinemas</a></h3>
																		<span>Delicious, luxury food for you</span>
																		<ul class="listmetas">
																			<li><span class="rated">3.5</span>3 Ratings</li>
																			<li><a href="#" title=""><i class="flaticon-chef"></i> Restaurant</a></li>
																			<li>Open</li>
																		</ul>
																	</div>
																	<div class="placedetails">
																		<span class="pull-left"><i class="flaticon-pin"></i>Roma, Italy</span>
																		<span class="pull-right"><p class="c-label"><input name="cb" id="8" type="checkbox"><label for="8">Selected</label></p></span>
																	</div>
																</div>
															</div><!-- Places -->
														</div>
													</div>
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
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAC62YfbAg1kBNeNroWBueZivGeaOSqlow"></script><!-- Maps -->
	<script type="text/javascript" src="js\map1.js"></script>
	<script type="text/javascript" src="js\jq.aminoSlider.js"></script>

	<script>
		$(".nav-tabs a").click(function () {
			$(this).tab('show');
		});
	</script>

</body>

</html>