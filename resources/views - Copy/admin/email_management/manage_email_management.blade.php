@extends('admin.layouts.app')

@section('content')

<main class="content">
	<div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>{{$id=='0' ? "Add" : "Edit"}}</strong> Email Message</h1>
        <div class="card">
			<form id="cat_form" action="{{route('admin.email-management.manage_email_management_process')}}" method="post">
			@csrf
			<div class="card-body">
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Message Subject<sup>*</sup></h5>
					</div>
					<div class="col-lg-8">
						<input type="text" name="message_subject" value="{{$message_subject ?? ''}}" class="form-control" placeholder="Message Subject" required>
					</div>
				</div>
				<div class="row updateCMSrow mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Email Message<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						<textarea name="message" id="" class="form-control summernote">{{$message}}</textarea>
					</div>
				</div>
				<div class="row updateCMSrow mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Status<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						<?php
							if($id=='0'){
								$chk_active = 'checked';
							}else{
								$chk_active = '';
							}
						?>
						<label class="radio-inline me-3"><input type="radio" name="status" value="1" {{$status=='1' ? "checked" : ""}} {{$chk_active}}> Active</label>
						<label class="radio-inline"><input type="radio" value="0" name="status" {{$status=='0' ? "checked" : ""}}> Inactive</label>
					</div>
				</div>
				<div class="row add_cat_submit mt-3">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<button type="submit" class="btn btn-success">Submit</button>
						<a href="{{ route('admin.email-management') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
					</div>
				</div>
				<input type="hidden" name="id" value="{{$id}}"/>
				</form>
			</div>
		</div>
    </div>
</main>
@endsection

@section('scripts')
	<link href="{{ url('admin-assets/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <script src="{{ url('admin-assets/summernote/summernote-lite.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('.summernote').summernote();
		});
	</script>
@endsection