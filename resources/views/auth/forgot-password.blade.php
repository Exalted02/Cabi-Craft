@extends('layouts.app')
@section('content')
	<!-- =-=-=-=-=-=-= Breadcrumb =-=-=-=-=-=-= -->
  <div class="page-header-area-2 gray">
	 <div class="container">
		<div class="row">
		   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <div class="small-breadcrumb">
				 <div class=" breadcrumb-link">
					<ul>
					   <li><a href="{{ route('home') }}">{{ __('Home Page') }}</a></li>
					   <li><a class="active" href="{{ route('login') }}">{{ __('Log in') }}</a></li>
					</ul>
				 </div>
				 <div class="header-page">
					<h1>{{ __('Forgot Password') }}</h1>
				 </div>
			  </div>
		   </div>
		</div>
	 </div>
  </div>
  <!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
  <!-- =-=-=-=-=-=-= Main Content Area =-=-=-=-=-=-= -->
  <div class="main-content-area clearfix">
	 <!-- =-=-=-=-=-=-= Latest Ads =-=-=-=-=-=-= -->
	 <section class="section-padding no-top gray">
		<!-- Main Container -->
		<div class="container">
		   <!-- Row -->
		   <div class="row">
			  <!-- Middle Content Area -->
			  <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
				 <!--  Form -->
				 <div class="form-grid">
					<p>
					{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
					</p>
					<x-auth-session-status class="mb-4" :status="session('status')" />
					<form method="POST" action="{{ route('password.email') }}">
					@csrf
						<div class="form-group">
							<label>{{ __('Email') }}</label>
							<input type="email" id="email" name="email"  placeholder="{{ __('Your Email') }}" class="form-control" :value="old('email')" autofocus>
							<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
						</div>
					   <button class="btn btn-theme btn-lg btn-block">{{ __('Email Password Reset Link') }}</button>
					</form>
				 </div>
				 <!-- Form -->
			  </div>
			  <!-- Middle Content Area  End -->
		   </div>
		   <!-- Row End -->
		</div>
		<!-- Main Container End -->
	 </section>
	</div>
@endsection
