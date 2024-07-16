@extends('layouts.app')
@section('content')
 <!-- crumbs area start -->
<div class="crumbs-area">
	<div class="container">
		<div class="crumb-content">
			<h4 class="crumb-title"><span>Registration </span></h4>
		</div>
	</div>
</div>
<!-- crumbs area end -->
<!-- contact form area start -->
<div class="contact-form-area pb--120">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<div class="cnt-title">
					<h4>Register <span>Here</span></h4>
					{{--<p>Quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut </p>--}}
				</div>
			</div>
		</div>
		<div class="contact-form">
			<form method="POST" action="{{ route('register') }}">
			@csrf
				<div class="row">
					<div class="col-md-9 offset-md-1">
						<input type="text" id="name" name="name"  placeholder="Your Name" class="" value="{{ old('name') }}" autofocus>
						<x-input-error :messages="$errors->get('name')" class="text-danger" />
					</div>
					<div class="col-md-4 offset-md-1">
						<input type="text" id="contact_number" name="contact_number"  placeholder="Your Contact number" class="" value="{{ old('contact_number') }}">
						<x-input-error :messages="$errors->get('contact_number')" class="text-danger" />
					</div>
					<div class="col-md-4 offset-md-1">
						<input type="email" id="email" name="email" placeholder="Your Email" class="" value="{{ old('email') }}">
						<x-input-error :messages="$errors->get('email')" class="text-danger" />
					</div>
					<div class="col-md-4 offset-md-1">
						<input id="password" class="" type="password" name="password" autocomplete="new-password" placeholder="New password" value="{{ old('password') }}"/>
						<x-input-error :messages="$errors->get('password')" class="text-danger" />
					</div>
					<div class="col-md-4 offset-md-1">
						<input id="password_confirmation" class="" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirm new password"/>
						<x-input-error :messages="$errors->get('password_confirmation')" class="text-danger" />
					</div>
					<div class="col-md-8 offset-md-2 text-center">
						<button type="submit">SUBMIT</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- contact form area end --> 
@endsection
