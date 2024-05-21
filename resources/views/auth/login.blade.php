@extends('layouts.app')
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
	<div class="container">
		<div class="crumb-content">
			<h4 class="crumb-title"><span>Sign </span>In</h4>
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
					<h4>Login <span>Here</span></h4>
					{{--<p>Quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut </p>--}}
				</div>
			</div>
		</div>
		<div class="contact-form">
			<form method="POST" action="{{ route('login') }}">
			@csrf
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<input type="email" id="email" name="email"  placeholder="Your Email" class="" :value="old('email')" autofocus>
						<x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
					</div>
					<div class="col-md-4 offset-md-4">
						<input type="password" id="password" name="password" placeholder="Password" class="">
						<x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
					</div>
					@if (Route::has('password.request'))
					{{--<div class="col-md-4 offset-md-4 text-center">
						<a class="primary-color" href="{{ route('password.request') }}">Forgot Password</a>
					</div>--}}
					@endif
					<div class="col-md-4 offset-md-4 text-center">
						<button type="submit">SUBMIT</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- contact form area end -->
@endsection
