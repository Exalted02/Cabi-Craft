@extends('layouts.app')
@section('content')
<!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
<div class="main-content-area clearfix">
	<section class="custom-padding">
		<div class="container">
			<div class="row">
				<div class="clearfix"></div>
				<div class="heading-panel">
					<div class="col-xs-12 col-md-12 col-sm-12 text-center">
						<h1><span class="secondary-color">In progress...</span></h1>
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
</div>
@endsection
@section('scripts')

@endsection

