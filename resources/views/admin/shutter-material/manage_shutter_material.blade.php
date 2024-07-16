@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />
<style type="text/css">
	.datepicker {
		font-size: 0.875em;
	}
	.datepicker td, .datepicker th {
		width: 2em;
		height: 2em;
		padding: 5px;
	}
</style>
<main class="content">
	<div class="container-fluid p-0">
        <h1 class="h3 mb-3"><strong>{{$id=='0' ? "Add new" : "Edit"}}</strong> Shutter Material</h1>
        <div class="card">
			<form id="cat_form" action="{{route('admin.shutter-material.manage_shutter_material_process')}}" enctype="multipart/form-data" method="post">
			@csrf
			<div class="card-body">
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Shutter Material Name<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Shutter Material Name">
						
						@else
						<input type="text" name="name" value="{{$name}}" class="form-control" placeholder="Shutter Material Name">
							
						@endif
						@error('name')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Image<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
							
						<input type="file" name="image" class="form-control">
						@else
							<img src="{{ asset('admin-assets/images/shuttermaterial/' .$image) }}" height="100" lenght="100"><br/>
						<input type="file" name="image" class="form-control">
					   <input type="hidden" name="hidimg" value="{{$image}}">
							
						@endif
						@error('image')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Status<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
							
						<select name="status" class="form-control">
							<option value="">Select Status</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
						@else
							
						<select name="status" class="form-control">
							<option value="">Select Status</option>
							<option value="1" {{ ($status==1)? 'selected': ''}}>Active</option>
							<option value="0" {{ ($status==0)? 'selected': ''}}>Inactive</option>
						</select>
						@endif
						@error('status')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				{{-- <div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Date<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						<input type="text" name="from_date" class="form-control datepicker" placeholder="From date">
						@error('from_date')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div> --}}
				<div class="row add_cat_submit mt-3">
					<div class="col-lg-2"></div>
					<div class="col-lg-10">
						<a href="{{ route('admin.shutter-material') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
						<button type="submit" class="btn btn-success">Submit</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
	$(".datepicker").datepicker({
		clearBtn: true,
		format: "dd/mm/yyyy",
	});
</script>
@endsection