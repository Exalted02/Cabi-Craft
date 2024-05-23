@extends('layouts.app')
@section('content')
<!-- Master Slider -->
<div class="master-slider ms-skin-default" id="masterslider">
	<!-- slide 1 -->
	<div class="ms-slide slide-1"  data-delay="5">
		<img src="{{ url('images/slider/slider-banner.avif') }}" alt="Slide1 background"/>
		<h3 class="ms-layer title4 font-white font-uppercase font-thin-xs"
		   style="left:120px; top:150px;"
		   data-type="text"
		   data-delay="2000"
		   data-duration="2000"
		   data-ease="easeOutExpo"
		   data-effect="skewleft(30,80)">Find Your Hotel</h3>
		<h3 class="ms-layer title4 font-white font-thin-xs"
		   style="left:120px; top:210px;"
		   data-type="text"
		   data-delay="2500"
		   data-duration="2000"
		   data-ease="easeOutExpo"
		   data-effect="skewleft(30,80)"><span class="font-color font-thin-xs heading-color">Thousand Of Hotels Your Choice</span></h3>
		<h5 class="ms-layer text1 font-white"
		   style="left: 120px; top: 280px;"
		   data-type="text"
		   data-effect="bottom(45)"
		   data-duration="2500"
		   data-delay="3000"
		   data-ease="easeOutExpo">Lorem Ipsum is simply dummy text of the printing typesetting<br>
		   industry is proident sunt in culpa officia deserunt mollit.
		</h5>
		<a class="ms-layer btn3 uppercase"
		   style="left:120px; top: 390px;"
		   data-type="text"
		   data-delay="3500"
		   data-ease="easeOutExpo"
		   data-duration="2000"
		   data-effect="scale(1.5,1.6)">Search Hotel</a> 
	</div>
	<div class="ms-slide slide-3" data-delay="5">
		<img src="{{ url('images/slider/slider-banner2.avif') }}" alt="Slide1 background"/>		
		<h3 class="ms-layer title4 font-white font-uppercase font-thin-xs"
		   style="left:120px; top:150px;"
		   data-type="text"
		   data-delay="2000"
		   data-duration="2000"
		   data-ease="easeOutExpo"
		   data-effect="skewleft(30,80)">Welcome to Adventure club</h3>
		<h3 class="ms-layer title4 font-white font-thin-xs"
		   style="left:120px; top:210px;"
		   data-type="text"
		   data-delay="2500"
		   data-duration="2000"
		   data-ease="easeOutExpo"
		   data-effect="skewleft(30,80)"><span class="font-color font-thin-xs heading-color">Find Your Hotels</span></h3>
		<h5 class="ms-layer text1 font-white"
		   style="left: 120px; top: 280px;"
		   data-type="text"
		   data-effect="bottom(45)"
		   data-duration="2500"
		   data-delay="3000"
		   data-ease="easeOutExpo">Lorem Ipsum is simply dummy text of the printing typesetting<br>
		   industry is proident sunt in culpa officia deserunt mollit.
		</h5>
		<a class="ms-layer btn3 uppercase"
		   style="left:120px; top: 390px;"
		   data-type="text"
		   data-delay="3500"
		   data-ease="easeOutExpo"
		   data-duration="2000"
		   data-effect="scale(1.5,1.6)"> View All Adventures</a> 
	</div>
</div>
<!-- end Master Slider -->
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix" style="background-image: url('{{ url('images/design/bg.png') }}')">
	<section class="custom-padding">
		<div class="container">
			<div class="row">
				<div class="clearfix"></div>
				<div class="heading-panel">
					<div class="col-xs-12 col-md-12 col-sm-12 text-center">
						<h1><span class="secondary-color">Pachmarhi</span></h1>
					</div>
				</div>
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
								<div class="category-grid-box">
									<div class="category-grid-img">
										<div class="image-background" style="background-image: url('{{ url('images/posting/1.avif') }}');"></div>
										<img class="img-responsive" alt="" src="{{ url('images/posting/1.avif') }}">
									</div>
									<div class="short-description">
										<div class="category-title"> <span><a href="#">6 days & 5 nights</a></span> </div>
										<h3><a title="" href="{{url('tours')}}/1">Highlights of North Sikkim | FREE Visit to Bhim Nala Falls</a></h3>
										<div class="price">INR 24,999 </div>
									</div>
									<div class="ad-info">
										<ul>
											<li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12 col-sm-6">
								<div class="category-grid-box">
									<div class="category-grid-img">
										<div class="image-background" style="background-image: url('{{ url('images/posting/2.avif') }}');"	></div>
										<img class="img-responsive" alt="" src="{{ url('images/posting/2.avif') }}">
									</div>
									<div class="short-description">
										<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
										<h3><a title="" href="{{url('tours')}}/1">2017 Audi A4 quattro Premium</a></h3>
										<div class="price">INR 43,000</div>
									</div>
									<div class="ad-info">
										<ul>
											<li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12 col-sm-6">
								<div class="category-grid-box">
									<div class="category-grid-img">
										<div class="image-background" style="background-image: url('{{ url('images/posting/3.avif') }}');"></div>
										<img class="img-responsive" alt="" src="{{ url('images/posting/3.avif') }}">
									</div>
									<div class="short-description">
										<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
										<h3><a title="" href="{{url('tours')}}/1">2014 Ford Shelby GT500 Coupe</a></h3>
										<div class="price">INR 77,00</div>
									</div>
									<div class="ad-info">
										<ul>
											<li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12 col-sm-6">
								<div class="category-grid-box">
									<div class="category-grid-img">
										<div class="image-background" style="background-image: url('{{ url('images/posting/3.avif') }}');"		></div>
										<img class="img-responsive" alt="" src="{{ url('images/posting/3.avif') }}">
									</div>
									<div class="short-description">
										<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
										<h3><a title="" href="{{url('tours')}}/1">BMW I8 1.5 Auto 4X4 2dr </a></h3>
										<div class="price">INR 250 <span class="negotiable">(Negotiable)</span></div>
									</div>
									<div class="ad-info">
										<ul>
											<li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12 col-sm-6">
								<div class="category-grid-box">
									<div class="category-grid-img">
										<div class="image-background" style="background-image: url('{{ url('images/posting/2.avif') }}');"></div>
										<img class="img-responsive" alt="" src="{{ url('images/posting/2.avif') }}">
										<span class="ad-status"> Featured </span>
									</div>
									<div class="short-description">
										<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
										<h3><a title="" href="{{url('tours')}}/1">Honda Civic 2017 Brand New </a></h3>
										<div class="price">INR 500 <span class="negotiable">(Negotiable)</span></div>
									</div>
									<div class="ad-info">
										<ul>
											<li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4 col-xs-12 col-sm-6">
								<div class="category-grid-box">
									<div class="category-grid-img">
										<div class="image-background" style="background-image: url('{{ url('images/posting/1.avif') }}');"></div>
										<img class="img-responsive" alt="" src="{{ url('images/posting/1.avif') }}">
										<span class="ad-status"> Featured </span>
									</div>
									<div class="short-description">
										<div class="category-title"> <span><a href="#">Car & Bikes</a></span> </div>
										<h3><a title="" href="{{url('tours')}}/1">McLaren F1 Sports Car</a></h3>
										<div class="price">INR 18,200 <span class="negotiable">(Negotiable)</span></div>
									</div>
									<div class="ad-info">
										<ul>
										   <li class="w-100"><button class="btn btn-theme w-100" data-toggle="modal" data-target="#exampleModal">Request Callback</button></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =-=-=-=-=-=-= Statistics Counter =-=-=-=-=-=-= -->
	<div class="funfacts custom-padding parallex" style="background: rgba(0, 0, 0, 0) url('{{ url('images/design/parallex1.jpg') }}') no-repeat scroll center center;">
		<div class="container">
		   <div class="row">
			  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
				 <div class="icons">
					<i class="flaticon-house"></i>
				 </div>
				 <div class="number"><span class="timer" data-from="0" data-to="1238" data-speed="1500" data-refresh-interval="5">0</span>+</div>
				 <h4>Total <span>Hotels</span></h4>
			  </div>
			  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
				 <div class="icons">
					<i class="flaticon-security"></i>
				 </div>
				 <div class="number"><span class="timer" data-from="0" data-to="820" data-speed="1500" data-refresh-interval="5">0</span>+</div>
				 <h4>Total <span>Resorts</span></h4>
			  </div>
			  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
				 <div class="icons">
					<i class="flaticon-holidays"></i>
				 </div>
				 <div class="number"><span class="timer" data-from="0" data-to="1042" data-speed="1500" data-refresh-interval="5">0</span>+</div>
				 <h4>Total <span>Camping</span></h4>
			  </div>
			  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
				 <div class="icons">
					<i class="flaticon-cup"></i>
				 </div>
				 <div class="number"><span class="timer" data-from="0" data-to="34" data-speed="1500" data-refresh-interval="5">0</span>+</div>
				 <h4>Adventure <span>Activities</span></h4>
			  </div>
		   </div>
		   <!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	<!-- =-=-=-=-=-=-= Statistics Counter End =-=-=-=-=-=-= -->
	<!-- =-=-=-=-=-=-= Car Inspection =-=-=-=-=-=-= -->
	<section class="car-inspection section-padding">
		<div class="container">
		   <div class="row">
			  <div class="col-md-6 col-sm-6 col-xs-12 nopadding hidden-sm">
				 <div class="call-to-action-img-section-right">
					<img src="{{ url('images/design/about.jpeg') }}" class="wow slideInLeft img-responsive" data-wow-delay="0ms" data-wow-duration="3000ms" alt="">
				 </div>
			  </div>
			  <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
				 <div class="call-to-action-detail-section">
					<div class="heading-2">
						{{--<h3> Want To Sale Your Car ?</h3>--}}
					   <h2>About Our Club's</h2>
					</div>
					<p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.. </p>
					{{--<div class="row">
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
					</div>
					<a href="" class="btn-theme btn-lg btn">Schedule Inspection <i class="fa fa-angle-right"></i></a>--}}
				 </div>
			  </div>
		   </div>
		</div>
	</section>
	<!-- =-=-=-=-=-=-= Car Inspection End =-=-=-=-=-=-= -->
	<!-- =-=-=-=-=-=-= Testimonials =-=-=-=-=-=-= -->         
	<section class="section-padding parallex bg-img-3" style="background: rgba(0, 0, 0, 0) url('{{ url('images/design/parallex2.jpg') }}') no-repeat scroll center center;">
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
					   <img src="images/users/1.jpg" alt="">
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
					   <img src="images/users/2.jpg" alt="">
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
					   <img src="images/users/3.jpg" alt="">
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
			  </div>
		   </div>
		</div>
	</section>
	<!-- =-=-=-=-=-=-= Testimonials Section End =-=-=-=-=-=-= -->
	<!-- =-=-=-=-=-=-= Gallery Image =-=-=-=-=-=-= -->
	<section class="custom-padding padding-top-30 padding-bottom-30">
		<div class="album">
			<div class="heading-panel">
				<div class="col-xs-12 col-md-12 col-sm-12 text-center">
					<h1><span class="secondary-color">Gallery</span></h1>
				</div>
			</div>
			<div class="responsive-container-block bg">
				<div class="responsive-container-block img-cont">
				  <img class="img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.4.svg">
				  <img class="img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.5.svg">
				  <img class="img img-last" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.6.svg">
				</div>
				<div class="responsive-container-block img-cont">
				  <img class="img img-big" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.11.svg">
				  <img class="img img-big img-last" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.10.svg">
				</div>
				<div class="responsive-container-block img-cont">
				  <img class="img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.7.svg">
				  <img class="img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.8.svg">
				  <img class="img" src="https://workik-widget-assets.s3.amazonaws.com/widget-assets/images/PP5.9.svg">
				</div>
			</div>
		</div>
	</section>
	<!-- =-=-=-=-=-=-= Gallery Image =-=-=-=-=-=-= -->
	<!-- =-=-=-=-=-=-= Get In Touch =-=-=-=-=-=-= -->
	<section class="section-padding gray padding-top-30 padding-bottom-30">
		<!-- Main Container -->
		<div class="container">
		   <!-- Row -->
		   <div class="heading-panel">
			 <div class="col-xs-12 col-md-12 col-sm-12 text-center">
				<!-- Main Title -->
				<h1>Get In Touch</h1>
			 </div>
		   </div>
		   <div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12 no-padding commentForm">
				 <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2">
					<form method="post"  action="#">
					   <div class="row">
						  <div class="col-lg-6 col-md-6 col-xs-12">
							 <div class="form-group">
								<input type="text" placeholder="Name" id="name" name="name" class="form-control" required>
							 </div>
							 <div class="form-group">
								<input type="email" placeholder="Email" id="email" name="email" class="form-control" required>
							 </div>
							 <div class="form-group">
								<input type="text" placeholder="Phone" id="phone" name="phone" class="form-control" required>
							 </div>
						  </div>
						  <div class="col-lg-6 col-md-6 col-xs-12">
							 <div class="form-group">
								<textarea cols="12" rows="7" placeholder="Message..." id="message" name="message" class="form-control" required></textarea>
							 </div>
						  </div>
						  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							 <button class="btn btn-theme" type="submit">Send Message</button>
						  </div>
					   </div>
					</form>
				 </div>
			  </div>
		   </div>
		   <!-- Row End --> 
		</div>
		<!-- Main Container End --> 
	</section>
	<!-- =-=-=-=-=-=-= Get In Touch =-=-=-=-=-=-= -->
	<section class="custom-padding">
		<div class="container">
			<div class="row">
				<div class="clearfix"></div>
				<div class="heading-panel">
					<div class="col-xs-12 col-md-12 col-sm-12 text-center">
						<h1>Experiences with Satpura Adventure Club</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8 col-xs-12 col-sm-12 col-xs-offset-2 col-md-offset-2">
						<div class="clearfix"></div>
						<div class="grid-style-4">
							<div class="posts-masonry">
								<div class="col-md-6 col-xs-12 col-sm-6">
                                 <div class="category-grid-box">
                                    <div class="category-grid-img">
                                       <img class="img-responsive" alt="" src="{{ url('images/posting/1.avif') }}">
                                       <div class="user-preview">
                                          <a href="#"> <img src="{{ url('images/posting/1.avif') }}" class="avatar avatar-small" alt=""> </a>
                                       </div>
                                       {{--<a href="" class="view-details">View Details</a>--}}
                                       <div class="additional-information">
                                          <h3>View All Hotels</h3>
                                       </div>
                                    </div>
                                 </div>
								</div>
								<div class="col-md-6 col-xs-12 col-sm-6">
                                 <div class="category-grid-box">
                                    <div class="category-grid-img">
                                       <img class="img-responsive" alt="" src="{{ url('images/posting/2.avif') }}">
                                       <div class="user-preview">
                                          <a href="#"> <img src="{{ url('images/posting/2.avif') }}" class="avatar avatar-small" alt=""> </a>
                                       </div>
                                       {{--<a href="" class="view-details">View Details</a>--}}
                                       <div class="additional-information">
                                          <h3>View All Resort</h3>
                                       </div>
                                    </div>
                                 </div>
								</div>
								<div class="col-md-6 col-xs-12 col-sm-6">
                                 <div class="category-grid-box">
                                    <div class="category-grid-img">
                                       <img class="img-responsive" alt="" src="{{ url('images/posting/3.avif') }}">
                                       <div class="user-preview">
                                          <a href="#"> <img src="{{ url('images/posting/3.avif') }}" class="avatar avatar-small" alt=""> </a>
                                       </div>
                                       {{--<a href="" class="view-details">View Details</a>--}}
                                       <div class="additional-information">
                                          <h3>View All Camping</h3>
                                       </div>
                                    </div>
                                 </div>
								</div>
								<div class="col-md-6 col-xs-12 col-sm-6">
                                 <div class="category-grid-box">
                                    <div class="category-grid-img">
                                       <img class="img-responsive" alt="" src="{{ url('images/posting/1.avif') }}">
                                       <div class="user-preview">
                                          <a href="#"> <img src="{{ url('images/posting/1.avif') }}" class="avatar avatar-small" alt=""> </a>
                                       </div>
                                       {{--<a href="" class="view-details">View Details</a>--}}
                                       <div class="additional-information">
                                          <h3>View All activities</h3>
                                       </div>
                                    </div>
                                 </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection
@section('scripts')

@endsection

