<div class="responsiveheader">
			<div class="rheader">
				<span><img src="images\ricon.png" alt=""></span>
				<div class="logo">
					<a href="#" title=""><img src="images\resource\logo.png" alt=""></a>
				</div>
				<div class="extras">
					<span class="accountbtn"><i class="flaticon-avatar"></i></span>
				</div>
			</div>
			<div class="rnaver">
				<span class="closeresmenu"><i>x</i>Close</span>
				<div class="logo"><a href="#" title=""><img src="images\resource\logo2.png" alt=""></a></div>
				<div class="extras">
					<a href="add-listing.html" title=""><img src="images\icon1.png" alt=""> Add Listing</a>
				</div>
				<ul>
					<li class="menu-item-has-children">
						<a href="#" title="">Home</a>
						<ul>
							<li><a href="index-1.html" title="">Home 1</a></li>
							<li><a href="index2.html" title="">Home 2</a></li>
							<li><a href="index3.html" title="">Home 3</a></li>
							<li><a href="index4.html" title="">Home 4</a></li>
							<li><a href="index5.html" title="">Home 5</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">Listings</a>
						<ul>
							<li><a href="add-listing.html" title="">Add Listing</a></li>
							<li><a href="listing-category.html" title="">Listing Category</a></li>
							<li><a href="listing-category2.html" title="">Listing Category 2</a></li>
							<li><a href="listing-full.html" title="">Listing Full</a></li>
							<li><a href="listing-map.html" title="">Listing Map</a></li>
							<li><a href="listing-map2.html" title="">Listing Map 2</a></li>
							<li><a href="listing-sidebar.html" title="">Listing Sidebar</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">Listing Details</a>
						<ul>
							<li><a href="listing-single1.html" title="">Listing Details 1</a></li>
							<li><a href="listing-single2.html" title="">Listing Details 2</a></li>
							<li><a href="listing-single3.html" title="">Listing Details 3</a></li>
							<li><a href="listing-single4.html" title="">Listing Details 4</a></li>
							<li><a href="listing-single5.html" title="">Listing Details 5</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">User</a>
						<ul>
							<li><a href="user-dashboard.html" title="">User Dashboard</a></li>
							<li><a href="user-favourite.html" title="">User Favourites</a></li>
							<li><a href="user-my-listings.html" title="">User Listing</a></li>
							<li><a href="user-notification.html" title="">User Notifications</a></li>
							<li><a href="user-profile.html" title="">User Profile</a></li>
							<li><a href="user-review.html" title="">User Review</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">Pages</a>
						<ul>
							<li><a href="blog1.html" title="">Blog 1</a></li>
							<li><a href="blog2.html" title="">Blog 2</a></li>
							<li><a href="blog-single.html" title="">Blog Details</a></li>
							<li><a href="pricing.html" title="">Pricing</a></li>
							<li><a href="404.html" title="">404 Error</a></li>
							<li><a href="contact.html" title="">Contact Us</a></li>
							<li><a href="services.html" title="">Our Services</a></li>
							<li><a href="terms.html" title="">Our Terms</a></li>
							<li><a href="testimonials.html" title="">Testimonials</a></li>
						</ul>
					</li>
					<li class="menu-item-has-children">
						<a href="#" title="">Shop</a>
						<ul>
							<li><a href="shop-list.html" title="">Shop Lists</a></li>
							<li><a href="shop-detail.html" title="">Shop Details</a></li>
							<li><a href="cart.html" title="">Shop Cart</a></li>
							<li><a href="checkout.html" title="">Checkout</a></li>
							<li><a href="shop-order.html" title="">Shop Order</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- Responsive header -->

		<header class="s4 dark">
			<div class="container fluid">
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
			</div>
		</header>