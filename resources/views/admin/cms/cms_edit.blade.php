@extends('admin.layouts.app')

@section('content')

<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>{{$id=='0' ? "Add new" : "Edit"}}</strong> CMS</h1>
        <div class="card">
			<form id="cms_form" action="{{route('admin.cms.manage_cms_process')}}" method="post">
			@csrf
			<div class="card-body">	
				<div class="row updateCMSrow mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">CMS Page Name<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="cms_page_name" value="{{$cms_page_name}}" placeholder="Page Name" required>
						@error('cms_page_name')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
					
				</div>
				<div class="row updateCMSrow mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">CMS Slug<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="slug" value="{{$slug}}" placeholder="Slug" required>
						@error('slug')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row updateCMSrow mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">CMS Page Content<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						<textarea name="cms_page_content" id="" class="form-control summernote">{{$cms_page_content}}</textarea>
					</div>
				</div>			
				{{--<div class="row updateCMSrow mb-3">
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
				</div>--}}
				{{--<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Is Trending<sup></sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input class="form-check-input" type="checkbox" name="is_trending">
						@else
						<input class="form-check-input" type="checkbox" name="is_trending" {{ ($is_trending ==1) ? 'checked': ''}}>
						@endif
					</div>
				</div>--}}
				<div class="row add_cat_submit mt-3">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<button type="submit" class="btn btn-success">Submit</button>
						<a href="{{ route('admin.cms') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
					</div>
				</div>
			</div>
			<input type="hidden" name="id" value="{{$id}}"/>
			</form>
		</div>
		<!-- Button trigger modal -->
		
    </div>
</main>
@endsection

@section('scripts')
	<link href="{{ asset('admin-assets/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <script src="{{ asset('admin-assets/summernote/summernote-lite.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			$('.summernote').summernote();
		});
	</script>
@endsection