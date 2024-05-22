<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>{{ config('app.name', 'Laravel') }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
		<link rel="icon" href="{{ url('images/favicon.png') }}" type="image/x-icon" />
		<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- =-=-=-=-=-=-= Bootstrap CSS Style =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ url('front-assets/css/bootstrap.css') }}">
		<!-- =-=-=-=-=-=-= Template CSS Style =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ url('front-assets/css/style.css') }}">
		<!-- =-=-=-=-=-=-= Font Awesome =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ url('front-assets/css/font-awesome.css') }}" type="text/css">
		<!-- =-=-=-=-=-=-= Flat Icon =-=-=-=-=-=-= -->
		<link href="{{ url('front-assets/css/flaticon.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= Et Line Fonts =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ url('front-assets/css/et-line-fonts.css') }}" type="text/css">
		<!-- =-=-=-=-=-=-= Menu Drop Down =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ url('front-assets/css/carspot-menu.css') }}" type="text/css">
		<!-- =-=-=-=-=-=-= Animation =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ url('front-assets/css/animate.min.css') }}" type="text/css">
		<!-- =-=-=-=-=-=-= Select Options =-=-=-=-=-=-= -->
		<link href="{{ url('front-assets/css/select2.min.css') }}" rel="stylesheet" />
		<!-- =-=-=-=-=-=-= noUiSlider =-=-=-=-=-=-= -->
		<link href="{{ url('front-assets/css/nouislider.min.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= Listing Slider =-=-=-=-=-=-= -->
		<link href="{{ url('front-assets/css/slider.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= Owl carousel =-=-=-=-=-=-= -->
		<link rel="stylesheet" type="text/css" href="{{ url('front-assets/css/owl.carousel.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ url('front-assets/css/owl.theme.css') }}">
		<!-- =-=-=-=-=-=-= Check boxes =-=-=-=-=-=-= -->
		<link href="{{ url('front-assets/skins/minimal/minimal.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= PrettyPhoto =-=-=-=-=-=-= -->
		<link rel="stylesheet" href="{{ url('front-assets/css/jquery.fancybox.min.css') }}" type="text/css" media="screen"/>
		<!-- =-=-=-=-=-=-= Responsive Media =-=-=-=-=-=-= -->
		<link href="{{ url('front-assets/css/responsive-media.css') }}" rel="stylesheet">
		<!-- =-=-=-=-=-=-= Template Color =-=-=-=-=-=-= -->
		<link rel="stylesheet" id="color" href="{{ url('front-assets/css/colors/defualt.css') }}">
		<!-- For This Page Only -->
		<!-- Base MasterSlider style sheet -->
		<link rel="stylesheet" href="{{ url('front-assets/js/masterslider/style/masterslider.css') }}" />
		<link rel="stylesheet" href="{{ url('front-assets/js/masterslider/skins/default/style.css') }}" />
		<link rel="stylesheet" href="{{ url('front-assets/js/masterslider/style/style.css') }}" />
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CSource+Sans+Pro:400,400i,600" rel="stylesheet">
		<!-- JavaScripts -->
		<script src="{{ url('front-assets/js/modernizr.js') }}"></script>
	</head>

	<body>
		@include('_includes/header')
		
			@yield('content')

        @include('_includes/footer')
		<!-- Back To Top -->
		<a href="#0" class="cd-top" style="background-image: url('{{ url('images/cd-top-arrow.svg') }}')">Top</a>
		<!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
		<script src="{{ url('front-assets/js/jquery.min.js') }}"></script>
		<!-- Bootstrap Core Css  -->
		<script src="{{ url('front-assets/js/bootstrap.min.js') }}"></script>
		<!-- Jquery Easing -->
		<script src="{{ url('front-assets/js/easing.js') }}"></script>
		<!-- Menu Hover  -->
		<script src="{{ url('front-assets/js/carspot-menu.js') }}"></script>
		<!-- Jquery Appear Plugin -->
		<script src="{{ url('front-assets/js/jquery.appear.min.js') }}"></script>
		<!-- Numbers Animation   -->
		<script src="{{ url('front-assets/js/jquery.countTo.js') }}"></script>
		<!-- Jquery Select Options  -->
		<script src="{{ url('front-assets/js/select2.min.js') }}"></script>
		<!-- noUiSlider -->
		<script src="{{ url('front-assets/js/nouislider.all.min.js') }}"></script>
		<!-- Carousel Slider  -->
		<script src="{{ url('front-assets/js/carousel.min.js') }}"></script>
		<script src="{{ url('front-assets/js/slide.js') }}"></script>
		<!-- Image Loaded  -->
		<script src="{{ url('front-assets/js/imagesloaded.js') }}"></script>
		<script src="{{ url('front-assets/js/isotope.min.js') }}"></script>
		<!-- CheckBoxes  -->
		<script src="{{ url('front-assets/js/icheck.min.js') }}"></script>
		<!-- Jquery Migration  -->
		<script src="{{ url('front-assets/js/jquery-migrate.min.js') }}"></script>

		<!-- PrettyPhoto -->
		<script src="{{ url('front-assets/js/jquery.fancybox.min.js') }}"></script>
		<!-- Wow Animation -->
		<script src="{{ url('front-assets/js/wow.js') }}"></script>
		<!-- Template Core JS -->
		<script src="{{ url('front-assets/js/custom.js') }}"></script>
		<!-- For This Page Only -->
		<!-- MasterSlider --> 
		<script src="{{ url('front-assets/js/masterslider/masterslider.min.js') }}"></script> 
		<script type="text/javascript">	
         (function($) {
           "use strict";	
         
         
         	    var slider = new MasterSlider();
         
         	    // adds Arrows navigation control to the slider.
         	    slider.control('arrows');
         	  
         	     slider.setup('masterslider' , {
         	         width:1400,    // slider standard width
         	         height:560,   // slider standard height
         	         layout:'fullwidth',
         	         loop:true,
         	         preload:0,
         fillMode:'fill',
         	         instantStartLayers:true,
         	         autoplay:true,
         view:"basic"
         
         	    });
         // add scroll parallax effect
         
         })(jQuery);
		</script>
		<link rel="stylesheet" href="{{ url('common-assets/css/toastr.min.css') }}"/>
		<script src="{{ url('common-assets/js/toastr.min.js') }}"></script>
		<script>
			@if(Session::has('message'))
				var msg = "{{ session('message') }}";
				var type = 'success';
				toastr_msg(msg, type);
			@endif

			@if(Session::has('error'))
				var msg = "{{ session('error') }}";
				var type = 'error';
				toastr_msg(msg, type);
			@endif

			@if(Session::has('info'))
				var msg = "{{ session('info') }}";
				var type = 'info';
				toastr_msg(msg, type);
			@endif

			@if(Session::has('warning'))
				var msg = "{{ session('warning') }}";
				var type = 'warning';
				toastr_msg(msg, type);
			@endif
			function toastr_msg(msg, type){
				toastr.options =
				{
					"closeButton" : true,
					"progressBar" : true
				}
				toastr[type](msg);
			}
		</script>
		@yield('scripts')
	</body>
</html>
