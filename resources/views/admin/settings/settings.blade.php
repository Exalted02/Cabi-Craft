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
        <h1 class="h3 mb-3"><strong>Add or Edit</strong> Settings</h1>
        <div class="card">
			<div class="card-body">
				<form action="{{route('admin.settings.manage_settings_process')}}"  method="post">
					@csrf
					<div class="card-header">
						<h5 class="card-title mb-0">Private info</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label class="form-label" for="inputHost">Office Address</label>
								<input type="text" name="address" value="{{ $result->address ?? ''}}" class="form-control" id="inputFirstName"  placeholder="Address">
							
								@error('address')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label" for="inputHost">Business Phone</label>
								<input type="text" name="phone" value="{{ $result->phone ?? ''}}" class="form-control" id="inputFirstName"  placeholder="Phone">
								@error('phone')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="card-header">
						<h5 class="card-title mb-0">Email info</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-3">
								<label class="form-label" for="inputHost">Driver</label>
								<input type="text" name="driver" value="{{ $result->driver ?? ''}}" class="form-control" id="inputFirstName"  placeholder="Driver">
							
								@error('driver')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
								
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label" for="inputHost">Host</label>
								<input type="text" name="host" value="{{ $result->host ?? ''}}" class="form-control" id="inputFirstName"  placeholder="Host">
							
								@error('host')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
								
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label" for="inputLastName">Port</label>

								<input type="text" name="port" value="{{$result->port ?? ''}}" class="form-control"  id="inputLastName"  placeholder="Port">
							
								@error('port')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label" for="inputLastName">Encryption</label>

								<input type="text" name="encryption" value="{{$result->encryption ?? ''}}" class="form-control"  id="inputLastName"placeholder="Encryption">
							
								@error('encryption')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label" for="inputLastName">Username</label>

								<input type="text" name="username" value="{{$result->username ?? ''}}" class="form-control"  id="inputLastName"  placeholder="Username">
							
								@error('username')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label" for="inputLastName">Password</label>

								<input type="text" name="password" value="{{$result->password ?? ''}}" class="form-control"  id="inputLastName"  placeholder="Password">
							
								@error('password')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label" for="inputLastName">Sender Name</label>

								<input type="text" name="sender_name" value="{{$result->sender_name ?? ''}}" class="form-control"  id="inputLastName"  placeholder="Sender Name">
							
								@error('sender_name')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-3">
								<label class="form-label" for="inputLastName">Sender Email</label>

								<input type="text" name="sender_email" value="{{$result->sender_email ?? ''}}" class="form-control"  id="inputLastName"  placeholder="Sender Email">
							
								@error('sender_email')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="card-header">
						<h5 class="card-title mb-0">Social Link</h5>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="mb-3 col-md-6">
								<label class="form-label" for="inputFirstName">Twitter</label>
								<input type="text" name="twitter" value="{{$result->twitter ?? ''}}" class="form-control"  id="inputLastName"  placeholder="Twitter">
						
								@error('twitter')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label" for="inputLastName">Facebook</label>
								<input type="text" name="facebook" value="{{$result->facebook ?? ''}}" class="form-control"  id="inputLastName"  placeholder="Facebook">
						
								@error('facebook')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label" for="inputLastName">LinkedIn</label>
								<input type="text" name="linkedIn" value="{{$result->linkedIn ?? ''}}" class="form-control"  id="inputLastName"  placeholder="LinkedIn">
						
								@error('linkedIn')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
							<div class="mb-3 col-md-6">
								<label class="form-label" for="inputLastName">Youtube</label>
								<input type="text" name="youtube" value="{{$result->youtube ?? ''}}" class="form-control"  id="inputLastName"  placeholder="Youtube">
						
								@error('youtube')
								<span class="text-danger">
									{{$message}}		
								</span>
								@enderror
							</div>
						</div>
					</div>
					<div class="row add_cat_submit mt-3">
						<div class="col-lg-10">
							<button type="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
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