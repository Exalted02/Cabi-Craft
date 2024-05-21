@extends('layouts.app')
@section('content')
 <!-- Master Slider -->
	  <div class="master-slider ms-skin-default" id="masterslider">
		 <!-- slide 1 -->
		 <div class="ms-slide slide-1"  data-delay="5">
			<img src="{{ url('images/slider/slider-banner.avif') }}" alt="Slide1 background"/> 
		 </div>
		 <div class="ms-slide slide-3" data-delay="5">
			<img src="{{ url('images/slider/slider-banner2.avif') }}" alt="Slide1 background"/>
		 </div>
	  </div>
	  <!-- end Master Slider -->
	  <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
	  <div class="main-content-area clearfix">
		  <!-- =-=-=-=-=-=-= Ads Archieve =-=-=-=-=-=-= --> 
		 <section class="custom-padding">
			<!-- Main Container -->
			<div class="container">
			   <!-- Row -->
			   <div class="row">
				  <div class="clearfix"></div>
				  <!-- Heading Area -->
				  <div class="heading-panel">
					 <div class="col-xs-12 col-md-12 col-sm-12 text-center">
						<!-- Main Title -->
						<h1><span class="secondary-color">Pachmarhi</span></h1>
					 </div>
				  </div>
				  <!-- Middle Content Box -->
				  <div class="row">
					 <div class="col-md-12 col-xs-12 col-sm-12">
						<div class="posts-masonry view-all mb-10">
						   <div class="col-md-12 text-right">
								<a href="">
									<span class="secondary-color">View All</span> 
									<span class="view-all-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
								</a>
						   </div>
						</div>
						<div class="posts-masonry">
						   <div class="col-md-4 col-xs-12 col-sm-6">
							  <!-- Ad Box -->
							  <div class="category-grid-box">
								 <!-- Ad Img -->
								 <div class="category-grid-img">
									<div class="image-background" style="background-image: url('{{ url('images/posting/1.avif') }}');"></div>
									<img class="img-responsive" alt="" src="{{ url('images/posting/1.avif') }}">
								 </div>
								 <!-- Ad Img End -->
								 <div class="short-description">
									<!-- Ad Category -->
									<div class="category-title"> <span><a href="#">6 days & 5 nights</a></span> </div>
									<!-- Ad Title -->
									<h3><a title="" href="single-page-listing.html">Highlights of North Sikkim | FREE Visit to Bhim Nala Falls</a></h3>
									<!-- Price -->
									<div class="price">INR 24,999 </div>
								 </div>
								 <!-- Addition Info -->
								 <div class="ad-info">
									<ul>
									   <li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
									</ul>
								 </div>
							  </div>
							  <!-- Ad Box End -->
						   </div>
						   <div class="col-md-4 col-xs-12 col-sm-6">
							  <!-- Ad Box -->
							  <div class="category-grid-box">
								 <!-- Ad Img -->
								 <div class="category-grid-img">
									<div class="image-background" style="background-image: url('{{ url('images/posting/2.avif') }}');"></div>
									<img class="img-responsive" alt="" src="{{ url('images/posting/2.avif') }}">
								 </div>
								 <!-- Ad Img End -->
								 <div class="short-description">
									<!-- Ad Category -->
									<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
									<!-- Ad Title -->
									<h3><a title="" href="single-page-listing.html">2017 Audi A4 quattro Premium</a></h3>
									<!-- Price -->
									<div class="price">$43,000</div>
								 </div>
								 <!-- Addition Info -->
								 <div class="ad-info">
									<ul>
									   <li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
									</ul>
								 </div>
							  </div>
							  <!-- Ad Box End -->
						   </div>
						   <div class="col-md-4 col-xs-12 col-sm-6">
							  <!-- Ad Box -->
							  <div class="category-grid-box">
								 <!-- Ad Img -->
								 <div class="category-grid-img">
									<div class="image-background" style="background-image: url('{{ url('images/posting/3.avif') }}');"></div>
									<img class="img-responsive" alt="" src="{{ url('images/posting/3.avif') }}">
								 </div>
								 <!-- Ad Img End -->
								 <div class="short-description">
									<!-- Ad Category -->
									<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
									<!-- Ad Title -->
									<h3><a title="" href="single-page-listing.html">2014 Ford Shelby GT500 Coupe</a></h3>
									<!-- Price -->
									<div class="price">$77,00</div>
								 </div>
								 <!-- Addition Info -->
								 <div class="ad-info">
									<ul>
									   <li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
									</ul>
								 </div>
							  </div>
							  <!-- Ad Box End -->
						   </div>
						   <div class="col-md-4 col-xs-12 col-sm-6">
							  <!-- Ad Box -->
							  <div class="category-grid-box">
								 <!-- Ad Img -->
								 <div class="category-grid-img">
									<div class="image-background" style="background-image: url('{{ url('images/posting/3.avif') }}');"></div>
									<img class="img-responsive" alt="" src="{{ url('images/posting/3.avif') }}">
								 </div>
								 <!-- Ad Img End -->
								 <div class="short-description">
									<!-- Ad Category -->
									<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
									<!-- Ad Title -->
									<h3><a title="" href="single-page-listing.html">BMW I8 1.5 Auto 4X4 2dr </a></h3>
									<!-- Price -->
									<div class="price">$250 <span class="negotiable">(Negotiable)</span></div>
								 </div>
								 <!-- Addition Info -->
								 <div class="ad-info">
									<ul>
									   <li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
									</ul>
								 </div>
							  </div>
							  <!-- Ad Box End -->
						   </div>
						   <div class="col-md-4 col-xs-12 col-sm-6">
							  <!-- Ad Box -->
							  <div class="category-grid-box">
								 <!-- Ad Img -->
								 <div class="category-grid-img">
									<div class="image-background" style="background-image: url('{{ url('images/posting/2.avif') }}');"></div>
									<img class="img-responsive" alt="" src="{{ url('images/posting/2.avif') }}">
									<!-- Ad Status --><span class="ad-status"> Featured </span>
								 </div>
								 <!-- Ad Img End -->
								 <div class="short-description">
									<!-- Ad Category -->
									<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
									<!-- Ad Title -->
									<h3><a title="" href="single-page-listing.html">Honda Civic 2017 Brand New </a></h3>
									<!-- Price -->
									<div class="price">$500 <span class="negotiable">(Negotiable)</span></div>
								 </div>
								 <!-- Addition Info -->
								 <div class="ad-info">
									<ul>
									   <li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
									</ul>
								 </div>
							  </div>
							  <!-- Ad Box End -->
						   </div>
						   <div class="col-md-4 col-xs-12 col-sm-6">
							  <!-- Ad Box -->
							  <div class="category-grid-box">
								 <!-- Ad Img -->
								 <div class="category-grid-img">
									<div class="image-background" style="background-image: url('{{ url('images/posting/1.avif') }}');"></div>
									<img class="img-responsive" alt="" src="{{ url('images/posting/1.avif') }}">
									<!-- Ad Status --><span class="ad-status"> Featured </span>
								 </div>
								 <!-- Ad Img End -->
								 <div class="short-description">
									<!-- Ad Category -->
									<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
									<!-- Ad Title -->
									<h3><a title="" href="single-page-listing.html">McLaren F1 Sports Car</a></h3>
									<!-- Price -->
									<div class="price">$18,200 <span class="negotiable">(Negotiable)</span></div>
								 </div>
								 <!-- Addition Info -->
								 <div class="ad-info">
									<ul>
									   <li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
									</ul>
								 </div>
							  </div>
							  <!-- Ad Box End -->
						   </div>
						</div>
					 </div>
				  </div>
			   </div>
			   <!-- Row End -->
			</div>
			<!-- Main Container End -->
		 </section>
		 <!-- =-=-=-=-=-=-= Ads Archieve End =-=-=-=-=-=-= -->
	  </div>
@endsection
@section('scripts')

@endsection

