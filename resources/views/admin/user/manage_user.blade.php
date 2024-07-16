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
        <h1 class="h3 mb-3"><strong>{{$id=='0' ? "Add new" : "Edit"}}</strong> User</h1>
        <div class="card">
			<form id="cat_form" action="{{route('admin.user.manage_user_process')}}" enctype="multipart/form-data" method="post">
			@csrf
			<div class="card-body">
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">First Name<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="fname" value="{{old('fname')}}" class="form-control" placeholder="First Name">
						
						@else
						<input type="text" name="fname" value="{{$fname}}" class="form-control" placeholder="First Name">
							
						@endif
						@error('fname')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Last Name<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="lname" value="{{old('lname')}}" class="form-control" placeholder="Last Name">
						
						@else
						<input type="text" name="lname" value="{{$lname}}" class="form-control" placeholder="Last Name">
							
						@endif
						@error('lname')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Email<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
						
						@else
						<input type="text" name="email" value="{{$email}}" class="form-control" placeholder="Email">
							
						@endif
						@error('email')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Password<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="password" value="" class="form-control" placeholder="Enter password">
						
						@else
						<input type="text" name="password" value="" class="form-control" placeholder="Enter password">
							
						@endif
						@error('password')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Phone<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Phone Number">
						
						@else
						<input type="text" name="phone" value="{{$phone}}" class="form-control" placeholder="Phone Number">
							
						@endif
						@error('phone')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">User Type<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<select name="role_id" value="{{old('role_id')}}" class="form-control">
							<option value="">Please Select Role</option>
							<option value="2">Driver</option>
							<option value="3">Ceo</option>
							<option value="4">Manager</option>
							<option value="5">Accountant</option>
							<option value="6">Security Gaurd</option>
						</select>
						
						@else
						<select name="role_id" value="{{old('role_id')}}" class="form-control" {{($role_id==1) ? 'disabled':''}}>
						<option value="">Please Select Role</option>
						<option value="2" {{($role_id==2) ? 'selected' :''}}>Driver</option>
						<option value="3" {{($role_id==3) ? 'selected' : ''}}>Ceo</option>
						<option value="4" {{($role_id==4) ? 'selected' : ''}}>Manager</option>
						<option value="5" {{($role_id==5) ? 'selected' : ''}}>Accountant</option>
						<option value="6" {{($role_id==6) ? 'selected' : ''}}>Security Gaurd</option>
						</select>
							
						@endif
						@error('role_id')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Joining Date<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
						<input type="text" name="joindate" value="{{old('joindate')}}" class="form-control datepicker" placeholder="Joining Date">
						
						@else
						<input type="text" name="joindate" value="{{ \Carbon\Carbon::parse($joindate)->format('d/m/Y')}}" class="form-control datepicker" placeholder="Joining Date">
							
						@endif
						@error('joindate')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div>
				<div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Profile Photo<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
							
						<input type="file" name="image" class="form-control">
						@else
							<img src="{{ asset('admin-assets/images/users/' .$image) }}" height="100" lenght="100"><br/>
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
				{{-- <div class="row add_cat mb-3">
					<div class="col-lg-2">
						<h5 class="card-title mb-2">Image<sup>*</sup></h5>
					</div>
					<div class="col-lg-10">
						@if ($id=='0')
							
						<input type="file" name="image" class="form-control">
						@else
							<img src="{{ asset('admin-assets/images/materials/' .$image) }}" height="100" lenght="100"><br/>
						<input type="file" name="image" class="form-control">
					   <input type="hidden" name="hidimg" value="{{$image}}">
							
						@endif
						@error('image')
						<span class="text-danger">
							{{$message}}		
						</span>
						@enderror
					</div>
				</div> --}}
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
						<a href="{{ route('admin.user') }}"><button type="button" class="btn btn-danger">Cancel</button></a>
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