<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
  <div class="preloader"></div>
  <!-- =-=-=-=-=-=-=  Header =-=-=-=-=-=-= -->
  <button type="button" class="btn btn-theme requestCallbackFixedBtn" data-toggle="modal" data-target="#requestCallback">Request a Call Back</button>
  <div class="colored-header" style="{{ (request()->routeIs('home')) ? '' : 'border-bottom: 1px solid #e0e0e0;' }}">
	 <!-- Top Bar -->
	 <div class="header-top">
		<div class="container">
		   <div class="row">
			  <!-- Header Top Left -->
			  <div class="col-md-12">
				<ul class="listnone text-center">
					<li>SALE 70% OFF</li>
				</ul>
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
                           <li class="d-flex justify-space-between align-items-center">
                              <a href="index.html"><img src="images/logo.png" alt="logo"> </a>
							  <div class="search-container-div">
								<input type="search" placeholder="Search..." class="header-search">
							  </div>
                           </li>
                        </ul>
                        <ul class="menu-links">
						{{--<li>
                              <a href="javascript:void(0)">Home <i class="fa fa-angle-down fa-indicator"></i></a>
                              <ul class="drop-down-multilevel">
                                 <li><a href="index-1.html">Home 1</a></li>
                                 <li><a href="index-2.html">Home 2</a></li>
                                 <li><a href="index-3.html">Home 3</a></li>
                                 <li><a href="index-4.html">Home 4</a></li>
                                 <li><a href="index-5.html">Home 5</a></li>
                              </ul>
                           </li>--}}
                           <li>
                              <a href="javascript:void(0)">Home</a>
                              <a href="javascript:void(0)">Contact Us</a>
                              <a href="javascript:void(0)">Group Discount</a>
                              <a href="javascript:void(0)">Destinations</a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </section>
     </nav>
	<div class="clearfix"></div>
	<div class="header-location">
		<div class="container">
		   <div class="row">
			  <!-- Header Top Left -->
			  <div class="col-md-12">
				<ul class="listnone text-center">
					<li><a href="#">Pachmarhi</a></li>
					<li><a href="#">Madhai</a></li>
					<li><a href="#">Amarkantak</a></li>
				</ul>
			  </div>
		   </div>
		</div>
	 </div>	 
	 <!-- menu end -->
  </div>
  <div class="clearfix"></div>
  <!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->