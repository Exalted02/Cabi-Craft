@extends('layouts.app')

@section('content')

<!-- =-=-=-=-=-=-= Home Banner  =-=-=-=-=-=-= -->
{{--<div id="banner">
	 @include('_includes/top-banner')
  </div>--}}
  <!-- =-=-=-=-=-=-= Home Banner End =-=-=-=-=-=-= -->
  <!-- =-=-=-=-=-=-= Advanced Search =-=-=-=-=-=-= -->
  {{--<div class="advance-search">
	 <div class="section-search search-style-2">
		<div class="container">
		   <div class="row">
			  <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
				 <!-- Nav tabs -->
				 
				 <!-- Tab panes -->
				 
			  </div>
		   </div>
		</div>
	 </div>
  </div>--}}
	<div class="page-header-area-2 gray">
        <div class="container">
            <div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="small-breadcrumb">
						<div class=" breadcrumb-link">
							<ul>
							   <li><a href="index.html">{{ __('common_text_home_page') }}</a></li>
							   <li><a class="active" href="#">404</a></li>
							</ul>
						</div>
						<div class="header-page">
							<h1>{{ languageTranslate('lanpage Not Found') }}</h1>
						</div>
					</div>
				</div>
            </div>
        </div>
    </div>
  <!-- =-=-=-=-=-=-= Advanced Search End =-=-=-=-=-=-= -->
  <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
  <div class="main-content-area clearfix">
	 <!-- =-=-=-=-=-=-= contact  =-=-=-=-=-=-= -->
		<section class="section-padding no-top gray error-page">
            <!-- Main Container -->
            <div class="container">
               <!-- Row -->
               <div class="row">
                  <!-- Middle Content Area -->
                  <div class="col-md-12 col-xs-12 col-sm-12">
                     <div class="error-container">
                        <div class="error-text">404</div>
                        <div class="error-info">{{ languageTranslate('The Page Could Not Be Found!') }}</div>
                     </div>
                  </div>
                  <!-- Middle Content Area  End -->
               </div>
               <!-- Row End -->
            </div>
            <!-- Main Container End --> 
        </section>
	 <!-- =-=-=-=-=-=-= contact End =-=-=-=-=-=-= -->
	 
	 <!-- =-=-=-=-=-=-= Services Section  =-=-=-=-=-=-= -->
	 {{--<section class="section-padding services-center">
		<div class="container">
		   <!-- Heading Area -->
		   <div class="heading-panel">
			  <div class="col-xs-12 col-md-12 col-sm-12 text-center">
				 <!-- Main Title -->
				 <h1>Our <span class="heading-color"> Feature </span> Services</h1>
				 <!-- Short Description -->
				 <p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
			  </div>
		   </div>
		   <div class="row clearfix">
			  <!--Left Column-->
			  <div class="col-md-4 col-sm-6 col-xs-12 pull-left">
			  <!--Service Block -->
			  <div class="services-grid">
					<div class="icons icon-right"><i class="flaticon-engine-4"></i></div>
					<h4>Engine Upgrades</h4>
					<p>We have the right caring, experience and dedicated professional for you.</p>
				 </div>
			  <!--Service Block -->
			  <div class="services-grid">
					<div class="icons icon-right"><i class="flaticon-settings"></i></div>
					<h4>Car Inspection</h4>
					<p>We have the right caring, experience and dedicated professional for you.</p>
				 </div>
				  <!--Service Block -->
			  

			  </div>
			  
			  <!--Right Column-->
			  <div class="col-md-4 col-sm-6 col-xs-12 pull-right">
				 <!--Service Block-->
				 
				   
				 <div class="services-grid">
					<div class="icons icon-left"><i class="flaticon-vehicle-3"></i></div>
					<h4>Car Oil Change</h4>
					<p>We have the right caring, experience and dedicated professional for you.</p>
				 </div>
				 <!--Service Block-->
				  <div class="services-grid">
					<div class="icons icon-left"><i class="flaticon-car-steering-wheel"></i></div>
					<h4>Power steering</h4>
					<p>We have the right caring, experience and dedicated professional for you.</p>
				 </div>
				  
			  </div>
			  <!--Image Column-->
			  <div class="col-md-4 col-sm-12 col-xs-12">
				 <figure class="wow zoomIn  animated" data-wow-delay="0ms" data-wow-duration="3500ms" >
					<img class="center-block" src="{{ url('front-assets/images/service-car.png') }}" alt="">
				 </figure>
			  </div>
		   </div>

		</div>

	 </section>--}}
	 <!-- =-=-=-=-=-=-=  Services Section End =-=-=-=-=-=-= -->
	 
	 

	 <!-- =-=-=-=-=-=-= Testimonials =-=-=-=-=-=-= -->         
	 {{--<section class="section-padding parallex bg-img-3">
		<div class="container">
		   <div class="row">
			  <div class="owl-testimonial-2">
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Just fabulous</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/1.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Jhon Emily Copper </h3>
						  <p> Developer</p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Awesome ! Loving It</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/2.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Hania Sheikh </h3>
						  <p> CEO Pvt. Inc.</p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				  <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Very quick and Fast</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/3.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Jaccica Albana </h3>
						  <p>  CTO Albana Inc.</p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Done in 3 Months! Awesome</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/4.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Humayun Sarfraz </h3>
						  <p>  CTO Glixen Technologies.</p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Find It Quit Professional</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/4.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Massica O'Brain </h3>
						  <p> Audit Officer </p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Just fabulous</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/1.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Jhon Emily Copper </h3>
						  <p> Developer</p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Awesome ! Loving It</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/2.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Hania Sheikh </h3>
						  <p> CEO Pvt. Inc.</p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Very quick and Fast</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/3.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Jaccica Albana </h3>
						  <p>  CTO Albana Inc.</p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Done in 3 Months! Awesome</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/4.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Humayun Sarfraz </h3>
						  <p>  CTO Glixen Tech.</p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
				 <!--Testimonial Column-->
				 <div class="single_testimonial">
					<div class="textimonial-content">
					   <h4>Find It Quit Professional</h4>
					   <p>Lorem ipsum dolor sit amet consectetur adipisicing elitsed eiusmod tempor enim minim veniam quis notru.</p>
					</div>
					<div class="testimonial-meta-box">
					   <img src="{{ url('front-assets/images/users/4.jpg') }}" alt="">
					   <div class="testimonial-meta">
						  <h3 class="">Massica O'Brain </h3>
						  <p> Audit Officer </p>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
						  <i class="fa fa-star"></i>
					   </div>
					</div>
				 </div>
			  </div>
		   </div>
		</div>
	 </section>--}}
	 <!-- =-=-=-=-=-=-= Testimonials Section End =-=-=-=-=-=-= -->
	 
   
	 <!-- =-=-=-=-=-=-= Expert Reviews Section =-=-=-=-=-=-= -->
	 <!-- <section class="news section-padding">
		<div class="container">
		   <div class="row">
			  <div class="heading-panel">
				 <div class="col-xs-12 col-md-12 col-sm-12 left-side">
					<h1>Expert  <span class="heading-color"> Reviews</span> Feedback</h1>
					<p class="heading-text">Eu delicata rationibus usu. Vix te putant utroque, ludus fabellas duo eu, his dico ut debet consectetuer.</p>
				 </div>
			  </div>
			  <div class="col-md-7 col-sm-12 col-xs-12">
				 <div class="mainimage">
					<a>
					   <img alt="" class="img-responsive" src="assets/images/blog/1.jpg">
					   <div class="overlay">
						  <h2>Eight Things You Should Know About The Mercedes-Benz E-Class LWB</h2>
					   </div>
					</a>
					<div class="clearfix"></div>
				 </div>
			  </div>
			  <div class="col-md-5 col-sm-12 col-xs-12">
				 <div class="newslist">
					<ul>
					   <li>
						  <div class="imghold"> <a><img src="assets/images/blog/s1.jpg" alt=""></a> </div>
						  <div class="texthold">
							 <h4><a>2017 Honda City: Which Variant Suits You? </a></h4>
							 <p>With the 2017 facelifted avatar, the Honda City has significantly upped its game...&nbsp;</p>
						  </div>
						  <div class="clear"></div>
					   </li>
					   <li>
						  <div class="imghold"> <a><img src="assets/images/blog/s2.jpg" alt=""></a> </div>
						  <div class="texthold">
							 <h4><a>Honda City Facelift &ndash; Expected Prices </a></h4>
							 <p>Honda will launch the City facelift in India on Feb 14, 2017 and it promises to...&nbsp;</p>
						  </div>
						  <div class="clear"></div>
					   </li>
					   <li>
						  <div class="imghold"> <a><img src="assets/images/blog/s3.jpg" alt=""></a> </div>
						  <div class="texthold">
							 <h4><a>Audi A4 Diesel Launched In India At Rs 40.20 Lakh </a></h4>
							 <p>Audi India has launched a powerful diesel variant of its A4 sedan at Rs 40.20 la...&nbsp;</p>
						  </div>
						  <div class="clear"></div>
					   </li>
					   <li>
						  <div class="imghold"> <a><img src="assets/images/blog/s4.jpg" alt=""></a> </div>
						  <div class="texthold">
							 <h4><a>Audi A4 Diesel Launched In India At Rs 40.20 Lakh </a></h4>
							 <p>Audi India has launched a powerful diesel variant of its A4 sedan at Rs 40.20 la...&nbsp;</p>
						  </div>
						  <div class="clear"></div>
					   </li>
					</ul>
				 </div>
			  </div>
		   </div>
		   <div class="clearfix"></div>
		</div>
	 </section> -->
	 <!-- =-=-=-=-=-=-= Expert Reviews End =-=-=-=-=-=-= -->
	 <!-- =-=-=-=-=-=-= Our Clients =-=-=-=-=-=-= -->
	 <!-- <section class="client-section gray">
		<div class="container">
		   <div class="row">
			  <div class="col-md-4 col-sm-12 col-xs-12">
				 <div class="margin-top-30">
					<h3>Why Choose Us</h3>
					<h2>Our premium Clients</h2>
				 </div>
			  </div>
			  <div class="col-md-8 col-sm-12 col-xs-12">
				 <div class="brand-logo-area clients-bg">
					<div class="clients-list">
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/16.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/2.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/11.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/4.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/5.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/6.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/7.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/8.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/9.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					   <div class="client-logo">
						  <a href="#"><img src="assets/images/brands/17.png" class="img-responsive" alt="Brand Image" /></a>
					   </div>
					</div>
				 </div>
			  </div>
		   </div>
		</div>
	 </section> -->
	 <!-- =-=-=-=-=-=-= Our Clients End =-=-=-=-=-=-= -->
	 <!-- =-=-=-=-=-=-= Car Inspection =-=-=-=-=-=-= -->
	 {{--<section class="car-inspection section-padding">
		<div class="container">
		   <div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12 nopadding hidden-sm">
				 <div class="call-to-action-img-section-right">
					<img src="{{ url('front-assets/images/car-in-red.png') }}" class="wow slideInLeft img-responsive" data-wow-delay="0ms" data-wow-duration="3000ms" alt="">
				 </div>
			  </div>
			  <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
				 <div class="call-to-action-detail-section">
					<div class="heading-2">
					   <!-- <h3> Want To Sale Your Car ?</h3> -->
					   <h2>AREA group</h2>
					</div>
					<p> 
					   Our CarSure experts inspect the car on over 200 checkpoints so you get complete satisfaction and peace of mind before buying.
					   Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh viverra non semper suscipit posuere a pede.

					   Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.

						Morbi in sem quis dui placerat ornare. Pellentesque odio nisi euismod in pharetra a ultricies in diam. Sed arcu. Cras consequat.
					</p>
					<!-- <div class="row">
					   <ul>
						  <li class="col-sm-4"> <i class="fa fa-check"></i> Transmission</li>
						  <li class="col-sm-4"> <i class="fa fa-check"></i> Steering</li>
						  <li class="col-sm-4"> <i class="fa fa-check"></i> Engine</li>
						  <li class="col-sm-4"> <i class="fa fa-check"></i> Tires</li>
						  <li class="col-sm-4"> <i class="fa fa-check"></i> Lighting</li>
						  <li class="col-sm-4"> <i class="fa fa-check"></i> Interior</li>
						  <li class="col-sm-4">  <i class="fa fa-check"></i> Suspension</li>
						  <li class="col-sm-4">  <i class="fa fa-check"></i> Exterior</li>
						  <li class="col-sm-4">  <i class="fa fa-check"></i> Brakes</li>
						  <li class="col-sm-4">  <i class="fa fa-check"></i> Air Conditioning</li>
						  <li class="col-sm-4">  <i class="fa fa-check"></i> Engine Diagnostics</li>
						  <li class="col-sm-4">  <i class="fa fa-check"></i> Wheel Alignment</li>
					   </ul>
					</div> -->
					<a href="{{ route('contact')}}" class="btn-theme btn-lg btn">Contact Us <i class="fa fa-angle-right"></i></a>
				 </div>
			  </div>
		   </div>
		</div>
	 </section>--}}
	 <!-- =-=-=-=-=-=-= Car Inspection End =-=-=-=-=-=-= -->
	 <!-- ======================> Car Ads Start <====================== -->
	 <!-- <section class="car-inspection section-padding gray">
		<div class="container">
		   <div class="row margin-top-30">
			  <div class="heading-panel">
				 <div class="col-xs-12 col-md-7 col-sm-6 left-side">
					<h1>Top  <span class="heading-color"> Dealer</span> Ads</h1>
				 </div>
				 <div class="col-sm-6 col-xs-12 col-md-5">
					<ul class="list-unstyled list-inline pull-right">
					   <li><a href="#" class="btn btn-default">Most Polular</a>
					   </li>
					   <li><a href="#" class="btn btn-default">Trending</a>
					   </li>
					</ul>
				 </div>
			  </div>
			  <div class="grid-style-1">
				 <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
					<div class="white category-grid-box-1 ">
					   <div class="image"> <img alt="Carspot" src="images/posting/6.jpg" class="img-responsive"></div>
					   <div class="ad-info-1">
						  <ul>
							 <li><i class="flaticon-fuel-1"></i>Diesel</li>
							 <li><i class="flaticon-dashboard"></i>35,000 km</li>
							 <li><i class="flaticon-engine-2"></i> 1800 cc</li>
						  </ul>
					   </div>
					   <div class="short-description-1 ">
						  <h3>
							 <a title="" href="single-page-listing.html">2016 McLaren 570S Coupe </a>
						  </h3>
						  <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
						  <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
						  <hr>
						  <span class="ad-price">$370</span>
						  <a href="listing-6.html" class="btn btn-sm btn-theme pull-right"><i class="fa fa-phone"></i> View Details.</a>
					   </div>
					</div>
				 </div>
				 <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
					<div class="white category-grid-box-1 ">
					   <div class="image"> <img alt="Carspot" src="images/posting/2.jpg" class="img-responsive"></div>
					   <div class="ad-info-1">
						  <ul>
							 <li><i class="flaticon-fuel-1"></i>Diesel</li>
							 <li><i class="flaticon-dashboard"></i>35,000 km</li>
							 <li><i class="flaticon-engine-2"></i> 1800 cc</li>
						  </ul>
					   </div>
					   <div class="short-description-1 ">
						  <h3>
							 <a title="" href="single-page-listing.html">Porsche 911 Carrera 2017 </a>
						  </h3>
						  <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
						  <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
						  <hr>
						  <span class="ad-price">$210</span>
						  <a href="listing-6.html" class="btn btn-sm btn-theme pull-right"><i class="fa fa-phone"></i> View Details.</a>
					   </div>
					</div>
				 </div>
				 <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12  ">
					<div class="white category-grid-box-1 ">
					   <div class="image"> <img alt="Carspot" src="images/posting/28.jpg" class="img-responsive"></div>
					   <div class="ad-info-1">
						  <ul>
							 <li><i class="flaticon-fuel-1"></i>Diesel</li>
							 <li><i class="flaticon-dashboard"></i>35,000 km</li>
							 <li><i class="flaticon-engine-2"></i> 1800 cc</li>
						  </ul>
					   </div>
					   <div class="short-description-1 ">
						  <h3>
							 <a title="" href="single-page-listing.html">Audi A4 2.0T Quattro Premium</a>
						  </h3>
						  <p class="location"><i class="fa fa-map-marker"></i> Model Town Link Road London</p>
						  <p>Till the one day when the lady met this fellow and they knew it was much more than </p>
						  <hr>
						  <span class="ad-price">$370</span>
						  <a href="listing-6.html" class="btn btn-sm btn-theme pull-right"><i class="fa fa-phone"></i> View Details.</a>
					   </div>
					</div>
				 </div>
			  </div>
		   </div>
		</div>
	 </section> -->
	 <!-- ======================> Car Ads End <====================== -->
	   <!-- =-=-=-=-=-=-= Buy Or Sale =-=-=-=-=-=-= -->
	   {{--<section class="sell-box padding-top-70">
		<div class="container">
		   <div class="row">
			  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
				 <div class="sell-box-grid">
					<div class="short-info">
					<h3> Want To Sale Your Car ?</h3>
					   <h2><a href="#">Are you looking for a car?</a></h2>
					   <p>Search your car in our Inventory and request a quote on the vehicle of your choosing. </p>
					</div>
					<div class="text-center">
					   <img class="img-responsive wow slideInLeft center-block" data-wow-delay="0ms" data-wow-duration="2000ms" src="{{ url('front-assets/images/sell.png') }}" alt="">
					</div>
				 </div>
			  </div>
			  <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
				 <div class="sell-box-grid">
					<div class="short-info">
					<h3> Want To Sale Your Car ?</h3>
					   <h2> <a href="#">Do you want to sell your car?</a></h2>
					   <p>Request search your car in our Inventory and a quote on the vehicle of your choosing. </p>
					</div>
					<div class="text-center">
					   <img class="img-responsive wow slideInRight center-block" data-wow-delay="0ms" data-wow-duration="2000ms" src="{{ url('front-assets/images/sell-1.png') }}" alt="">
					</div>
				 </div>
			  </div>
		   </div>
		</div>
	 </section>--}}
	  <!-- =-=-=-=-=-=-= Buy Or Sale End =-=-=-=-=-=-= -->
  </div>
  <!-- Main Content Area End -->
  
@endsection



