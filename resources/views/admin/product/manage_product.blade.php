@extends('admin.layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css" />

<link href="{{ url('admin-assets/css/bootstrap-tagsinput.css') }}" rel="stylesheet">
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
        <h1 class="h3 mb-3"><strong>{{$id=='0' ? "Add new" : "Edit"}}</strong> Products</h1>
        <div class="card">
			<form id="cat_form" action="{{route('admin.products.manage_products_process')}}" enctype="multipart/form-data" method="post">
			@csrf
			<div class="card-body">
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Name<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Product Name">
						
						@else
						<input type="text" name="name" value="{{$name}}" class="form-control" placeholder="Product Name">
							
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
							<img src="{{ asset('admin-assets/images/product/' .$image) }}" height="100" lenght="100"><br/>
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
						<h5 class="card-title mb-2">Price<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="Price">
						
						@else
						<input type="text" name="price" value="{{$price}}" class="form-control" placeholder="Price">
							
						@endif
						@error('price')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Length<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="length" value="{{old('length')}}" class="input-tags form-control" placeholder="Length" data-role="tagsinput">
						
						@else
						<input type="text" name="length" value="{{$length}}" class="input-tags form-control" placeholder="Length" data-role="tagsinput">
							
						@endif
						@error('length')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Breadth<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="breadth" value="{{old('breadth')}}" class="input-tags form-control" placeholder="Breadth" data-role="tagsinput">
						
						@else
						<input type="text" name="breadth" value="{{$breadth}}" class="input-tags form-control" placeholder="Breadth" data-role="tagsinput">
							
						@endif
						@error('breadth')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Deep<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="deep" value="{{old('deep')}}" class="input-tags form-control" placeholder="Deep" data-role="tagsinput">
						
						@else
						<input type="text" name="deep" value="{{$deep}}" class="input-tags form-control" placeholder="Deep" data-role="tagsinput">
							
						@endif
						@error('deep')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Description<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<textarea name="description" class="form-control"></textarea>
						
						@else
						<textarea name="description" class="form-control">{{ $description ?? ''}}</textarea>
							
						@endif
						@error('description')
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
					<a href="{{ route('admin.add-products') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
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
<script src="{{ asset('admin-assets/js/bootstrap-tagsinput.js') }}"></script>
<script>
	$(".datepicker").datepicker({
		clearBtn: true,
		format: "dd/mm/yyyy",
	});
</script>
@endsection