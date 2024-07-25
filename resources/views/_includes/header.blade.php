<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
  <div class="preloader"></div>
  
  <div class="colored-header">
	 <!-- Top Bar -->
	 <div class="header-top">
		<div class="container">
		   <div class="row">
			  <!-- Header Top Left -->
			  <div class="header-top-left col-md-6 col-sm-6 col-xs-12 hidden-xs">
				 <ul class="listnone">
					<li><a href="about.html"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>
					{{--<li><a href="faqs.html"><i class="fa fa-folder-open-o" aria-hidden="true"></i> FAQS</a></li>
					<li class="dropdown">
					   <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe" aria-hidden="true"></i> Language <span class="caret"></span></a>
					   <ul class="dropdown-menu">
						  <li><a href="#">English</a></li>
						  <li><a href="#">Swedish</a></li>
						  <li><a href="#">Arabic</a></li>
						  <li><a href="#">Russian</a></li>
						  <li><a href="#">chinese</a></li>
					   </ul>
					</li>--}}
				 </ul>
			  </div>
			  <!-- Header Top Right Social -->
			  <div class="header-right col-md-6 col-sm-6 col-xs-12 ">
				 <div class="pull-right">
					<ul class="listnone">
					   <li><a href="{{ route('loginpage') }}"><i class="fa fa-sign-in"></i> Log in</a></li>
					   <li class="hidden-xs hidden-sm"><a href="{{ route('registerpage') }}"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a></li>
					   <li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-circle resize" alt="" src="front-assets/images/users/3.jpg"> <span class="myname hidden-xs"> Hello,  Midhun </span> <span class="caret"></span></a>
						  <ul class="dropdown-menu">
							 <li><a href="{{ route('browsecatalogue') }}">New Order</a></li>
							 <li><a href="profile.html">User Profile</a></li>
							 <li><a href="archives.html">Archives</a></li>
							 <li><a href="active-ads.html">Active Ads</a></li>
							 <li><a href="favourite.html">Favourite Ads</a></li>
							 <li><a href="messages.html">Message Panel</a></li>
							 <li><a href="deactive.html">Account Deactivation</a></li>
						  </ul>
					   </li>
					   {{--<li>
						  <a href="post-ad-1.html" class="btn btn-theme">Sell Your Car</a>
					   </li>--}}
					</ul>
				 </div>
			  </div>
		   </div>
		</div>
	 </div>
	 <!-- Top Bar End -->
	 <!-- Navigation Menu -->
	 <div class="clearfix"></div>
	 <!-- menu start -->
	 <nav id="menu-1" class="mega-menu">
		<!-- menu list items container -->
		<section class="menu-list-items">
		   <div class="container">
			  <div class="row">
				 <div class="col-lg-12 col-md-12">
					<div class="header-top-left col-md-4 col-sm-4 col-xs-12 hidden-xs">
						<!-- menu logo -->
						<ul class="menu-logo">
						<li>
							<a href="{{ route('home') }}"><img src="{{ url('images/logo.png') }}" alt="logo"> </a>
						</li>
						</ul>
					</div>
					<div class="header-right col-md-8 col-sm-8 col-xs-12 ">
						<div class="pull-right">
							<ul class="listnone">
							<!-- menu links -->
							
								<ul class="menu-links">
								<!-- active class -->
								<li>
									<a href="{{ route('home') }}">Home </a>
									<!-- drop down multilevel  -->
								</li>
								<li>
									<a href="javascript:void(0)">Catalogue<i class="fa fa-angle-down fa-indicator"></i></a>
									<!-- drop down multilevel  -->
									<ul class="drop-down-multilevel">
										<li>
											<a href="javascript:void(0)">Grid Style<i class="fa fa-angle-right fa-indicator"></i> </a>
											<!-- drop down second level -->
											<ul class="drop-down-multilevel">
											<li><a href="listing.html"> Grid Style (Defualt)</a></li>
											<li><a href="listing-1.html"> Grid Style 1</a></li>
											<li><a href="listing-2.html"> Grid Style 2</a></li>
											<li><a href="listing-3.html"> Grid Style 3</a></li>
											<li><a href="listing-4.html"> Grid Style 4</a></li>
											</ul>
										</li>
									</ul>
								</li>
								<li>
									<a href="javascript:void(0)">Contact us</a>
								</li>
								<li>
									<a href="{{url('loginpage')}}">Login</a>
								</li>
								<li>
									<a href="{{ route('registerpage') }}">Register</a>
								</li>
								</ul>
							</ul>
						</div>
					</div>
				 </div>
			  </div>
		   </div>
		</section>
	 </nav>
	 <!-- menu end -->
  </div>
  <div class="clearfix"></div>
  <!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->