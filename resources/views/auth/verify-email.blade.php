@extends('layouts.app')
@section('content')
<!-- crumbs area start -->
<div class="crumbs-area">
	<div class="container">
		<div class="crumb-content">
			<h4 class="crumb-title"><span>Verify your Email </span></h4>
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
					<h4>Verify <span>Here</span></h4>
					<p>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
				</div>
			</div>
		</div>
		<div class="contact-form">
			@if (session('status') == 'verification-link-sent')
				<div class="mb-4 font-medium text-sm text-green-600  text-success">
					{{ __('verify_email_link_sent') }}
				</div>
			@endif
			
			<form method="POST" action="{{ route('verification.send') }}">
				@csrf

				<div class="text-center">
					<button class="btn btn-theme btn-lg btn-block">Resend Email</button>
				</div>
			</form>
		</div>
	</div>
</div>
  <!-- =-=-=-=-=-=-= Breadcrumb End =-=-=-=-=-=-= -->
@endsection
