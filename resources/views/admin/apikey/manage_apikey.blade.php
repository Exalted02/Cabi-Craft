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
        <h1 class="h3 mb-3"><strong>App Script Apikey Entry</strong> </h1>
		@if(session('message') )
		<div class="alert alert-success alert-dismissible fade show">
			<strong>{{session('message')}}</strong> 
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
			</button>
		</div>
		@endif
        <div class="card">
			<form id="cat_form" action="{{route('admin.apikey.manage_apikey_process')}}"  method="post">
			@csrf
			<div class="card-body">
				
				<div class="row add_cat mb-3">
					<div class="col-lg-4">
						<input type="text" name="appapikey" value="{{$appapikey}}" class="form-control" placeholder="App Script Api Key" style="width:500px;">
					</div>
					@error('appapikey')
						<span class="text-danger">
							{{$message}}		
						</span>
					@enderror
				
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
					{{-- <div class="col-lg-2"></div> --}}
					<div class="col-lg-10">
						<a href="{{ route('admin.material') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
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