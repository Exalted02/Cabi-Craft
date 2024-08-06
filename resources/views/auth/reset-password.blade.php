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
					   <li><a class="active" href="">{{ __('Reset Password') }}</a></li>
					</ul>
				 </div>
				 <div class="header-page">
					<h1>{{ __('Reset Your Password') }}</h1>
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
					<form method="POST" action="{{ route('password.store') }}">
					@csrf
					<!-- Password Reset Token -->
					<input type="hidden" name="token" value="{{ $request->route('token') }}">
						<div class="form-group">
							<x-input-label for="email" :value="__('Email')" />
							<x-text-input id="email" class="" type="email" name="email" :value="old('email', $request->email)" autofocus autocomplete="username" />
							<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
						</div>
					   <div class="form-group">
							<x-input-label for="password" :value="__('Password')" />
							<x-text-input id="password" class="" type="password" name="password" autocomplete="new-password" />
							<x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
					   </div>
					   <div class="form-group">
							<x-input-label for="password_confirmation" :value="__('Confirm Password')" />
							<x-text-input id="password_confirmation" class="" type="password" name="password_confirmation" autocomplete="new-password" />
							<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
					   </div>
					   <button class="btn btn-theme btn-lg btn-block">{{ __('Reset Password') }}</button>
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
