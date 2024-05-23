<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
  <div class="preloader"></div>
  <!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
  <div class="colored-header" style="{{ (request()->routeIs('home')) ? '' : 'border-bottom: 1px solid #e0e0e0;' }}">
	 <!-- Top Bar -->
	 <div class="header-top">
		<div class="container">
		   <div class="row">
			  <!-- Header Top Left -->
			  <div class="header-top-left col-md-8 col-sm-6 col-xs-12 hidden-xs">
				<ul class="listnone">
					<li><a href="#"><i class="fa fa-picture-o" aria-hidden="true"></i> Gallery</a></li>
                    <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a></li>
				</ul>
			  </div>
			  <div class="header-right col-md-4 col-sm-6 col-xs-12 ">
				 <div class="pull-right">
					<ul class="listnone text-center">
						<li>Summer Sale Save Upto 70% off On your trip</li>
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
					<!-- menu logo -->
					<ul class="menu-logo">
					   <li>
						  <a href="{{ route('home') }}"><img src="{{ url('images/logo.png') }}" alt="logo"> </a>
					   </li>
					</ul>
					<!-- menu links -->
					<ul class="menu-links menu-full-height-center">
					   <!-- active class -->
					   <li>
						  <a href="javascript:void(0)">Pachmarhi <i class="fa fa-angle-down fa-indicator"></i></a>
						  <ul class="drop-down-multilevel">
							 <li><a href="profile.html">Hotel</a></li>
							 <li><a href="archives.html">Resort</a></li>
							 <li><a href="active-ads.html">Camping</a></li>
							 <li><a href="favourite.html">Adventure activities</a></li>
						  </ul>
					   </li>
					   <li>
						  <a href="javascript:void(0)">Amarkantak <i class="fa fa-angle-down fa-indicator"></i></a>
						  <ul class="drop-down-multilevel">
							 <li><a href="profile.html">Hotel</a></li>
							 <li><a href="archives.html">Resort</a></li>
							 <li><a href="active-ads.html">Camping</a></li>
							 <li><a href="favourite.html">Adventure activities</a></li>
						  </ul>
					   </li>
					   <li>
						  <a href="javascript:void(0)">Madhai <i class="fa fa-angle-down fa-indicator"></i></a>
						  <ul class="drop-down-multilevel">                                
							 <li><a href="profile.html">Hotel</a></li>
							 <li><a href="archives.html">Resort</a></li>
							 <li><a href="active-ads.html">Camping</a></li>
							 <li><a href="favourite.html">Adventure activities</a></li>
						  </ul>
					   </li>
					   <li>
						  <a href="javascript:void(0)">Bhopal <i class="fa fa-angle-down fa-indicator"></i></a>
						  <ul class="drop-down-multilevel">
							 <li><a href="profile.html">Hotel</a></li>
							 <li><a href="archives.html">Resort</a></li>
							 <li><a href="active-ads.html">Camping</a></li>
							 <li><a href="favourite.html">Adventure activities</a></li>
						  </ul>
					   </li>
					   <li>
							<input type="search" placeholder="Search..." class="header-search">
					   </li>
					</ul>
					<ul class="menu-search-bar menu-full-height-center">
						{{--<li>
							<input type="search" placeholder="Search..." class="header-search">
						</li>--}}
						<li>
							<a>
								<div class="contact-in-header clearfix">
									<i class="flaticon-customer-service"></i>
									<span>
									Call Us Now
									<br>
									<strong>111 222 333 444</strong>
									</span>
								</div>
							</a>
						</li>
					</ul>
				 </div>
			  </div>
		   </div>
		</section>
	 </nav>
	 <!-- menu end -->
  </div>
  <div class="clearfix"></div>
  <!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->