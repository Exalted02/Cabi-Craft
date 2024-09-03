<!-- =-=-=-=-=-=-= Preloader =-=-=-=-=-=-= -->
  <div class="preloader"></div>
  @php 
  $aboutus = App\Models\Cms_pages::where('id',1)->first();
  @endphp
  <div class="colored-header">
	 <!-- Top Bar -->
	 <div class="header-top">
		<div class="container">
		   <div class="row">
			  <!-- Header Top Left -->
			  <div class="header-top-left col-md-6 col-sm-6 col-xs-12 hidden-xs">
				 <ul class="listnone">
					<li><a href="{{url('cms/'. $aboutus->slug)}}"><i class="fa fa-heart-o" aria-hidden="true"></i> About</a></li>
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
						@if(!Auth::user())
							<li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Log in</a></li>
							<li class="hidden-xs hidden-sm"><a href="{{ route('register') }}"><i class="fa fa-unlock" aria-hidden="true"></i> Register</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="img-circle resize" alt="" src="{{ Auth::guard('web')->user()->image != null ? asset('front-assets/images/users/'.Auth::guard('web')->user()->image) : asset('/images/noimage.png') }}"> <span class="myname hidden-xs"> Hello,  {{ Auth::guard('web')->user()->fname }} </span> <span class="caret"></span></a>
							<ul class="dropdown-menu">
							{{--<li><a href="{{ route('browsecatalogue') }}">New Order</a></li>--}}
								<li><a href="{{ route('neworder') }}">New Order</a></li>
								<li><a href="{{ route('orderhistorys') }}">Order History</a></li>
								<li><a href="{{ route('profilepage') }}">Profile</a></li>
								<li><a href="{{ route('offerpage') }}">Offers</a></li>
								<li><a href="{{ route('settingpage') }}">Settings</a></li>
								<li><a href="javascript:void(0)" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log out</a></li>
								<form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;"> @csrf </form>
							</ul>
						</li>
						@endif
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
	 
	 <!-- menu end -->
  </div>
  <div class="clearfix"></div>
  <!-- =-=-=-=-=-=-= Primary Header End =-=-=-=-=-=-= -->