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
        <h1 class="h3 mb-3"><strong>{{$id=='0' ? "Add new" : "Edit"}}</strong> Sub Category </h1>
        <div class="card">
			<form id="cat_form" action="{{route('admin.cabinettype.manage_cabinettype_process')}}" enctype="multipart/form-data" method="post">
			@csrf
			<div class="card-body">
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Select Sub Category<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<select type="text" name="subcategory_id" id="subcategory_id" class="form-control">
							<option value="">Select Sub Category</option>
							@foreach($subcategory as $val)
								<option value="{{$val->id}}">{{ $val->name}}</option>
							@endforeach
						</select>
						
						@else
						<select type="text" name="subcategory_id" id="subcategory_id" class="form-control">
							<option value="">Select Sub Category</option>
							@foreach($subcategory as $val)
								<option value="{{$val->id}}" {{ ($subcategory_id == $val->id ) ? 'selected': '' }}>{{ $val->name}}</option>
							@endforeach
						</select>
							
						@endif
						@error('subcategory_id')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Cabinet Type<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Cabinet Type Name">
						
						@else
						<input type="text" name="name" value="{{$name}}" class="form-control" placeholder="Cabinet Type Name">
							
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
						<h5 class="card-title mb-2">LXD<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" class="form-control" name="LXD" value="{{old('LXD')}}" placeholder="LXD">
						
						@else
						<input type="text" name="LXD" value="{{$LXD}}" class="form-control" placeholder="LXD">
							
						@endif
						@error('LXD')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">WXD<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" class="form-control" name="WXD" value="{{old('WXD')}}" placeholder="WXD">
						
						@else
						<input type="text" name="WXD" value="{{$WXD}}" class="form-control" placeholder="WXD">
							
						@endif
						@error('WXD')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">WXL<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" class="form-control" name="WXL" value="{{old('WXL')}}" placeholder="WXL">
						
						@else
						<input type="text" name="WXL" value="{{$WXL}}" class="form-control" placeholder="WXL">
							
						@endif
						@error('WXL')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Hardware Amount<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" class="form-control" name="hardware_amt" value="{{old('hardware_amt')}}" placeholder="Hardware Amount">
						
						@else
						<input type="text" name="hardware_amt" value="{{$hardware_amt}}" class="form-control" placeholder="Hardware Amount">
							
						@endif
						@error('hardware_amt')
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
							@if($image!='')
							<img src="{{ asset('admin-assets/images/cabinettype/' .$image) }}" height="100" lenght="100"><br/>
							@endif
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
						<a href="{{ route('admin.category') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
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